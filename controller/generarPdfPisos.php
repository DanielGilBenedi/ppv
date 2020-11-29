<?php

if(isset($_GET['id'])){

    require ('../fpdf182/fpdf.php');
    require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/pisosModel.php';
    include $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/controller/timeoutController.php';
    timeout();
    $idPiso = $_GET['id'];
    $piso = new pisosModel();

    $datosPiso = $piso ->getPisosId($idPiso);

    foreach ($datosPiso as $data){
        $title = $data['titulo'];
        $descripcion = $data['descripcion'];
        $img = $data['foto'];
        $telefono = $data['telefono'];
        $precio = $data['precio'];
        $num_habitaciones = $data['num_habitaciones'];
        $distancia = $data['distancia'];
    }

    $imgInsertar = substr($img, 18);
    $imgInsertar = '..' . $imgInsertar;



    $pdf = new FPDF();
    $pdf->SetAuthor('Daniel Gil');
    $pdf->SetTitle('ppv');
    $pdf->setMargins(20,20,20);
    $pdf->AcceptPageBreak();
    $pdf->AddPage();

    $pdf->SetFont('Helvetica','',20);
    $pdf->SetTextColor(50,60,100);
    $pdf->Cell(30, 10, iconv('UTF-8', 'windows-1252', $title));
    $pdf->Image($imgInsertar,50,40,100,70,'jpg');

    $pdf->SetXY (90,110);
    $pdf->SetFont('Helvetica','B',8);
    $pdf->Cell(10, 10, iconv('UTF-8', 'windows-1252', 'Descripción'));

    $pdf->SetXY (75,170);
    $pdf->Cell(10, 10, iconv('UTF-8', 'windows-1252', 'Telefono'));

    $pdf->SetXY (55,180);
    $pdf->Cell(10, 10, iconv('UTF-8', 'windows-1252', 'Número de habitaciones'));


    $pdf->SetXY (130,170);
    $pdf->Cell(10, 10, iconv('UTF-8', 'windows-1252', 'Precio'));


    $pdf->SetXY (130,180);
    $pdf->Cell(10, 10, iconv('UTF-8', 'windows-1252', 'Distancia'));

    $pdf->SetFont('Helvetica','',20);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY (49,120);
    $pdf->SetFontSize(6);
    $pdf->MultiCell(100, 3, iconv('UTF-8', 'windows-1252', $descripcion), 0, C);

    $pdf->SetXY (90,170);
    $pdf->Cell(10, 10, iconv('UTF-8', 'windows-1252', $telefono));

    $pdf->SetXY (90,180);
    $pdf->Cell(10, 10, iconv('UTF-8', 'windows-1252', $num_habitaciones));

    $pdf->SetXY (140,170);
    $pdf->Cell(10, 10, iconv('UTF-8', 'windows-1252', $precio));

    $pdf->SetXY (145,180);
    $pdf->Cell(10, 10, iconv('UTF-8', 'windows-1252', $distancia));

    ob_start();
//direccion
    $pdf->Output('../pdfs/piso.pdf','I');

}else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}

?>
