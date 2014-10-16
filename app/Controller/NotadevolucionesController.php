<?php
App::uses('AppController', 'Controller');
/**
 * Notadevoluciones Controller
 *
 * @property Notadevolucione $Notadevolucione
 * @property PaginatorComponent $Paginator
 */
class NotadevolucionesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Notadevolucione','Inventarioproductos','Movimientoproducto','Venta');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Notadevolucione->recursive = 0;
		$this->set('notadevoluciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Notadevolucione->exists($id)) {
			throw new NotFoundException(__('Invalid notadevolucione'));
		}
		$options = array('conditions' => array('Notadevolucione.' . $this->Notadevolucione->primaryKey => $id));
		$this->set('notadevolucione', $this->Notadevolucione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($idVenta) {
		$this->layout = null;
		$estadoNota='OK';
		if ($this->request->is('post') ) {

			$this->Notadevolucione->create();
			
			$notaDevolucion = array(
				'venta_id'=>$idVenta,
				'producto_id'=>$this->data['Notadevolucione']['producto_id'],
				'cantidad'=>$this->data['Notadevolucione']['cantidad'],
				'fecha'=>date("Y-m-d H:i:s"),
				'user_id'=>AuthComponent::user('id')
				);
			if ($this->Notadevolucione->save($notaDevolucion)) {
				//debemos actualizar el inventario
				$inventarioProducto=$this->Inventarioproductos->find('first', array('conditions' => array('Inventarioproductos.producto_id' =>  $this->data['Notadevolucione']['producto_id'])));
				$cantidadDisponible = $inventarioProducto['Inventarioproductos']['existencia'];
				$cantidad = $this->data['Notadevolucione']['cantidad'];
				$this->Inventarioproductos->read(null, $inventarioProducto['Inventarioproductos']['id']);
				$this->Inventarioproductos->set('existencia', $cantidadDisponible+$cantidad);
				$this->Inventarioproductos->save();
				//se registra el movimiento
				$movimientoProducto = array(
					'producto_id'=>$this->data['Notadevolucione']['producto_id'],
					'tipoMovimiento'=>'DE',
					'fechaMovimiento'=>date("Y-m-d H:i:s"),
					'cantidad'=>$cantidad,
					'user_id'=>AuthComponent::user('id')
					);
				$this->Movimientoproducto->create();
				if($this->Movimientoproducto->save($movimientoProducto)){
					$estadoNota='NOTA_GRABADA';	
				}else{
					$estadoNota='ERROR_NOTA';
				}
				

			} else {
				$estadoNota='ERROR_NOTA';
			}
		}		
		$productos = $this->Notadevolucione->Producto->find('list');		
		$this->set(compact('productos','estadoNota'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Notadevolucione->exists($id)) {
			throw new NotFoundException(__('Invalid notadevolucione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Notadevolucione->save($this->request->data)) {
				$this->Session->setFlash(__('The notadevolucione has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notadevolucione could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Notadevolucione.' . $this->Notadevolucione->primaryKey => $id));
			$this->request->data = $this->Notadevolucione->find('first', $options);
		}
		$ventas = $this->Notadevolucione->Ventum->find('list');
		$productos = $this->Notadevolucione->Producto->find('list');
		$users = $this->Notadevolucione->User->find('list');
		$this->set(compact('ventas', 'productos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Notadevolucione->id = $id;
		if (!$this->Notadevolucione->exists()) {
			throw new NotFoundException(__('Invalid notadevolucione'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Notadevolucione->delete()) {
			$this->Session->setFlash(__('The notadevolucione has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The notadevolucione could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
