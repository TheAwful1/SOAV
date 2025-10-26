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
}

?>