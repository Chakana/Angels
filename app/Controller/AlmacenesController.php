<?php
App::uses('AppController', 'Controller');
/**
 * Almacenes Controller
 *
 * @property Almacene $Almacene
 * @property PaginatorComponent $Paginator
 */
class AlmacenesController extends AppController {

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
		$this->Almacene->recursive = 0;
		$this->set('almacenes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Almacene->exists($id)) {
			throw new NotFoundException(__('Invalid almacene'));
		}
		$options = array('conditions' => array('Almacene.' . $this->Almacene->primaryKey => $id));
		$this->set('almacene', $this->Almacene->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Almacene->create();
			if ($this->Almacene->save($this->request->data)) {
				$this->Session->setFlash(__('The almacene has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The almacene could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$encargadosAlmacenes = $this->Almacene->EncargadosAlmacene->find('list');
		$this->set(compact('encargadosAlmacenes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Almacene->exists($id)) {
			throw new NotFoundException(__('Invalid almacene'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Almacene->save($this->request->data)) {
				$this->Session->setFlash(__('The almacene has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The almacene could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Almacene.' . $this->Almacene->primaryKey => $id));
			$this->request->data = $this->Almacene->find('first', $options);
		}
		$encargadosAlmacenes = $this->Almacene->EncargadosAlmacene->find('list');
		$this->set(compact('encargadosAlmacenes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Almacene->id = $id;
		if (!$this->Almacene->exists()) {
			throw new NotFoundException(__('Invalid almacene'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Almacene->delete()) {
			$this->Session->setFlash(__('The almacene has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The almacene could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
