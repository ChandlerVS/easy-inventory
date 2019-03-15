<?php
namespace ChandlerVS\EasyInventory\Controllers;

Use ChandlerVS\EasyInventory\App;

class DashboardController
{
    public function __construct()
    {
        App::$router->get('/', function() {
            echo "Home From Controller";
        });
    }
}
