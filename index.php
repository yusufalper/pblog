<?php
#Starting Session and Include Files
session_start();
require "config.php";

require "classes/Bootstrap.php";
require "classes/Controller.php";
require "classes/Model.php";
require "classes/Messages.php";

require "controllers/home.php";
require "controllers/posts.php";
require "controllers/users.php";
require "controllers/categories.php";
require "controllers/search.php";


require 'models/home.php';
require 'models/post.php';
require 'models/user.php';
require 'models/category.php';
require 'models/search.php';


$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if ($controller) {
	$controller->executeAction();
}