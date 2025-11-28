<?php
class BookingController 
{
    
private Booking $modelo;
 
public function __construct(PDO $pdo) {
$this->modelo = new Booking($pdo);
}

public function ViewVer() {
    View::render("Admin/bookings");
}

//A estas puede acceder el usuario
public function index() {
    View::render("Reservas/Reservar");
}



public function crear(): void{
    $json = file_get_contents("php://input");
    $data = json_decode($json,true);


    if(!$data){
        echo json_encode(["error" => "JSON invalido"]);
        return;
    }
    //Ojo con el nombre que JavaScript va a mandar en el JSON
    $FechaIn = $data['FechaI'] ?? null;
    $FechaFi = $data['FechaF'] ?? null;

    $result = $this->modelo->nuevaReservacion($FechaIn, $FechaFi);
    echo json_encode($result);

}
//De aqui en adelante estan las funciones del admin
public function listar(): void{

    echo json_encode($this->modelo->verTodos());
}
public function buscarPorFechaInicio(){
    $id = $_GET["id"] ?? null;
    $json = file_get_contents("php://input");
    $data = json_decode($json,true);
    if(!$id){
        echo json_encode(["error" => "ID no proporcionado"]);
        return;
    }
    if(!$data){
        echo json_encode(["error" => "JSON invalido"]);
        return;
    }
    $FechaI = $data['FechaI'] ?? null;

    echo json_encode($this->modelo->buscar($FechaI,null,null));
}
public function buscarPorArrendador(){
    $json = file_get_contents("php://input");
    $data = json_decode($json,true);
    
    if(!$data){
        echo json_encode(["error" => "JSON invalido"]);
        return;
    }
    $nombre = $data['nombre'] ?? null;

    echo json_encode($this->modelo->buscar(null,$nombre,null));
}
public function buscarPorMatricula(){
    $json = file_get_contents("php://input");
    $data = json_decode($json,true);
    
    if(!$data){
        echo json_encode(["error" => "JSON invalido"]);
        return;
    }
    $matricula = $data['matricula'] ?? null;

    echo json_encode($this->modelo->buscar(null,null,$matricula));
}




public function editar(){//Tendre que crear una funcion aparte para que los clientes puedan editar sus contraseñas y cuentas, esto es del admin
    $id = $_GET["id"] ?? null;
    $json = file_get_contents("php://input");
    $data = json_decode($json,true);

    if(!$id){
        echo json_encode(["error" => "ID no proporcionado"]);
        return;
    }
    
    if(!$data){
        echo json_encode(["error" => "JSON invalido"]);
        return;
    }
    $FechaIn = $data['FechaI'] ?? null;
    $FechaFi = $data['FechaF'] ?? null;
    $result = $this->modelo->editar($FechaIn, $FechaFi,$id);
    echo json_encode($result);

}
public function eliminar(){

    $id = $_GET["id"] ?? null;
    if(!$id){
        echo json_encode(["error" => "ID no proporcionado"]);
        return;
    }
    
    echo json_encode($this->modelo->eliminar($id));

}
}





?>