<div class="ventas form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Nueva Venta') ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Acciones</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Ventas'), array('action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Vendedores'), array('controller' => 'vendedores', 'action' => 'index'), array('escape' => false)); ?> </li>
								
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Pagos'), array('controller' => 'pagos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li> </li>
								
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Venta', array('role' => 'form')); ?>
				<fieldset id="formularios" >
				<table>
				<tr>
					<td><div class="form-group">
						<?php echo $this->Form->input('fechaVenta', array('class' => 'form-control', 'placeholder' => 'FechaVenta','type'=>'hidden'));?>
					</div></td>
					<td><div class="form-group">
					<?php echo $this->Form->input('descripcion', array('class' => 'form-control', 'placeholder' => 'Descripcion'));?>
				</div></td>
					<td><div class="form-group">
					<?php echo $this->Form->input('vendedore_id', array('class' => 'form-control', 'placeholder' => 'vendedor'));?>
				</div></td>
					<td>
				<div class="form-group">
					<?php echo $this->Form->input('cliente_id', array('class' => 'form-control', 'placeholder' => 'cliente'));?>
				</div></td>
					<td><div class="form-group">
					<br/>
					<?php echo $this->Js->submit('Grabar', array(  //create 'ajax' save button
				    'update' => '#agregardetalle','class'=>'btn btn-success btnVenta'  //id of DOM element to update with selector
				    ));?>
				</div></td>
				</tr>
				</table>
				</fieldset>
			<?php echo $this->Form->end();echo $this->Js->writeBuffer(); ?>

		</div><!-- end col md 12 -->
		<div class="col-md-9">
			<div id="agregardetalle">
			</div>
		</div>
		<div class="col-md-9">
			<div id="detallesVenta">
			</div>
		</div>
		

	</div><!-- end row -->
	<div class="row">		
		<!-- Button trigger modal -->
		<button class="btn btn-primary btn-lg" id="modalButton" data-toggle="modal" data-target="#myModal">
		  Nuevo Pago
		</button>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Nuevo Pago</h4>
		      </div>
		      <div class="modal-body">
		       <div class="alert alert-danger" role="alert">Debe elegir una venta valida.</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>		        
		      </div>
		    </div>
		  </div>
		</div>
	<div>
</div>
<script type="text/javascript">
	 $('#modalButton').click(function (event) {
	 	var idVenta = $('#VentadetalleVentaId').val();
	 	if(idVenta!=null){
	 		$('.modal-body').load('/Angels/pagos/add/'+idVenta);
	 	}
		
	});

</script>
