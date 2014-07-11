<?php
App::uses('AppController', 'Controller');
/**
 * Inventarioproductos Controller
 *
 * @property Inventarioproducto $Inventarioproducto
 * @property PaginatorComponent $Paginator
 */
class InventarioproductosController extends AppController {

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
		$this->Inventarioproducto->recursive = 0;
		$this->set('inventarioproductos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Inventarioproducto->exists($id)) {
			throw new NotFoundException(__('Invalid inventarioproducto'));
		}
		$options = array('conditions' => array('Inventarioproducto.' . $this->Inventarioproducto->primaryKey => $id));
		$this->set('inventarioproducto', $this->Inventarioproducto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Inventarioproducto->create();
			if ($this->Inventarioproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The inventarioproducto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventarioproducto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$productos = $this->Inventarioproducto->Producto->find('list');
		$this->set(compact('productos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Inventarioproducto->exists($id)) {
			throw new NotFoundException(__('Invalid inventarioproducto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Inventarioproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The inventarioproducto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventarioproducto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Inventarioproducto.' . $this->Inventarioproducto->primaryKey => $id));
			$this->request->data = $this->Inventarioproducto->find('first', $options);
		}
		$productos = $this->Inventarioproducto->Producto->find('list');
		$this->set(compact('productos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Inventarioproducto->id = $id;
		if (!$this->Inventarioproducto->exists()) {
			throw new NotFoundException(__('Invalid inventarioproducto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Inventarioproducto->delete()) {
			$this->Session->setFlash(__('The inventarioproducto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The inventarioproducto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
