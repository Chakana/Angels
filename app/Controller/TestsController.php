<?php
App::uses('AppController', 'Controller');
class TestsController extends AppController  
    { 
        public $helpers = array('reportes');
        
        function indexPdf() 
        { 
            $this->layout = 'pdf';
            $parametrosReporteVenta=array(
                'idventa' => 'NV0001',
                'nombre_cliente' => 'Victor Perez',
                'direccion_cliente' => 'Calle Goitia 2033',
                'totalventa' => '2000 Bs',
                'telefono_cliente' => '34333434'
                 );      
            $this->set('parametrosReporteVenta',$parametrosReporteVenta);      
             
            
            $this->render();
            

        } 


    } 
?>