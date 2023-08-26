<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = password_verify($_POST['password'], PASSWORD_DEFAULT);

$errors = [];

// VALIDATE EMAIL AND PASSWORD
if(! Validator::email($email))
{
        $errors['email'] = '';
}