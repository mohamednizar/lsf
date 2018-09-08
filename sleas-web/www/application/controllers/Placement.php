<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Placement extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
    }

    public $response = array("result"=>"none", "data"=>"none", "register"=>"x", "sidemenu" => "menu_placement",  "class" => "Placement");
    public $view_data_array = array();

    public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			redirect('/login/index');
		}//Redirect to login page if admin session not initiated.
	}

    public function newPlacement()
    {
        $this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');

		$this->load->view('search_officer', $this->response);
		$this->load->view('footer');
    }

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
            $this->response['result'] = $this->Form_data_model->searchdb('Personal_Details', $search_array);
            $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
            $this->response['provinceList'] = $this->Form_data_model->select('province_list');
            $this->response['designation'] = $this->Form_data_model->select('designation');
            $this->response['service_type'] = 'placement';
    		$this->load->view('new_placement_form', $this->response);
        }
		$this->load->view('footer');
    }

    public function addHistory($id)
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
            $this->response['result'] = $this->Form_data_model->searchdb('Personal_Details', $search_array);
            $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
            $this->response['provinceList'] = $this->Form_data_model->select('province_list');
            $this->response['designation'] = $this->Form_data_model->select('designation');
            $this->response['service_type'] = 'placement';
            $this->response['type'] = 'history';
    		$this->load->view('new_placement_form', $this->response);
        }

		$this->load->view('footer');
    }

    public function placement_add()
    {
        //Get form data
        $language = $this->security->xss_clean($_REQUEST['language']);
        $nic = $this->security->xss_clean($_REQUEST['nic']);
        $person_id = $this->security->xss_clean($_REQUEST['person_id']);
        $work_place_id = $this->security->xss_clean($_REQUEST['work_place']);
        $main_division_id = $this->security->xss_clean($_REQUEST['main_division']);
        $main_branch_id = $this->security->xss_clean($_REQUEST['main_branch']);
        $province_id = $this->security->xss_clean($_REQUEST['province']);
        $district_id = $this->security->xss_clean($_REQUEST['district']);
        $zone_id = $this->security->xss_clean($_REQUEST['zone']);
        $division_id = $this->security->xss_clean($_REQUEST['division']);
        $institute_id = $this->security->xss_clean($_REQUEST['institute']);
        $designation_id = $this->security->xss_clean($_REQUEST['designation']);
        $work_date = date("Y-m-d", strtotime($this->security->xss_clean($_REQUEST['work_date'])));
        $official_letter_no = $this->security->xss_clean($_REQUEST['official_letter_no']);
        $psc_letter = $this->security->xss_clean($_REQUEST['psc_letter']);
        $appoint_date = date("Y-m-d", strtotime($this->security->xss_clean($_REQUEST['appoint_date'])));

        //Get Data from database
        $service_id_array = $this->Form_data_model->get_recent_service_id();
        $service_id = $service_id_array['0']['ID'] + 1;

        $search_array = array('ID'=> $person_id);
        $personal_details = $this->Form_data_model->searchdb('Personal_Details', $search_array);

        $work_place = $this->Form_data_model->searchdbvalue($language.'_Work_Place', 'ID', $work_place_id);
        $main_division = $this->Form_data_model->searchdbvalue($language.'_Main_Office_Divisions', 'ID', $main_division_id);
        $main_branch = $this->Form_data_model->searchdbvalue($language.'_Main_Office_Branches', 'ID', $main_branch_id);
        $designation = $this->Form_data_model->searchdbvalue($language.'_Designation', 'ID', $designation_id);
        $province = $this->Form_data_model->searchdbvalue($language.'_Province_List', 'province_id', $province_id);
        $zone = $this->Form_data_model->searchdbvalue($language.'_Zone_List', 'zone_id', $zone_id);
        $institute = $this->Form_data_model->searchdbvalue($language.'_Institute', 'ID', $institute_id);

        $type = $this->security->xss_clean($_REQUEST['type']);

        $service = array('ID' => $service_id, 'person_id' => $person_id, 'nic' =>$nic, 'service_mode' => '10', 'work_place_id'=>$work_place_id,  'duty_date'=>$work_date, 'off_letter_no'=>$official_letter_no, 'user_updated' => $this->session->username);

        if($work_place_id == '16'){
            $service['sub_location_id'] = $institute_id;
            $service['designation_id'] = $designation_id;
        }else if($work_place_id == '18'){
            $service['sub_location_id'] = $province_id;
        }else {
            if($main_division_id){ $service['work_division_id'] = $main_division_id;}
            if($main_branch_id){ $service['work_branch_id'] = $main_branch_id;}
            if($designation_id){ $service['designation_id'] = $designation_id;}
        }

        //generate barcode
        $barcode = $this->generate_barcode($person_id);
        $this->view_data_array['barcode'] = $barcode;

        $service['barcode'] = $this->view_data_array['barcode'];

        $res = $this->Form_data_model->insertData('Service', $service);

        //$res =1;
        if ($res == 1){
            if ($type){
                redirect('admin/profile/'.$person_id );
            } else {
                //generate Letter as PDF
                $this->view_data_array = array('work_place'=>$work_place, 'division'=>$main_division, 'branch'=>$main_branch, 'personal_details'=>$personal_details, 'work_date'=>$work_date, 'psc_letter'=>$psc_letter, 'appoint_date'=>$appoint_date, 'off_letter_no'=>$official_letter_no, 'province'=>$province, 'zone' => $zone, 'school' => $institute, 'designation' => $designation);

                $pdfFilePath = 'file_library/'.$person_id.'/service/';
                $pdfFileName = date("Y-m-d") . '-' . $nic. '-Placement' . '.pdf';
                //Get letter HTML
                $letter_html = $this->generate_letter_data($view_data_array, $person_id, $work_place_id, $language);

                //Generate Letter pdf
                $this->generate_letter($letter_html, $pdfFilePath, $pdfFileName);

                redirect('admin/profile/'.$person_id );
            }

        }else {
            echo ('alert("Please Check the Data and Try Again!");');
        }
    }

    public function generate_letter_data($view_data_array, $person_id, $work_place_id, $language)
    {

		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        $this->load->view('letter/letter-header',$this->view_data_array);
        $this->load->view('letter/placement/'.$language.'_province',$this->view_data_array);
		$this->load->view('footer');

        /*$barcode = $this->generate_barcode($person_id);
        $this->view_data_array['barcode'] = $barcode;*/

        $html = $this->load->view('letter/letter-header',$this->view_data_array,true);

        if($work_place_id == '18'){
            $html = $html . $this->load->view('letter/placement/'.$language.'_province',$this->view_data_array,true);
        }else if($work_place_id == '16'){
            $html = $html . $this->load->view('letter/placement/'.$language.'_school',$this->view_data_array,true);
        }else if($work_place_id == '1' ) {
            $html = $html . $this->load->view('letter/placement/'.$language.'_moe',$this->view_data_array,true);
        }else if($work_place_id == '2' ) {
            $html = $html . $this->load->view('letter/placement/'.$language.'_exam',$this->view_data_array,true);
        }else if($work_place_id == '3' ) {
            $html = $html . $this->load->view('letter/placement/'.$language.'_epub',$this->view_data_array,true);
        }

        return $html;
    }

    public function generate_letter($letter_html, $pdfFilePath, $pdfFileName){
        $this->load->library('m_pdf');

        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($letter_html);
        //$this->m_pdf->pdf->AddPage();

        //remove generated barcode image
        $barcode_image = 'generated/barcode.png';
        if(is_writable($barcode_image)){
            unlink($barcode_image);
        }

        //save it.
        if (!file_exists($pdfFilePath)) {
            mkdir($pdfFilePath, 0777, true);
        }
        $this->m_pdf->pdf->Output($pdfFilePath . $pdfFileName, "F");

        //download it.
        $this->m_pdf->pdf->Output($pdfFileName, "D");
    }

    public function generate_barcode($person_id){

       //$codeID =  hexdec(uniqid());
       $codeID =  uniqid($person_id);
       echo $codeID;

       $barcode_path = 'generated/barcode.png';
       include APPPATH . 'third_party/barcode.php';

       barcode( $barcode_path, $codeID, '20', 'horizontal', 'code128', 'false', '1' );

       return $codeID;

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
}
?>
