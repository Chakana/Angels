
<?php
require '/fpdf/fpdf.php';


class PDF extends FPDF
{
//cabecera de pagina
    function Header()
    {
        
        
        $this->SetFont('Arial','B',10);
        
        //  Cabecera  
        $this->Cell(60,10,'CALLTIC SRL',0,0,'L');
        $this->Cell(60,10,'FECHA:',0,0,'R');
        $this->Ln(-10);
             
        $this->Cell(60,40,'NIT:',0,1,'L');
        $this->Ln(0);
        $this->Cell(60,-30,'DIRECCION:',0,1,'L');
        $this->Ln(0);
        
    }

    function Contenido()
    {
        $idventa=2232;
        $nombre_cliente='Juan Rodriguez ';
        $direccion_cliente='Calle Buenos Aires #525';
        $totalventa=1800;   
        
        $this->SetFont('Arial','B',10);
        $this->Cell(80,10,'CODIGO VENTA:'.$idventa,0,1,'L');
        $this->Cell(80,10,'NOMBRE CLIENTE:'.$nombre_cliente,0,0,'L');
        $this->Cell(80,10,'DIRECCION:'.$direccion_cliente,0,0,'R');
        $this->Ln(-10);
        $this->Cell(80,50,'TOTAL SALDO VENTA:'.$totalventa,0,1,'L');
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
        
        
         
    }
    
  }
  
   $pdf=new PDF();
  
    $pdf->AliasNbPages();
    //Primera pagina
    $pdf->AddPage();
    
    $pdf->SetY(65);
    
    $pdf->Contenido();    
    //lineas del encabezado
    $pdf->Line(130, 17,170, 17);
    
    $pdf->Line(20, 22,55, 22);
    
    $pdf->Line(35, 27,75, 27);
    
    $pdf->Line(10,45,180,45); 
    
    //linea separacion
    $pdf->Line(10,115,180,115); 
    
    //lineas del 3er parrafo
    $pdf->Line(20,135,70,135); 
    
    $pdf->Line(80,135,125,135); 
    
    $pdf->Line(165,135,200,135); 
    
    $pdf->Line(20,155,70,155); 
    
    $pdf->Line(80,155,125,155); 
    
    $pdf->Line(165,155,200,155); 
    
    $pdf->Line(20,176,70,176); 
    
    $pdf->Line(80,176,125,176); 
    
    $pdf->Line(165,176,200,176); 
    
    $pdf->Line(20,196,70,196); 
    
    $pdf->Line(80,196,125,196); 
    
    $pdf->Line(165,196,200,196); 
    
    $pdf->Line(20,215,70,215); 
    
    $pdf->Line(80,215,125,215); 
    
    $pdf->Line(165,215,200,215); 
    
    //escritura
    $pdf->Output();
    
?>
