<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 //include_once APPPATH.'third_party/mpdf/mpdf.php';
 
class Tc_pdf {
    
        public function __construct()
    {
        // always load alternative config file for examples
        require_once(APPPATH.'third_party/tcpdf/config/tcpdf_config.php');

        // Include the main TCPDF library (search the library on the following directories).
        require_once(APPPATH.'third_party/tcpdf/tcpdf.php');
    }
    

}
?>