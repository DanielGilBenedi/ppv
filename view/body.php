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

            foreach ($_SESSION['pisos'] as $piso){
                if(isset($_SESSION['rol'])){
                echo('
        <div class="card col-md-3  mb-2 mt-4 ml-4">
            <img class="card-img-top" height="300px" src="'.$piso['foto'].'" alt="Card image cap" ">
        <div class="card-body "  style="height: 200px">
            <h5 class="card-title text-center">'. $piso['titulo'] . '</h5>
            <p class="card-text text-center collapse" >'. $piso['descripcion'] . '</p>
            <form action="./controller/pisosInfoController.php" method="get">
            <input type="hidden" name="id" value="'. $piso['id'] .'">
           <button type="submit" class="btn btn-primary" >Ver piso</button>
           </form>
        </div>
        </div>
        ');}else{
                    echo('
        <div class="card col-md-3  mb-2 mt-4 ml-4">
            <img class="card-img-top" height="300px" src="'.$piso['foto'].'" alt="Card image cap" ">
        <div class="card-body "  style="height: 200px">
            <h5 class="card-title text-center">'. $piso['titulo'] . '</h5>
            <p class="card-text text-center collapse" >'. $piso['descripcion'] . '</p>
            <form action="./controller/pisosInfoController.php" method="get">
            <input type="hidden" name="id" value="'. $piso['id'] .'">
           
           </form>
        </div>
        </div>
        ');
                }
            }?>



    </div>
</div>

</body>