<?php
include('../config/config.php');
include('paciente.php');
$p= new paciente();
$data = mysqli_fetch_object($p->getOne($_GET['id']));
$date = new DateTime($data->fecha);

if (isset($_POST) && !empty($_POST)){
    $_POST['imagen'] = $data->imagen;
    if ($_FILES['imagen']['name'] !== ''){
        $_POST['imagen']= saveImage($_FILES);
    }
    $update = $p->update($_POST);
    if ($update){
        $error = '<div class="alert alert-success" role="alert">paciente modificado correctamente</div>';
    }else{
        $error = '<div class="alert alert-danger" role="alert">error al modificado un paciente</div>';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
 <meta charset="UTF-8"/>
 <title>Modificar paciente</title>
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
        <h2 class="text-center mb-5">Modificar sesion</h2>
        <form method="POST" enctype="multipart/form-data">
           
        <div class="row mb-2">
                <div class="col">
                    <input type="text" name="nombres" id="nombres" placeholder="nombre paciente" require class="form-control" value="<?= $data->nombres ?>" />
                    <input type="hidden" name="id"  id="id" value="<?= $data->id ?>"/>
                 </div>
                <div class="col">
                    <input type="text" name="apellidos" id="apellidos" placeholder="apellidos paciente" require class="form-control" value="<?= $data->apellidos ?>" />
                  </div>
                 </div>

            <div class="row mb-2">
                  <div class="col">
                    <input type="email" name="email" id="email" placeholder="email paciente" require class="form-control" value="<?= $data->email ?>"/>
                 </div>
                <div class="col">
                    <input type="number" name="celular" id="celular" placeholder="numero celular paciente" require class="form-control" value="<?= $data->celular ?>"/>
                  </div>
                  </div>
                  
                 <div class="row mb-2">
                  <div class="col">
                    <textarea id="enfermedades" name="enfermedades" placeholder="enfermedades del paciente" require class="form-control"><?= $data->enfermedades?></textarea>
                    <b>Dedes separar las enfermedades con una coma </b>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="datetime-local" name="fecha" id="fecha"  require class="form-control" value="<?= $date->format('Y-m-d\TH:i') ?>"/>
                  </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="file" name="imagen" id="imagen"  require class="form-control"/>
                  </div>  
                  </div>
            <button class="btn btn-success">Modificar</button>
        </form>
    </div>
</body>
</html>