<div class="ventadetalles index">

	



	<div class="row">

		<div class="col-md-12">
			<a class="btn btn-lg btn-primary text-right" id="imprimirVenta" href="#">
  				<i class="fa fa-print fa-2x"></i> Imprimir</a>						
			<div id="printVentaDetalleArea">
				<div class="row">
					<div class="page-header">		
					  <hr/>			
					  <h2><?php echo $this->Session->read('nombreEmpresa')?></h2>
					  <h3>Proforma de Venta</h3>
					  <hr/>
					  <h3>Numero de proforma :<small><?php echo h(str_pad($ventadetalles[0]['Venta']['id'],6,'0',STR_PAD_LEFT)); ?></small></h3>
					  <h3>Vendedor:<small><?php echo h($nombreVendedor); ?></small>Cliente:<small><?php echo h($nombreCliente);?></h3>					  
					  <h3>Fecha:<small><?php echo h($ventadetalles[0]['Venta']['fechaVenta']); ?></small></h3>
					</div>	
					<div id="valIdVenta" style="display:none" ><?php echo h($ventadetalles[0]['Ventadetalle']['venta_id']); ?></div>
					<div id="valestadoVenta" style="display:none"><?php echo h($ventadetalles[0]['Venta']['estado']); ?></div>
					<table cellpadding="0" cellspacing="0" class="table table-striped" >
						<thead>
							<tr>
								<th><?php echo $this->Paginator->sort('Codigo'); ?></th>
								<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
								<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
								<th><?php echo $this->Paginator->sort('precio Unitario'); ?></th>
								<th><?php echo $this->Paginator->sort('precio Total'); ?></th>
								<th class="actions"></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($ventadetalles as $ventadetalle): ?>
							
							<tr>		
								<td>
									<?php echo $this->Html->link($ventadetalle['Producto']['nombreProducto'], array('controller' => 'productos', 'action' => 'view', $ventadetalle['Producto']['id'])); ?></td>							
								<td>
									<?php echo h($ventadetalle['Producto']['descripcionProducto']); ?>&nbsp;</td>
								<td ><?php echo h($ventadetalle['Ventadetalle']['cantidad']); ?>&nbsp;</td>							
								<td><?php echo h($ventadetalle['Ventadetalle']['precioUnitario']); ?>&nbsp;</td>
								<td><?php echo h($ventadetalle['Ventadetalle']['precioTotal']); ?>&nbsp;</td>
								<td class="actions">	
									<div id="borrarDet" class="borrarDet" data-val= "<?php echo $ventadetalle['Ventadetalle']['id'];?>" data-ventaid="<?php echo $ventadetalle['Ventadetalle']['venta_id'];?>"><span class="glyphicon glyphicon-remove"></span></div>								
									
								</td>
							</tr>

						<?php endforeach; ?>
						<tr>
								<td></td>
								<td></td>
								<td></td>
								<td>TOTAL</td>
								<td><div id = "sumaVentaTotal"><?php echo $this->Number->currency($sumaVentaTotal);?></div></td>
						</tr>
						
						</tbody>
					</table>

					<p>
						<small><?php echo $this->Paginator->counter(array('format' => __('Pagina numero {:page} de {:pages}, viendo el registro{:current} del total de registro{:count} , comenzando con el registo {:start}, hasta el registro nro {:end}')));?></small>
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
				</div>
			</div>			

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->

<script type="text/javascript">
	 $('#imprimirVenta').click(function (event) {	 	
	 	$('#printVentaDetalleArea').printElement();
	 });

$("body").off("click", ".borrarDet").on("click", ".borrarDet", function(){
    $.ajax({
        url: '/Angels/ventadetalles/delete_proforma_detalle/'+ $(this).data('val'),
        dataType: 'json',
        type: 'GET',
        // This is query string i.e. country_id=123
        data: {},
        success: function(data) {
            $('#detallesVenta').load('/Angels/Ventadetalles/detalleproformaAjax/'+ $('#valIdVenta').html());
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });    
});





</script>
