<?php
App::uses('AppController', 'Controller');
class TestsController extends AppController  
    { 
        public $helpers = array('reportes');
        
        function indexPdf() 
        { 
            $this->layout = 'pdf';
        $parametrosReporteDeuda=array(
                
                'nombrecliente_uno'=>'Jose Carrasco',
                'direccion'=>'Otero de la Vega 343',
                 'ciudad'=>'La Paz',
                 'total_deuda'=>400,
                 'nombrecliente_dos'=>'Margarita Loza',
                'direccion_dos'=>'Rios Perez 383',
                 'ciudad_dos'=>'Cochabamba',
                 'total_deudados'=>5000,
                 );      
            $this->set('parametrosReporteDeuda',$parametrosReporteDeuda);
            
            $this->render();
            

        } 


    } 
?>