<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

// CHECK VALIDATION
$form = new LoginForm();
if(! $form->validate($email, $password))
{
        return view('users/register.view.php',[
                'errors' => $form->errors()
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

        redirect('/');
}
else
{
        return view('users/register.view.php',[
                'errors' => [
                        'email' => 'This User Already Exsit !'
                ]
        ]);
}