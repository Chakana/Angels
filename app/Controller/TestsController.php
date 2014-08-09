<?php
App::uses('AppController', 'Controller');
class TestsController extends AppController  
    { 
        public $helpers = array('reportes');
        
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

            /*'ciudad_uno'=>'La Paz',
            'cantidad_ventas'=>200,
            'total_ventas'=>40000,
            'total_deudas'=>3500,
            'ciudad_dos'=>'Cochabamba',
            'cantidad_ventasdos'=>150,
            'total_ventasdos'=>20000,
            'total_deudasdos'=>1500,   */
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


    } 
?>