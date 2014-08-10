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

	    return $pdf->Output('ReporteNotaVenta'.$timeStamp.'.pdf','D');
	}
        
     public function CrearReporteVentaCiudadPDF($parametros) {
        $pdf=new ReporteVentaCiudad();                
        $pdf->AliasNbPages();
        //Primera pagina
        $pdf->AddPage();
        $pdf->SetY(65);               
        $pdf->Contenido($parametros);            
        //escritura
        $timeStamp = date('Y/m/d');     
        $header=array('Ciudad','Cantidad de Ventas','Total de Ventas','Total Deudas');
        $pdf->TablaBasica($header,$parametros);
        return $pdf->Output('ReporteVentaCiudad'.$timeStamp.'.pdf','D');
    }
    
   
    
    public function CrearReporteDeudaPDF($parametros) {   
        
        $pdf=new ReporteDeuda();
        
        $pdf->AliasNbPages();
        //Primera pagina
        $pdf->AddPage();
        $pdf->SetY(65); 
        //escritura
        $timeStamp = date('Y/m/d');     
        $header=array('Nombre Cliente','Direccion ','Ciudad','Total Deuda');       
        $pdf->Contenido($parametros,$header);  
        $pdf->TablaBasica($header,$parametros);
        return $pdf->Output('ReporteDeuda'.$timeStamp.'.pdf','D');
    }
}

 
class ReporteDeuda extends FPDF{
    //private $PG_W = 190;
    function Header(){
        $this->Image(WWW_ROOT.DS.'img/logo.png',150,8,43);   
        $this->SetFont('Times','B',14);      
        //  Cabecera
        $this->Cell(95,35,'CALLTIC SRL',0,0,'L');
        $this->Ln(-10);       
        $this->Cell(95,75,'NIT:',0,1,'L');        
        $this->Cell(95,-55,'DIRECCION:',0,1,'L');
    }
    
   
    
    Function Contenido($parametros){
        $timeStamp = date('Y/m/d');
        $this->SetFont('Times','B',14);
        $this->Ln(-10);
        $this->setX(25);
        $this->Cell(135,25,'Reporte de Deudas por Cliente',0,0,'C');
        $this->Ln(5);
        $this->SetFont('Times','B',10);
        $this->setX(25);
        $this->Cell(135,25,'Al'.' '.$timeStamp,0,0,'C');
        $this->Ln(35);
        //lineas del marco y separacion
        $this->Line(8,55,200,55);
        $this->Line(8,280,200,280);
        $this->Line(8,10,200,10);
        $this->Line(8,10,8,280);
        $this->Line(200,10,200,280);
         
    }
    
   
    Function TablaBasica($header,$parametros){
      //Cabecera
      $totalizar_deuda=0;
      $this->setX(25);
      foreach($header as $col){ 
        $this->Cell(40,9,$col,1);
      }  
      $this->Ln();    
      foreach($parametros as $rowDeuda){    
      $this->setX(25);       
        $this->Cell(40,5,$rowDeuda['nombrecliente'],1);
        $this->Cell(40,5,$rowDeuda['direccion'],1);
        $this->Cell(40,5,$rowDeuda['ciudad'],1);
        $this->Cell(40,5,$rowDeuda['total_deuda'],1);
        $this->Ln();        
        $totalizar_deuda+=(float)$rowDeuda['total_deuda'];
      }
        $this->setX(25);
        $this->Cell(40,5,'TOTALES',1); 
        $this->Cell(40,5,' ',1);
        $this->Cell(40,5,' ',1);
        $this->Cell(40,5,$totalizar_deuda,1);
     }
}

class ReporteVenta extends FPDF{
//cabecera de pagina
    function Header(){
        $this->Image(WWW_ROOT.DS.'img/logo.png',10,8,33);   
        $this->SetFont('Times','B',14);      
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

    function Contenido($parametros){
        $this->SetFont('Arial','B',10);
        $this->Cell(80,10,'CODIGO VENTA:'.$parametros['idventa'],0,1,'L');
        $this->Cell(80,5,'NOMBRE CLIENTE:'.$parametros['nombre_cliente'],0,0,'L');
        $this->Cell(80,5,'DIRECCION:'.$parametros['direccion_cliente'],0,0,'R');
        $this->Ln(-10);
        $this->Cell(80,40,'TELEFONO:'.$parametros['telefono_cliente'],0,0,'L');
        $this->Cell(85,40,'FECHA VENTA:',0,0,'C');
        $this->Cell(-23,40,'/',0,0,'C');
        $this->Cell(-15,40,'/',0,0,'L');
        $this->Ln(-5);
        $this->Cell(80,70,'TOTAL SALDO VENTA:'.$parametros['totalventa'],0,1,'L');
        $this->Ln(5);
           //lineas de fecha venta
        $this->Line(147, 86,152, 86);
        $this->Line(154, 86,161, 86);
        $this->Line(164, 86,171, 86);
        $this->Cell(60,-5,'A/C',0,1,'L');
        $this->Cell(60,20,'Monto',0,0,'C');
        $this->Cell(60,20,'Fecha',0,0,'C');
        $this->Cell(60,30,'Nombre y Firma',0,1,'C');
        $this->Ln(-18);
        $this->Cell(60,20,'A/C',0,1,'L');
        $this->Ln(-18);
        $this->Cell(60,30,'Monto',0,0,'C');
        $this->Cell(60,30,'Fecha',0,0,'C');
        $this->Cell(60,40,'Nombre y Firma',0,1,'C');
        $this->Ln(-20);
        $this->Cell(60,20,'A/C',0,1,'L');
        $this->Ln(-38);
        $this->Cell(60,70,'Monto',0,0,'C');
        $this->Cell(60,70,'Fecha',0,0,'C');
        $this->Cell(60,80,'Nombre y Firma',0,1,'C');
        $this->Ln(-20);
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
        //1er fila
          $this->Line(20,136,70,136);     
        $this->Line(80,136,125,136);         
        $this->Line(140,136,180,136);         
        //2da fila
        $this->Line(20,155,70,155);         
        $this->Line(80,155,125,155);         
        $this->Line(140,155,180,155);         
        //3era fila
        $this->Line(20,177,70,177);         
        $this->Line(80,177,125,177);         
        $this->Line(140,177,180,177);
        //4ta fila
        $this->Line(20,195,70,195);         
        $this->Line(80,195,125,195);         
        $this->Line(140,195,180,195);
        //5ta fila
        $this->Line(20,215,70,215);         
        $this->Line(80,215,125,215);         
        $this->Line(140,215,180,215);        
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
        $this->Cell(180,65,'Fecha de Impresion:'.$fecha2,0,0,'R');
    }    
  }
  
 
  
 class ReporteVentaCiudad extends FPDF
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
        $this->setX(20);
        $this->Cell(160,25,'Reporte de Ventas por Ciudad',0,0,'C');
        $this->Ln(5);
        $this->SetFont('Times','B',10);
        $this->setX(20);
        $this->Cell(160,25,'Al'.' '.$timeStamp,0,0,'C');
        $this->Ln(35);
        
         //lineas del marco y separacion
        $this->Line(8,55,200,55);
        $this->Line(8,280,200,280);
        $this->Line(8,10,200,10);
        $this->Line(8,10,8,280);
        $this->Line(200,10,200,280);
        
        //$this->MultiCell(80,10,$parametros['ciudad_uno'],0,1,'L');
    }
    
    Function TablaBasica($header,$parametros){
        $total_cantidad_ventas=0;
        $total_ventas=0;
        $total_deudas=0;
      //Cabecera
        $this->setX(25);
      foreach($header as $col){
        $this->Cell(40,9,$col,1);
      }
      $this->Ln();  
      foreach ($parametros as $rowVentaCiudad) {
        $this->setX(25);
          $this->Cell(40,5,$rowVentaCiudad['ciudad'],1);
          $this->Cell(40,5,$rowVentaCiudad['cantidad_ventas'],1);
          $this->Cell(40,5,$rowVentaCiudad['total_ventas'],1);
          $this->Cell(40,5,$rowVentaCiudad['total_deudas'],1);
          $this->Ln();
          $total_cantidad_ventas += (float)$rowVentaCiudad['cantidad_ventas'];
          $total_ventas += (float)$rowVentaCiudad['total_ventas'];
          $total_deudas += (float)$rowVentaCiudad['total_deudas'];
      }  

      $this->setX(25);
      $this->Cell(40,5,'TOTALES',1); 
      $this->Cell(40,5,$total_cantidad_ventas,1);
      $this->Cell(40,5,$total_ventas,1);
      $this->Cell(40,5,$total_deudas,1);
   }
   
}



?>