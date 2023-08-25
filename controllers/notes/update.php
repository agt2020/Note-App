<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$currentUser = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
        'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUser);

$errors = [];

if(! Validator::string($_POST['body'], 1, 1000))
{
        $errors['body'] = 'Body with less than 1,000 characters is required !';
}

if(!empty($errors))
{
        require view('notes/edit.view.php', [
                'header' => 'Edit Note',
                'errors' => $errors,
                'note' => $note
        ]);
}

$db->query('UPDATE notes SET body = :body WHERE  id = :id', [
        'body' => $_POST['body'],
        'id' => $_POST['id']
]);

header('location: /notes');
die();