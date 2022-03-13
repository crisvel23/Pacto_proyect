<?php

require_once 'core.php';






$pertenecenId = $_POST['pertenecenId'];
$reunionId = $_POST['reunionId'];
$multa =$_POST['multa'];
$flexRadioDefault = $_POST['flexRadioDefault'];
$asistenciaId = $_POST['asistenciaId'];



if($flexRadioDefault==1){
$sql= "UPDATE ASISTENCIA SET CONFIRMACIONASIS = $flexRadioDefault, MULTA = 0 WHERE ASISTENCIAID =  $asistenciaId";

}else{
    $sql= "UPDATE ASISTENCIA SET CONFIRMACIONASIS = 0, MULTA = $multa WHERE ASISTENCIAID =  $asistenciaId";


}

if($connect->query($sql) === TRUE) {
    $alert='
    <script>
    alert("Asistencia registrada con exito");
    </script>
    ';
    
    echo $alert;
    
    header( "refresh:1;url=../asistenciaSocio.php?var=$reunionId" );
    

} else {
    $valid['success'] = false;
    $valid['messages'] = "Error no se ha podido guardar";

}

