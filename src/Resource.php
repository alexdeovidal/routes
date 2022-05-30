<?php

namespace Alexdeovidal\Route;

use stdClass;

/**
 * get and setters
 */
class Resource
{
    use RouterTrait;

    /**
     * @var array
     */
    private static array $route;
    /**
     * @var array
     */
    private static array $controller;
    /**
     * @var array
     */
    private static array $middleware;
    /**
     * @var array
     */
    private static array $verb;
    /**
     * @var string
     */
    private static string $uri;
    /**
     * @var null|stdClass
     */
    private static ?stdClass $query;
    /**
     * @var null|array
     */
    private static ?array $params;
    /**
     * @var string
     */
    private static string $namespace;
    /**
     * @var array
     */
    private static array $namespaceRoute;

    /**
     * @return array
     */
    protected static function getRoute(): array
    {
        return self::$route;
    }

    /**
     * @param null $route
     */
    private static function setRoute($route): void
    {
        self::$route[] = $route;
    }

    /**
     * @return array
     */
    protected static function getController(): array
    {
        return self::$controller;
    }

    /**
     * @param null $controller
     */
    private static function setController($controller): void
    {
        self::$controller[] = $controller;
    }

    /**
     * @return array
     */
    protected static function getMiddleware(): array
    {
        return self::$middleware;
    }

    /**
     * @param null $middleware
     */
    private static function setMiddleware($middleware): void
    {
        self::$middleware[] = $middleware;
    }

    /**
     * @return array
     */
    protected static function getVerb(): array
    {
        return self::$verb;
    }

    /**
     * @param null $verb
     */
    private static function setVerb($verb): void
    {
        self::$verb[] = $verb;
    }

    /**
     * @return string
     */
    protected static function getUri(): string
    {
        return self::$uri;
    }

    /**
     * @param null $uri
     */
    private static function setUri($uri): void
    {
        self::$uri = $uri;
    }

    /**
     * @return stdClass
     */
    protected static function getQuery(): stdClass
    {
        return self::$query;
    }

    /**
     * @param null $query
     */
    protected static function setQuery($query): void
    {
        self::$query = $query;
    }

    /**
     * @return array
     */
    protected static function getParams(): array
    {
        return self::$params;
    }

    /**
     * @param null $params
     */
    private static function setParams($params): void
    {
        self::$params = $params;
    }

    /**
     * @return string
     */
    protected static function getNamespace(): string
    {
        return self::$namespace;
    }

    /**
     * @param null $namespace
     */
    protected static function setNamespace($namespace): void
    {
        self::$namespace = $namespace;
    }

    /**
     * @return array
     */
    protected static function getNamespaceRoute(): array
    {
        return self::$namespaceRoute;
    }

    /**
     * @param null $namespaceRoute
     */
    private static function setNamespaceRoute($namespaceRoute): void
    {
        self::$namespaceRoute[] = $namespaceRoute;
    }

}