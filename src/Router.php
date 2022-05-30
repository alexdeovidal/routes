<?php

namespace Alexdeovidal\Route;

use Exception;

/**
 * Class Router
 * responsável por fazer todas as rotas para comunicação entre o modelo, visão e o controlador
 * responsible for making all the routes for communication between the model, view and the controller
 */
class Router extends Resource
{
    /**
     * @param string $route
     * @param string $controller
     * @param bool $middleware
     */
    public static function get(string $route, string $controller, bool $middleware = false): void
    {
        self::addRoute($route, $controller, $middleware, 'GET', self::getNamespace());
    }

    /**
     * @param string $route
     * @param string $controller
     * @param bool|null $middleware
     */
    public static function post(string $route, string $controller, bool $middleware = false): void
    {
        self::addRoute($route, $controller, $middleware, 'POST', self::getNamespace());
    }

    /**
     * @param string $route
     * @param string $controller
     * @param bool $middleware
     */
    public static function put(string $route, string  $controller, bool $middleware = false): void
    {
        self::addRoute($route, $controller, $middleware, 'PUT', self::getNamespace());
    }

    /**
     * @param string $route
     * @param string $controller
     * @param bool $middleware
     */
    public static function delete(string $route, string $controller, bool $middleware = false): void
    {
        self::addRoute($route, $controller, $middleware, 'DELETE', self::getNamespace());
    }

    /**
     * @param string $namespace
     */
    public static function group(string $namespace): void
    {
        self::setNamespace($namespace);
    }
    /**
     * @return void
     * @throws Exception
     */
    public static function exec(): void
    {
        self::prepare();
    }
}
