<meta charset="UTF-8">
<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');?>

<br>
<div class="container mt-5" style="width: 60%">
<h2>Piso a modificar:</h2>

    <form action="/../DWES_PHP_PPV_2020/controller/adminController/modificarPisoController.php" method="post" enctype="multipart/form-data">
        <div class="form-group" >
            <div class="row">

                <div class="col">

                    <select name="pisos" id="pisos">

                        <option selected>Elige un piso</option>

                        <?php
                        require_once ('../../model/conexion_BBDD.php');
                        $conn = new Conectar_Database();
                        $connexion = $conn->getconection();
                        $query="SELECT * FROM pisos";
                        $result=  $connexion->query($query);

                        while($row=$result->fetch_assoc())
                        {

                            echo '<option value="'.$row["id"].'" ';

                            echo '>'.$row["id"].'</option>';


                        } ?>

            </div>

        </div>

                       <?php
                       if (isset($_GET["piso"])) {
                           $piso = $_GET["piso"];

                           $query="SELECT * FROM pisos where id = $piso";
                           $result=  $connexion->query($query);

                       }


                       while ($row = $result->fetch_assoc()) {

                           echo('

        <div class="form-group" >
         <br>
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="titulo"  value="' . $row['titulo'] . '" </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <input type="textarea" class="form-control" name="descripcion" value="' . $row['descripcion'] . '" >
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <input type="file" class="form-control" name="imagen" value="' . $row['foto'] . '">
                    <input type="hidden" name="imagenCambiar" value="' . $row['foto'] . '">
                    <input type="hidden" name="id" value="'. $row['id'].'">
                    
                    <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="telefonoMsg" value="' . $row['telefono'] . '" >
                        </div>
                
                        <div class="form-group">
                            <input type="number" class="form-control" name="precio" value="' . $row['precio'] . '" >
                        </div>
                        
                        <div class="form-group">
                            <input type="number" class="form-control" name="numHabitaciones" value="' . $row['num_habitaciones'] . '" >
                        </div>
                        
                        <div class="form-group">
                            <input type="number" class="form-control" name="distancia" value="' . $row['distancia'] . '" >
                        </div>

                    </div>
                 
                   <div class="col">
                    <img style="width:250px" src="'.$row['foto'].'">
                    </div>  
            </div>
        </div>

       

        <div class="form-group">
            <button type="submit" class="btn btn-primary ">Modificar Piso</button>
        </div>
    </form>
  
  </div>
  
     ');
                       }

                       }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
<script>
    $("#pisos").change(function(){
        pisos = $("#pisos").val();

        if ($("#pisos").val().value!=""){ window.location.href="modificarPiso.php?piso="+pisos;}

    })




</script>
