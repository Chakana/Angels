<?php
App::uses('AppController', 'Controller');
/**
 * Encargadosalmacenes Controller
 *
 * @property Encargadosalmacene $Encargadosalmacene
 * @property PaginatorComponent $Paginator
 */
class EncargadosalmacenesController extends AppController {

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
		$this->Encargadosalmacene->recursive = 0;
		$this->set('encargadosalmacenes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Encargadosalmacene->exists($id)) {
			throw new NotFoundException(__('Invalid encargadosalmacene'));
		}
		$options = array('conditions' => array('Encargadosalmacene.' . $this->Encargadosalmacene->primaryKey => $id));
		$this->set('encargadosalmacene', $this->Encargadosalmacene->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Encargadosalmacene->create();
			if ($this->Encargadosalmacene->save($this->request->data)) {
				$this->Session->setFlash(__('The encargadosalmacene has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The encargadosalmacene could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->Encargadosalmacene->User->find('list');
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
		if (!$this->Encargadosalmacene->exists($id)) {
			throw new NotFoundException(__('Invalid encargadosalmacene'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Encargadosalmacene->save($this->request->data)) {
				$this->Session->setFlash(__('The encargadosalmacene has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The encargadosalmacene could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Encargadosalmacene.' . $this->Encargadosalmacene->primaryKey => $id));
			$this->request->data = $this->Encargadosalmacene->find('first', $options);
		}
		$users = $this->Encargadosalmacene->User->find('list');
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
		$this->Encargadosalmacene->id = $id;
		if (!$this->Encargadosalmacene->exists()) {
			throw new NotFoundException(__('Invalid encargadosalmacene'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Encargadosalmacene->delete()) {
			$this->Session->setFlash(__('The encargadosalmacene has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The encargadosalmacene could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
