<?php
App::uses('AppController', 'Controller');
/**
 * Productos Controller
 *
 * @property Producto $Producto
 * @property PaginatorComponent $Paginator
 */
class ProductosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Producto','Inventarioproductos','Movimientoproducto');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Producto->recursive = 2;
		$options = array('conditions' => array('Producto.estado'=> 1));
		$this->Paginator->settings = $options;
		$this->set('productos', $this->Paginator->paginate());
		
	}

	public function listadoProductos() {
		$this->Producto->recursive = 2;
		$options = array('conditions' => array('Producto.estado'=> 1),'order' => array('Producto.nombreProducto'=>'asc'));
		$this->Paginator->settings = $options;
		$this->set('productos', $this->Paginator->paginate());
		
	}

	public function listadoProductosInactivos(){
		$this->Producto->recursive = 2;
		$options = array('conditions' => array('Producto.estado'=> 0),'order' => array('Producto.nombreProducto'=>'asc'));
		$this->Paginator->settings = $options;
		$this->set('productos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Producto->exists($id)) {
			throw new NotFoundException(__('Producto Invalido'));
		}
		$options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
		$this->set('producto', $this->Producto->find('first', $options));
		$inventarioProducto = $this->Inventarioproductos->find('all', array('conditions' => array('Inventarioproductos.producto_id' => $id)));		
		$this->set('existencia',$inventarioProducto[0]['Inventarioproductos']['existencia']);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//verificamos si no existe el codigo de barras del producto
			$producto = $this->Producto->find('first',array('conditions' => array('Producto.codigo' => $this->data['Producto']['codigo'])));	
			if($producto != null){
				$this->Session->setFlash(__('Este producto ya existe.'), 'default', array('class' => 'alert alert-danger'));
						
			}else{
				$this->Producto->create();
				if ($this->Producto->save($this->request->data)) {
					//agregamos al inventario su existencia
					$nuevoInventario = array(
						'producto_id'=> $this->Producto->getLastInsertId(),
						'fechaIngreso'=> date("Y-m-d H:i:s"),
						'existencia' => $this->data['Producto']['existencia'],
						'fechaModificacion' => date("Y-m-d H:i:s")
						);
					$this->Inventarioproductos->create();
					$this->Inventarioproductos->save($nuevoInventario);
					//registramos en movimientos 
					$movimientoProducto = array(
						'producto_id'=>$this->Producto->getLastInsertId(),
						'tipoMovimiento'=>'IN',
						'fechaMovimiento'=>date("Y-m-d H:i:s"),
						'cantidad'=>$this->data['Producto']['existencia'],
						'user_id'=>AuthComponent::user('id')
						);
					$this->Movimientoproducto->create();
					$this->Movimientoproducto->save($movimientoProducto);
					$this->Session->setFlash(__('Se ha grabado con exito'), 'default', array('class' => 'alert alert-success'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('No se pudo grabar, por favor intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
				}
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
		if (!$this->Producto->exists($id)) {
			throw new NotFoundException(__('Producto Invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Producto->save($this->request->data)) {
				//actualizamos al inventario su existencia
				$inventario = array(							
					'existencia' => $this->data['Producto']['existencia'],
					'fechaModificacion' => date("Y-m-d H:i:s")
					);
				$this->Inventarioproductos->id=$this->Inventarioproductos->field('id',array('producto_id'=>$id));
				$this->Inventarioproductos->save($inventario);
				//registramos en movimientos 
				$movimientoProducto = array(
					'producto_id'=>$id,
					'tipoMovimiento'=>'MO',
					'fechaMovimiento'=>date("Y-m-d H:i:s"),
					'cantidad'=>$this->data['Producto']['existencia'],
					'user_id'=>AuthComponent::user('id')
					);
				$this->Movimientoproducto->create();
				$this->Movimientoproducto->save($movimientoProducto);

				$this->Session->setFlash(__('Se ha grabado con exito.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo grabar, por favor intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
			$this->request->data = $this->Producto->find('first', $options);
			$inventarioProducto = $this->Inventarioproductos->find('all', array('conditions' => array('Inventarioproductos.producto_id' => $id)));		
			$this->set('existencia',$inventarioProducto[0]['Inventarioproductos']['existencia']);
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
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException(__('Invalid producto'));
		}
		$this->request->onlyAllow('post', 'delete');
		//actualizar estado de producto a 0
		$this->Producto->read(null, $id);
		$this->Producto->set('estado', '0');
		if($this->Producto->save()){
			$this->Session->setFlash(__('El producto ha sido borrado.'), 'default', array('class' => 'alert alert-success'));
		}else{
			$this->Session->setFlash(__('El producto no pudo borrarse, intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
		
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function activarProducto($id=null){
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException(__('Producto Invalido'));
		}
		$this->request->onlyAllow('post', 'activar');
		//actualizar estado de producto a 1
		$this->Producto->read(null, $id);
		$this->Producto->set('estado', '1');
		if($this->Producto->save()){
			$this->Session->setFlash(__('El producto ha sido activado.'), 'default', array('class' => 'alert alert-success'));
		}else{
			$this->Session->setFlash(__('El producto no pudo activarse, intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
		
		}
		return $this->redirect(array('action' => 'listadoProductosInactivos'));	
	}
	public function buscarProducto($cadenaBusqueda=null){
		//$this->autoRender = false; // We don't render a view in this example
		$this->Producto->recursive = 2;
		
		if($cadenaBusqueda==null){
			$options = array('conditions' => array('Producto.estado'=> 1),'order' => array('Producto.nombreProducto'=>'asc'));
		}else{
			$options = array('conditions' => array('Producto.estado'=> 1,'OR'=>array('Producto.codigo LIKE'=>'%'.$cadenaBusqueda.'%','Producto.nombreProducto LIKE'=>'%'.$cadenaBusqueda.'%','Producto.descripcionProducto LIKE'=>'%'.$cadenaBusqueda.'%') ),'order' => array('Producto.nombreProducto'=>'asc'));
		}
		
		$this->Paginator->settings = $options;
		$this->set('productos', $this->Paginator->paginate());
	}

	
	public function obtenerProductoCodigoBarras($codigoBarras) {
    $this->autoRender = false; // We don't render a view in this example
    //$this->request->onlyAllow('ajax'); // No direct access via browser URL
    $producto = null;
    if($codigoBarras!=null AND $codigoBarras!='' AND $codigoBarras!='0'){
    	$producto = $this->Producto->find('first',array('conditions' => array('Producto.codigo' => $codigoBarras)));	
    } 	

    return json_encode($producto);
	}
	public function listaProductosSimple($cadenaBusqueda=null){
		$this->layout = null;
		
		//if ($this->request->is('post')) {
			$this->Producto->recursive = 2;			
			if($cadenaBusqueda==null){
				$options = array('conditions' => array('Producto.estado'=> 1),'order' => array('Producto.nombreProducto'=>'asc'));				
			}else{
				$options = array('conditions' => array('Producto.estado'=> 1,'OR'=>array('Producto.codigo LIKE'=>'%'.$cadenaBusqueda.'%','Producto.nombreProducto LIKE'=>'%'.$cadenaBusqueda.'%','Producto.descripcionProducto LIKE'=>'%'.$cadenaBusqueda.'%') ),'order' => array('Producto.nombreProducto'=>'asc'));		
			}		
			$this->Paginator->settings = $options;
			$this->set('productos', $this->Paginator->paginate());
		//}
		

	}
}
