<?php

session_start();

$aux = $_SESSION['userRol'];
if(isset($_POST['reunionId'])){

    $reunionId = $_POST['reunionId'];
    
};
if ($aux != 3) {
    if ($aux != 2) {

        header('location: index.php');
    }
}

?>
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/SocioHeader.php'; ?>


<?php


if(isset($_GET["var"])){
    $aux2=$_GET["var"];
 }else{
     $aux2 = -1;
    // echo $aux2;
 
 }
 if($aux2==-1){
$sql = "SELECT USUARIO.NOMBREAPEUSU, ASISTENCIA.CONFIRMACIONASIS, ASISTENCIA.MULTA, ASISTENCIA.ASISTENCIAID
FROM ASISTENCIA, PERTENECEN, USUARIO
 WHERE ASISTENCIA.REUNIONID= $reunionId AND USUARIO.USUARIOID = PERTENECEN.USUARIOID AND ASISTENCIA.PERTENECENID = PERTENECEN.PERTENECENID AND ASISTENCIA.PERTENECENID = PERTENECEN.PERTENECENID";

$result = $connect->query($sql);

$array = $result->fetch_all();



?>
<?php

foreach ($array as $row) {
?>



<?php
    // echo $aux2;
}

?>


<table class="table">
    <thead>
        <tr>

            <th scope="col">Usuario</th>

            <th scope="col">Asistencia</th>
            <th scope="col">Multa</th>

            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>

        <?php

        foreach ($array as $row) {

        ?>

            <tr>
                <td><?php echo  $row[0]; ?></td>
                <td><?php if ($row[1] == 0) {
                        echo  "inasistencia";
                    } else {
                        echo "asistió";
                    }
                    ?></td>
                <td><?php echo  $row[2]; ?></td>
                    
                <td><form action="php_action/procesarAsistencia.php" method="POST">
                <input type="submit" class="btn btn-primary" value="Registrar Asistencia"><div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" name="btnasistencia">
                    Asistencia
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="0" checked name="btninasistencia">
                    Inasistencia
                    <input type="number" name="multa">
                    </div></td>
                

                    <input type="hidden" name="asistenciaId" value="<?php echo  $row[3]; ?>">


                        <input type="hidden" name="pertenecenId" value="<?php echo  $row[1];     ?>">
                        <input type="hidden" name="reunionId" value="<?php echo  $reunionId; ?>">

                    </form>
                    </td>

            </tr>
        <?php

        }
    }else{
        $sql = "SELECT USUARIO.NOMBREAPEUSU, ASISTENCIA.CONFIRMACIONASIS, ASISTENCIA.MULTA, ASISTENCIA.ASISTENCIAID
FROM ASISTENCIA, PERTENECEN, USUARIO
WHERE ASISTENCIA.REUNIONID= $aux2 AND USUARIO.USUARIOID = PERTENECEN.USUARIOID 
AND ASISTENCIA.PERTENECENID = PERTENECEN.PERTENECENID AND ASISTENCIA.PERTENECENID = PERTENECEN.PERTENECENID";


$result = $connect->query($sql);

$array = $result->fetch_all();


foreach ($array as $row) {
    
        // echo $aux2;
    }
    ?>

<table class="table">
<thead>
    <tr>

        <th scope="col">Usuario</th>

        <th scope="col">Asistencia</th>
        <th scope="col">Multa</th>

        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>



<?php

foreach ($array as $row) {

?>

    <tr>
        <td><?php echo  $row[0]; ?></td>
        <td><?php if ($row[1] == 0) {
                echo  "inasistencia";
            } else {
                echo "asistió";
            }
            ?></td>
        <td><?php echo  $row[2]; ?></td>
            
        <td><form action="php_action/procesarAsistencia.php" method="POST">
        <input type="submit" class="btn btn-primary" value="Registrar Asistencia"><div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" name="btnasistencia">
            Asistencia
            </label>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="0" checked name="btninasistencia">
            Inasistencia
            <input type="number" name="multa">
            </div></td>
        

            <input type="hidden" name="asistenciaId" value="<?php echo  $row[3]; ?>">


                <input type="hidden" name="pertenecenId" value="<?php echo  $row[1];     ?>">
                <input type="hidden" name="reunionId" value="<?php echo  $aux2; ?>">

            </form>
            </td>

    </tr>
    <?php
    }
}