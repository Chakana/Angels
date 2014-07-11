<?php
App::uses('AppController', 'Controller');
/**
 * Localizaciones Controller
 *
 * @property Localizacione $Localizacione
 * @property PaginatorComponent $Paginator
 */
class LocalizacionesController extends AppController {

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
		$this->Localizacione->recursive = 0;
		$this->set('localizaciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Localizacione->exists($id)) {
			throw new NotFoundException(__('Invalid localizacione'));
		}
		$options = array('conditions' => array('Localizacione.' . $this->Localizacione->primaryKey => $id));
		$this->set('localizacione', $this->Localizacione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Localizacione->create();
			if ($this->Localizacione->save($this->request->data)) {
				$this->Session->setFlash(__('The localizacione has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The localizacione could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Localizacione->exists($id)) {
			throw new NotFoundException(__('Invalid localizacione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Localizacione->save($this->request->data)) {
				$this->Session->setFlash(__('The localizacione has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The localizacione could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Localizacione.' . $this->Localizacione->primaryKey => $id));
			$this->request->data = $this->Localizacione->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Localizacione->id = $id;
		if (!$this->Localizacione->exists()) {
			throw new NotFoundException(__('Invalid localizacione'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Localizacione->delete()) {
			$this->Session->setFlash(__('The localizacione has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The localizacione could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
