<?php
namespace ChandlerVS\EasyInventory;

use Bramus\Router\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class App
{
    private static $twigLoader = null;

    static $router = null;
    static $twig = null;
    var $controllers = [];

    public function __construct()
    {
        self::$router = new Router();
        self::$twigLoader = new FilesystemLoader('views');
        self::$twig = new Environment(self::$twigLoader, [
            'cache' => 'cache',
            'debug' => getenv('DEBUG_MODE')
        ]);
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
