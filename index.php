<?php require_once('base.php');?>
<!-- Nav -->
<?php require_once('view/nav.php');


?>
<!-- Nav -->

<!-- Content -->
<?php
require_once ('./controller/pisosController.php');
?>
<style>
    p{

        overflow: hidden;
    }


</style>
<body>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" height="600px" src="./images/hotel1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" height="600px" src="./images/hotel2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" height="600px" src="./images/hotel3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!--  SWIPER 1-->
<div class="card-header bg-info ml-4 mr-4">
    <h2 class="text-center text-light ">Pisos</h2>
</div>

<div class="card-group " style="margin-left: 10%">

    <div class="row ml-5  text-center">
        <?php



        require_once ('model/conexion_BBDD.php');
            require_once ('model/conexion_BBDD.php');

            $pisitos = new pisosModel();
        define ('NUM_MENSAJES_PAGINA',6 );
        $numMensajes = $pisitos->paginacionPisos();



        if ($numMensajes > 0) {
        $page = false;
        $total_pages = ceil($numMensajes / NUM_MENSAJES_PAGINA);

        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }

        if (!$page) {
            $start = 0;
            $page = 1;
        } else {
            $start = ($page - 1) * NUM_MENSAJES_PAGINA;
        }
        //calculo el total de paginas


        $conn = new Conectar_Database();

        $connexion = $conn->getconection();
        $result = $connexion->query(
            'SELECT * FROM pisos
        ORDER BY id ASC LIMIT '.$start.', '.NUM_MENSAJES_PAGINA
        );


        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if(isset($_SESSION['rol'])){
                echo('
        <div class="card col-md-3  mb-2 mt-4 ml-4">
            <img class="card-img-top" height="300px" src="'.$row['foto'].'" alt="Card image cap" ">
        <div class="card-body "  style="height: 200px">
            <h5 class="card-title text-center">'. $row['titulo'] . '</h5>
            <p class="card-text text-center collapse" >'. $row['descripcion'] . '</p>
            <form action="./controller/pisosInfoController.php" method="get">
            <input type="hidden" name="id" value="'. $row['id'] .'">
           <button type="submit" class="btn btn-primary" >Ver piso</button>
           </form>
        </div>
        </div>
        ');}else{
                echo('
        <div class="card col-md-3  mb-2 mt-4 ml-4">
            <img class="card-img-top" height="300px" src="'.$row['foto'].'" alt="Card image cap" ">
        <div class="card-body "  style="height: 200px">
            <h5 class="card-title text-center">'. $row['titulo'] . '</h5>
            <p class="card-text text-center collapse" >'. $row['descripcion'] . '</p>
            <form action="./controller/pisosInfoController.php" method="get">
            <input type="hidden" name="id" value="'. $row['id'] .'">
           
           </form>
        </div>
        </div>
        ');
            }
        }?>

    </div>
</div>
<?php }else{
    $total_pages = 0;
}
        echo '<div>';
echo '<nav>';
echo '<ul class="pagination">';

if ($total_pages > 1) {
    if ($page != 1) {
        echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page-1).'" ><span aria-hidden="true">&laquo;</span></a></li>';
    }

    for ($i=1;$i<=$total_pages;$i++) {
        if ($page == $i) {
            echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
        }
    }

    if ($page != $total_pages) {
        echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
    }
}
echo '</div>';


}else{
    echo ('No hay mensajes aún');
}?>

</body>
<!-- Content -->

<!-- Footer -->
<?php require_once('view/footer.php'); ?>
<!-- Footer -->