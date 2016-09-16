<?php

error_reporting(E_ALL);

try {

    /**
     * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
     */
    $di = new \Phalcon\DI\FactoryDefault();

    /**
     * Registering a router
     */
    $di['router'] = function () {

        $router = new \Phalcon\Mvc\Router(false);
        $routes = include 'apps/frontend/config/routes.php';
        $routes2 = include 'modules/Admin/config/routes.php';
        $routes = array_merge($routes,$routes2);
        foreach ($routes as $key => $route){
            $router->add($key, $route);
        }
        return $router;
    };

    /**
     * The URL component is used to generate all kind of urls in the application
     */
    $di->set('url', function () {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('http://braincore2/');
        return $url;
    });

    /**
     * Start the session the first time some component request the session service
     */
    $di->set('session', function () {
        $session = new \Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
    });

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application();

    $application->setDI($di);

    /**
     * Register application modules
     */
    $application->registerModules(array(
        'frontend' => array(
            'className' => 'Modules\Frontend\Module',
            'path' => 'apps/frontend/Module.php'
        ),
        'admin' => array(
            'className' => 'Modules\Admin\Module',
            'path' => 'modules/Admin/Module.php'
        )
    ));

    echo $application->handle()->getContent();
} catch (Phalcon\Exception $e) {
    echo $e->getMessage();
} catch (PDOException $e) {
    echo $e->getMessage();
}
