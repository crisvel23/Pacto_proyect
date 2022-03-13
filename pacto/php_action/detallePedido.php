<?php
require_once 'core.php';

error_reporting(0);
if ($_POST) {
    $HOY = date('Y-m-d');
    $CANTIDAD = $_POST['cantidadProducto'];
    $IDPRODUCT = $_POST['idProducto'];
    $USUARIOPEDIDO = $_SESSION['userId'];
    $PVP = $_POST['idPVP'];

    $TOTAL = $PVP * $CANTIDAD;

    $sql4 = "SELECT FECHAPEDIDO, STATUSPEDIDO FROM PEDIDOS  WHERE USUARIOID= $USUARIOPEDIDO";
    $EJECUTADO4 = mysqli_query($connect, $sql4);

    while ($row = $EJECUTADO4->fetch_array()) {
        $FECHAPEDIDOHOY = $row[0];
        $STATUSPEDIDO = $row[1];
    }

    if ($HOY == $FECHAPEDIDOHOY && $STATUSPEDIDO == 0) {


        $sql2 = "SELECT MAX(PEDIDOSID) FROM PEDIDOS  WHERE USUARIOID= $USUARIOPEDIDO";
        $EJECUTADO2 = mysqli_query($connect, $sql2);
        if ($EJECUTADO2) {
            while ($row = $EJECUTADO2->fetch_array()) {
                $PEDIDODETALLEID = $row[0];
            }

            $sql3 = "INSERT INTO DETALLEFACTURA (PRODUCTOID, PEDIDOSID,CANTIDAD,TOTALPRODUCT) VALUES ($IDPRODUCT,$PEDIDODETALLEID,$CANTIDAD,$TOTAL)";
            $EJECUTADO3 = mysqli_query($connect, $sql3);
            if ($EJECUTADO3) {
                echo "Detalle insertado con exito if";
                header('location: ../pedidosCliente.php');
            } else {
                echo "Error al insertar Detalle Factura if";
            }
        } else {
            echo "Error al seleccionar pedido if ";
        }
        
    } else {

        $sql = "INSERT INTO PEDIDOS (USUARIOID, ESTADOPEDIDOID,FECHAPEDIDO,TOTALPEDIDO) 
        VALUES ($USUARIOPEDIDO,1,'$HOY',0)";
        $EJECUTADO = mysqli_query($connect, $sql);

        if ($EJECUTADO) {
            $sql2 = "SELECT MAX(PEDIDOSID) FROM PEDIDOS  WHERE USUARIOID= $USUARIOPEDIDO";
            $EJECUTADO2 = mysqli_query($connect, $sql2);



            if ($EJECUTADO2) {
                while ($row = $EJECUTADO2->fetch_array()) {
                    $PEDIDODETALLEID = $row[0];
                }

                $sqlstock = "SELECT STOCKPRODUCT FROM PRODUCTO  WHERE PRODDUCTOID= $IDPRODUCT";
                $PRODUCTOSTOCK = mysqli_query($connect, $sqlstock);

                while ($row = $PRODUCTOSTOCK->fetch_array()) {
                    $STOCKPRODUCT = $row[0];
                }
                if ($PRODUCTOSTOCK) {

                    $sql3 = "INSERT INTO DETALLEFACTURA (PRODUCTOID, PEDIDOSID,CANTIDAD,TOTALPRODUCT) VALUES ($IDPRODUCT,$PEDIDODETALLEID,$CANTIDAD,$TOTAL)";
                    $EJECUTADO3 = mysqli_query($connect, $sql3);

                    if ($EJECUTADO3) {
                        $TOTALSTOCK=$STOCKPRODUCT - $CANTIDAD;
                        $sqltotal = "UPDATE PRODUCTO SET STOCKPRODUCT=  $TOTAL  WHERE PRODUCTOID  = $PRODUCTOID ";
                        $TOTAL = mysqli_query($connect, $sqltotal);
                        header('location: ../pedidosCliente.php');
                        echo "Detalle insertado con exito else";
                      
                    } else {
                        echo "Error al insertar Detalle Factura else";
                    }
                }
            } else {
                echo "Error al seleccionar pedido else";
            }
        } else {
            echo "Error al Insertar Producto else";
        }
    }




    $connect->close();
} // /if $_POST



