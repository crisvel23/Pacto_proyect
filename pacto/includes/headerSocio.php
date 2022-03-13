<?php require_once 'php_action/core.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="assests/recursos/pacto-logo.png" type="image/png" />
  <title>Pacto</title>

  <!-- bootstrap -->
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap theme-->
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.css">


  <!-- font awesome -->
  <link rel="stylesheet" href="assests/font-awesome/css/all.css">


  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- Roboto -->
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
  <script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
  <script src="assests/bootstrap/js/bootstrap.min.js"></script>

  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }

    .page-header {
      border-color: #FAFAFA;
    }

    .row {
      display: flex;
      width: 100%;
      justify-content: center;
      align-items: center;
    }

    #col1 {
      width: 90%;
    }

    #col2 {
      width: 40%;
    }



    .logo {
      width: 150px;

    }


    #logoheader {
      height: 150px;
    }
  </style>

</head>

<body>
  <?php
  $asociacion_id = $_SESSION['asoId'];
  $usuario_id = $_SESSION['userId'];

  $Sql = "SELECT * FROM ASOCIACION WHERE ASOCIACIONID=$asociacion_id ";
  $r = mysqli_query($connect, $Sql) or die("Error");
  mysqli_num_rows($r);
  while ($fila = mysqli_fetch_object($r)) {
    $ASONOM = $fila->NOMBREASO;
    $RUTA = $fila->LOGOASO;
  }

  $Sql2 = "SELECT * FROM USUARIO WHERE USUARIOID=$usuario_id";
  $r = mysqli_query($connect, $Sql2) or die("Error");
  mysqli_num_rows($r);
  while ($fila = mysqli_fetch_object($r)) {
    $USUNOM = $fila->NOMBREAPEUSU;
  }
  ?>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="row" id="logoheader">


        <div class="page-header" id="col1">

          <div class="box">

            <img class="logo" src="<?php echo $RUTA ?>" alt="Logo">

          </div>

          <h3 style="font-weight: bold;"><?php echo $ASONOM ?></h3>

        </div>

        <div class="page-header" id="col2">

          <h4 style="font-weight: bold;  text-transform:uppercase">Bienvenido <?php echo $USUNOM ?></h4>

        </div>
      </div>

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="navbar-brand" href="#">Brand</a> -->

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li id="navhojaCampo"><a href="hojaCampo.php"><i class="fas fa-clipboard-check"></i> Hoja de Campo</a></li>

          <li id="navhojaCampo"><a href="bodegaSocio.php"><i class="fas fa-clipboard-check"></i> Mis entregas</a></li>
    

          <li class="dropdown" id="navSetting">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user"></i> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
  </nav>



  <!-- ----------------------------------------------------------------------------- -->



  <div class="container">