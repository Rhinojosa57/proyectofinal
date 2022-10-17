<?php 
include_once('../config/config.php');
include('paciente.php');

if (isset($_POST) && !empty($_POST)){
    $paciente = new paciente();

    if($_FILES['imagen']['name'] !==''){
        $_POST['imagen']=saveImage($_FILES);
    }
    $save = $paciente->save($_POST);
    if($save){
        $error = '<div class="alert alert-success" role="alert">paciente creadocorrectamente</div>';
    }else{
        $error = '<div class="alert alert-danger" role="alert">error al crear un paciente</div>';
    }
}


?>

<!DOCTYPE html>
<html>

<head>
 <meta charset="UTF-8"/>
 <title>Crear pacientes</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <?php include('../menu.php')?>
    <div class="container">
        <?php
        if (isset($error)){
            echo $error;
        }
        ?>
        <h2 class="text-center mb-5">Registrate</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="nombres" id="nombres" placeholder="Nombres" require class="form-control"/>
                 </div>
                <div class="col">
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" require class="form-control"/>
                  </div>
                  </div>

            <div class="row mb-2">
                  <div class="col">
                    <input type="email" name="email" id="email" placeholder="Email" require class="form-control"/>
                 </div>
                <div class="col">
                    <input type="number" name="celular" id="celular" placeholder="Numero Celular " require class="form-control"/>
                  </div>
                  </div>

            <div class="row mb-2">
                  <div class="col">
                    <textarea id="enfermedades" name="enfermedades" placeholder="Comentario y sugerencias" require class="form-control"/></textarea>
                  </div>
            </div>
                         
         

            <div class="row mb-2">
                <div class="col">
                    <input type="datetime-local" name="fecha" id="fecha"  require class="form-control"/>
                    <b>fecha y hora de registro </b>
                  </div>
                  
             </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="file" name="imagen" id="imagen"  require class="form-control"/>
                    <b>foto del usuario </b>
                  </div>  
                  </div>
            <button class="btn btn-success">Registrar</button>
        </form>
    </div>
</body>
</html>