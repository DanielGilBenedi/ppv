<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');

?>

<style>


    .text-truncate div{
        width: 20px;
    }
    th{

        width: 100px;
        overflow: hidden;
        word-wrap: break-word;
    }

    th img{
        width: 80px;
        height: 60px;
    }
    #espacio{
        margin-bottom: 10px;
    }

</style>
<br>
<div class="container mt-5 " style="width: 75%; margin-left: 20%; ">
    <h2>Borrar pisos</h2>


    <?php
    require_once ('../../model/conexion_BBDD.php');
    define ('NUM_MENSAJES_PAGINA',2 );
    $numPisos = $_SESSION['numPisos'];



    if ($numPisos > 0) {
        $page = false;

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
        $total_pages = ceil($numPisos/ NUM_MENSAJES_PAGINA);

        $conn = new Conectar_Database();

        $connexion = $conn->getconection();
        $result = $connexion->query(
            'SELECT * FROM pisos  
        ORDER BY id ASC LIMIT '.$start.', '.NUM_MENSAJES_PAGINA
        );

        $datosMensaje = $_SESSION['datosPisos'];
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo('<table class="table table-bordered ">
        <thead>
        <tr>
            
            <th scope="col">Id</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Foto</th>
            <th scope="col">Telefono</th>
            <th scope="col">Precio</th>
            <th scope="col">Num. Habitaciones</th>
            <th scope="col">Distancia</th>
        </tr>');

                echo('
            
                <tr>        
                    <form method="post" action="../../controller/adminController/deletePisoController.php">
                    <th class="datos"><input type="hidden" name="id" value=" ' .   ($row['id']) . '">' . ($row['id']) . '</th> 
                    <th class="text-truncate"><div>' . ($row['titulo']) . '</div></th> 
                   
                    <th class="text-truncate"><div>' . ($row['descripcion']) . '</div></th>
                    
                    <th><img src="' . ($row['foto']) . '"></th> 
                    <th>' . ($row['telefono']) . '</th> 
                    <th>' . ($row['precio']) . '</th>
                    <th>' . ($row['num_habitaciones']) . '</th> 
                    <th>' . ($row['distancia']) . '</th> 
                    <th>
                   
                        <input type="submit" id="espacio" class="btn btn-primary" value="Eliminar">
                  
                    </th>
                    </form>
                </tr>');
            }
            echo('</thead>');

            echo('</table>');
        }
    }
    echo '<nav>';
    echo '<ul class="pagination">';

    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" href="borrarPiso.php?page='.($page-1).'" ><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="borrarPiso.php?page='.$i.'">'.$i.'</a></li>';
            }
        }

        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="borrarPiso.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }




    ?>
</div>

<?php }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
} ?>