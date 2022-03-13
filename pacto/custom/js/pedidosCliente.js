var managepedidosClienteTable;


$(document).ready(function() {
	// top nav bar 
	$('#navpedidosCliente').addClass('active');
	// manage product data table
	managepedidosClienteTable = $('#managepedidosClienteTable').DataTable({
		'ajax': 'php_action/fetchpedidosCliente.php',
		'order': [],
		"scrollX": true,
	});

	
}); // document.ready fucntion






