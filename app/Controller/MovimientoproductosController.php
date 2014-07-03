<?php
App::uses('AppController', 'Controller');
/**
 * Movimientoproductos Controller
 *
 * @property Movimientoproducto $Movimientoproducto
 * @property PaginatorComponent $Paginator
 */
class MovimientoproductosController extends AppController {

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
		$this->Movimientoproducto->recursive = 0;
		$this->set('movimientoproductos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Movimientoproducto->exists($id)) {
			throw new NotFoundException(__('Invalid movimientoproducto'));
		}
		$options = array('conditions' => array('Movimientoproducto.' . $this->Movimientoproducto->primaryKey => $id));
		$this->set('movimientoproducto', $this->Movimientoproducto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Movimientoproducto->create();
			if ($this->Movimientoproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The movimientoproducto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movimientoproducto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$productos = $this->Movimientoproducto->Producto->find('list');
		$users = $this->Movimientoproducto->User->find('list');
		$this->set(compact('productos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Movimientoproducto->exists($id)) {
			throw new NotFoundException(__('Invalid movimientoproducto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Movimientoproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The movimientoproducto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movimientoproducto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Movimientoproducto.' . $this->Movimientoproducto->primaryKey => $id));
			$this->request->data = $this->Movimientoproducto->find('first', $options);
		}
		$productos = $this->Movimientoproducto->Producto->find('list');
		$users = $this->Movimientoproducto->User->find('list');
		$this->set(compact('productos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Movimientoproducto->id = $id;
		if (!$this->Movimientoproducto->exists()) {
			throw new NotFoundException(__('Invalid movimientoproducto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Movimientoproducto->delete()) {
			$this->Session->setFlash(__('The movimientoproducto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The movimientoproducto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
