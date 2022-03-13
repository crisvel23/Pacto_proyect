var manageCarritoTable;
var tot;
$(document).ready(function(){
    $('#navCarrito').addClass('active');	


	manageCarritoTable = $('#manageCarritoTable').DataTable({
		'ajax' : 'php_action/fetchCarrito.php',
		'order': [],
        "scrollX": true,
        "processing":true,
		"footerCallback": function (row,data,start,end,display) {
			total=this.api().column(4).data().reduce(function (a,b) {
				tot = parseFloat(a)+parseFloat(b);
				red = tot.toFixed(2);
				return red;
			},0);

			$(this.api().column(3).footer()).html(total);
			console.log(total);
		},

	}); // manage categories Data Table
}); // /document


function removeCarrito(carritoId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedCarrito.php',
		type: 'post',
		data: {carritoId: carritoId},
		dataType: 'json',
		success:function(response) {			
			// remove categories btn clicked to remove the categories function
			$("#removeCarritoBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeCarritoBtn").button('loading');

				$.ajax({
					url: 'php_action/removeCarrito.php',
					type: 'post',
					data: {carritoId: carritoId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#removeCarritoBtn").button('reset');
							// close the modal 
							$("#removeCarritoModal").modal('hide');
							// update the manage categories table
							manageCarritoTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} else {
 							// close the modal 
							$("#removeCarritoModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} // /else
						
						
					} // /success function
				}); // /ajax function request server to remove the categories data
			}); // /remove categories btn clicked to remove the categories function

		} // /response
	}); // /ajax function to fetch the categories data
} // remove categories function