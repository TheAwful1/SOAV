<?php
require_once __DIR__ . "/../app/controllers/HomeController.php";
require_once __DIR__ . "/../core/View.php";
require_once __DIR__ . "/../app/config/database.php";
$controller = $_GET["controller"] ?? "home";
$action = $_GET["action"] ?? "index";

$controllerName = ucfirst($controller) . "Controller";

$c = new $controllerName();
$c->$action();
