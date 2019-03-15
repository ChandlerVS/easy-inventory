<?php
namespace ChandlerVS\EasyInventory\Controllers;

Use ChandlerVS\EasyInventory\App;

class DashboardController
{
    public function __construct()
    {
        $this->registerRoutes();
    }

    private function registerRoutes() {
        App::$router->get('/', function() {
            App::$twig->display("home.twig", []);
        });
    }
}
