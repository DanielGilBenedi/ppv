<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');?>


<br>
<div class="container mt-5" style="width: 60%">
    <form action="/../DWES_PHP_PPV_2020/controller/adminController/addPisoController.php" method="post" enctype="multipart/form-data">
        <h2>Crear Piso</h2>

        <div class="form-group" >
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="titulo" placeholder="titulo" required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="descripcion" placeholder="descripcion" required="required">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="imagen" placeholder="imagen" required="required">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="telefonoMsg" placeholder="Telefono" required="required">
        </div>

        <div class="form-group">
            <input type="number" class="form-control" name="precio" placeholder="precio" required="required">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="numHabitaciones" placeholder="numHabitaciones" required="required">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="distancia" placeholder="distancia" required="required">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary ">Crear piso</button>
        </div>
    </form>

</div>
<?php }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
} ?>
