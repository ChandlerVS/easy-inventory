<?php
namespace ChandlerVS\EasyInventory;


use Bramus\Router\Router;

class App
{
    static $router = null;
    var $controllers = [];

    public function __construct()
    {
        self::$router = new Router();
    }

    public function run() {
        self::$router->run();
    }

    /**
     * Register a new controller into the system
     * @param $key
     * @param $controller
     * @throws \Exception
     */
    public function registerController($key, $controller) {
        if(isset($this->controllers[$key])) {
            throw new \Exception("Key $key is already in use");
        } else {
            $this->controllers[$key] = $controller;
        }
    }

    /**
     * Get a controller in the system
     * @param $key
     * @throws \Exception
     */
    public function getController($key) {
        if(!isset($this->controllers[$key])) {
            throw new \Exception("Key $key does not exist");
        }
    }
}
