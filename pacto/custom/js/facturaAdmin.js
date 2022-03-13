
var managefacturaTable;


$(document).ready(function() {
	// top nav bar 

	// manage product data table
	managefacturaTable = $('#managefacturaTable').DataTable({
		'ajax': 'php_action/fetchFactura.php',
		'order': [],
		"scrollX": true,
	});

	
}); // document.ready fucntion

