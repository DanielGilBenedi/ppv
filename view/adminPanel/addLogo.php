<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');

?>
        <style>
            .container{
                margin-top: 0;
            }
        </style>
<div class="container " style="width: 60%">
    <form action="/../DWES_PHP_PPV_2020/controller/adminController/addLogoController.php" method="post" enctype="multipart/form-data">
        <h2>Poner logo</h2>
        <div class="form-group">
            <input type="file" class="form-control" name="imagen" placeholder="imagen" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary ">Añadir logo</button>
        </div>
    </form>
</div>
<?php }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
} ?>