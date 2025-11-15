<?php
class AuthController 
{    
private $modelo;

public function __construct() {
$db = new Database();
$this->user = new Usuario($db);
}

public function login(){}
public function logout(){}
//De aqui en adelante estan las funciones del admin
public function refreshTokens(){}
public function passwordReset(){}
public function tokenVerify(){}




}


?>