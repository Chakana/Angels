<<?php
App::uses('AppController', 'Controller');
class VentasTestsController extends AppController  
    { 
        public $helpers = array('reportes');
        
        function indexPdf() 
        { 
            $this->layout = 'pdf';
        $parametrosReporteVenta=array(
                //'idventa' => 'NV0001',
                //'nombre_cliente' => 'Victor Perez',
                //'direccion_cliente' => 'Calle Goitia 2033',
                //'totalventa' => '2000 Bs',
                //'telefono_cliente' => '34333434',
                'ciudad_uno'=>'La Paz',
                'cantidad_ventas'=>200,
                 'total_ventas'=>40000,
                 'total_deudas'=>2500,
                 'ciudad_dos'=>'Cochabamba',
                'cantidad_ventasdos'=>150,
                 'total_ventasdos'=>20000,
                 'total_deudasdos'=>1500,
                 );      
            $this->set('parametrosReporteVenta',$parametrosReporteVenta);
            /*$parametrosReporteVentaCiudad=array(
           
                'ciudad_uno'=>'La Paz',
                'cantidad_ventas'=>200,
                 'total_ventas'=>40000,
                 'total_deudas'=>2500,
                 'ciudad_dos'=>'Cochabamba',
                'cantidad_ventasdos'=>150,
                 'total_ventasdos'=>20000,
                 'total_deudasdos'=>1500,
                 );      
            */
            //$this->set('parametrosReporteVentaCiudad',$parametrosReporteVentaCiudad);
            $this->render();
            

        } 


    } 
?>