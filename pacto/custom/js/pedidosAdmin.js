
var managepedidosAdminTable;


$(document).ready(function() {
	// top nav bar 
	$('#navpedidosAdmin').addClass('active');
	// manage product data table
	managepedidosAdminTable = $('#managepedidosAdminTable').DataTable({
		'ajax': 'php_action/fetchpedidoAdmin.php',
		'order': [],
		"scrollX": true,
	});

	
}); // document.ready fucntion

