<?php

require_once 'core.php';

$USUARIOID = $_SESSION['userId'];
$ASOID = $_SESSION['asoId'];

$sql = "SELECT MAX(DETALLEFACTURA.PEDIDOSID), USUARIO.NOMBREAPEUSU ,PEDIDOS.FECHAPEDIDO ,ESTADOPEDIDO.NOMBREESPE
FROM DETALLEFACTURA, PEDIDOS, PRODUCTO, ASOCIACION, USUARIO ,ESTADOPEDIDO
WHERE DETALLEFACTURA.PEDIDOSID = PEDIDOS.PEDIDOSID  
AND DETALLEFACTURA.PRODUCTOID = PRODUCTO.PRODUCTOID 
AND PRODUCTO.ASOCIACIONID = ASOCIACION.ASOCIACIONID 
AND PEDIDOS.USUARIOID = USUARIO.USUARIOID 
AND PEDIDOS.ESTADOPEDIDOID=ESTADOPEDIDO.ESTADOPEDIDOID
AND ASOCIACION.ASOCIACIONID = $ASOID 
AND PEDIDOS.STATUSPEDIDO = 1
GROUP BY DETALLEFACTURA.PEDIDOSID";

$result = $connect->query($sql);

$output = array('data' => array());


while ($row = $result->fetch_array()) {
  $max = $row[0];

  $button = '<!-- Single button -->

  <div clas="container" style="display:flex "> 
	
  <div class="col1" style="padding-right:20px ">
  
  <form action="facturaPedido.php" method="POST">

  <input style="display:none" type="text" value="' . $max . '" name="detallefactura" > </input>

  <button class="btn btn-primary type="submit" style="width: 120px"> Detalle Pedido</button> 

  </form>

  </div>

  <div class="col2">
  <form action="php_action/removePedido.php" method="POST">

  <input style="display:none" type="text" value="' . $max . '" name="detallefactura" > </input>

  <button class="btn btn-primary btn btn-danger" type="submit" style="width: 120px"> Eliminar Pedido</button> 

  </form>

  </div>

  </div>
	 	
	 

	';

  $output['data'][] = array(
    $row[1],
    $row[2],
    // $row[3],
    $button

  );
}

$connect->close();
echo json_encode($output);
