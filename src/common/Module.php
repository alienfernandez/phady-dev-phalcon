<?php

namespace App\Common;

use Phalcon\Loader;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{

    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders(\Phalcon\DiInterface $dependencyInjector = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces(array(
            'App\Common\Controllers' => __DIR__ . '/controllers/'
        ));

        $loader->register();
    }

    /**
     * Registers the module-only services
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Setting up the view component
         */
        $di['view'] = function () {
            $view = new View();
            $view->registerEngines(array(
                ".volt" => 'volt'
            ));
            $view->setMainView(__DIR__ . '/../../app/views/layouts/');
            $view->setViewsDir(__DIR__ . '/views/');
            $view->setRenderLevel(View::LEVEL_ACTION_VIEW);
            return $view;
        };

        // Specify routes for modules
        $di->set('router', function () {
            $router = new Router();
            $router->setDefaultModule("common");
            $router->add("/portal", array(
                'module' => 'common',
                'controller' => 'portal',
                'action' => 'portal',
            ));

            return $router;
        });
    }

}
