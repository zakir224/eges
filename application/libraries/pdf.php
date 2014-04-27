<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf.php');
class Pdf extends FPDF
{
    // Extend FPDF using this class
    // More at fpdf.org -> Tutorials


    function __construct($orientation='P', $unit='mm', $size='A4')
    {
        // Call parent constructor
        parent::__construct($orientation,$unit,$size);
    }

    // Page header
    function Header()
    {
        // Logo
        $this->Image('images/sample7.png',60,6,80);
        // Arial bold 15
        $this->SetFont('Arial','B',10);
        // Move to the right
        $this->Cell(80);
        // Title
        //$this->Cell(60,10,"Attachment",5,0,'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
?>