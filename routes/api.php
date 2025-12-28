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
require_once __DIR__ . "/../app/controllers/AdminController.php";
require_once __DIR__ . "/../app/config/database.php";
require_once __DIR__ . "/../app/models/User.php";
require_once __DIR__ . "/../app/models/Booking.php";
require_once __DIR__ . "/../app/models/Vehicle.php";
require_once __DIR__ . "/../core/View.php";
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../app/middlewares/AuthMiddleware.php";
$db = new Database();
$pdo = $db->connect();


$currentUser= AuthMiddleware::user();
$GLOBALS['currentUser'] = $currentUser;

$protected = [
    'Vehicle' => ['create','delete'],
    'Admin' => ['approveVehicle'],
    'Booking' =>['create']
];

$controller = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? null;

//Verificamos que se halla enviado la ruta
if(!$controller || !$action)
{
    echo json_encode(["error" => "ninguna ruta proporcionada"]);
    exit;
}
if (isset($protected[$controller]) && in_array($action, $protected[$controller])) {
    if (!$GLOBALS['currentUser']) {
        http_response_code(401);
        echo json_encode(['error' => 'No Autenticado']);
        exit;
    }
    if ($GLOBALS['currentUser']['role'] !== 'admin') {
        View::render('shared/403');     
        echo json_encode(['error' => 'No Autorizado']);
        exit;
    }
}
die("antes del Switch");
switch ($controller) {
    case 'User': $c = new UserController($pdo); break;
    case 'Auth': $c = new AuthController($pdo); break;
    case 'Vehicle': $c = new VehicleController($pdo); break;
    case 'Booking': $c = new BookingController($pdo); break;
    case 'Admin': $c = new AdminController(); break;
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