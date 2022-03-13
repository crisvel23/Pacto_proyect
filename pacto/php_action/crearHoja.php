<?php

require_once 'core.php';



$USUARIO = $_SESSION['userId'];
$ASOCIAIONID = $_SESSION['asoId'];
$sql = "SELECT NUMSEMANA FROM SUBTOTALHOJADECAMPO 
WHERE  SUBHOJADECAMPOID = (SELECT MAX(SUBHOJADECAMPOID)
FROM SUBTOTALHOJADECAMPO) GROUP BY SUBHOJADECAMPOID";
$EJECUTADO = mysqli_query($connect, $sql) or die ("Problemas al seleccionar ".mysqli_error($connect));



while ($row = $EJECUTADO->fetch_array()) {
    $NUMSEMANA = $row[0];
}


if ($EJECUTADO) {
    $sql2 = "SELECT PERTENECENID FROM PERTENECEN  WHERE USUARIOID= $USUARIO AND ASOCIACIONID= $ASOCIAIONID";
    $EJECUTADO2 = mysqli_query($connect, $sql2) or die ("Problemas al insertar PertencenID ".mysqli_error($connect));
    while ($row = $EJECUTADO2->fetch_array()) {
        $PERTENECENID = $row[0];
    }

    if ($EJECUTADO2) {
        if ($NUMSEMANA == 4) {
            $sql3 = "INSERT INTO SUBTOTALHOJADECAMPO (PERTENECENID , SUBJORNAL,COSJORNAL,COSMANO,COSFAMI,COSLENA,COSTRANS,
            COSMANT,COSCANA,COSTRAPICHE,COSTINA,COSINFRA,OBSERVACIONES,HOJASTATUS,NUMSEMANA) VALUES ($PERTENECENID, 0,0,0,0,0,0,0,0,0,0,0,'',0,1)";
            $EJECUTADO3 = mysqli_query($connect, $sql3) or die ("Problemas al insertar SUBTOTALHOJADECAMPO1 ".mysqli_error($connect));
        } else {
            $VAR=$NUMSEMANA+1;
            $sql3 = "INSERT INTO SUBTOTALHOJADECAMPO (PERTENECENID , SUBJORNAL,COSJORNAL,COSMANO,COSFAMI,COSLENA,COSTRANS,COSMANT,COSCANA,COSTRAPICHE,COSTINA,COSINFRA,OBSERVACIONES,HOJASTATUS,NUMSEMANA)
            VALUES ($PERTENECENID, 0,0,0,0,0,0,0,0,0,0,0,'',0,$VAR)";
            $EJECUTADO3 = mysqli_query($connect, $sql3) or die ("Problemas al insertar SUBTOTALHOJADECAMPO2 ".mysqli_error($connect));
           
        }
  
    } else {
        echo "Error en el Pertenecen";
    }

} else {
    echo "Error en la consultas pertenecen";
}

header("location:../hojaCampo.php");

?>

