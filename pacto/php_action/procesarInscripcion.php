<?php

require_once 'core.php';

$pertenecenId = $_POST['pertenecenId'];
$reunionId = $_POST['reunionId'];

$sql= "INSERT INTO ASISTENCIA (PERTENECENID, REUNIONID, CONFIRMACIONASIS, MULTA) VALUES($pertenecenId, $reunionId, 0, 0.0)";



if($connect->query($sql) === TRUE) {
    $alert='
    <script>
    alert("Usuario Añadido con exito");
    </script>
    ';
    
    echo $alert;
    
    header( "refresh:1;url=../inscripciones.php?var=$reunionId" );
    

} else {
    $valid['success'] = false;
    $valid['messages'] = "Error no se ha podido guardar";

}

