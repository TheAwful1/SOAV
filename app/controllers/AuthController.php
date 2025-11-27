<?php
class AuthController 
{    
private Usuario $modelo;

public function __construct(PDO $pdo) {
$this->modelo = new Usuario($pdo);
}
public function index() {
    View::render("usuarios/crear", [
        "title" => "Registrar nuevo usuario"
    ]);
}

public function login(){}
public function logout(){}
//De aqui en adelante estan las funciones del admin
public function refreshTokens(){}
public function passwordReset(){}
public function tokenVerify(){}




}


?>