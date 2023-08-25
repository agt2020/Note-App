<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes', 'controllers/notes/index.php');

$router->delete('/notes', 'controllers/notes/destroy.php');

$router->post('/notes/note-create', 'controllers/notes/store.php');
$router->get('/notes/note-create', 'controllers/notes/create.php');

$router->get('/notes/edit', 'controllers/notes/edit.php');
$router->patch('/notes/edit', 'controllers/notes/update.php');