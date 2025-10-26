<?php
require_once __DIR__ . '/../config/database.php';

class Vehicle{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }


    public function insertarVehiculo($marca, $modelo, $matricula, $precio_dia, $disponibilidad = 1, )
    {
        $sql = "INSERT INTO vehiculos (marca, modelo, matricula, precio_dia, disponibilidad, state)
            VALUES (?,?,?,?,?,'disponible')";
        $stmt = $this->pdo->prepare($sql);
        return $stmt ->execute([$marca,$modelo.$matricula,$precio_dia,$disponibilidad]);

    }
    //Aqui faltan las demas operaciones CRUD


}

?>