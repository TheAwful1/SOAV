<?php
require_once __DIR__ . '/../config/database.php';

class Usuario {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }


  public function registrar($nombre,$email,$password,$rol = 'cliente'){
    $sql = "INSERT INTO usuarios (nombre, email, password, rol, state) 
        VALUES (?, ?, ?, ?, 'activo')";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$nombre, $email, password_hash($password, PASSWORD_BCRYPT), $rol]);
  }
  

  public function login($email, $password)
  {
    $stmt = $this->pdo->prepare("");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && password_verify($password, $user['password'])){
        return $user;
    }
    return false;
  }
}
//Aqui faltan las demas operaciones CRUD


?>