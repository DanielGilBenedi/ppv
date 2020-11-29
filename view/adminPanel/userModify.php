<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');?>


<div class="container mt-5">
    <h2>Modificar Usuario</h2>
    <div>
    <table class="table table-bordered ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>

        </tbody>
    </table>
    </div>
    <div class="container mt-5">
    <form action="../controller/registerController.php" method="post">


        <div class="form-group" >
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="nombre" placeholder="Nombre" required="required"></div>
                <div class="col"><input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required="required">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="edad" placeholder="Edad" required="required">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="telefono" placeholder="Telefono" required="required">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" required="required">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary ">Modificar</button>
        </div>
    </form>
    </div>
<?php  }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}?>