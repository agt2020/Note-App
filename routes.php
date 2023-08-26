<?php

// PUBLIC
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// NOTES
$router->get('/note', 'notes/show.php');
$router->get('/notes', 'notes/index.php')->only('auth');

$router->delete('/notes', 'notes/destroy.php');

$router->post('/notes/note-create', 'notes/store.php');
$router->get('/notes/note-create', 'notes/create.php');

$router->get('/notes/edit', 'notes/edit.php');
$router->patch('/notes/edit', 'notes/update.php');

// USERS
$router->get('/users/register', 'users/register.php')->only('guest');
$router->post('/users/store', 'users/store.php')->only('guest');

$router->get('/users/login', 'users/login.php')->only('guest');
$router->post('/users/session', 'users/session.php')->only('guest');
$router->delete('/users/logout', 'users/logout.php')->only('auth');