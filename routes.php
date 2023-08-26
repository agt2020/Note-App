<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// NOTES

$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes', 'controllers/notes/index.php')->only('auth');

$router->delete('/notes', 'controllers/notes/destroy.php');

$router->post('/notes/note-create', 'controllers/notes/store.php');
$router->get('/notes/note-create', 'controllers/notes/create.php');

$router->get('/notes/edit', 'controllers/notes/edit.php');
$router->patch('/notes/edit', 'controllers/notes/update.php');

// USERS

$router->get('/users/register', 'controllers/users/register.php')->only('guest');
$router->post('/users/store', 'controllers/users/store.php');