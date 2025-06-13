<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 6, 255)) {
    $errors['password'] = 'Please provide a password at least six characters.';
}

if (!empty($errors)) {
    return view("sessions/create.view.php", [
        'title' => 'Log In Page',
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if (! $user) {
    return view("sessions/create.view.php", [
        'title' => 'Log In Page',
        'errors' => [
            'email' => 'No matching account for this email address'
        ]
    ]);
}

if (password_verify($password, $user['password'])) {
    login([
        'email' => $email
    ]);

    header('location: /');
    exit();
}

return view("sessions/create.view.php", [
    'title' => 'Log In Page',
    'errors' => [
        'password' => 'The password is not correct Enter the correct password please'
    ]
]);
