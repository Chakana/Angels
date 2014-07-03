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
  		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Accesos Directos</h3>
		  </div>
		  <div class="panel-body">
		  	<a class="btn btn-primary" href="http://localhost/Angels/productos" role="button">Ver Productos</a>
		  	<a class="btn btn-primary" href="http://localhost/Angels/ventas" role="button">Ver Ventas</a>
		  	<a class="btn btn-primary" href="http://localhost/Angels/clientes" role="button">Ver Clientes</a>
		  	<div class="clear"></div>
		  	<br/>
		  	<a class="btn btn-primary" href="http://localhost/Angels/ventas/add" role="button">Nueva Venta</a>
		  	<a class="btn btn-primary" href="http://localhost/Angels/clientes/add" role="button">Nuevo Cliente</a>
		  	<div class="clear"></div>
		  	<br/>
		  	<a class="btn btn-primary" href="http://localhost/Angels/movimientoproductos" role="button">Ver Movimientos de Productos</a>
		  	<a class="btn btn-primary" href="http://localhost/Angels/users" role="button">Ver Usuarios</a>
		  </div>
		</div>

  	</div>

	

</div>

