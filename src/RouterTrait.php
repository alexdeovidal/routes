<?php

namespace Alexdeovidal\Route;

use Exception;
use JsonException;

/**
 * methods and prepare
 */
trait RouterTrait
{
    /**
     * @param string $route
     * @param string $controller
     * @param bool $middleware
     * @param string $verb
     * @param string $namespace
     */
    protected static function addRoute(string $route, string $controller, bool $middleware, string $verb, string $namespace): void
    {
        $uri = parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT));
        if (isset($uri['query'])) {
            parse_str($uri['query'], $query);
        }

        $query = (object) ($query ?? null);
        $path = ($uri['path'] ?? null);

        self::setRoute($route);
        self::setController($controller);
        self::setMiddleware($middleware);
        self::setVerb($verb);
        self::setUri($path);
        self::setQuery($query);
        self::setNamespaceRoute($namespace);
    }
    /**
     * @param $class
     * @throws Exception
     */
    protected static function classExists($class): void
    {
        if (!class_exists($class)) {
            exit(self::response(501, "{$class} controller not found"));
        }
    }
    /**
     * @param $Instance
     * @param $method
     * @throws Exception
     */
    protected static function methodExists($Instance, $method): void
    {
        if (!method_exists($Instance, $method)) {
            exit(self::response(501, "{$method} method not found"));
        }
    }

    /**
     * @param $class
     * @param $method
     * @throws Exception
     */
    protected static function instanceClass($class, $method): void
    {
        $Instance = new $class;
        if (!isset($method)) {
            exit(self::response(501, "method not informed in the route"));
        }
        self::methodExists($Instance, $method);
        $Instance->$method(self::getParams(), self::getQuery());
    }
    /**
     * @throws Exception
     */
    protected static function prepare(): void
    {
        $verifyRoute = false;
        $patterns = preg_replace('~{([^}]*)}~', "([^/]+)", self::getRoute());
        foreach ($patterns as $key => $pattern) {
            preg_match('#' . $pattern . '#', self::getUri(), $router);
            if (isset($router[0]) && $router[0] === self::getUri() && self::getVerb()[$key] === $_SERVER['REQUEST_METHOD']) {
                $verifyRoute = true;
                array_shift($router);
                preg_match_all('~{([^}]*)}~', self::getRoute()[$key], $keys);
                self::setParams(array_combine($keys[1], $router));
                self::execController(
                    self::getController()[$key],
                    self::getMiddleware()[$key],
                    self::getNamespaceRoute()[$key]
                );
            }
        }
        if (!$verifyRoute) {
            exit(self::response(404, "route " . self::getUri() . " not found"));
        }
    }
    /**
     * @param $controller
     * @param $namespace
     * @param $separator
     * @throws Exception
     */
    protected static function controller($controller, $namespace, $separator): void
    {
        [$class, $method] = explode($separator, $controller);
        $class = $namespace . '\\' . $class;
        self::classExists($class);
        self::instanceClass($class, $method);
    }
    /**
     * @param $controller
     * @param $middleware
     * @param $namespace
     * @throws Exception
     */
    protected static function execController($controller, $middleware, $namespace): void
    {
        if ($middleware) {
            self::controller("Middleware:checkAuth", "Alexdeovidal\Route", ":");
        }

        self::controller($controller, $namespace, "@");
    }

    /**
     * @param $code
     * @param $data
     * @return string
     * @throws JsonException
     */
    public static function response($code, $data): string
    {
        header('Content-Type: application/json;charset=utf-8');
        http_response_code($code);
        return json_encode([
            'data' => $data,
            'status' => Error::show($code),
            'code' => $code
        ], JSON_THROW_ON_ERROR);
    }
}