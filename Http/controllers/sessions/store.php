<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    $auth = new Authenticator;

    if ($auth->attempt($email, $password)) {
        redirect('/');
    } else {
        $form->error('email', 'No matching account for this email address and password.');
    }
}


return view("sessions/create.view.php", [
    'title' => 'Log In Page',
    'errors' => $form->errors()
]);
