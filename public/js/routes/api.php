<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once "controllers/UserController.php";
require_once "controllers/AuthController.php";
require_once "controllers/VehiculoController.php";

$db = new Database();
$pdo = $db->connect();


$controller = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? null;

//Verificamos que se halla enviado la ruta
if(!$controller || !$action)
{
    echo json_encode(["error" => "ninguna ruta propoorcionada"]);
    exit;
}

switch ($controller) {
    case 'usuarios': $c = new UserController($pdo); break;
    case 'auth': $c = new AuthController($pdo); break;
    case 'vehiculos': $c = new VehicleController($pdo); break;
    case 'reservas': $c = new BookingController($pdo); break;
    default:
        echo json_encode(["error"=>"No se encontro el controlador"]); exit;
}

if(!method_exists($c, $action)){
    echo json_encode(["error" =>"No se encontro la accion"]);
    exit;
}
$c->$action();

?>