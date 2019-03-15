<?php
ini_set('display_errors', 1);
require "init.php";

use ChandlerVS\EasyInventory\Controllers;

$app->registerController("dashboardController", new Controllers\DashboardController());

$app->run();
