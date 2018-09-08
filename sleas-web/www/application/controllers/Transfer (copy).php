<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
    }
    
    public $response = array("result"=>"none", "data"=>"none", "register"=>"x", "sidemenu" => "menu_transfer", "class" => "Transfer");
    public $view_data_array = array();
    
    public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			redirect('/login/index');
		}//Redirect to login page if admin session not initiated.
	}
    
    public function newtransfer()
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
        
        $search_array = array('ID'=> $id);
        $this->response['result'] = $this->Form_data_model->searchdb('Personal_Details', $search_array);
        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
        $this->response['designation'] = $this->Form_data_model->select('designation');
        $this->response['service_type'] = 'trans';
        $this->response['method'] = 'transfer_add';
		$this->load->view('service_change', $this->response);

		$this->load->view('footer');
    }
    
    public function addHistory($id)
    {
        $this->check_sess($this->session->user_logged);
        
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
        $search_array = array('ID'=> $id);
        $this->response['result'] = $this->Form_data_model->searchdb('Personal_Details', $search_array);
        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
        $this->response['designation'] = $this->Form_data_model->select('designation');
        $this->response['service_type'] = 'trans';
        $this->response['method'] = 'transfer_add';
        $this->response['type'] = 'history';
        
		$this->load->view('service_change', $this->response);
		$this->load->view('footer');
    }
    
    public function transfer_add()
    {
        //Get form data
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
        
        $present_grade = $this->security->xss_clean($_REQUEST['present_grade']);
        $date_promoted = date("Y-m-d", strtotime($this->security->xss_clean($_REQUEST['date_promoted'])));
        $date_assumed = date("Y-m-d", strtotime($this->security->xss_clean($_REQUEST['date_assumed'])));
        
        $province_office_id = $this->security->xss_clean($_REQUEST['province_office']);
        $zonal_office_id = $this->security->xss_clean($_REQUEST['zonal_office']);
        $divisional_office_id = $this->security->xss_clean($_REQUEST['divisional_office']);
        $salary_drawn = $this->security->xss_clean($_REQUEST['salary_drawn']);
        
        
        //Get Data from database
        $service_id_array = $this->Form_data_model->get_recent_service_id();
        $service_id = $service_id_array['0']['ID'] + 1;
        
        $search_array = array('ID'=> $person_id);
        $personal_details = $this->Form_data_model->searchdb('Personal_Details', $search_array);
        
        
        $work_place = $this->Form_data_model->searchdbvalue('Work_Place', 'ID', $work_place_id);
        $main_division = $this->Form_data_model->searchdbvalue('Main_Office_Divisions', 'ID', $main_division_id);
        $main_branch = $this->Form_data_model->searchdbvalue('Main_Office_Branches', 'ID', $main_branch_id);
        $designation = $this->Form_data_model->searchdbvalue('Designation', 'ID', $designation_id);
        $province = $this->Form_data_model->searchdbvalue('Province_List', 'province_id', $province_id);
        $institute = $this->Form_data_model->searchdbvalue('Institute', 'ID', $institute_id);
        
        $type = $this->security->xss_clean($_REQUEST['type']);
        
        $service = array('ID' => $service_id, 'person_id' => $person_id, 'service_mode' => '3', 'work_place_id'=>$work_place_id, 'designation_id'=>$designation_id , 'duty_date'=>$date_assumed, 'off_letter_no'=>$official_letter_no, 'user_updated' => $this->session->username);
        
        switch ($work_place_id) {
            case 1:
            case 2:
            case 3:
            case 4:
                $service['work_division_id'] = $main_division_id;
                $service['work_branch_id'] = $main_branch_id;
                break;
            case 5:
            case 6:
                $service['sub_location_id'] = $province_office_id;
                break;
            case 7:
                $service['sub_location_id'] = $zonal_office_id;
                break;
            case 8:
                $service['sub_location_id'] = $divisional_office_id;
                break;
            case 9:
            case 10:
            case 11:
            case 12:
            case 13:
            case 14:
            case 15:
            case 16:
            case 17:
                $service['sub_location_id'] = $institute_id;
                break;

            default:
        }
        
        //generate barcode        
        $barcode = $this->generate_barcode($person_id);
        $this->view_data_array['barcode'] = $barcode;
        
        $service['barcode'] = $this->view_data_array['barcode'];
        
        $res = $this->Form_data_model->insertData('Service', $service);
        //$res = '1';
        if ($res == 1){
            if ($type){
                redirect('admin/profile/'.$person_id );
            } else {
                //generate Letter as PDF
                $this->view_data_array = array('work_place'=>$work_place, 'division'=>$main_division, 'branch'=>$main_branch, 'personal_details'=>$personal_details, 'work_date'=>$work_date, 'psc_letter'=>$psc_letter, 'appoint_date'=>$appoint_date, 'off_letter_no'=>$official_letter_no, 'province'=>$province, 'school' => $institute, 'designation' => $designation);

                $pdfFilePath = 'file_library/'.$person_id.'/service/';
                $pdfFileName = date("Y-m-d") . '-' . $nic. '-Transfer' . '.pdf';
                //Get letter HTML
                $letter_html = $this->generate_letter_data($view_data_array, $person_id, $work_place_id);

                //Generate Letter pdf
                $this->generate_letter($letter_html, $pdfFilePath, $pdfFileName);
            }
            
        }else {
            echo ('alert("Please Check the Data and Try Again!");');
        }
    }
    
    public function generate_letter_data($view_data_array, $person_id, $work_place_id)
    {
        
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        $this->load->view('letter/letter-header',$this->view_data_array);
        
        $html = $this->load->view('letter/letter-header',$this->view_data_array,true);
        
        $recent_service = $this->Form_data_model->get_Officer_recent_service($person_id);
        $recent_work_place = $recent_service['0']['work_place_id'];
        $recent_work_branch = $recent_service['0']['office_branch'];
        $this->view_data_array['recent_work_branch'] = $recent_work_branch;
        
        if($work_place_id == $recent_work_place AND $work_place_id == '1'){
            $html = $html . $this->load->view('letter/transfer/internal',$this->view_data_array,true);
        }else if($work_place_id == '16'){
            $html = $html . $this->load->view('letter/transfer/school',$this->view_data_array,true);
        }else if($work_place_id == '18' AND $recent_work_place == '1') {
            $html = $html . $this->load->view('letter/transfer/release_to_province',$this->view_data_array,true);
        }
        
        return $html;
    }
    
    public function generate_letter($letter_html, $pdfFilePath, $pdfFileName){
        $this->load->library('m_pdf');

        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($letter_html);

        //remove generated barcode image
        $barcode_image = 'generated/barcode.png';
        echo $barcode_image;
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
    
    public function generate_barcode($person_id){
        
       //$codeID =  hexdec(uniqid());
       $codeID =  uniqid($person_id);
       echo $codeID;
        
       $barcode_path = 'generated/barcode.png';
       include APPPATH . 'third_party/barcode.php';
        
       barcode( $barcode_path, $codeID, '20', 'horizontal', 'code128', 'false', '1' );
        
       return $codeID;
       
    }
}
?>