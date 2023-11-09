<?php

namespace vendor\core;

class Router
{
    protected static $routes = [];
    protected static $route = [];
    const ACTION = 'action';
    const CONTROLLER = 'controller';

    /**
     * @param string $path
     * @param array $route
     * @return void
     */
    public static function addToRoutes($path, $route)
    {
        self::$routes[$path] = $route;
    }

    /**
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * @param string $url
     * @return bool
     */
    private static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route[self::ACTION])) {
                    $route[self::ACTION] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route[self::CONTROLLER];
            if (class_exists($controller)) {
                self::$route[self::CONTROLLER] = self::toLowerLetter(self::$route[self::CONTROLLER]);
                $controllerObj = new $controller(self::$route);
                $action = self::$route[self::ACTION] . 'Action';
                if (method_exists($controllerObj, $action)) {
                    $controllerObj->$action();
                } else {
                    echo 'action не найден';
                }
            } else {
                echo "контроллер $controller не найден";
            }
        } else {
            include ('404.html');
        }
    }

    /**
     * @param string $string
     * @return string
     */
    public static function toLowerLetter($string)
    {
        return lcfirst($string);
    }
}