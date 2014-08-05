<?php
App::uses('AppHelper', 'View/Helper');
App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));


class reportesHelper extends AppHelper {

	var $title; 
	function setup ($orientation='P',$unit='mm',$format='A4') { 
	    $this->FPDF($orientation, $unit, $format);  
	} 
	 
	function fpdfOutput ($name = 'page.pdf', $destination = 's') { 
	    return $this->Output($name, $destination); 
	} 
	 
	
	public function CrearReporteVentaPDF($parametros) {	  
	  	$pdf=new ReporteVenta();	  
	    $pdf->AliasNbPages();
	    //Primera pagina
	    $pdf->AddPage();	    
	    $pdf->SetY(65);	    
	    $pdf->Contenido($parametros);    
	    //escritura
	    // $pdf->AddPage(); 
	    $timeStamp = date('Ymd');	    

	    return $pdf->Output('ReporteVenta'.$timeStamp.'.pdf','D');
	}
}

 


class ReporteVenta extends FPDF
{
//cabecera de pagina
    function Header()
    {
    	$this->Image(WWW_ROOT.DS.'img/logo.png',10,8,33);   
        $this->SetFont('Arial','B',14);        
        //  Cabecera  
        $this->Cell(60,10,'CALLTIC SRL',0,0,'L');
        $this->Cell(60,10,'FECHA:',0,0,'R');
        $this->Ln(-10);
             
        $this->Cell(60,40,'NIT:',0,1,'L');
        $this->Ln(0);
        $this->Cell(60,-30,'DIRECCION:',0,1,'L');
        $this->Ln(0);
         //lineas del encabezado
	    $this->Line(130, 17,170, 17);	    
	    $this->Line(20, 22,55, 22);	    
	    $this->Line(35, 27,75, 27);	    
	    $this->Line(10,45,180,45); 	    
        
    }

    function Contenido($parametros)
    {        

        $this->SetFont('Arial','B',10);
        $this->Cell(80,10,'CODIGO VENTA:'.$parametros['idventa'],0,1,'L');
        $this->Cell(80,10,'NOMBRE CLIENTE:'.$parametros['nombre_cliente'],0,0,'L');
        $this->Cell(80,10,'DIRECCION:'.$parametros['direccion_cliente'],0,0,'R');
        $this->Ln(-10);
        $this->Cell(80,50,'TOTAL SALDO VENTA:'.$parametros['totalventa'],0,1,'L');
        $this->Ln(10);
        
        $this->Cell(60,10,'A/C',0,1,'L');
        $this->Cell(60,10,'Monto',0,0,'C');
        $this->Cell(60,10,'Fecha',0,0,'C');
        $this->Cell(60,10,'Firma',0,0,'R');
        $this->Ln(-10);
        
        $this->Cell(60,50,'A/C',0,1,'L');
        $this->Ln(-38);
        $this->Cell(60,50,'Monto',0,0,'C');
        $this->Cell(60,50,'Fecha',0,0,'C');
        $this->Cell(60,50,'Firma',0,0,'R');
        $this->Ln(-10);
        
        $this->Cell(60,90,'A/C',0,1,'L');
        $this->Ln(-75);
        $this->Cell(60,80,'Monto',0,0,'C');
        $this->Cell(60,80,'Fecha',0,0,'C');
        $this->Cell(60,80,'Firma',0,0,'R');
        $this->Ln(-5);
        
        
        $this->Cell(60,110,'A/C',0,1,'L');
        $this->Cell(60,-95,'Monto',0,0,'C');
        $this->Cell(60,-95,'Fecha',0,0,'C');
        $this->Cell(60,-95,'Firma',0,0,'R');
        $this->Ln(35);
        
        $this->Cell(60,-140,'A/C',0,1,'L');
        $this->Ln(70);
        $this->Cell(60,10,'Monto',0,0,'C');
        $this->Cell(60,10,'Fecha',0,0,'C');
        $this->Cell(60,10,'Firma',0,0,'R');

        //lineas del 3er parrafo
	    $this->Line(20,135,70,135); 
	    $this->Line(80,135,125,135); 
	    $this->Line(165,135,200,135); 
	    $this->Line(20,155,70,155); 
	    $this->Line(80,155,125,155); 
	    $this->Line(165,155,200,155); 
	    $this->Line(20,176,70,176); 
	    $this->Line(80,176,125,176); 
	    $this->Line(165,176,200,176); 
	    $this->Line(20,196,70,196); 
	    $this->Line(80,196,125,196); 
	    $this->Line(165,196,200,196); 
	    $this->Line(20,215,70,215); 
	    $this->Line(80,215,125,215); 
	    $this->Line(165,215,200,215); 


	    //linea separacion
	    $this->Line(10,115,180,115);
    }
    
  }

?>