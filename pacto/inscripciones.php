<?php

session_start();

$aux = $_SESSION['userRol'];

if ($aux != 3) {
    if ($aux != 2) {

        header('location: index.php');
    }
}

?>
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/SocioHeader.php'; ?>

<?php
/* $array = array(1, 2, 3, 4); */

if(isset($_GET["var"])){
   $aux2=$_GET["var"];
}else{
    $aux2 = -1;
   // echo $aux2;

}
if($aux2==-1){


$aso_Id = $_SESSION['asoId'];
$reuId = $_POST['reunionId'];
$sql = "SELECT USUARIO.NOMBREAPEUSU, PERTENECEN.PERTENECENID 
FROM USUARIO, PERTENECEN 
WHERE USUARIO.USUARIOID=PERTENECEN.USUARIOID AND PERTENECEN.ASOCIACIONID = $aso_Id AND PERTENECEN.PERTENECENID 
NOT IN (SELECT PERTENECENID FROM ASISTENCIA, REUNION WHERE ASISTENCIA.REUNIONID = REUNION.REUNIONID AND REUNION.REUNIONID=$reuId)

";

$result = $connect->query($sql);



$array = $result->fetch_all();



?>
<?php

foreach ($array as $row) {
?>


    <h1><?php //echo  $row[0]; ?></h1>
    <h1><?php //echo  $row[1]; ?></h1>

    <h1><?php //echo  $aux2; ?></h1>
<?php
   // echo $aux2;
}

?>


<table class="table">
    <thead>
        <tr>

            <th scope="col">Usuario</th>

            <th scope="col">Asistencia</th>
        </tr>
    </thead>
    <tbody>
        
            <?php

            foreach ($array as $row) {
                
            ?>

                <tr>   
                <td><?php echo  $row[0]; ?></td>
                <td>
                <form action="php_action/procesarInscripcion.php" method="POST">
                <input type="hidden" name="pertenecenId" value="<?php echo  $row[1]; ?>"> 
                <input type="hidden" name="reunionId" value="<?php echo  $reuId; ?>"> 
                <input type="submit" class="btn btn-primary" value="Añadir"> 
                
                </form>
               </td>
               
                </tr>
                <?php

            }
        }else{


            $aso_Id = $_SESSION['asoId'];
            $reuId = $_POST['reunionId'];
            $sql = "SELECT USUARIO.NOMBREAPEUSU, PERTENECEN.PERTENECENID 
            FROM USUARIO, PERTENECEN 
            WHERE USUARIO.USUARIOID=PERTENECEN.USUARIOID AND PERTENECEN.ASOCIACIONID = $aso_Id AND PERTENECEN.PERTENECENID 
            NOT IN (SELECT PERTENECENID FROM ASISTENCIA, REUNION WHERE ASISTENCIA.REUNIONID = REUNION.REUNIONID AND REUNION.REUNIONID=$aux2)
            
            ";




$result = $connect->query($sql);



$array = $result->fetch_all();
print_r($array);



foreach ($array as $row) {
?>


    <h1><?php //echo  $row[0]; ?></h1>
    <h1><?php //echo  $row[1]; ?></h1>

    <h1><?php //echo  $aux2; ?></h1>
<?php
   // echo $aux2;
}

?>



<table class="table">
    <thead>
        <tr>

            <th scope="col">Usuario</th>

            <th scope="col">Asistencia</th>
        </tr>
    </thead>
    <tbody>
        
            <?php

            foreach ($array as $row) {
                
            ?>

                <tr>   
                <td><?php echo  $row[0]; ?></td>
                <td>
                <form action="php_action/procesarInscripcion.php" method="POST">
                <input type="hidden" name="pertenecenId" value="<?php echo  $row[1]; ?>"> 
                <input type="hidden" name="reunionId" value="<?php echo  $aux2; ?>"> 
                <input type="submit" class="btn btn-primary" value="Añadir"> 
                
                </form>
               </td>
               
                </tr>
                <?php

            }

        }
                ?>
     


    </tbody>
</table>
