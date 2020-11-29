<?php

    include_once('../base.php');
    include_once ('nav.php');


    foreach ($_SESSION['pisoInfo'] as $piso) {
    echo(
        '<div class="container mt-5">
        <div class="row">
            <div class="col">
                <img src=" '. $piso['foto'] .'" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col">
                <h5> ' . $piso['titulo']. '</h5>
                <hr style="height:1px;border:none;color:#333;background-color:#333;"
    
                <p> ' .  $piso['descripcion']. ' </p>
             <input type="hidden" id="producto-id" value=" '.  $piso['id'] .'  ">
            <a style="text-decoration: none" id="agregar-favoritos">Añadir a favorito  <i class="fas fa-star"></i></a>
            <input id="desPDF"type="button" class="btn btn-danger ml-5" value="Descargar pdf">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
            <ul class="list-group ">
                <li style="list-style: none"> Precio:'. $piso['precio'] . '€' .'</li>
                <li style="list-style: none"> Teléfono: '. $piso['telefono'] . '</li>
                <li style="list-style: none"> Número de habitaciones: '. $piso['num_habitaciones'] . '</li>
                <li style="list-style: none"> Distancia Motessori: '. $piso['distancia'] . '</li>
            </ul>
            </div>
       
        </div>
        
        
        </div>
        
<form action="../controller/mensajeController.php" method="post">
    <div class="form-group mt-5" style="width: 60%; margin-left: 15%">
        <label>Escribe tu mensaje</label>
        <textarea name="mensaje" class="form-control" style="height: 200px"></textarea>
        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        <input type="hidden" name="idPiso" value=" ' . $piso['id'] . ' ">
    </div>
</form>

        ');
}
include_once ('footer.php');
    ?>

<script>
    document.getElementById("desPDF").addEventListener("click", function (e) {
        var fields = document.getElementById('producto-id').value;
        parseInt(fields);
        window.location.href="../controller/generarPdfPisos.php?id="+fields;
    })

    document.getElementById("agregar-favoritos").addEventListener("click", function(e){
        if(window.localStorage!==undefined) {
            var fields = document.getElementById('producto-id').value;
            parseInt(fields);
            console.log(fields);

            var valorLocal =  localStorage.getItem('campos');
            parseInt(valorLocal);
            console.log(valorLocal);

            if(fields == valorLocal){
                localStorage.clear();
                alert('eliminado');
                window.location.href="../controller/userController/favoritosController.php?id="+fields;
            }else{
                localStorage.setItem("campos", fields);
                alert('agregado');

                window.location.href="../controller/userController/favoritosController.php?id="+fields;
            }

        } else {
            alert("Storage Failed. Try refreshing");
        }
    });
</script>

<style>
    p{
        font-size: 12px;
    }


</style>



