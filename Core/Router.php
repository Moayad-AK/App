<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($uri, $controller, $method)
    {
        // $this->routes[] = compact('uri', 'controller', 'method');
        $this->routes[] = [ // the compact build in fun do the same thing here.
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET'); // This more cleaner than down
        // $this->routes[] = [
        //     'uri' => $uri,
        //     'controller' => $controller,
        //     'method' => 'GET'
        // ];
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this->routes;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }
                // if ($route['middleware'] === 'guest') {
                //     (new Guest)->handle();
                // }
                // if ($route['middleware'] === 'auth') {
                //     (new Auth)->handle();
                // }
                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }


    protected function abort($code = 404)
    {
        http_response_code(404);
        require base_path("views/{$code}.php");
        die();
    }
}
