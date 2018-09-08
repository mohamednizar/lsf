<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 include_once APPPATH.'third_party/mpdf2/autoload.php';

class M_pdf {

    public $param;
    public $pdf;

    public function __construct($param = '"utf-8","A4","","",10,10,10,10,6,3')
    {
        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $this->param =$param;
        //$this->pdf = new mPDF($this->param);
        $this->pdf = new \Mpdf\Mpdf(['mode' => 'UTF-8',
        'format' => 'A4',
        'fontdata' => $fontData + [
            'iskpota' => [
                'R' => 'iskpota.ttf',
                'B' => 'iskpotab.ttf',
                'useOTL' => 0x80
            ]
        ],
        'default_font' => 'iskpota']);
        //$this->pdf->SetHTMLFooter('<div style="font-weight: bold; font-size: 8pt; font-style: italic;">This is a SLEAS-HRM System generated letter.</div>','O');
    }
}
