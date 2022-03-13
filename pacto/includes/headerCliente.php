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
  <!-- font awesome -->
  <link rel="stylesheet" href="assests/font-awesome/css/all.css">


  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">


  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
  <script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
  <script src="assests/bootstrap/js/bootstrap.min.js"></script>
  <!-- Roboto -->
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }

    .container {
      display: flex;
      width: 100%;
      justify-content: center;
      align-items: center;
    }

    .col1 {
      width: 40%;
    }

    .navbar-header {
      width: 20%;
    }

    .row {
      width: 60%;
    }
  </style>
</head>

<body>
  <?php
  $usuario_id = $_SESSION['userId'];

  $Sql2 = "SELECT * FROM USUARIO WHERE USUARIOID=$usuario_id";
  $r = mysqli_query($connect, $Sql2) or die("Error");
  mysqli_num_rows($r);
  while ($fila = mysqli_fetch_object($r)) {
    $USUNOM = $fila->NOMBREAPEUSU;
  }
  ?>

  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">

      <div class="col1">
        <h4 style="font-weight: bold; text-transform:uppercase"> <i class="fas fa-tree"></i> Bienvenido <?php echo $USUNOM ?></h4>
      </div>

      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="navbar-brand" href="#">Brand</a> -->


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav navbar-right">


            <li id="navpedidosCliente"><a href="pedidosCliente.php"><i class="fas fa-store-alt"></i> Pedidos</a></li>

            <li id="navCarrito"><a href="carrito.php"> <i class="fas fa-shopping-cart"></i> Carrito</a></li>



            <li class="dropdown" id="navSetting">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
              </ul>
            </li>

          </ul>
        </div><!-- /.navbar-collapse -->

      </div>
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container">