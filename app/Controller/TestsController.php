<?php
App::uses('AppController', 'Controller');
class TestsController extends AppController  
    { 
        public $helpers = array('reportes');
        public $components = array('RequestHandler');
        public $uses = array('Pago');
        function TestReporteNotaVenta() 
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
       function TestReporteVentaCiudad()
       {
           $this->layout= 'pdf';
           $parametrosReporteVentaCiudad =array(           
            array(
                'ciudad'=>'La Paz',
                'cantidad_ventas'=>200,
                'total_ventas'=>40000,
                'total_deudas'=>3500
                ),
            array(
                'ciudad'=>'Cochabamba',
                'cantidad_ventas'=>300,
                'total_ventas'=>5600,
                'total_deudas'=>350
                )

        );
           $this->set('parametrosReporteVentaCiudad',$parametrosReporteVentaCiudad);           
       }
        function TestReporteDeuda(){
            $this->layout = 'pdf';
            $parametrosReporteDeuda=array(
                array(
                'nombrecliente'=>'Jose Carrasco',
                'direccion'=>'Otero de la Vega 343',
                'ciudad'=>'La Paz',
                'total_deuda'=>400.45           
                    ),
                array(
                'nombrecliente'=>'Luisa Molina',
                'direccion'=>'antonimo 343',
                'ciudad'=>'Cochabamba',
                'total_deuda'=>200.90
                    )
                );                  
            $this->set('parametrosReporteDeuda',$parametrosReporteDeuda);            
            $this->render();
        }

        function TestJSON(){ 
             /*$parametrosReporteDeuda=array(
                array(
                'nombrecliente'=>'Jose Carrasco',
                'direccion'=>'Otero de la Vega 343',
                'ciudad'=>'La Paz',
                'total_deuda'=>400.45           
                    ),
                array(
                'nombrecliente'=>'Luisa Molina',
                'direccion'=>'antonimo 343',
                'ciudad'=>'Cochabamba',
                'total_deuda'=>200.90
                    )
                );         
            $this->set('parametrosReporteDeuda',$parametrosReporteDeuda);         
            $this->set('_serialize', array('parametrosReporteDeuda'));*/
            $pagos = $this->Pago->find('all');
            $results = (Set::extract('/Pago/.', $pagos));

            $this->set('pagos',$pagos);
            //$this->set('parametrosReporteDeuda',$results);
        }

        function AjaxCall(){

            $this->autoRender=false; 
            if($this->RequestHandler->isAjax()){       
                $data=$this->request->input('json_decode', 'true');          
                return json_encode($data);
            }
        }


    } 
?>