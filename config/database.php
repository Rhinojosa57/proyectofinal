<?php 
class database
{
    public $host = 'localhost';
    public $user = 'root';
    public $pass = '';
    public $db = 'sesion';
    private $conexion;



function connectToDatabase()
{
   $this->conexion= mysqli_connect( $this->host, $this->user,$this->pass,$this->db);
    if (mysqli_connect_error()){
        echo "tenemos un error de conexion" . mysqli_connect_error();
    }
    return $this->conexion;
}
 
}
?>
