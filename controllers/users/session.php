<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// VALIDATE EMAIL
if(! Validator::email($email))
{
        $errors['email'] = 'Please enter a valid email address !';
}

if (! empty($errors))
{
        return view('users/login.view.php',[
                'errors' => $errors
        ]);
        die();
}

// FETCH USER
$user = $db->query('SELECT * FROM users WHERE email = :email',[
        'email' => $email
])->find();


if($user)
{
        if(password_verify($password, $user['password']))
        {
                login([
                        'email' => $email
                ]);
                
                header('location: /');
                exit();
        }
}

return view('users/login.view.php',[
        'errors' => [
                'email' => 'No matching account found for that email address and password.'
        ]
]);
die();