
<style>

    nav{

         background-color: #0D3349;

     }

    .nav-link{
        color: black;
    }
    .nav-item img{
        width: 40px;
        height: 30px;
    }

</style>

<nav class="navbar navbar-expand-lg  fixed-top " id="nav">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

    </button>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/logoModel.php';
session_start();

$logo = new logoModel();
$imagenLogo = $logo->getLogo();

?>
    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <img src="<?php echo($imagenLogo['logo']); ?>">
            </li>
            <li class="nav-item ">
                <a class="nav-link text-light" href="/../DWES_PHP_PPV_2020/index.php">Inicio</a>
            </li>

        </ul>

        <ul class="navbar-nav align-right">

            <!--final DROPDOWN-->




            <li class="nav-item ">


                <?php

                include $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/controller/timeoutController.php';
                timeout();

                if(! empty ($_SESSION['usuario']) )  {?>
                   <a class="nav-link text-light" href="<?php echo ('/DWES_PHP_PPV_2020/controller/userController/userView.php')?>"> Bienvenido, <?php echo$_SESSION['usuario']?></a>
                    <li class="nav-item">
                                <a class="nav-link text-light" href="<?php echo('/DWES_PHP_PPV_2020/controller/cerrarController.php'); ?> ">Salir</a>
                            </li>


                <?php } else{ ?>
                       <a class="nav-link text-light" href="view/login.php">Accede a tu cuenta</a>
                     <li class="nav-item ">
                <a class="nav-link text-light" href="view/register.php">Regístrate</a>
                </li>
                <?php }
                ?>

            </li>


        </ul>


    </div>

</nav>
