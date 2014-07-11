<?php
App::uses('AppController', 'Controller');
/**
 * Vendedores Controller
 *
 * @property Vendedore $Vendedore
 * @property PaginatorComponent $Paginator
 */
class VendedoresController extends AppController {

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
		$this->Vendedore->recursive = 0;
		$this->set('vendedores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vendedore->exists($id)) {
			throw new NotFoundException(__('Invalid vendedore'));
		}
		$options = array('conditions' => array('Vendedore.' . $this->Vendedore->primaryKey => $id));
		$this->set('vendedore', $this->Vendedore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vendedore->create();
			if ($this->Vendedore->save($this->request->data)) {
				$this->Session->setFlash(__('The vendedore has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vendedore could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->Vendedore->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Vendedore->exists($id)) {
			throw new NotFoundException(__('Invalid vendedore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vendedore->save($this->request->data)) {
				$this->Session->setFlash(__('The vendedore has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vendedore could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Vendedore.' . $this->Vendedore->primaryKey => $id));
			$this->request->data = $this->Vendedore->find('first', $options);
		}
		$users = $this->Vendedore->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Vendedore->id = $id;
		if (!$this->Vendedore->exists()) {
			throw new NotFoundException(__('Invalid vendedore'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Vendedore->delete()) {
			$this->Session->setFlash(__('The vendedore has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The vendedore could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
