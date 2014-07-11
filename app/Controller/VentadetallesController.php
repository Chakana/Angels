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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ventadetalle->recursive = 0;
		$this->set('ventadetalles', $this->Paginator->paginate());
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

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ventadetalle->create();
			if ($this->Ventadetalle->save($this->request->data)) {
				$this->Session->setFlash(__('The ventadetalle has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ventadetalle could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$ventas = $this->Ventadetalle->Venta->find('list');
		$productos = $this->Ventadetalle->Producto->find('list');
		$this->set(compact('ventas', 'productos'));
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
		$this->Ventadetalle->id = $id;
		if (!$this->Ventadetalle->exists()) {
			throw new NotFoundException(__('Invalid ventadetalle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ventadetalle->delete()) {
			$this->Session->setFlash(__('The ventadetalle has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The ventadetalle could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
