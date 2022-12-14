<?php 
include_once('../config/config.php');
include('../config/database.php');

class paciente{
    public $conexion;

    function __construct()
    {
        $db = new  Database ();
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombres = $params['nombres'];
        $apellidos = $params['apellidos'];
        $email = $params['email'];
        $celular = $params['celular'];
        $enfermedades = $params['enfermedades'];
        $imagen = $params['imagen'];
        $fecha = $params['fecha'];

        $insert = "INSERT INTO pacientes VALUES (NULL,'$nombres','$apellidos','$email',$celular,'$enfermedades','$imagen','$fecha')";
        return mysqli_query($this->conexion,$insert);
        
    }

    function getAll(){
        $sql ="SELECT * FROM pacientes ORDER BY fecha ASC";
        return mysqli_query($this->conexion, $sql);
    }

    function getOne($id){
        $sql="SELECT * FROM pacientes WHERE id =$id";
        return mysqli_query($this->conexion, $sql);
    }

    function update($params){
        $nombres = $params['nombres'];
        $apellidos = $params['apellidos'];
        $email = $params['email'];
        $celular = $params['celular'];
        $enfermedades = $params['enfermedades'];
        $imagen = $params['imagen'];
        $fecha = $params['fecha'];
        $id=$params['id'];

        $update = "UPDATE pacientes SET nombres='$nombres',apellidos='$apellidos',email='$email'
        ,celular=$celular,enfermedades='$enfermedades',imagen='$imagen',fecha='$fecha' WHERE id=$id";
        return mysqli_query($this->conexion,$update);
    }

    function remove($id){
        $remove ="DELETE FROM pacientes WHERE id = $id";
        return mysqli_query($this->conexion, $remove);
    }
}
?>