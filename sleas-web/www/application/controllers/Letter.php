<?php
# @Author: Kosala Gangabadage
# @Date:   2018-02-07T12:32:54+05:30
# @Email:  kosala4@gmail.com
# @Last modified by:   Kosala Gangabadage
# @Last modified time: 2018-02-12T15:31:20+05:30

defined('BASEPATH') OR exit('No direct script access allowed');

class Letter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
    }

    public function print_letter()
    {

        $header['appoint_date'] = $this->security->xss_clean($_REQUEST['appoint_date']);
        $header['off_letter_no'] = $this->security->xss_clean($_REQUEST['off_letter_no']);
        $header['title'] = $this->security->xss_clean($_REQUEST['title']);
        $header['in_name'] = $this->security->xss_clean($_REQUEST['in_name']);
        $fname = $this->security->xss_clean($_REQUEST['fname']);
        $fpath = $this->security->xss_clean($_REQUEST['fpath']);
        $letter_html = $this->load->view('letter/letter-header_2', $header ,true);
        //$letter_html = $letter_html . $this->security->xss_clean($_REQUEST['editor1']);
        $letter_html = $letter_html . $_REQUEST['editor1'];
        $letter_html = $letter_html . $this->load->view('letter/letter-footer', $header ,true);

        //echo $letter_html;

        $this->generate_letter($letter_html, $fpath, $fname, $appoint_date , $off_letter_no);
    }

    public function generate_letter($letter_html, $pdfFilePath, $pdfFileName){
        $this->load->library('m_pdf');

        //$this->m_pdf->SetHTMLFooter('sssssssssssssssssss');

        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($letter_html);

        //remove generated barcode image
        $barcode_image = 'generated/barcode.png';
        //echo $barcode_image;
        if(is_writable($barcode_image)){
            unlink($barcode_image);
        }

        if (!file_exists($pdfFilePath)) {
            mkdir($pdfFilePath, 0777, true);
        }
        //save it.
        $this->m_pdf->pdf->Output($pdfFilePath . $pdfFileName, "F");

        //download it.
        $this->m_pdf->pdf->Output($pdfFileName, "D");

    }

}
?>
