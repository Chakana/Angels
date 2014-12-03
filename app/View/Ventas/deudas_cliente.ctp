
<style>
#venta tr:hover {
    cursor: pointer;
}
</style>
<div class="ventas index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Deudas: '.$nombreCliente); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
	<?php //var_dump($ventas[0]); 

	?>


	<div class="row">
                                                                         
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Todas las deudas'), array('action' => 'deudasCliente'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Vendedores'), array('controller' => 'vendedores', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Vendedor'), array('controller' => 'vendedores', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>	
								<li><a class="btn btn-lg btn-primary text-right" id="imprimirListadoDeuda" href="#">
  									<i class="fa fa-print fa-2x"></i> Imprimir</a></li>							
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
		
				<div class="form-group">
					<?php echo $this->Form->input('cliente_id', array('class' => 'form-control', 'placeholder' => 'cliente'));?>
				</div>
			<table cellpadding="0" cellspacing="0" class="table table-hover" id="venta">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('Id'); ?></th>
						<th><?php echo $this->Paginator->sort('Estado'); ?></th>
						<th><?php echo $this->Paginator->sort('Fecha de Venta'); ?></th>
						<th><?php echo $this->Paginator->sort('Vendedor'); ?></th>
						<th><?php echo $this->Paginator->sort('Cliente'); ?></th>
						<th><?php echo $this->Paginator->sort('Total Venta'); ?></th>
						<th><?php echo $this->Paginator->sort('Saldo a Pagar'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				
				<?php foreach ($ventas as $venta): ?>
					
					<tr>
						<td><?php echo h($venta['Venta']['id']); ?>&nbsp;</td>
						<td><?php echo h($venta['Venta']['estado']); ?>&nbsp;</td>
						<td><?php echo h($venta['Venta']['fechaVenta']); ?>&nbsp;</td>						
								<td>
			<?php echo $this->Html->link($venta['Vendedore']['nombreVendedor'], array('controller' => 'vendedores', 'action' => 'view', $venta['Vendedore']['id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($venta['Cliente']['nombreCliente'], array('controller' => 'clientes', 'action' => 'view', $venta['Cliente']['id'])); ?>
		</td>
		<td><?php $sumaVentaDetalles=0; 
			foreach ($venta['Ventadetalle'] as $ventadetalle ) {
				$sumaVentaDetalles +=$ventadetalle['precioTotal'];
			}
			echo $this->Number->currency($sumaVentaDetalles);?>&nbsp;</td>
			<td>
			<?php $ultimoPago=array_pop($venta['Pago']);
			$porPagar=0;
			if($ultimoPago==null){
				$porPagar=$sumaVentaDetalles;
			}else{
				$porPagar= $ultimoPago['saldoVenta'];
			}
			echo $this->Number->currency($porPagar)?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $venta['Venta']['id']), array('escape' => false)); ?>							
							
						</td>

					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Pagina {:page} de {:pages}, mostrando {:current} registro del total de {:count} , comenzando en el registro {:start}, hasta el {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
		<div class="col-md-9">
			<div id='contenidoVentaDetalle'>			
			</div>
		</div>
	</div><!-- end row -->
	<div class='row'>
		
	</div>


</div><!-- end containing of content -->
<div id = "impresionDeudas" style='visibility: hidden'>
	
	<div class="page-header">		
	  <hr/>			
	  <h2><?php echo $this->Session->read('nombreEmpresa')?></h2>
	  <h3>Reporte de Deuda</h3>
	  <hr/>
	  <h3>Cliente : <small><?php echo h($nombreCliente); ?></small></h3>
	  		  
	  <h3>Fecha:<small><?php echo h(date('Y-m-d')); ?></small></h3>
</div>
		<table cellpadding="0" cellspacing="0" class="table table-hover" id="venta">
			<thead>
				<tr>
					<th><?php echo h('Id'); ?></th>
					<th><?php echo h('Estado'); ?></th>
					<th><?php echo h('Fecha de Venta'); ?></th>
					<th><?php echo h('Vendedor'); ?></th>
					<th><?php echo h('Cliente'); ?></th>
					<th><?php echo h('Total Venta'); ?></th>
					<th><?php echo h('Saldo a Pagar'); ?></th>					
				</tr>
			</thead>
			<tbody>
			
			<?php foreach ($totalDeudas as $venta): ?>
				
				<tr>
					<td><?php echo h($venta['Venta']['id']); ?>&nbsp;</td>
					<td><?php echo h($venta['Venta']['estado']); ?>&nbsp;</td>
					<td><?php echo h($venta['Venta']['fechaVenta']); ?>&nbsp;</td>						
					<td><?php echo h($venta['Vendedore']['nombreVendedor']); ?>&nbsp;</td>
					<td><?php echo h($venta['Cliente']['nombreCliente']); ?>&nbsp;</td>
					<td><?php $sumaVentaDetalles=0; 
						foreach ($venta['Ventadetalle'] as $ventadetalle ) {
							$sumaVentaDetalles +=$ventadetalle['precioTotal'];
						}
						echo $this->Number->currency($sumaVentaDetalles);?>&nbsp;
					</td>
					<td>
						<?php $ultimoPago=array_pop($venta['Pago']);
						$porPagar=0;
						if($ultimoPago==null){
							$porPagar=$sumaVentaDetalles;
						}else{
							$porPagar= $ultimoPago['saldoVenta'];
						}
						echo $this->Number->currency($porPagar)?>&nbsp;
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>

</div>

<script>
$(document).ready(function(){
    /*$('.table').delegate('tr.rows', 'click', function(){
        $('#contenidoVentaDetalle').load('/Angels/ventadetalles/detalleventaAjax',{ id: 1 });
    });
     $("#content").on("keydown",  hoverDown);*/
     $('.table tr').click(function (event) {
     	
		var cellValue=($('.table tr').eq($(this).index()+1).find('td').eq(0).text());
		$('#contenidoVentaDetalle').load('/Angels/ventadetalles/detalleventaAjax/'+cellValue,{ id: cellValue });
     });

     $("#cliente_id").val("<?php echo $nombreCliente;?>");



});
$('#cliente_id').change(function() {
    var val = $(this).val();  // val is the drug id
    window.location = '/Angels/ventas/deudasCliente/' + val;
});
$('#imprimirListadoDeuda').click(function (event) {	 	
		$('#impresionDeudas').attr('style','')
	 	$('#impresionDeudas').printElement();
	 	$('#impresionDeudas').attr('style','visibility:hidden');
	 });
</script>