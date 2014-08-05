<?php
App::uses('AppHelper', 'View/Helper');

App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));

if (!defined('PARAGRAPH_STRING')) define('PARAGRAPH_STRING', '~~~');

class pdfHelper extends AppHelper {

	/**
	* Allows you to change the defaults set in the FPDF constructor
	*
	* @param string $orientation page orientation values: P, Portrait, L, or Landscape (default is P)
	* @param string $unit values: pt (point 1/72 of an inch), mm, cm, in. Default is mm
	* @param string $format values: A3, A4, A5, Letter, Legal or a two element array with the width and height in unit given in $unit
	*/
	

	var $title; 
	function setup ($orientation='P',$unit='mm',$format='A4') { 
	    $this->FPDF($orientation, $unit, $format);  
	} 
	 
	function fpdfOutput ($name = 'page.pdf', $destination = 's') { 
	    return $this->Output($name, $destination); 
	} 
	 
	function Header() 
	{ 
	    //Logo 
	    $this->Image(WWW_ROOT.DS.'img/logo.png',10,8,33);   
	    // you can use jpeg or pngs see the manual for fpdf for more info 
	    //Arial bold 15 
	    $this->SetFont('Arial','B',15); 
	    //Move to the right 
	    $this->Cell(80); 
	    //Title 
	    $this->Cell(30,10,$this->title,1,0,'C'); 
	    //Line break 
	    $this->Ln(20); 
	} 

	//Page footer 
	function Footer() 
	{ 
	    //Position at 1.5 cm from bottom 
	    $this->SetY(-15); 
	    //Arial italic 8 
	    $this->SetFont('Arial','I',8); 
	    //Page number 
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C'); 
	} 
} 
?>