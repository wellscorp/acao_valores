<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 11/03/2015
 * Time: 23:33
 */

namespace Base\Pdf;

use Base\Pdf\FPDF;

class zendPdf extends FPDF {

    public function __construct()
    {
        parent::FPDF();
    }
    //Page footer
    function Footer()
    {
        //Position at 1.5 cm from bottom
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial','I',8);
        //Page number
        $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
        $this->Cell(0,10,'Smart Client',0,0,'R');
    }
} 