<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
require_once __DIR__ . "/../app/controllers/UserController.php";
require_once __DIR__ . "/../app/controllers/AuthController.php";
require_once __DIR__ . "/../app/controllers/VehicleController.php";
require_once __DIR__ . "/../app/controllers/HomeController.php";
require_once __DIR__ . "/../app/controllers/BookingController.php";
require_once __DIR__ . "/../app/config/database.php";
require_once __DIR__ . "/../app/models/User.php";
require_once __DIR__ . "/../app/models/Booking.php";
require_once __DIR__ . "/../app/models/Vehicle.php";
require_once __DIR__ . "/../core/View.php";
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../app/middlewares/AuthMiddleware.php";


$db = new Database();
$pdo = $db->connect();

$controller = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? null;
$ajax = isset($_GET['ajax']);
$GLOBALS['currentUser'] = AuthMiddleware::user();

$protected = [
    'Vehicle' => ['create','delete'],
    'Admin' => ['approveVehicle'],
    'Booking' =>['create']
];



//Verificamos que se halla enviado la ruta
if(!$controller || !$action)
{
    echo json_encode(["error" => "ninguna ruta propoorcionada"]);
    exit;
}
if (isset($protected[$controller]) && in_array($action, $protected[$controller])) {
    if (!$GLOBALS['currentUser']) {
        http_response_code(401);
        echo json_encode(['error' => 'No Autenticado']);
        exit;
    }
    if ($GLOBALS['currentUser']['role'] !== 'admin') {
        http_response_code(403);        
        echo json_encode(['error' => 'No Autorizado']);
        exit;
    }
}

if ($ajax) {
    View::render($view, $params, false); // sin layout
} else {
    View::render($view, $params); // con layout
}
switch ($controller) {
    case 'User': $c = new UserController($pdo); break;
    case 'Auth': $c = new AuthController($pdo); break;
    case 'Vehicle': $c = new VehicleController($pdo); break;
    case 'Booking': $c = new BookingController($pdo); break;
    case 'Home': $c = new HomeController(); break;
    default:
        echo json_encode(["error"=>"No se encontro el controlador"]); exit;
}

if(!method_exists($c, $action)){
    echo json_encode(["error" =>"No se encontro la accion"]);
    exit;
}
$c->$action();

?>