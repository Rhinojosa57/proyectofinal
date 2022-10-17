<?php 
include('../config/config.php');
include('paciente.php');
$p= new paciente();

$allpaciente = $p->getAll();

if (isset($_GET['id']) && !empty($_GET['id'])){
    $remove = $p->remove($_GET['id']);
    if ($remove){
        header('location: '.ROOT.'paciente/index.php');
    }else{
        $msj = "<div class='alert alert-darger' rol='alert'> error al eliminar agenda.</div>";
    }
}

?>
<DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF_8"/>
        <title>Lista de sesiones</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>

    <body>
        <?php include('../menu.php')?>
        <div class="container">
            <h2 class="text-center mb-2">Calendario</h2>

            <div class="row">
                <?php
                while($paciente = mysqli_fetch_object($allpaciente)){
                    $input=$paciente->fecha;
                    echo "<div class='col'>";
                    echo "<div class='border border-inf p-2'>";
                    echo "<h5> <img src='",ROOT."/images/$paciente->imagen' width='50' height='50'/>
                    $paciente->nombres $paciente->apellidos
                    </h5>";
                    echo "<p> <b>fecha:</b> ".date("D", Strtotime($input)). " " .date("d-m-y H:i", strtotime($input)). " </p>" ;
                    echo "<div class='text-center'><a class='btn btn-success ' href='" .ROOT. "/paciente/edit.php?id=$paciente->id'> Modificar </a> - <a class='btn btn-danger' href='".ROOT."/paciente/index.php?id=$paciente->id'> Eliminar </a> </div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </body>
    </html>
