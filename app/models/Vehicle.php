<?php
require_once __DIR__ . '/../config/database.php';

class Vehicle{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }


    public function insertarVehiculo($marca, $modelo, $matricula, $precio_dia, $disponibilidad = 1, ) //Es la funcion de insertar un vehiculo
    {
        $sql = "INSERT INTO vehiculos (marca, modelo, matricula, precio_dia, disponibilidad, state)
            VALUES (?,?,?,?,?,'disponible')";
        $stmt = $this->pdo->prepare($sql);
        $stmt ->execute([$marca, $modelo, $matricula, $precio_dia, $disponibilidad]);
        return $this->pdo->lastInsertId();

    }

    //Aqui faltan las demas operaciones CRUD
    public function verTodos(){
        $stmt = $this->pdo->prepare("SELECT * FROM vehiculos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      public function buscar($id){
        $stmt = $this->pdo->prepare( "SELECT * FROM vehiculos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
      
      }
      
      public function editar($marca, $modelo, $matricula, $precio_dia, $disponibilidad, $id){
        $stmt = $this->pdo->prepare("UPDATE vehiculos SET marca = ?, modelo = ?, matricula = ?, precio_dia = ?, disponibilidad = ? WHERE id = ?");
        return $stmt->execute([$marca,$modelo,$matricula,$precio_dia,$disponibilidad,$id]);
      }//Aaui se pueden editar los datos de los usuarios que se presenten en la busqueda, y editando los datos en el front se puede enviar un formulario que tenga los datos que se requieran 
      
      public function eliminar($id){
        $stmt = $this->pdo->prepare("DELETE FROM vehiculos WHERE id = ?");
        return $stmt->execute([$id]);  
      }

}

?>