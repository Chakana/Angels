<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<br/>
<br/>
<br/>
<div class="row">
	<div class="alert alert-danger" role="alert">
		Existen deudas a cobrar que han vencido, ingresar <a href="#" class="alert-link">aca</a> para mayor informacion.

	</div>
	<div class="col-md-1"></div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Resumen de Ventas</h3>
			</div>
			<div class="panel-body">
				Numero de ventas realizadas hoy <h3>17</h3> 
				Suma Total de Ventas a la fecha <h3>18000 Bs</h3>
				Suma Total de Deudas a cobrar <h3> 8000 Bs</h3>
				Suma Total de Deudas cobradas <h3> 10000 Bs </h3>


			</div>
		</div>
	</div>
	<div class="col-md-6"> 
		<div id="panel-accesosdirectos" class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Accesos Directos</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<?php echo $this->Html->link('Productos<br />'.$this->Html->tag('i','',array('class'=>'fa fa-cubes fa-2x')), array('controller' => 'productos'),array('class'=> 'btn btn-primary col-md-12','role' => 'button', 'escape'=>false)); ?>
					</div>				
					<div class="col-md-4">
						<?php echo $this->Html->link('Ventas<br />'.$this->Html->tag('i','',array('class'=>'fa fa-shopping-cart fa-2x')), array('controller' => 'ventas'),array('class'=> 'btn btn-primary col-md-12','role' => 'button', 'escape'=>false)); ?>
					</div>
					<div class="col-md-4">
						<?php echo $this->Html->link('Clientes<br />'.$this->Html->tag('i','',array('class'=>'fa fa-users fa-2x')), array('controller' => 'clientes'),array('class'=> 'btn btn-primary col-md-12','role' => 'button', 'escape'=>false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<?php echo $this->Html->link('Nueva Venta<br />'.$this->Html->tag('i','',array('class'=>'fa fa-plus-circle fa-2x')), array('controller' => 'ventas', 'action'=>'add'),array('class'=> 'btn btn-primary col-md-12','role' => 'button', 'escape'=>false)); ?>
					</div>
					<div class="col-md-4">
						<?php echo $this->Html->link('Nuevo Cliente<br />'.$this->Html->tag('i','',array('class'=>'fa fa-plus-square fa-2x')), array('controller' => 'clientes', 'action' => 'add'),array('class'=> 'btn btn-primary col-md-12','role' => 'button', 'escape'=>false)); ?>
					</div>
					<div class="col-md-4">
						<?php echo $this->Html->link('Movimientos<br />'.$this->Html->tag('i','',array('class'=>'fa fa-money fa-2x')), array('controller' => 'movimientosproductos'),array('class'=> 'btn btn-primary col-md-12','role' => 'button', 'escape'=>false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<?php echo $this->Html->link('Usuarios<br />'.$this->Html->tag('i','',array('class'=>'fa fa-user fa-2x')), array('controller' => 'users'),array('class'=> 'btn btn-primary col-md-12','role' => 'button', 'escape'=>false)); ?>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>
		</div>

	</div>



</div>

