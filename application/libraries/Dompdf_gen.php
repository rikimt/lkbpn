<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Include Dompdf
use Dompdf\Dompdf;

class Dompdf_gen
{
    public function __construct()
    {
        // Include the Dompdf library
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

        // Create new Dompdf instance
        $this->dompdf = new Dompdf();
    }
}
