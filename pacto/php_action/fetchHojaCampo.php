<?php

require_once 'core.php';
$USUARIO = $_SESSION['userId'];
$ASOCIAIONID = $_SESSION['asoId'];

$sql2 = "SELECT PERTENECENID FROM PERTENECEN  WHERE USUARIOID= $USUARIO AND ASOCIACIONID= $ASOCIAIONID";
$EJECUTADO2 = mysqli_query($connect, $sql2) or die("Problemas al insertar PertencenID " . mysqli_error($connect));
while ($row = $EJECUTADO2->fetch_array()) {
    $PERTENECENID = $row[0];
}

if ($EJECUTADO2) {

    $sql = "SELECT 
    SUBHOJADECAMPOID,
    NUMSEMANA,
    HOJASTATUS
    FROM PERTENECEN,SUBTOTALHOJADECAMPO
    WHERE PERTENECEN.PERTENECENID=SUBTOTALHOJADECAMPO.PERTENECENID AND PERTENECEN.PERTENECENID=$PERTENECENID ";

    $result = $connect->query($sql);

    $output = array('data' => array());

    if ($result->num_rows > 0) {

        // $row = $result->fetch_array();
        $activeHoja = "";


        while ($row = $result->fetch_array()) {
            $hojaId = $row[0];

        if ($row[2] >0) {
            // activate member
            $activeHoja = "<label class='label label-danger'>Finalizada</label>";
        } else {
            // deactivate member

            $activeHoja = "<label class='label label-success'>Activa</label>";
        } // /else

            $opciones = ' 
    <style type="text/css">
        .contenedor{
            display:flex;
           padding-left:40px;
        }
        .col1{
            padding-right:40px;
        }
        .col2{

        }
    </style>

    <div class="contenedor">

        <div class="col1">
            <form class="form-horizontal"  action="detalleHoja.php" method="POST">
                <div class="row" >
                    <div class="col-ms-12" >
                        <input type="hidden" value="' . $hojaId . '" class="form-control" name="idHoja" id="idHoja" > 
                        <button type="submit" class="btn btn-primary" > Detalle Hoja de Campo </button>
                    </div>

                   
                    
                </div>
                
            </form>
        </div>    
        
    </div>
        ';

            $output['data'][] = array(
                $row[0],
                $row[1],
                $activeHoja,
                $opciones
            );
        } // /while 

    } // if num_rows
}
$connect->close();

echo json_encode($output);
