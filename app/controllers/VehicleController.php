<?php
class VehicleController 
{
    
private Vehicle $modelo;
 
public function __construct(PDO $pdo) {
$this->modelo = new Vehicle($pdo);
}


public function crear(): void{
    $json = file_get_contents("php://input");
    $data = json_decode($json,true);


    if(!$data){
        echo json_encode(["error" => "JSON invalido"]);
        return;
    }
    $marca = $data['marca'] ?? null;
    $modelo = $data['modelo'] ?? null;
    $matricula = $data['matricula'] ?? null;
    $precio = $data['precio'] ?? null;

    $result = $this->modelo->insertarVehiculo($marca, $modelo, $matricula, $precio);
    echo json_encode($result);

}
//De aqui en adelante estan las funciones del admin
public function listar(): void{

    echo json_encode($this->modelo->verTodos());
}
public function buscar(){
    $id = $_GET["id"] ?? null;
    if(!$id){
        echo json_encode(["error" => "ID no proporcionado"]);
        return;
    }
    
    echo json_encode($this->modelo->buscar($id));
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
    $marca = $data['marca'] ?? null;
    $modelo = $data['modelo'] ?? null;
    $matricula = $data['matrticula'] ?? null;
    $precio = $data['precio'] ?? null;
    $disponibilidad = $data['disponibilidad'] ?? null;
    $result = $this->modelo->editar($marca, $modelo, $matricula, $precio, $disponibilidad);
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