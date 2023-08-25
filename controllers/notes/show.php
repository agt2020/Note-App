<?php

use Core\Database;

$currentUser = 1;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
        'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUser);

require view('notes/show.view.php', [
        'header' => 'Note',
        'note' => $note
]);