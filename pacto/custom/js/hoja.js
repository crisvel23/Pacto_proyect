var manageHojaTable;

$(document).ready(function(){
	
	manageHojaTable = $('#manageHojaTable').DataTable({
		'ajax' : 'php_action/fetchHojaCampo.php',
		'order': [],
        "scrollX": true,

	}); // manage categories Data Table
}); // /document

