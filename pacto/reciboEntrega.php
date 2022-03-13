<?php
session_start();
require_once 'php_action/db_connect.php';
require "/xampp/htdocs/pacto/assests/fpdf/fpdf.php";


$bodegaId = $_POST['detallebodega'];


$sql = "SELECT 
BODEGA.BODEGAID AS BODEGAID, 
USUARIO.NOMBREAPEUSU AS NOMBREAPEUSU, 
ASOCIACION.LOGOASO AS LOGOASO, 
ASOCIACION.NOMBREASO AS NOMBREASO,
ASOCIACION.SECTORASO AS SECTORASO,
ASOCIACION.PARROQUIAASO AS PARROQUIAASO,
USUARIO.TELCELUSU AS TELCELUSU,
USUARIO.TELCUSU AS TELCUSU,
USUARIO.CEDULAUSU AS CEDULAUSU,
USUARIO.DIRUSU AS DIRUSU,
USUARIO.EMAILUSU AS EMAILUSU,
BODEGA.FECHABODEGA AS FECHABODEGA,
PRODUCTO.NOMPRODUCT AS NOMPRODUCT,
UNIDADES.NOMUNIDADES AS NOMUNIDADES,
DETALLEBODEGA.STOCKBODEGA AS STOCKBODEGA,
DETALLEBODEGA.PRECIOBODEGA AS PRECIOBODEGA,
DETALLEBODEGA.DESCRIPBODEGA AS DESCRIPBODEGA
FROM BODEGA , PERTENECEN, ASOCIACION, USUARIO, DETALLEBODEGA,PRODUCTO,UNIDADES
WHERE BODEGA.PERTENECENID=PERTENECEN.PERTENECENID 
AND PERTENECEN.USUARIOID=USUARIO.USUARIOID
AND PERTENECEN.ASOCIACIONID=ASOCIACION.ASOCIACIONID 
AND BODEGA.BODEGAID=DETALLEBODEGA.BODEGAID
AND DETALLEBODEGA.PRODUCTOID=PRODUCTO.PRODUCTOID
AND DETALLEBODEGA.UNIDADESID=UNIDADES.UNIDADESID
AND DETALLEBODEGA.BODEGAID = $bodegaId ";

$r = mysqli_query($connect, $sql) or die("Error al leer ");

$r2 = mysqli_query($connect, $sql) or die("Error al leer ");

while ($fila = $r2->fetch_assoc()) {

    $BODEGAID = $fila['BODEGAID'];
    $ASONOM=$fila['NOMBREASO'];
    $LOGOASO=$fila['LOGOASO'];
    $SECTORASO=$fila['SECTORASO'];
    $PARROQUIAASO=$fila['PARROQUIAASO'];
    $TELCELUSU=$fila['TELCELUSU'];
    $CEDULAUSU=$fila['CEDULAUSU'];
    $DIRUSU=$fila['DIRUSU'];
    $EMAILUSU=$fila['EMAILUSU'];
    $FECHABODEGA=$fila['FECHABODEGA'];

    $NOMBREAPEUSU=$fila['NOMBREAPEUSU'];

    $TELCUSU=$fila['TELCUSU'];
    $FECHABODEGA=$fila['FECHABODEGA'];
    

}




$pdf = new FPDF($orientation = 'P', $unit = 'mm');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
// Agregamos los datos de la empresa
$pdf->Cell(5, $textypos, utf8_decode($ASONOM));

$pdf->Image($LOGOASO,130,-5,70,-400);
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(40);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "PARA:");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(45);
$pdf->setX(10);
$pdf->Cell(5, $textypos, utf8_decode("Asociación: ") . utf8_decode($ASONOM));
$pdf->setY(50);
$pdf->setX(10);
$pdf->Cell(5, $textypos,  "Sector: " . utf8_decode($SECTORASO));
$pdf->setY(55);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "Parroquia: " . utf8_decode($PARROQUIAASO));


// Agregamos los datos del cliente
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(40);
$pdf->setX(75);
$pdf->Cell(5, $textypos, "DE:");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(45);
$pdf->setX(75);
$pdf->Cell(5, $textypos, "Nombre: " . utf8_decode($NOMBREAPEUSU));
$pdf->setY(50);
$pdf->setX(75);
$pdf->Cell(5, $textypos, utf8_decode("Cédula: ") . utf8_decode($CEDULAUSU));
$pdf->setY(55);
$pdf->setX(75);
$pdf->Cell(5, $textypos, utf8_decode("Dirección: ") . utf8_decode($DIRUSU));
$pdf->setY(60);
$pdf->setX(75);
$pdf->Cell(5, $textypos, "Celular: " . utf8_decode($TELCELUSU));
$pdf->setY(65);
$pdf->setX(75);
$pdf->Cell(5, $textypos, utf8_decode("Teléfono: ") . utf8_decode($TELCUSU));
$pdf->setY(70);
$pdf->setX(75);
$pdf->Cell(5, $textypos, utf8_decode("Email: ") . utf8_decode($EMAILUSU));

// Agregamos los datos del cliente
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(40);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "RECIBO #" . $BODEGAID);
$pdf->SetFont('Arial', '', 10);
$pdf->setY(45);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "Fecha: " . $FECHABODEGA);


/// Apartir de aqui empezamos con la tabla de productos
$pdf->setY(80);
$pdf->setX(135);
$pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("Producto", "Descripcion", "Cant.", "Uds.", "Precio", "Total");
//// Arrar de Productos
$i = 0;


$products = [100];
while ($fila = $r->fetch_assoc()) {
 
    $CANTIDAD = $fila['STOCKBODEGA'];
    $DESCRIPCIONPRODUCT = $fila['DESCRIPBODEGA'];
    $NOMPRODUCT = $fila['NOMPRODUCT'];
    $PRECIOPRODUCT = $fila['PRECIOBODEGA'];
    $UNIDADES = $fila['NOMUNIDADES'];
    

    $products[$i] = array($NOMPRODUCT, $DESCRIPCIONPRODUCT, $CANTIDAD ,$UNIDADES, $PRECIOPRODUCT );
    $i++;
}
// Column widths
$w = array(40, 75, 10, 10, 25,25);
// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data
$total = 0;
foreach ($products as $row) {
    $pdf->Cell($w[0], 6, $row[0], 1);
    $pdf->Cell($w[1], 6, $row[1], 1);
    $pdf->Cell($w[2], 6, number_format($row[2]), '1', 0, 'R');
    $pdf->Cell($w[3], 6, $row[3], 1);
    $pdf->Cell($w[4], 6, "$ " . number_format($row[4], 2, ".", ","), '1', 0, 'R');
    $pdf->Cell($w[5], 6, "$ " . number_format($row[4] * $row[2], 2, ".", ","), '1', 0, 'R');

    $pdf->Ln();
    $total += $row[4] * $row[2];
    $impuesto = $total * 0.12;
}
/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 80 + (count($products) * 10);

$pdf->setY($yposdinamic);
$pdf->setX(235);
$pdf->Ln();
/////////////////////////////
$header = array("", "");
$data2 = array(
    array("Subtotal", $total),
    array("Impuesto", $impuesto),
    array("Total", $total+$impuesto),
);
// Column widths
$w2 = array(40, 40);
// Header

$pdf->Ln();
// Data
foreach ($data2 as $row) {
    $pdf->setX(115);
    $pdf->Cell($w2[0], 6, $row[0], 1);
    $pdf->Cell($w2[1], 6, "$ " . number_format($row[1], 2, ".", ","), '1', 0, 'R');

    $pdf->Ln();
}
/////////////////////////////

$yposdinamic += (count($data2) * 10);
$pdf->SetFont('Arial', 'B', 10);

$pdf->setY($yposdinamic);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "TERMINOS Y CONDICIONES");
$pdf->SetFont('Arial', '', 10);

$pdf->setY($yposdinamic + 10);
$pdf->setX(10);
$pdf->Cell(5, $textypos, " Se recibio conforme los productos.");
$pdf->setY($yposdinamic + 20);
$pdf->setX(10);



$pdf->output();









?>
