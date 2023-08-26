<?php

function dd($data)
{
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        die();
}

function uriCheck($uri, $path)
{
        return $uri === $path;
}

function abort($code = 404)
{
        http_response_code($code);
        require base_path("views/{$code}.view.php");
        die();
}

function authorize($condition, $status = Core\Response::FORBIDDEN)
{
        if(!$condition)
        {
                return abort($status);
        }
}

function base_path($path)
{
        return BASE_DIR . $path;
}

function view($path, $data = [])
{
        extract($data);

        require base_path('views/' . $path);
}

function login($user)
{
        $_SESSION['user'] = [
                'email' => $user['email']
        ];

        session_regenerate_id(true);
}

function logout()
{
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}