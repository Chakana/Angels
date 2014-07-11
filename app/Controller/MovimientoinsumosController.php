<?php
App::uses('AppController', 'Controller');
/**
 * Movimientoinsumos Controller
 *
 * @property Movimientoinsumo $Movimientoinsumo
 * @property PaginatorComponent $Paginator
 */
class MovimientoinsumosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Movimientoinsumo->recursive = 0;
		$this->set('movimientoinsumos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Movimientoinsumo->exists($id)) {
			throw new NotFoundException(__('Invalid movimientoinsumo'));
		}
		$options = array('conditions' => array('Movimientoinsumo.' . $this->Movimientoinsumo->primaryKey => $id));
		$this->set('movimientoinsumo', $this->Movimientoinsumo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Movimientoinsumo->create();
			if ($this->Movimientoinsumo->save($this->request->data)) {
				$this->Session->setFlash(__('The movimientoinsumo has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movimientoinsumo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$insumos = $this->Movimientoinsumo->Insumo->find('list');
		$almacenes = $this->Movimientoinsumo->Almacene->find('list');
		$encargadosAlmacenes = $this->Movimientoinsumo->EncargadosAlmacene->find('list');
		$this->set(compact('insumos', 'almacenes', 'encargadosAlmacenes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Movimientoinsumo->exists($id)) {
			throw new NotFoundException(__('Invalid movimientoinsumo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Movimientoinsumo->save($this->request->data)) {
				$this->Session->setFlash(__('The movimientoinsumo has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movimientoinsumo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Movimientoinsumo.' . $this->Movimientoinsumo->primaryKey => $id));
			$this->request->data = $this->Movimientoinsumo->find('first', $options);
		}
		$insumos = $this->Movimientoinsumo->Insumo->find('list');
		$almacenes = $this->Movimientoinsumo->Almacene->find('list');
		$encargadosAlmacenes = $this->Movimientoinsumo->EncargadosAlmacene->find('list');
		$this->set(compact('insumos', 'almacenes', 'encargadosAlmacenes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Movimientoinsumo->id = $id;
		if (!$this->Movimientoinsumo->exists()) {
			throw new NotFoundException(__('Invalid movimientoinsumo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Movimientoinsumo->delete()) {
			$this->Session->setFlash(__('The movimientoinsumo has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The movimientoinsumo could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
