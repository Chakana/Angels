<div class="productos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Buscar Producto'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
	
	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Opciones</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Producto'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Inventario'), array('controller' => 'inventarioproductos', 'action' => 'index'), array('escape' => false)); ?> </li>					
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Movimientos'), array('controller' => 'movimientoproductos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><a class="btn btn-lg btn-primary text-right" id="imprimirListadoBtn" href="#">
  				<i class="fa fa-print fa-2x"></i> Imprimir</a></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Producto', array('action'=>'buscarProducto')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('cadenaBusqueda', array('class' => 'form-control', 'placeholder' => 'Nombre Descripcion o codigo del producto','label'=>'Nombre/Descripcion/Producto'));?>					
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-success" id="btnBuscar">Buscar</button>
				</div>
			<?php echo $this->Form->end() ?>
		</div><!-- end col md 9 -->	
		<div id="productos">
		</div>
		</div>
		</div>
		
<script type="text/javascript">
$( document ).ready(function() {
	 $('#productos').load('/Angels/productos/listaProductosSimple/'); 
});
$('#btnBuscar').click(function() {
	 $('#productos').load('/Angels/productos/listaProductosSimple/'+ $('#ProductoCadenaBusqueda').val()); 
   
});

$('#ProductoCadenaBusqueda').keyup(function() {
	 $('#productos').load('/Angels/productos/listaProductosSimple/'+ $('#ProductoCadenaBusqueda').val()); 
   
});
	 $('#imprimirListadoBtn').click(function (event) {	 	
	 	$('#productos').printElement();
	 });

</script>
