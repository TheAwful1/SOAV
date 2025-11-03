<!--Aqui se hace la conexion a la base de datos -->

<?php
class Database{
private $host = 'localhost';
private $dbname = 'soav';
private $username = 'root';
private $password = '';

private $pdo;

public function connect(){

try {
  $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
   $this->username,
   $this->password
  );
  $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $this->pdo;
} catch (PDOException $e) {
  die("Error en la conexión: " . $e->getMessage());
}
}
}
?>