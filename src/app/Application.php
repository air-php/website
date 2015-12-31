<?php

namespace Air\Website;

use Air\Application\Application as BaseApplication;
use Air\Routing\FastRoute\FastRoute;
use Air\HTTP\Request\Request;
use Air\Routing\Dispatcher\Dispatcher;
use Air\Routing\Route\Route;
use DI\ContainerBuilder;
use DI\Container;
use Air\Website\Controller;

class Application extends BaseApplication
{
    /**
     * @var Container $container A DI container.
     */
    protected $container;


    /**
     * Bootstrap the application.
     */
    public function __construct()
    {
        // Configure the DI container.
        $this->configureContainer();

        // Configure the application routing.
        $this->configureRouting();

        // Configure the application dispatcher.
        $this->configureDispatcher();

        // Set the request to the current request.
        $this->setRequest(new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_POST, $_GET));
    }


    /**
     * Configure the DI container.
     */
    private function configureContainer()
    {
        // Build the DI container.
        $builder = new ContainerBuilder;
        $builder->addDefinitions(__DIR__ . '/config/di.php');

        $this->container = $builder->build();
    }


    /**
     * Configure the application routing.
     */
    private function configureRouting()
    {
        // Setup the router.
        $router = new FastRoute([]);

        // Add routes.
        $router->addRoutes([
            new Route('/', Controller\Home::class, 'home'),
        ]);

        // Set the router object.
        $this->setRouter($router);
    }


    /**
     * Configure the application dispatcher.
     */
    private function configureDispatcher()
    {
        $dispatcher = new Dispatcher($this->container);
        $this->setDispatcher($dispatcher);
        $this->container->set('dispatcher', $dispatcher);
    }
}
