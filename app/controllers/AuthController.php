<?php
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

public function login(){}
public function logout(){}
//De aqui en adelante estan las funciones del admin
public function refreshTokens(){}
public function passwordReset(){}
public function tokenVerify(){}




}


?>