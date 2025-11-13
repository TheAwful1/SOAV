<?php
require_once __DIR__ . '/../config/database.php';

class Usuario {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }


  public function registrar($nombre,$email,$password,$rol = 'cliente'){
    $hash = password_hash($password, PASSWORD_DEFAULT); //Esto de aqui lo que hace es usar un algoritmo para fortalecer las contraseñas.

    $stmt = $this->pdo->prepare("INSERT INTO usuarios (name, email, password, rol, state) 
        VALUES (?, ?, ?, ?, 'activo')");
    $stmt->execute([$nombre,$email,$hash,$rol]);
    return $this->pdo->lastInsertId();
  }
  

  public function login($email, $password)
  {
    
    $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && password_verify($password, $user['password'])){
        return $user;
    }
    return false;
  }//Aqui faltan las demas operaciones CRUD
//Podria añadir una forma de hacer que solo se desactivaran usuarios o vehiculos sin eliminarlos de la base de datos
public function verTodos(){
  $stmt = $this->pdo->prepare("SELECT * FROM usuarios");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function buscar($id){
  $stmt = $this->pdo->prepare( "SELECT * FROM usuarios WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch(PDO::FETCH_ASSOC);

}

public function editar($nombre, $email, $password, $rol, $id){
  $stmt = $this->pdo->prepare("UPDATE usuarios SET name = ?, email = ?, rol = ?, state = ? WHERE id = ?");
  return $stmt->execute([$nombre,$email,$rol,$id]);
}//Aaui se pueden editar los datos de los usuarios que se presenten en la busqueda, y editando los datos en el front se puede enviar un formulario que tenga los datos que se requieran 

public function eliminar($id){
  $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = ?");
  return $stmt->execute([$id]);  
}
}



?>