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

function redirect($path)
{
        header("location: {$path}");
        exit();
}

function old($key, $default = '')
{
        return Core\Session::get('old')[$key] ?? $default;
}