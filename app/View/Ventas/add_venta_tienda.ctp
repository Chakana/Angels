<div class="ventas form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Nueva Venta de Tienda') ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nueva Venta de Tienda'), array('action' => 'addVentaTienda'), array('escape' => false)); ?></li>
								
								
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
		
		<!-- Modal -->
		
	<div>
</div>

<script>

</script>
