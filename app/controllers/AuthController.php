<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once __DIR__ . '/../helpers/jwt_helper.php';
class AuthController 
{    
    
private Usuario $modelo;

public function __construct(PDO $pdo) {
$this->modelo = new Usuario($pdo);
}
public function ViewRegister() {
    $isAjax = isset($_GET['ajax']);
     if ($isAjax) {
        View::renderPartial("User/register", [
            "title" => "Registrar nuevo usuario"
        ]);
    } else {
        View::render("User/register", [
            "title" => "Registrar nuevo usuario"
        ]);
    }
}
public function ViewLogin() {
    $isAjax = isset($_GET['ajax']); if ($isAjax) {
        View::renderPartial("User/login", [
            "title" => "Inicia Sesion"
        ]);
    } else {
        View::render("User/login", [
            "title" => "Inicia Sesion"
        ]);
    }
}

public function login(){

    $data = json_decode(file_get_contents("php://input"),true);
    
    $user = $this->modelo->buscarPorEmail($data['email']); 

    if (!$user || !password_verify($data['password'], $user['password'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Credenciales inválidas']);
        return;
    }
    $token = JwtHelper::generate($user);

    echo json_encode([
        'token' => $token
    ]);
}
public function logout(){}
//De aqui en adelante estan las funciones del admin
public function refreshTokens(){}
public function passwordReset(){}
public function tokenVerify(){}




}


?>