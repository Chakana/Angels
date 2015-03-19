
<div class="col-md-9">
	<table cellpadding="0" cellspacing="0" class="table table-striped">
		<thead>
			<tr>							
				<th><?php echo $this->Paginator->sort('Codigo Barras'); ?></th>
				<th><?php echo $this->Paginator->sort('Codigo Producto'); ?></th>
				<th><?php echo $this->Paginator->sort('Nombre de producto'); ?></th>
				<th><?php echo $this->Paginator->sort('Precio sin factura'); ?></th>
				<th><?php echo $this->Paginator->sort('Precio con factura'); ?></th>
				<th><?php echo $this->Paginator->sort('Existencia'); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($productos as $producto): ?>						
			<tr>
				<td><?php echo h($producto['Producto']['codigo']); ?>&nbsp;</td>
				<td><?php echo h($producto['Producto']['nombreProducto']); ?>&nbsp;</td>						
				<td><?php echo h($producto['Producto']['descripcionProducto']); ?>&nbsp;</td>						
				<td><?php echo h($producto['Producto']['precio1']); ?>&nbsp;</td>						
				<td><?php echo h($producto['Producto']['precio2']); ?>&nbsp;</td>	
				<td><?php echo h($producto['Inventarioproducto'][0]['existencia']); ?>&nbsp;</td>						

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<p>
		<small><?php echo $this->Paginator->counter(array('format' => __('Pagina numero {:page} de {:pages}, mostrando el registro{:current} del total de {:count} , comenzando con el registro{:start}, finalizando en el registro nro{:end}')));?></small>
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
			
