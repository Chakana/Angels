<div class="productos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Venta Rapida'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
	
	<div class="row">

		
		<div class="col-md-12">
			<div class="input text">
				<label for="cadenaBusqueda">Nombre/Descripcion/Producto</label>
				<input class="form-control" type="text" id="cadenaBusqueda" placeholder="Nombre Descripcion o codigo del producto">
			</div>
			<div id="detallesVenta">
			</div>
		</div><!-- end col md 12 -->	
		
		</div>
		</div>
		
<script type="text/javascript">
$( document ).ready(function() {
	
});
$('#cadenaBusqueda').change(function() {
	
	var idVenta = $('#valIdVenta').html(); 	 	
			 	if(idVenta==null){
			 		$('#detallesVenta').load('/Angels/ventas/ventaRapida/'+ $('#cadenaBusqueda').val()); 
			 	}else{
			 		$('#detallesVenta').load('/Angels/ventas/ventaRapida/'+ $('#cadenaBusqueda').val() + '/' + idVenta); 
			 	}	 

	//verificamos si el producto existe
	

	

   $('#cadenaBusqueda').val('');
});

</script>
