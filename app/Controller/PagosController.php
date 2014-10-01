<?php
App::uses('AppController', 'Controller');
/**
 * Pagos Controller
 *
 * @property Pago $Pago
 * @property PaginatorComponent $Paginator
 */
class PagosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Pago','Ventadetalle','Venta');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pago->recursive = 0;
		$this->set('pagos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pago->exists($id)) {
			throw new NotFoundException(__('Invalid pago'));
		}
		$options = array('conditions' => array('Pago.' . $this->Pago->primaryKey => $id));
		$this->set('pago', $this->Pago->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($idVenta) {
		$this->layout = null;
		$venta = $this->Venta->find('all', array('conditions' => array('Venta.id' =>  $idVenta)));
		if($venta==null){
			$estadoPagado="VENTA_NO_EXISTE";

		}else{
			$venta = $venta[0];
		$estadoPagado='OK';

		if($venta['Venta']['estado']=='PAGADO'){
			$estadoPagado='PAGADO';			
		}else{
			if ($this->request->is('post')) {
					$this->Pago->create();
					$montoPago = $this->data['Pago']['montoPago'];
					$ventadetalles=$this->Ventadetalle->find('all', array('conditions' => array('Ventadetalle.venta_id' =>  $idVenta)));
					$sumaVentaTotal=0;
					foreach ($ventadetalles as $detalleVenta ) {
						$sumaVentaTotal += $detalleVenta['Ventadetalle']['precioTotal'];
					}				
					$pagos=$this->Pago->find('all', array('conditions' => array('Pago.venta_id' =>  $idVenta)));
					
					$sumaPagos=0;
					foreach ($pagos as $pago ) {					
						$sumaPagos += $pago['Pago']['montoPago'];
					}
					$saldoVenta=0;
					if($montoPago>($sumaVentaTotal-$sumaPagos)){
						$estadoPagado='MONTO_ERROR';	
					}else{
						$pagosParciales=$montoPago + $sumaPagos;
						$saldoVenta = $sumaVentaTotal-$pagosParciales;				
						if($saldoVenta==0){
							$this->Venta->read(null, $idVenta);
							$this->Venta->set('estado', 'PAGADO');
							$this->Venta->save();
						}
						
						$nuevoPago = array(
							'venta_id' => $idVenta , 
							'fechaPago' => date("Y-m-d H:i:s"),
							'tipoPago' => $this->data['Pago']['tipoPago'],
							'montoPago' => $this->data['Pago']['montoPago'],
							'notas' => $this->data['Pago']['notas'],
							'saldoVenta' => $saldoVenta);
						
						if ($this->Pago->save($nuevoPago)) {
							$estadoPagado='PAGOHECHO';
							//return $this->redirect(array('controller'=>'ventadetalles','action' => 'detalleventaAjax'));
						} else {
							$estadoPagado='ERROR';	
						}
					}
					
				}		
			}	
		}
		
		$this->set(compact('estadoPagado'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pago->exists($id)) {
			throw new NotFoundException(__('Invalid pago'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pago->save($this->request->data)) {
				$this->Session->setFlash(__('The pago has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pago could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Pago.' . $this->Pago->primaryKey => $id));
			$this->request->data = $this->Pago->find('first', $options);
		}
		$ventas = $this->Pago->Venta->find('list');
		$this->set(compact('ventas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pago->id = $id;
		if (!$this->Pago->exists()) {
			throw new NotFoundException(__('Invalid pago'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pago->delete()) {
			$this->Session->setFlash(__('The pago has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The pago could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function obtenerPagosVenta($idVenta){
		$this->layout = null;
		$this->autoRender = false;
		$pagosVenta = $this->Pago->find('all', array(
			'conditions' => array('Pago.venta_id' => $idVenta),
			'recursive' => -1
			));
		$sumaPagos = 0;
		foreach ($pagosVenta as $pago) {
			$sumaPagos += $pago['Pago']['montoPago'];
		}
		$this->response->body(json_encode($sumaPagos));
	}
}
