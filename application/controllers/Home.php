<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('DB');

  }

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index($etat = false)
  {
    $data['etat'] = $etat;
    $data['seminar'] = $this->DB->selectSeminar();

    $this->load->view('home', $data);
  }

  public function testQR($id = false, $key = false)
  {
    //$id : seminar's id
    //key : generated key

    if ($id) {
      if ($this->DB->check_key($key) == true) {
        $data['id'] = $id;
        $this->load->view('test', $data);

      } else {
        $this->index(true);
      }


    } else {

      $this->index(true);
    }

  }
  public function get_qr_code()
  {
    // retrieve the latest unique key from the database
    $unique_key = $this->DB->generate_unique_key();
    $idSem = $this->input->post('idSem');
    $linkQr = base_url() . 'home/testQr/' . $idSem . '/' . $unique_key;

    // send the link back to the client
    // echo $linkQr;
    echo json_encode($linkQr);
  }
  public function login()
  {
    $data['name'] = $this->input->post('name');
    $data['idSeminar'] = $this->input->post('idSem');
    // $data['date'] = date('Y-m-d H:i:s');
    $idUsr = $this->DB->insertInscrit($data);
    $data['id'] = $idUsr;
    // $this->load->view('login', $data);
    // $this->printCertificat($idUsr);
    redirect('home/printCertificat/' . $idUsr);
  }

  public function printCertificat($inscritId = false)
  {
    $inscrit = $this->DB->selectInscrit($inscritId);
    if ($inscrit == null || $inscritId == false)
      $this->index(true);
    else {
      $seminar = $this->DB->selectSeminar($inscrit->idSeminar);
      if ($seminar == null) {
        $this->index(true);
      } else {
        $this->load->library('Pdf');

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetFont('aealarabiya', '', 18);
        // set document information

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('');
        $pdf->SetTitle('شهادة');
        $pdf->SetSubject('تحميل شهادة');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');


        $pdf->SetHeaderData(false, true, $inscrit->date, '2023/2024', array(0, 0, 0), array(0, 0, 0));
        $pdf->setFooterData(false, false, 'date', '', array(0, 0, 0), array(0, 0, 0));

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->setRTL(true);
        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


        // set margins
        $pdf->SetFooterMargin(-1);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 0);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
          require_once (dirname(__FILE__) . '/lang/eng.php');
          $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        $pdf->setCellPaddings(20, 0, 15, 0);
        $pdf->SetMargins(0, 0, 0, 0);

        // -- set new background ---


        $pdf->AddPage('L', 'A4');
        $pdf->SetY(50);
        $img_file = dirname(__FILE__) . '/../../plugins/img/certif.png';
        // $pdf->Image($img_file, 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), 'JPG', '', '', true, 300, '', false, false, 0);
        $pdf->Image($img_file, 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), 'PNG', false, '', true, 300, 'C', false, false, 1, false, true, false);
        $pdf->setPageMark(); //to make the image in the background

        $style = array(
          'border' => 0,
          'padding' => 0,
          'fgcolor' => array(0, 0, 0),
          // 'bgcolor' => array(0,61,125), //array(254,1,1)
          'module_width' => 100, // width of a single module in points
          'module_height' => 100 // height of a single module in points
        );
        // Set the locale to Arabic
          // $date = date_create($seminar->date);
          $date = new DateTime($seminar->date);

          $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "ماي", "Jun" => "يونيو", "Jul" => "يوليوز", "Aug" => "غشت", "Sep" => "شتنبر", "Oct" => "أكتوبر", "Nov" => "نونبر", "Dec" => "دجنبر");
          $your_date = $date->format('y-m-d'); // The Current Date
          $en_month = date("M", strtotime($your_date));
          foreach ($months as $en => $ar) {
              if ($en == $en_month) { $ar_month = $ar; }
          }
      
          $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
          $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
          $ar_day_format = $date->format('D'); // The Current Day
          $ar_day = str_replace($find, $replace, $ar_day_format);
      
          header('Content-Type: text/html; charset=utf-8');
          $current_date = $ar_day.' '.$date->format('d').' '.$ar_month.' '.$date->format('Y') .' ' .$date->format('H:i');
          $arabic_date = $current_date;
      
    
      
      
        // Set some content to print
        $html = '
			<p style="text-align: center;">
			<br>
				<div width="540"></div>
			</p>
			<h1 style="text-align: center; text-shadow: 2px 2px 2px #888888;"> شهادة ' . $seminar->type . ' </h1>
			<p style="text-align: center;"> يشهد ' . $seminar->personCertifie . '   أن الطالب(ة) <br> <span>' . $inscrit->name . '</span>
			<br> قد ساهم(ت) في تأطير المحاضرة العلمية التي نظمها ' . $seminar->organisateur . ' 
			<br>  في موضوع : 
			<br>" ' . $seminar->titre . ' "
			<br> وذلك يوم ' . $arabic_date . '
      </p>
      <div width="100px"></div>
      <p style="text-align: center;">' . $seminar->personSign . '</p>
      <table style="width: 100%; border-collapse: collapse;">
      <tr>
      <td style="padding: 5px;"><i>التاريخ والوقت</i> : <span>' . $inscrit->date . '</span></td>
      
      </tr>
      </table>';
        //display:inline

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', 15, $html, 0, 3, 0, false, 'J', false, false);
        //<td style="text-align:right;width:200px"><img width="300" height="300" src="'.$seminar->imageUrl.'"></td>
        $img_file1 = dirname(__FILE__) . '/../../' . $seminar->imageUrl;
        // $pdf->Image($img_file1, 110, $pdf->getPageHeight()-75, 50, 50, 'PNG', '', '', true, 150, '', false, false, 0, false, false);
        $pdf->Image($img_file1, 110, $pdf->getPageHeight() - 75, 50, 50, 'PNG', '', '', false, 150, '', false, false, 0, false, false);
        // $pdf->Image($img_file1, 0, 0, 220, 220, 'PNG', false, '', true, 300, 'L', false, false, 1, false, true, false);
        // $pdf->Image($img_file, 0, 0, 297,210, '', '', '', false, 300, '', false, false, 0);
        // $pdf->Image($img_file, 0, 0, 279, 216, '', '', '', true, 300, '', false, false);
        /**
         *Image( $file, $x = '', $y = '', $w = 0, $h = 0, $type = '', $link = '', $align = '', $resize = false, $dpi = 300, $palign = '', $ismask = false, $imgmask = false, $border = 0, $fitbox = false, $hidden = false, $fitonpage = false, $alt = false, $altimgs = array() ) 
         */
        // Image example with resizing
        // $pdf->Image($img_file, 0, 0, 297,210, 'PNG', false, '', true, 300, 'C', false, false, 1, false, true, false);
        // $pdf->Image( $img_file, $x = '', $y = '', $w = 0, $h = 0, $type = '', $link = '', $align = '', $resize = false, $dpi = 300, $palign = '', $ismask = false, $imgmask = false, $border = 0, $fitbox = false, $hidden = false, $fitonpage = false, $alt = false, $altimgs = array() );
        // $pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
        //$file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false

        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // Image example with resizing

        //$file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false
        // $pdf->write2DBarcode('Nins:' . $e[0]->Nins . 'Prof:' . $prof[0]->idProf, 'QRCODE,M', 120, 235, 30, 30, $style, 'N');
        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('chariaa_fes.pdf', 'I');

      }
    }
  }


}
// table, th, td {
//   // border: 1px solid black;
//   border-collapse: collapse;
// }