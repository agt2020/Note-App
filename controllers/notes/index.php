<?php
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM notes WHERE user_id = :user', ['user' => 1,])->get();

require view('notes/index.view.php', [
        'header' => 'My Notes',
        'notes' => $notes,
        'uri' => $uri
]);