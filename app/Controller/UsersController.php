<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

public $uses = array('User','Parametros','Vendedore');

public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('add','logout','index','delete');
}

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
        	$id_usuario = AuthComponent::user('id');
			$datos_usuario = $this->User->find('first', array('conditions' => array('User.id' => $id_usuario)));
			$id_grupo = $datos_usuario['User']['group_id'];
			$paramTC = $this->Parametros->find('first',array('conditions'=>array('Parametros.nombreParametro' =>'TipoCambioDolares' )));
			$valorTC = (float)$paramTC['Parametros']['valorParametro'];			
			$this->Session->write('tc', $valorTC);
			$nombreEmpresa = $this->Parametros->find('first',array('conditions'=>array('Parametros.nombreParametro' =>'nombreEmpresa' )));
			$nombreEmpresa = $nombreEmpresa['Parametros']['valorParametro'];			
			$this->Session->write('nombreEmpresa', $nombreEmpresa);
			if($id_grupo == '1') {
				$this->Session->write('perfil', 'vendedor');
				return $this->redirect(array('controller' => 'ventas', 'action' => 'ventaRapida'));
			}

			if($id_grupo == '3') {
				$this->Session->write('perfil', 'admin');				
				return $this->redirect(array('controller' => 'pages', 'action' => 'display','home'));
			}
            //return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Usuario o password invalido,intente de nuevo'));
    }
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}

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
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				//crear vendedor (todos los usuarios del sistema pueden vender?)
				$this->Vendedore->create();
				$vendedor = array(
				'nombreVendedor'=>$this->data['User']['username'],
				'fechaNacimiento'=>date("Y-m-d"),
				'fechaRegistro'=>date("Y-m-d H:i:s"),
				'fechaModificacion'=>date("Y-m-d H:i:s"),
				'DomicilioVendedor'=>'0',
				'telefonoVendedor'=>'0',
				'documentoIdentidad'=>'0',
				'user_id'=>$this->User->getLastInsertID()
				);
				var_dump($vendedor);
				if ($this->Vendedore->save($vendedor)) {
					$this->Session->setFlash(__('Usuario creado exitosamente.'), 'default', array('class' => 'alert alert-success'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('El usuario no pudo ser guardado,intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
				}
			}
		}
		$groups = $this->User->Group->find('list');
		
		$this->set(compact('groups'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido actualizado.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no pudo ser actualizado,por favor intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('El usuario se ha borrado exitosamente.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('El usuario no pudo ser borrado, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
