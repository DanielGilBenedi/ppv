<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');

?>


<style>
    th, td {

        width: 100px;
        word-wrap: break-word;
    }
    #espacio{
        margin-bottom: 10px;
    }

</style>
<br>
<div class="container mt-5 " style="width: 75%; margin-left: 20%; ">
    <h2>Mensaje</h2>


    <?php
    if(isset($_SESSION['numMensajes'])){


    require_once ('../../model/conexion_BBDD.php');
    define ('NUM_MENSAJES_PAGINA',3 );
    $numMensajes = $_SESSION['numMensajes'];



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

        $idUser = $_SESSION['idUsuario'];
        $conn = new Conectar_Database();

        $connexion = $conn->getconection();
        $result = $connexion->query(
            'SELECT * FROM mensajes WHERE id_usuario = ' .$idUser. '
        ORDER BY id ASC LIMIT '.$start.', '.NUM_MENSAJES_PAGINA
        );

        $datosMensaje = $_SESSION['datosMensajes'];
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo('<table class="table table-bordered ">
        <thead>
        <tr>
            
            <th scope="col">Id</th>
            <th scope="col">Cuerpo</th>
            <th scope="col">Id usuario</th>
            <th scope="col">Id Piso</th>
            <th scope="col">Fecha</th>
        </tr>');

                echo('
            
                <tr>        
                    <form method="post" action="../../controller/userController/deleteMensajeController.php">
                    <th class="datos"><input type="hidden" name="id" value=" ' .   ($row['id']) . '">' . ($row['id']) . '</th> 
                    <th>' . ($row['cuerpo']) . '</th> 
                    <th>' . ($row['id_usuario']) . '</th>
                    <th>' . ($row['id_piso']) . '</th> 
                    <th>' . ($row['fecha']) . '</th> 
                    <th>') ?>
                   
                        <input type="submit" id="espacio" class="btn btn-primary" value="Eliminar">

                        <?php if(($row['visto'])==1){ ?>
                        <i class="fas fa-eye"></i>

                    </th>
                    </form>
                </tr>
                    <?php
                    echo('</thead>');

            echo('</table>');
        }
    }}else{
    $total_pages = 0;
    }
    echo '<nav>';
    echo '<ul class="pagination">';

    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" href="mensajeView.php?page='.($page-1).'" ><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="mensajeView.php?page='.$i.'">'.$i.'</a></li>';
            }
        }

        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="mensajeView.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }



    }else{
        echo ('No hay mensajes aún');
    }
    ?>
</div>

<?php  }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}}?>