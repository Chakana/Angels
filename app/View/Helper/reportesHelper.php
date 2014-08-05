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
        $this->SetFont('Times','B',14);      
        //  Cabecera  
        //  Cabecera  
        $this->Cell(60,15,'CALLTIC SRL',0,0,'L');
        
        $this->Ln(-10);
             
        $this->Cell(60,45,'NIT:',0,1,'L');
        $this->Ln(0);
        $this->Cell(60,-35,'DIRECCION:',0,1,'L');
        $this->Ln(0);
         //lineas del encabezado
	   
        $this->Line(22, 24,55, 24);
        
        $this->Line(42, 29,90, 29); 	  

        
    }

    function Contenido($parametros)
    {        

        $this->SetFont('Arial','B',10);
        $this->Cell(80,10,'CODIGO VENTA:'.$parametros['idventa'],0,1,'L');
        $this->Cell(80,5,'NOMBRE CLIENTE:'.$parametros['nombre_cliente'],0,0,'L');
        $this->Cell(80,5,'DIRECCION:'.$parametros['direccion_cliente'],0,0,'R');
        $this->Ln(-10);
         $this->Cell(80,30,'TELEFONO:'.$parametros['telefono_cliente'],0,0,'L');
        $this->Cell(60,30,'FECHA VENTA:',0,0,'C');
        $this->Cell(-18,30,'/',0,0,'C');
        $this->Cell(32,30,'/',0,0,'C');
        $this->Ln(-5);
        $this->Cell(80,55,'TOTAL SALDO VENTA:'.$parametros['totalventa'],0,1,'L');
        $this->Ln(10);

        $this->Line(135, 86,140, 86);
        $this->Line(142, 86,147, 86);
        $this->Line(149, 86,156, 86);

        
        $this->Cell(60,10,'A/C',0,1,'L');
        $this->Cell(60,10,'Monto',0,0,'C');
        $this->Cell(60,10,'Fecha',0,0,'C');
        $this->Cell(60,20,'Nombre y Firma',0,1,'C');
        $this->Ln(-10);
        
        $this->Cell(60,30,'A/C',0,1,'L');
        $this->Ln(-28);
        $this->Cell(60,30,'Monto',0,0,'C');
        $this->Cell(60,30,'Fecha',0,0,'C');
        $this->Cell(60,40,'Nombre y Firma',0,1,'C');
        $this->Ln(-15);
        
        $this->Cell(60,20,'A/C',0,1,'L');
        $this->Ln(-38);
        $this->Cell(60,70,'Monto',0,0,'C');
        $this->Cell(60,70,'Fecha',0,0,'C');
        $this->Cell(60,80,'Nombre y Firma',0,1,'C');
        $this->Ln(-15);
        
        
        $this->Cell(60,-25,'A/C',0,1,'L');
        $this->Cell(60,38,'Monto',0,0,'C');
        $this->Cell(60,38,'Fecha',0,0,'C');
        $this->Cell(60,48,'Nombre y Firma',0,1,'C');
        $this->Ln(5);
        
        $this->Cell(60,-35,'A/C',0,1,'L');
        $this->Ln(10);
        $this->Cell(60,20,'Monto',0,0,'C');
        $this->Cell(60,20,'Fecha',0,0,'C');
        $this->Cell(60,30,'Nombre y Firma',0,1,'C');
        $this->Ln(5);

        //lineas del 3er parrafo
	    $this->Line(20,140,70,140);     
        $this->Line(80,140,125,140);         
        $this->Line(140,140,180,140);         
        $this->Line(20,165,70,165);         
        $this->Line(80,165,125,165);         
        $this->Line(140,165,180,165);         
        $this->Line(20,190,70,190);         
        $this->Line(80,190,125,190);         
        $this->Line(140,190,180,190);         
        $this->Line(20,212,70,212);         
        $this->Line(80,212,125,212);         
        $this->Line(140,212,180,212);         
        $this->Line(20,235,70,235);         
        $this->Line(80,235,125,235);         
        $this->Line(140,235,180,235);        
        $this->SetLineWidth(0.8);
        $newline=$this->Line(8,280,200,280);
        $newline2=$this->Line(8,10,200,10);
        $newline3=$this->Line(8,10,8,280);
        $newline4=$this->Line(200,10,200,280);
	    //linea separacion
	    $this->Line(8,115,200,115); 
        $this->Line(8,45,200,45); 
    }
    function Footer() {
        parent::Footer();
        
        $fecha2= date ("j/n/Y");
        $this->SetFont('Arial','B',5);
     
        $this->Cell(180,20,'Fecha de Impresion:'.$fecha2,0,0,'R');
    }

    
  }

?>