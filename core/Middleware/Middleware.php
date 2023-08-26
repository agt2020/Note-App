<?php

namespace Core\Middleware;

class Middleware
{
        public const MAP = [
                'auth' => Auth::class,
                'guest' => Guest::class
        ];

        public static function resolve($key = '')
        {
                if(! $key)
                {
                        return;
                }

                $middleware = static::MAP[$key];

                if($middleware ?? false)
                {

                }

                (new $middleware)->handle();
        }
}