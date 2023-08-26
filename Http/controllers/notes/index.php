<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes WHERE user_id = :user', ['user' => 1,])->get();

require view('notes/index.view.php', [
        'header' => 'My Notes',
        'notes' => $notes,
        'uri' => $uri
]);