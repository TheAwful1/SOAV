<?php
require_once __DIR__ . '/../config/database.php';

class Booking{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }


    public function nuevaReservacion($fechaInicio, $fechafinal)
    {
        //Deberia tomar el id de la persona que quiere hacer la reserva y 
        $sql = "INSERT INTO reservaciones (fecha_inicio,fecha_final, state)
            VALUES (?,?,'confirmado')";//Toma en cuenta que aqui quiero que al introducir las fechas exista un trigger para calcular el precio total
        $stmt = $this->pdo->prepare($sql);
        return $stmt ->execute([$fechaInicio, $fechafinal]);

    }
//Aqui faltan las demas operaciones CRUD
public function verTodos(){
    $stmt = $this->pdo->prepare("SELECT * FROM reservaciones");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function buscar($fechaInicio){
    $stmt = $this->pdo->prepare( "SELECT * FROM reservaciones WHERE fecha_inicio = ?");
    $stmt->execute([$fechaInicio]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  
  }
  
  public function editar($fechaInicio, $fechafinal,$id){
    $stmt = $this->pdo->prepare("UPDATE reservaciones SET fecha_inicio WHERE id = ?");
    return $stmt->execute([$fechaInicio,$fechafinal]);
  }//Aaui se pueden editar los datos de los usuarios que se presenten en la busqueda, y editando los datos en el front se puede enviar un formulario que tenga los datos que se requieran 
  
  public function eliminar($id){
    $stmt = $this->pdo->prepare("DELETE FROM reservaciones WHERE id = ?");
    return $stmt->execute([$id]);  
  }
}

?>