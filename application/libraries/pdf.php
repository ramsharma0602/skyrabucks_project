
<!-- defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

use Dompdf/Dompdf;

class Pdf extends Dompdf
{ -->
    <!-- // function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
    //     $dompdf = new Dompdf\DOMPDF();
    //     $dompdf->load_html($html);
    //     $dompdf->set_paper($paper, $orientation);
    //     $dompdf->render();
    //     if($download)
    //         $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
    //     else
    //         $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    // } -->

    <!-- function __contruct()
    {
        parent::__construct();
    }
} -->

<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed'); 
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Pdf extends Dompdf { 
    public function __construct() { 
        parent::__construct();
    } 
} 
?>