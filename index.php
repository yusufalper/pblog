<?php
require "config.php";

require "classes/Bootstrap.php";
require "classes/Controller.php";
require "classes/Model.php";

require "controllers/comments.php";
require "controllers/home.php";
require "controllers/posts.php";
require "controllers/users.php";

require 'models/home.php';
require 'models/comments.php';
require 'models/posts.php';
require 'models/users.php';


$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if ($controller) {
	$controller->executeAction();
}