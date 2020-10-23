<?php
declare(strict_types=1);
//this line makes PHP behave in a more strict way

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require 'Model/DatabaseLoader.php';
require 'Model/Product.php';
require 'Model/ProductLoader.php';
require 'Model/Group.php';
require 'Model/GroupLoader.php';
require 'Model/User.php';
require 'Model/UserLoader.php';

//include all your controllers here
require 'Controller/HomepageController.php';

$controller = new HomepageController();
$controller->render();



