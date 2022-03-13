<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

    $ASOID = $_SESSION['asoId'];

    $USUARIOIUD = $_POST['USUARIOIUD'];


    $FECHABODEGA = date('Y-m-d', strtotime($_POST['FECHABODEGA']));

    $sql1 = "SELECT PERTENECENID FROM PERTENECEN WHERE ASOCIACIONID=$ASOID  AND USUARIOID= $USUARIOIUD";

    $EJECUTADO1 = mysqli_query($connect, $sql1);

    while ($row = $EJECUTADO1->fetch_array()) {
        $PERTENECENID = $row[0];
    }


    if ($EJECUTADO1) {
        $sql2 = "INSERT INTO BODEGA (PERTENECENID , FECHABODEGA,TOTALCOSTO) VALUES ($PERTENECENID,'$FECHABODEGA',0)";
        $EJECUTADO2 = mysqli_query($connect, $sql2);

        if ($EJECUTADO2) {
            $valid['success'] = true;
            $valid['messages'] = "Creado exitosamente";
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error no se ha podido guardar";
        }
    
    
    }


    
    $connect->close();

    echo json_encode($valid);

    header("location:../bodega.php");
} // /if $_POST