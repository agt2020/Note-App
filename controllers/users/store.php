<?php

use Core\App;
use Core\Validator;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$errors = [];
// VALIDATE EMAIL
if(! Validator::email($email))
{
        $errors['email'] = 'Please enter a valid email address !';
}
// VALIDATE PASSWORD
if(! Validator::string($password, 7, 255))
{
        $errors['password'] = 'PLease enter a valid password with at least 7 charatcers !';
}

// CHECK ERRORS
if(! empty($errors))
{
        return view('users/register.view.php',[
                'errors' => $errors
        ]);
}

// CHECK USER ALREADY EXIST
$user = $db->query('SELECT * FROM users WHERE email = :email',[
        'email' => $email
])->find();

if(! $user)
{
        $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        $_SESSION['user']['email'] = $email;

        header('location: /');
        exit();
}
else
{
        header('location: /users/login');
        exit();
}