<?php

use Core\Database;
use Core\Validator;

$currentUser = 1;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if(! Validator::string($_POST['body'], 1, 1000))
{
        $errors['body'] = 'Body with less than 1,000 characters is required !';
}

if(!empty($errors))
{
        require view('notes/create.view.php', [
                'header' => 'Create Note',
                'errors' => $errors
        ]);
}

$db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => $currentUser
]);

header('location: /notes');
die();