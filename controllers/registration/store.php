<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Plaese provide a valid email address.';
}

if (!Validator::string($password, 6, 255)) {
    $errors['password'] = 'Plaese provide a password at least six characters.';
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        'title' => 'Register Page',
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(password, email) VALUES (:password, :email)', [
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'email' => $email
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];
    header('location: /');
    exit();
}
