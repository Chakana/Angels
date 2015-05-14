<?php
App::uses('AppController', 'Controller');
/**
 * Ventas Controller
 *
 * @property Venta $Venta
 * @property PaginatorComponent $Paginator
 */
class VentasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Venta','Ventadetalle','Pago','Producto','Inventarioproductos','Movimientoproducto');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Venta->recursive = 1;
		$options = array('limit'=>5);
		$this->Paginator->settings = $options;
		$this->set('ventas', $this->Paginator->paginate());
	}

	public function deudasCliente($idCliente=null){
		$this->Venta->recursive = 1;
		if($idCliente==null){
			$options = array('limit'=>5,'conditions'=> array('Venta.estado'=>'PENDIENTE'));	
			$optionsTotal = array('conditions'=> array('Venta.estado'=>'PENDIENTE'));
		}else{
			$options = array('limit'=>5,'conditions'=> array('Venta.cliente_id' => $idCliente,'Venta.estado'=>'PENDIENTE'));
			$optionsTotal = array('conditions'=> array('Venta.cliente_id' => $idCliente,'Venta.estado'=>'PENDIENTE'));

		}
		
		$this->Paginator->settings = $options;
		$this->set('ventas', $this->Paginator->paginate());
		$clientes = $this->Venta->Cliente->find('list');
		$totalDeudas = $this->Venta->find('all',$optionsTotal);
		if($idCliente==null){
			$nombreCliente='TODOS';
		}else{
			$nombreCliente=$totalDeudas[0]['Cliente']['nombreCliente'];
		}
		
		$this->set(compact('clientes','totalDeudas','nombreCliente'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Venta->exists($id)) {
			throw new NotFoundException(__('Invalid venta'));
		}
		$options = array('conditions' => array('Venta.' . $this->Venta->primaryKey => $id));
		$this->set('venta', $this->Venta->find('first', $options));
	}




public function addProforma(){
	$idVenta=0;
		if ($this->request->is('post')) {
			$this->Venta->create();
			$this->set('saved', false); //false by default - controls closure of overlay in which this is opened
			$insertData = array(
				'fechaVenta' => date("Y-m-d H:i:s"),		      
		      'vendedore_id' => $this->data['Venta']['vendedore_id'],
		      'cliente_id' => $this->data['Venta']['cliente_id'],
		      'estado' => 'PROFORMA'
				);


			if ($this->Venta->save($insertData)) {	
				$idVenta= $this->Venta->getLastInsertId();			
				return $this->redirect(array('controller'=> 'Ventadetalles','action' => 'addDetalleProforma',$idVenta));
			} else {
				$this->Session->setFlash(__('La venta no pudo ser registrada,por favor intente de nuevo'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$vendedores = $this->Venta->Vendedore->find('list');
		$clientes = $this->Venta->Cliente->find('list');
		$this->set(compact('vendedores', 'clientes','idVenta'));
}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$idVenta=0;
		if ($this->request->is('post')) {
			$this->Venta->create();
			$this->set('saved', false); //false by default - controls closure of overlay in which this is opened
			$insertData = array(
				'fechaVenta' => date("Y-m-d H:i:s"),		      
		      'vendedore_id' => $this->data['Venta']['vendedore_id'],
		      'cliente_id' => $this->data['Venta']['cliente_id']
				);


			if ($this->Venta->save($insertData)) {	
				$idVenta= $this->Venta->getLastInsertId();			
				return $this->redirect(array('controller'=> 'Ventadetalles','action' => 'add',$idVenta));
			} else {
				$this->Session->setFlash(__('La venta no pudo ser registrada,por favor intente de nuevo'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$vendedores = $this->Venta->Vendedore->find('list');
		$clientes = $this->Venta->Cliente->find('list');
		$this->set(compact('vendedores', 'clientes','idVenta'));

	}

	public function addVentaTienda(){
		$idVenta=0;
		if ($this->request->is('post')) {
			$this->Venta->create();
			$this->set('saved', false); //false by default - controls closure of overlay in which this is opened
			$insertData = array(
				'fechaVenta' => date("Y-m-d H:i:s"),		      
		      'vendedore_id' => $this->data['Venta']['vendedore_id'],
		      'cliente_id' => $this->data['Venta']['cliente_id']
				);


			if ($this->Venta->save($insertData)) {	
				$idVenta= $this->Venta->getLastInsertId();			
				return $this->redirect(array('controller'=> 'Ventadetalles','action' => 'addVentaTiendaDetalle',$idVenta));
			} else {
				$this->Session->setFlash(__('La venta no pudo ser registrada,por favor intente de nuevo'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$vendedores = $this->Venta->Vendedore->find('list',array(
	        'fields' => array('Vendedore.id', 'Vendedore.nombreVendedor'),
	        'conditions' => array('Vendedore.user_id' => AuthComponent::user('id'))
    	));
		$clientes = $this->Venta->Cliente->find('list',array(
	        'fields' => array('Cliente.id', 'Cliente.nombreCliente'),
	        'conditions' => array('Cliente.nombreCliente' => 'TIENDA')
    	));
		$this->set(compact('vendedores', 'clientes','idVenta'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Venta->exists($id)) {
			throw new NotFoundException(__('Invalid venta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Venta->save($this->request->data)) {
				$this->Session->setFlash(__('la venta se ha actualizado con exito.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error en la actualizacion por favor intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Venta.' . $this->Venta->primaryKey => $id));
			$this->request->data = $this->Venta->find('first', $options);
		}
		$vendedores = $this->Venta->Vendedore->find('list');
		$clientes = $this->Venta->Cliente->find('list');
		$this->set(compact('vendedores', 'clientes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Venta->id = $id;
		if (!$this->Venta->exists()) {
			throw new NotFoundException(__('Invalid venta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Venta->delete()) {
			$this->Session->setFlash(__('La venta ha sido borrada con exito.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('La venta no puede ser borrada, por favor intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function contadoresVenta(){
		$this->layout=null;
		$numVentasHoy = 0;
		$sumaVentasTotal = 0;
		$sumaDeudas=0;	
		$sumaDeudasCobradas=0; //esto es la suma de pagos 
		$fechaHoy = date('Y-m-d');			
		$ventasHoy = $this->Venta->Ventadetalle->find('all',array('conditions'=> array("DATE_FORMAT(Venta.fechaVenta,'%Y-%m-%d')"=>$fechaHoy),'fields'=>array('sum(Ventadetalle.precioTotal) as total_sum')));		
		$sumaVentasHoy = ($ventasHoy[0][0]['total_sum']==null)?0:$ventasHoy[0][0]['total_sum'];		
		$ventasTotal = $this->Venta->Ventadetalle->find('all',array('fields'=>array('sum(Ventadetalle.precioTotal) as total_sum')));
		$ventasPendientes=$this->Venta->Ventadetalle->find('all',array('conditions'=> array('Venta.estado'=>'PENDIENTE'),'fields'=>array('sum(Ventadetalle.precioTotal) as total_sum')));
		$sumaDeudas=($ventasPendientes[0][0]['total_sum']==null)?0:$ventasPendientes[0][0]['total_sum'];
		$sumaVentasTotal = ($ventasTotal[0][0]['total_sum']==null)?0:$ventasTotal[0][0]['total_sum'];
		$deudasCobradas=$this->Pago->find('all',array('conditions'=> array('Venta.estado'=>'PENDIENTE'),'fields'=>array('sum(Pago.montoPago) as total_sum')));		
		$sumaDeudasCobradas = ($deudasCobradas[0][0]['total_sum']==null)?0:$deudasCobradas[0][0]['total_sum'];

		$this->set(compact('sumaVentasHoy','sumaVentasTotal','sumaDeudasCobradas','sumaDeudas'));


	}

	public function ventaRapida($cadenaBusqueda=null,$idVenta=null){	
		//$this->layout=null;
		
		if ($cadenaBusqueda!=null) {
			
			//buscamos el producto
				$options = array('conditions' => array('Producto.estado'=> 1,'OR'=>array('Producto.codigo LIKE'=>'%'.$cadenaBusqueda.'%','Producto.nombreProducto LIKE'=>'%'.$cadenaBusqueda.'%','Producto.descripcionProducto LIKE'=>'%'.$cadenaBusqueda.'%') ),'order' => array('Producto.nombreProducto'=>'asc'));
				$producto = $this->Producto->find('first', $options);
				if($producto!=null){
					if($idVenta==null){
						$this->Venta->create();
						$this->set('saved', false); //false by default - controls closure of overlay in which this is opened
						$insertData = array(
						  'fechaVenta' => date("Y-m-d H:i:s"),		      
					      'vendedore_id' => 1,
					      'cliente_id' => 1
							);
						if ($this->Venta->save($insertData)) {	
							$idVenta= $this->Venta->getLastInsertId();									
						} else {
							$this->Session->setFlash(__('La venta no pudo ser registrada,por favor intente de nuevo'), 'default', array('class' => 'alert alert-danger'));
						}

					}
					//creamos el detalle de venta con el producto
					$idProducto = $producto['Producto']['id'];
					$cantidad = 1;
					$inventarioProducto=$this->Inventarioproductos->find('first', array('conditions' => array('Inventarioproductos.producto_id' =>  $idProducto)));
					$cantidadDisponible = $inventarioProducto['Inventarioproductos']['existencia'];
					$precioProducto = $producto['Producto']['precio1']; //se obtiene el precio 1
					if($cantidad>$cantidadDisponible){
						$this->Session->setFlash(__('La cantidad no puede ser mayor a la existencia,intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));			
						
					}else{
						$this->Ventadetalle->create();
						$ventaDetalle = array(
							'venta_id' => $idVenta,
							'producto_id' => $idProducto,
							'cantidad' => $cantidad,
							'precioUnitario' => $precioProducto, 
							'precioTotal' => $precioProducto * $cantidad
							);
						
						if ($this->Ventadetalle->save($ventaDetalle)) {		

							//reducimos la existencia del producto en la cantidad dispuesta
							$this->Inventarioproductos->read(null, $inventarioProducto['Inventarioproductos']['id']);
							$this->Inventarioproductos->set('existencia', $cantidadDisponible-$cantidad);
							$this->Inventarioproductos->save();

							$movimientoProducto = array(
								'producto_id'=>$idProducto,
								'tipoMovimiento'=>'VENTA_TIENDA',
								'fechaMovimiento'=>date("Y-m-d H:i:s"),
								'cantidad'=>$cantidad,
								'user_id'=>AuthComponent::user('id')
								);
							$this->Movimientoproducto->create();
							$this->Movimientoproducto->save($movimientoProducto);
							$this->set(compact('idVenta'));

							return $this->redirect(array('controller'=> 'Ventadetalles','action' => 'detalleventaAjax',$idVenta));						
						} else {
							$this->Session->setFlash(__('La venta no pudo ser registrada por favor intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
						}
					}					

				}else{
					$this->Session->setFlash(__('Producto no existe'), 'default', array('class' => 'alert alert-danger'));
					if($idVenta==null){
						$this->layout = false;
						$this->render(false);
						
					}else{
						return $this->redirect(array('controller'=> 'Ventadetalles','action' => 'detalleventaAjax',$idVenta));						
					}
										
				}
		}

	}
}
