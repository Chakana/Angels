<?php
App::uses('AppHelper', 'View/Helper');
App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));


class reportesVentaHelper extends AppHelper {

	var $title; 
	function setup ($orientation='P',$unit='mm',$format='A4') { 
	    $this->FPDF($orientation, $unit, $format);  
	} 
	 
	function fpdfOutput ($name = 'page.pdf', $destination = 's') { 
	    return $this->Output($name, $destination); 
	} 
	 
	
	public function CrearReporteVentaPDF($parametros) {	  
	  	//$pdf=new ReporteVenta();
                $pdf=new ReporteVentaporCiudad();
                
	    $pdf->AliasNbPages();
	    //Primera pagina
	    $pdf->AddPage();
            $pdf->SetY(65);
               
	    $pdf->Contenido($parametros);
            
	    //escritura
	    //$pdf->AddPage(); $pdf->SetY(65);
             
            
	    $timeStamp = date('Y/m/d');	    
            $header=array('Ciudad','Cantidad de Ventas ','Total de Ventas','Total Deudas');
            $pdf->TablaBasica($header,$parametros);
	    return $pdf->Output('ReporteVentaCiudad'.$timeStamp.'.pdf','D');
            
            
            
           
	}
        
        
}

   class ReporteVentaporCiudad extends FPDF
    {
    //private $PG_W = 190;
    function Header()
    {
    	$this->Image(WWW_ROOT.DS.'img/logo.png',150,8,43);   
        $this->SetFont('Times','B',14);      
        //  Cabecera  
       
        $this->Cell(95,35,'CALLTIC SRL',0,0,'L');
        $this->Ln(-10);
       
        $this->Cell(95,75,'NIT:',0,1,'L');
        
        $this->Cell(95,-55,'DIRECCION:',0,1,'L');
        
         //lineas del encabezado
	   
        //$this->Line(22, 24,55, 24);
        
        //$this->Line(42, 29,90, 29); 	  

        
    }
    
    Function Contenido($parametros)
    {
        $timeStamp = date('Y/m/d');
        $this->SetFont('Times','B',14);
        $this->Ln(-10);
         $this->Cell(135,25,'Reporte de Ventas por Ciudad',0,0,'C');
         $this->Ln(5);
         $this->SetFont('Times','B',10);
         $this->Cell(135,25,'Al'.' '.$timeStamp,0,0,'C');
          $this->Ln(35);
         //lineas del marco y separacion
        $this->Line(8,55,200,55);
        $this->Line(8,280,200,280);
        $this->Line(8,10,200,10);
        $this->Line(8,10,8,280);
        $this->Line(200,10,200,280);
        
        //$this->MultiCell(80,10,$parametros['ciudad_uno'],0,1,'L');
    }
    
    Function TablaBasica($header,$parametros)
    
   {
      
    //Cabecera
    foreach($header as $col)
    
    $this->Cell(40,9,$col,1);
    $this->Ln();
    
      $this->Cell(40,5,$parametros['ciudad_uno'],1);
      $this->Cell(40,5,$parametros['cantidad_ventas'],1);
      $this->Cell(40,5,$parametros['total_ventas'],1);
      $this->Cell(40,5,$parametros['total_deudas'],1);
      $this->Ln();
      $this->Cell(40,5,$parametros['ciudad_dos'],1);
      $this->Cell(40,5,$parametros['cantidad_ventasdos'],1);
      $this->Cell(40,5,$parametros['total_ventasdos'],1);
      $this->Cell(40,5,$parametros['total_deudasdos'],1);
      $this->Ln();
      $this->Cell(40,5,'TOTALES',1); 
      $this->Cell(40,5,$parametros['cantidad_ventas']+$parametros['cantidad_ventasdos'],1);
       $this->Cell(40,5,$parametros['total_ventas']+$parametros['total_ventasdos'],1);
       $this->Cell(40,5,$parametros['total_deudas']+$parametros['total_deudasdos'],1);
   }
  
}


  