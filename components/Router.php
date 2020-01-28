<?php

class Router
{
    private $routes;
    private $pathRoutes = ROOT . '/config/routes.php';

    public function __construct()
    {
        $this->routes = require_once($this->pathRoutes);
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function checkRoutes($uri)
    {
        $route = [];

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {
                $route[0] = $uriPattern;
                $route[1] = $path;
                return $route;
            }
        }
        return false;
    }

    public function start()
    {
        $uri = $this->getURI();
        $route = $this->checkRoutes($uri);

        if (!$route) {
            require_once(ROOT . '/controllers/MainController.php');
            $controllerName = new MainController;
            $controllerName->actionPageNotFound();
        } else {

            $mainName = explode('/', preg_replace("~$route[0]~", $route[1], $uri, 1));

            $controllerName = ucfirst(array_shift($mainName) . "Controller");
            $controllerFile = ROOT . '/controllers/' . $controllerName . ".php";

            if (file_exists($controllerFile)) {
                require_once($controllerFile);
                $controllerObj = new $controllerName;
            } else {
                require_once(ROOT . '/controllers/MainController.php');
                $controllerName = new MainController;
                $controllerName->actionPageNotFound();
            }

            $actionName = 'action' . ucfirst(array_shift($mainName));

            if (method_exists($controllerObj, $actionName)) {
                call_user_func_array(array($controllerObj, $actionName), $mainName);
            } else {
                require_once(ROOT . '/controllers/MainController.php');
                $controllerName = new MainController;
                $controllerName->actionPageNotFound();
            }
        }
    }
}
