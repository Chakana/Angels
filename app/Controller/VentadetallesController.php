<?php
App::uses('AppController', 'Controller');
/**
 * Ventadetalles Controller
 *
 * @property Ventadetalle $Ventadetalle
 * @property PaginatorComponent $Paginator
 */
class VentadetallesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Ventadetalle','Inventarioproductos','Movimientoproducto','Pago','Venta');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ventadetalle->recursive = 0;
		$this->set('ventadetalles', $this->Paginator->paginate());
	}

	public function detalleventaAjax($id){
		$this->layout = null;
		$this->Ventadetalle->recursive = 0;		
		$options = array('limit'=>100,'conditions' => array('Ventadetalle.venta_id'=> $id));
		$this->Paginator->settings = $options;
		$this->set('ventadetalles', $this->Paginator->paginate());
		$ventadetalles=$this->Ventadetalle->find('all', array('conditions' => array('Ventadetalle.venta_id' =>  $id)));
		$sumaVentaTotal=0;
		foreach ($ventadetalles as $detalleVenta ) {
			$sumaVentaTotal += $detalleVenta['Ventadetalle']['precioTotal'];
		}
		$this->set('sumaVentaTotal',$sumaVentaTotal);
		//pagos
		$pagosVenta = $this->Pago->find('all', array(
			'conditions' => array('Pago.venta_id' => $id),
			'recursive' => -1
			));
		$sumaPagos = 0;
		foreach ($pagosVenta as $pago) {
			$sumaPagos += $pago['Pago']['montoPago'];
		}
		//saldo
		$saldo=$sumaVentaTotal-$sumaPagos;
		//nombre del vendedor y el cliente
		$datosVenta = $this->Venta->read(null,$id);
		$nombreVendedor = $datosVenta['Vendedore']['nombreVendedor'];
		$nombreCliente = $datosVenta['Cliente']['nombreCliente'];
		$this->set(compact('sumaVentaTotal','sumaPagos','saldo','nombreVendedor','nombreCliente'));



	}

	public function detalleproformaAjax($id){
		$this->layout = null;
		$this->Ventadetalle->recursive = 0;		
		$options = array('limit'=>100,'conditions' => array('Ventadetalle.venta_id'=> $id));
		$this->Paginator->settings = $options;
		$this->set('ventadetalles', $this->Paginator->paginate());
		$ventadetalles=$this->Ventadetalle->find('all', array('conditions' => array('Ventadetalle.venta_id' =>  $id)));
		$sumaVentaTotal=0;
		foreach ($ventadetalles as $detalleVenta ) {
			$sumaVentaTotal += $detalleVenta['Ventadetalle']['precioTotal'];
		}
		$this->set('sumaVentaTotal',$sumaVentaTotal);
		
		//nombre del vendedor y el cliente
		$datosVenta = $this->Venta->read(null,$id);
		$nombreVendedor = $datosVenta['Vendedore']['nombreVendedor'];
		$nombreCliente = $datosVenta['Cliente']['nombreCliente'];
		$this->set(compact('sumaVentaTotal','nombreVendedor','nombreCliente'));



	}

	public function detalleventatiendaAjax($id){
		$this->layout = null;
		$this->Ventadetalle->recursive = 0;		
		$options = array('limit'=>100,'conditions' => array('Ventadetalle.venta_id'=> $id));
		$this->Paginator->settings = $options;
		$this->set('ventadetalles', $this->Paginator->paginate());
		$ventadetalles=$this->Ventadetalle->find('all', array('conditions' => array('Ventadetalle.venta_id' =>  $id)));
		$sumaVentaTotal=0;
		foreach ($ventadetalles as $detalleVenta ) {
			$sumaVentaTotal += $detalleVenta['Ventadetalle']['precioTotal'];
		}
		$this->set('sumaVentaTotal',$sumaVentaTotal);
		//saldo
		$saldo=$sumaVentaTotal;
		//nombre del vendedor y el cliente
		$datosVenta = $this->Venta->read(null,$id);

		$this->set(compact('sumaVentaTotal','saldo'));	
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ventadetalle->exists($id)) {
			throw new NotFoundException(__('Invalid ventadetalle'));
		}
		$options = array('conditions' => array('Ventadetalle.' . $this->Ventadetalle->primaryKey => $id));
		$this->set('ventadetalle', $this->Ventadetalle->find('first', $options));
	}

PUBLIC function addDetalleProforma($ventaId){
	$this->layout = null;
		if ($this->request->is('post')) {
			$this->Ventadetalle->create();
			if ($this->Ventadetalle->save($this->request->data)) {		
				return $this->redirect(array('action' => 'detalleproformaAjax',$ventaId));
			} else {
				$this->Session->setFlash(__('La venta no pudo ser registrada por favor intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$ventas = $this->Ventadetalle->Venta->find('list');
		$productos = $this->Ventadetalle->Producto->find('list');
		$this->set(compact('ventas', 'productos','ventaId'));
}
/**
 * add method
 *
 * @return void
 */
	public function add($ventaId) {
		$this->layout = null;
		if ($this->request->is('post')) {
			$idProducto = $this->data['Ventadetalle']['producto_id'];
			$cantidad =$this->data['Ventadetalle']['cantidad'];
			$inventarioProducto=$this->Inventarioproductos->find('first', array('conditions' => array('Inventarioproductos.producto_id' =>  $idProducto)));
			$cantidadDisponible = $inventarioProducto['Inventarioproductos']['existencia'];
			if($cantidad>$cantidadDisponible){
				$this->Session->setFlash(__('La cantidad no puede ser mayor a la existencia,intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));			
				return $this->redirect(array('controller' => 'pages','action'=>'display','error'));
				
				
			}else{
				$this->Ventadetalle->create();
				if ($this->Ventadetalle->save($this->request->data)) {		
					//reducimos la existencia del producto en la cantidad dispuesta
					$this->Inventarioproductos->read(null, $inventarioProducto['Inventarioproductos']['id']);
					$this->Inventarioproductos->set('existencia', $cantidadDisponible-$cantidad);
					$this->Inventarioproductos->save();

					$movimientoProducto = array(
						'producto_id'=>$this->data['Ventadetalle']['producto_id'],
						'tipoMovimiento'=>'VENTA',
						'fechaMovimiento'=>date("Y-m-d H:i:s"),
						'cantidad'=>$cantidad,
						'user_id'=>AuthComponent::user('id')
						);
					$this->Movimientoproducto->create();
					$this->Movimientoproducto->save($movimientoProducto);
					return $this->redirect(array('action' => 'detalleventaAjax',$ventaId));
				} else {
					$this->Session->setFlash(__('La venta no pudo ser registrada por favor intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
				}
			}			
		}
		$ventas = $this->Ventadetalle->Venta->find('list');
		$productos = $this->Ventadetalle->Producto->find('list',array('conditions'=>array('Producto.estado'=>1)));		
		$this->set(compact('ventas', 'productos','ventaId'));

	}


public function addVentaTiendaDetalle($ventaId) {
		$this->layout = null;
		if ($this->request->is('post')) {
			$idProducto = $this->data['Ventadetalle']['producto_id'];
			$cantidad =$this->data['Ventadetalle']['cantidad'];
			$inventarioProducto=$this->Inventarioproductos->find('first', array('conditions' => array('Inventarioproductos.producto_id' =>  $idProducto)));
			$cantidadDisponible = $inventarioProducto['Inventarioproductos']['existencia'];
			if($cantidad>$cantidadDisponible){
				$this->Session->setFlash(__('La cantidad no puede ser mayor a la existencia,intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));			
			}else{
				$this->Ventadetalle->create();
				if ($this->Ventadetalle->save($this->request->data)) {		
					
					//reducimos la existencia del producto en la cantidad dispuesta				
					$this->Inventarioproductos->read(null, $inventarioProducto['Inventarioproductos']['id']);
					$this->Inventarioproductos->set('existencia', $cantidadDisponible-$cantidad);
					$this->Inventarioproductos->save();

					$movimientoProducto = array(
						'producto_id'=>$this->data['Ventadetalle']['producto_id'],
						'tipoMovimiento'=>'VTIENDA',
						'fechaMovimiento'=>date("Y-m-d H:i:s"),
						'cantidad'=>$cantidad,
						'user_id'=>AuthComponent::user('id')
						);
					$this->Movimientoproducto->create();
					$this->Movimientoproducto->save($movimientoProducto);
					return $this->redirect(array('action' => 'detalleventatiendaAjax',$ventaId));
				} else {
					$this->Session->setFlash(__('La venta no pudo ser registrada por favor intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
				}
			}
		}
		$ventas = $this->Ventadetalle->Venta->find('list');
		$productos = $this->Ventadetalle->Producto->find('list',array('conditions'=>array('Producto.estado'=>1)));
		reset($productos);
		$firstProducto=key($productos);

		$preciosProducto = $this->Ventadetalle->Producto->find('first',array('conditions' => array('Producto.id' => $firstProducto)));
		$precioUnitario = array(
			$preciosProducto['Producto']['precio3'] => $preciosProducto['Producto']['precio3'] , 
			$preciosProducto['Producto']['precio4'] => $preciosProducto['Producto']['precio4'], 
			);
		$this->set(compact('ventas', 'productos','ventaId','precioUnitario'));

		

	}



	public function obtenerPrecios($idProducto) {
    $this->autoRender = false; // We don't render a view in this example
    //$this->request->onlyAllow('ajax'); // No direct access via browser URL
 	$preciosProducto = $this->Ventadetalle->Producto->find('first',array('conditions' => array('Producto.id' => $idProducto)));
	$precioUnitario = array(
		$preciosProducto['Producto']['precio3'] => $preciosProducto['Producto']['precio3'] , 
		$preciosProducto['Producto']['precio4'] => $preciosProducto['Producto']['precio4'], 
		);

    return json_encode($precioUnitario);
}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ventadetalle->exists($id)) {
			throw new NotFoundException(__('Invalid ventadetalle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ventadetalle->save($this->request->data)) {
				$this->Session->setFlash(__('The ventadetalle has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ventadetalle could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Ventadetalle.' . $this->Ventadetalle->primaryKey => $id));
			$this->request->data = $this->Ventadetalle->find('first', $options);
		}
		$ventas = $this->Ventadetalle->Venta->find('list');
		$productos = $this->Ventadetalle->Producto->find('list');
		$this->set(compact('ventas', 'productos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->layout = null;
		$this->autoRender = false;
		$this->Ventadetalle->id = $id;
		if (!$this->Ventadetalle->exists()) {
			throw new NotFoundException(__('Registro Invalido'));
		}
		//$this->request->onlyAllow('post', 'delete');
		$idProducto = $this->Ventadetalle->read('producto_id');		
		$idProducto = $idProducto['Ventadetalle']['producto_id'];
		$cantidad = $this->Ventadetalle->read('cantidad');		
		$cantidad = $cantidad['Ventadetalle']['cantidad'];
		$idVenta = $this->Ventadetalle->read('venta_id');
		$idVenta = $idVenta['Ventadetalle']['venta_id'];		

		$inventarioProducto=$this->Inventarioproductos->find('first', array('conditions' => array('Inventarioproductos.producto_id' =>  $idProducto)));
		$cantidadDisponible = $inventarioProducto['Inventarioproductos']['existencia'];
		
		if ($this->Ventadetalle->delete()) {
			//regresar la cantidad al inventario
			$this->Inventarioproductos->read(null, $inventarioProducto['Inventarioproductos']['id']);
			$this->Inventarioproductos->set('existencia', $cantidadDisponible+$cantidad);
			$this->Inventarioproductos->save();
			//registrar como devolucion el movimiento
			$movimientoProducto = array(
				'producto_id'=>$idProducto,
				'tipoMovimiento'=>'DV',
				'fechaMovimiento'=>date("Y-m-d H:i:s"),
				'cantidad'=>$cantidad,
				'user_id'=>AuthComponent::user('id')
				);
			$this->Movimientoproducto->create();
			$this->Movimientoproducto->save($movimientoProducto);
			//TODO: si existen pagos asociados a esta venta, no deberia permitirse el borrado
			//return $this->redirect(array('action' => 'detalleventatiendaAjax',$idVenta));
			$resultado='exito';
		} else {
			$resultado='error';
		}
		$this->response->body(json_encode($resultado));
	}

	public function delete_proforma_detalle($id=null){		
		$this->layout = null;
		$this->autoRender = false;
		$this->Ventadetalle->id = $id;
		if (!$this->Ventadetalle->exists()) {
			throw new NotFoundException(__('Registro Invalido'));
		}
		
		if ($this->Ventadetalle->delete()) {
			$resultado='exito';
		}else{
			$resultado='error';
		}
		$this->response->body(json_encode($resultado));

	}
}
