<?php
require "init.php";

use ChandlerVS\EasyInventory\Controllers;

$app->registerController("dashboardController", new Controllers\DashboardController());

$app->run();