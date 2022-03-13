<?php

require_once 'core.php';


$ASOID = $_SESSION["asoId"];
$NOMBREACTA = $_FILES["Acta"]["name"];
$TIPOACTA = $_FILES["Acta"]["type"];
$TAMANIOACTA = $_FILES["Acta"]["size"];

$RAIZ = $_SERVER['DOCUMENT_ROOT'].'/pacto/assests/actas/';
$TEMP = $_FILES["Acta"]["tmp_name"];

$reunionesId = $_POST['reunionId'];



$RUTA = "../pacto/assests/actas/$NOMBREACTA";



$sql = "UPDATE REUNION SET ACTA = '$RUTA'  WHERE REUNIONID = $reunionesId ";

if( move_uploaded_file($TEMP,$RAIZ.$NOMBREACTA)){
    echo "Actualizado exitosamente. SE SUBIO...";
}else{
    echo "Actualizado incorrrecto. NO SE SUBIO...";
}


if ($connect->query($sql) === TRUE) {

    echo "Actualizado exitosamente. Aplicando cambios...";

    header("location: ../reuniones.php");
} else {
    echo "Actualizado exitosamente. Aplicando cambios...";
}

$connect->close();
