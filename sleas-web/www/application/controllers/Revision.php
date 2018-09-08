<?php
# @Author: Kosala Gangabadage <Kosala>
# @Date:   2017-12-29T09:59:47+05:30
# @Email:  kosala4@gmail.com
# @Last modified by:   Kosala Gangabadage
# @Last modified time: 2018-05-25T14:25:52+05:30



defined('BASEPATH') OR exit('No direct script access allowed');

class Revision extends CI_Controller {

    /***
	 * Controller that handle Increments.
	 *
	 * Calculate increment according to 03.2016 circular
	 *
	 * Can use till 2020
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/admin/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
    }

    public $response = array("sidemenu" => "menu_revision", "class" => "Revision");

    public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			redirect('/login/index');
		}
	}//Redirect to login page if session not initiated.

    //Initiate officer search
    public function addRevision()
    {
        $this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');

		$this->load->view('search_officer', $this->response);
		$this->load->view('footer');
    }

    //Receive selected officer's ID. Then load the form to get data
    public function add($id)
    {
        $this->check_sess($this->session->user_logged);

		$this->load->view('head');
		$this->load->view('sclerk_sidebar');

        $permision = $this->checkPermision( $id );
        if ($permision == '0') {
            $this->error['error_msg'] = "You don't have permision to change this officer's profile";
            $this->load->view('service_change', $this->error);
        } else if ($permision == '1') {

            $search_array = array('ID'=> $id);
            $search_array_general = array('person_id'=> $id);
            $this->response['result'] = $this->Form_data_model->searchdb('Personal_Details', $search_array);
            $this->response['general'] = $this->Form_data_model->searchdb('General_Service', $search_array_general);
            $this->response['method'] = 'revision_add';
    		$this->load->view('increment_form', $this->response);
        }
		$this->load->view('footer');
    }

    //Function to calculate incremented salary
    public function calculate()
    {
        $person_id = $this->security->xss_clean($this->input->post('person_id'));
        $revision_date = $this->security->xss_clean($this->input->post('increment_date'));
        $grade = $this->security->xss_clean($this->input->post('grade'));
        $current_salary_step = $this->security->xss_clean($this->input->post('salary_step'));
        $revision_year = date(Y, strtotime($revision_date));

        $current_salary = $this->calculateSalary($grade, $current_salary_step, $revision_year-1);
        $new_salary = $this->calculateSalary($grade, $current_salary_step, $revision_year);

        $next_salary_increment = $this->calculateSalary($grade, $current_salary_step+1, $revision_year);

        $increment = $new_salary - $current_salary;

        $salaryDetails = array('new_salary' => $new_salary, 'increment' => $increment, 'current_salary' => $current_salary, 'next_salary' => $next_salary_increment, 'year' => $revision_year);

        echo json_encode($salaryDetails);
    }

    //Function to calculate salary using Grade, Step and year
    public function calculateSalary($grade, $salary_step, $revision_year){
        $gr3_start = 22935;//Grade 3, step 01 basic salary at 2015
        $gr3_end = 47615;//Grade 3, step 01 basic salary at 2020
        $gr3_start_incr = 645;//Grade 3 increment at 2015
        $gr3_end_incr = 1335;//Grade 3 increment at 2020

        $gr2_start = 30175;//Grade 2, step 12 basic salary at 2015
        $gr2_end = 62595;//Grade 2, step 12 basic salary at 2020
        $gr2_start_incr = 790;//Grade 2 increment at 2015
        $gr2_end_incr = 1630;//Grade 2 increment at 2020

        $gr1_start = 36755;//Grade 1, step 20 basic salary at 2015
        $gr1_end = 76175;//Grade 1, step 20 basic salary at 2020
        $gr1_start_incr = 1050;//Grade 1 increment at 2015
        $gr1_end_incr = 2170;//Grade 1 increment at 2020

        $grsp_start = 42390;//Grade 1, step 20 basic salary at 2015
        $grsp_end = 88000;//Grade 1, step 20 basic salary at 2020
        $grsp_start_incr = 1310;//Grade 1 increment at 2015
        $grsp_end_incr = 2700;//Grade 1 increment at 2020

        if($grade == 'Grade I'){

            $salary = ($gr1_start + ($gr1_start_incr * ($salary_step - 20))) + ((($gr1_end + ($gr1_end_incr * ($salary_step - 20))) - ($gr1_start + ($gr1_start_incr * ($salary_step - 20))))/5)*($revision_year - 2015);

        }else if($grade == 'Grade II'){

            $salary = ($gr2_start + ($gr2_start_incr * ($salary_step - 12))) + ((($gr2_end + ($gr2_end_incr * ($salary_step - 12))) - ($gr2_start + ($gr2_start_incr * ($salary_step - 12))))/5)*($revision_year - 2015);

        }else if($grade == 'Grade III'){

            $salary = ($gr3_start + ($gr3_start_incr * ($salary_step - 1))) + ((($gr3_end + ($gr3_end_incr * ($salary_step - 1))) - ($gr3_start + ($gr3_start_incr * ($salary_step - 1))))/5)*($revision_year - 2015);

        }else if($grade == 'Special Grade'){

            $salary = ($grsp_start + ($grsp_start_incr * ($salary_step - 1))) + ((($grsp_end + ($grsp_end_incr * ($salary_step - 1))) - ($grsp_start + ($grsp_start_incr * ($salary_step - 1))))/5)*($revision_year - 2015);

        }
        return $salary;
    }


    public function revision_add()
    {
        $language = $this->security->xss_clean($_REQUEST['language']);
        $nic = $this->security->xss_clean($_REQUEST['nic']);
        $person_id = $this->security->xss_clean($_REQUEST['person_id']);
        $revision_date = $this->security->xss_clean($_REQUEST['increment_date']);
        $salary_step = $this->security->xss_clean($_REQUEST['salary_step']);
        $increment = $this->security->xss_clean($_REQUEST['increment']);
        $new_salary = $this->security->xss_clean($_REQUEST['new_salary']);
        $current_salary = $this->security->xss_clean($_REQUEST['current_salary']);
        $grade = $this->security->xss_clean($_REQUEST['present_grade']);
        $submit = $this->security->xss_clean($_REQUEST['submit']);
        $next_salary = $this->security->xss_clean($_REQUEST['next_salary']);
        $user_updated = $this->session->username;

        $officer_details = $this->Form_data_model->get_Officer_Details($person_id);

        $increment_array = array('person_id' => $person_id, 'increment_date' => $revision_date, 'step' => $salary_step + 1, 'increment' => $increment , 'salary'=>$new_salary, 'user_updated' => $user_updated);

        if($submit == '1'){
            $res = $this->Form_data_model->insertData('Salary', $increment_array);
        }else{
            $res = '1';
        }

        //$res = '1';

        if($res == '1'){


            $final_salary = $this->calculateSalary($grade, $salary_step, "2020");
            $final_salary_increment = $this->calculateSalary($grade, $salary_step+1, "2020");

            $view_data_array = array('revision_date' => $revision_date, 'current_salary'=>$current_salary, 'increment' => $increment, 'new_salary'=>$new_salary, 'work_place' => $officer_details[0][$language.'_work_place'], 'name' => $officer_details[0][$language.'_in_name'], 'designation' => $officer_details[0]['designation'], 'grade' => $grade, 'step' => $salary_step, 'final_salary' =>$final_salary, 'final_salary_increment' =>$final_salary_increment, 'next_salary' => $next_salary);

            $this->load->view('head');
            $this->load->view('sclerk_sidebar');
            $this->load->view('letter/revision/revision', $view_data_array);

            $html = $this->load->view('letter/revision/revision', $view_data_array,true);


            $pdfFilePath = 'file_library/'.$person_id.'/revision/';
            $pdfFileName = $nic. '-Revision-' . $revision_date . '.pdf';
            $this->generate_letter($html, $pdfFilePath, $pdfFileName);
        }
    }

    public function generate_letter($letter_html, $pdfFilePath, $pdfFileName){
        $this->load->library('m_pdf');

        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($letter_html);

        //save it.
        if (!file_exists($pdfFilePath)) {
            mkdir($pdfFilePath, 0777, true);
        }
        $this->m_pdf->pdf->Output($pdfFilePath . $pdfFileName, "F");

        //download it.
        $this->m_pdf->pdf->Output($pdfFileName, "D");

    }

    public function checkPermision($personID){
        $permision = 0;

        $result = $this->Form_data_model->get_Officer_recent_service($personID);

        switch ($this->session->workplace) {
            case 1:
                $permision = 1;
                    break;
            case 2:
            case 3:
            case 4:
                break;
            case 5:
            case 6:
                if ( $this->session->location == $result['0']['province']) {
                    $permision = 1;
                }
                break;
            case 7:
                if ($result['0']['work_place_id'] == '7' && $this->session->location == $result['0']['sub_location_id']) {
                    $permision = 1;
                }
                break;
        }

        return $permision;
    }

    //TcPDF Sample
    /*public function generate_letter($letter_html, $pdfFilePath, $pdfFileName){
        $this->load->library('tc_pdf');

       $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 001');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set font
        $pdf->SetFont('freeserif', '', 12);

        //$html = $letter_html;
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $letter_html, 0, 2, 0, true, '', true);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('example_001.pdf', 'I');

    }*/



}
?>
