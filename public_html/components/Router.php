<?php

    class Router
    {
        private $routes;

        public function __construct()
        {
            $routesPath = ROOT . '/config/routes.php';
            $this->routes = include($routesPath);
        }

        /**
        *  Returns request string
        *  @return string
        */

        private function getURI()
        {
            if (!empty($_SERVER['REQUEST_URI']))
            {
                return trim($_SERVER['REQUEST_URI'], '/');
            }
        }

        public function run()
        {
            $uri = $this->getURI();

            foreach($this->routes as $uriPattern => $path)
            {
                if (preg_match("~$uriPattern~", $uri))
                {

                    // Get internal rout from external
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                    // Determine controller / action / parameters
                    $segments = explode('/', $internalRoute);

                    $controllerName = ucfirst(array_shift($segments) . 'Controller');

                    $actionName = 'action' . ucfirst(array_shift($segments));

                    $type = array_shift($segments);
                    $category = array_shift($segments);

                    echo 'action: ' . $actionName;
                    echo '<br><br>';
                    echo 'controller: ' . $controllerName;

                    // Running controller class file
                    $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                    if (file_exists($controllerFile))
                        include_once($controllerFile);

                    $controllerObject = new $controllerName;
                    $result = $controllerObject->$actionName($category, $type);

                    if ($result != NULL)
                        break;

                }
            }
        }
    }
?>
