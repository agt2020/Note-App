<?php

use Core\Session;

view('users/login.view.php',[
        'errors' => Session::get('errors')
]);