<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{ 
    function __construct() {
         parent::__construct(); 
    }
    public function Header() {
        // // Logo
        // $img_file = dirname(__FILE__) . '/../../plugins/img/certificatBg.png';
        // // $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // $this->Image($img_file, 0, 0, 450, 310, 'PNG', false, '', true, 300, 'C', false, false, 1, false, true, false);
        // // Set font
        // $this->SetFont('helvetica', 'B', 20);
        // // Title
        // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');

         // get the current page break margin
         $bMargin = $this->getBreakMargin();
         // get current auto-page-break mode
         $auto_page_break = $this->AutoPageBreak;
         // disable auto-page-break
         $this->SetAutoPageBreak(false, 0);
         // set bacground image
         $img_file = '../../plugins/img/certificatBg.png';
 
 
         $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
         // restore auto-page-break status
         $this->SetAutoPageBreak($auto_page_break, $bMargin);
         // set the starting point for the page content
         $this->setPageMark();
    }
        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            // $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
}
/*Author:Tutsway.com */
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */