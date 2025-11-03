<?php
require_once __DIR__ . '/../config/database.php';

class Usuario {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }


  public function registrar($nombre,$email,$password,$rol = 'cliente'){
    $hash = password_hash($password, PASSWORD_DEFAULT); //Esto de aqui lo que hace es usar un algoritmo para fortalecer las contraseñas.

    $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, email, password, rol, state) 
        VALUES (?, ?, ?, ?, 'activo')");
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
  }//Aqui faltan las demas operaciones CRUD
//Podria añadir una forma de hacer que solo se desactivaran usuarios o vehiculos sin eliminarlos de la base de datos
public function verTodos(){
  $sql = "SELECT * FROM usuarios";
}
public function buscar($id){
  $stmt = $this->pdo->prepare( "SELECT * FROM usuarios WHERE id = ?");
  $stmt->execute([$id]);

}
public function editar($nombre, $email, $password, $id){
  $sql = "UPDATE TABLE usuarios (nombre, email, password)
  VALUES(?,?,?)";
}//Aaui se pueden editar los datos de los usuarios que se presenten en la busqueda, y editando los datos en el front se puede enviar un formulario que tenga los datos que se requieran 
public function eliminar($id){
  
}
}



?>