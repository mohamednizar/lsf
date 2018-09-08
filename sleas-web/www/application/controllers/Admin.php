<?php
# @Author: Kosala Gangabadage <Kosala>
# @Date:   2017-12-29T09:59:47+05:30
# @Email:  kosala4@gmail.com
# @Last modified by:   Kosala Gangabadage
# @Last modified time: 2018-05-22T22:38:59+05:30



defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin
	 *	- or -
	 * 		http://example.com/index.php/admin/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
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
        $this->load->model('Main_data_model'); //load database model.

    }

    public $response = array("result"=>"none", "data"=>"none");

	public function index()
	{
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

		$this->load->view('head');
		$this->load->view('admin_sidebar');

        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
		$this->load->view('admin_dashboard', $this->response);

		$this->load->view('footer');
	}

	public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			$this->logout();
		}//Redirect to login page if session not initiated.
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/login/index');
	}

    //Function to show profile of logged in officer
    public function officer()
    {
		$this->check_sess($this->session->user_logged);

		$this->load->view('head');

        //Get Officer's Details from database
        $this->response['requests'] = $this->Form_data_model->get_Change_Requests_Officer($this->session->officer_ID);
        $this->response['user_details'] = $this->Form_data_model->get_Officer_Details($this->session->officer_ID);
        $this->response['deativate_type'] = $this->Form_data_model->select('deativate_type');

		$this->load->view('officer_profile_view', $this->response);
    }

    //Function to show dashboard for logged in subject clerk.
    public function sclerk()
    {
		$this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');

        //Get relavent data from database
        $this->response['requests'] = $this->getChangeRequests($this->session->username);
        $this->response['officers_list'] = $this->Form_data_model->get_Officers_List();
		$this->load->view('sclerk_dashboard', $this->response);

		$this->load->view('footer');

    }

    public function getDetails()
    {
        $result['officers_list'] = $this->Form_data_model->get_Officers_List();
    }

    //Function to show selected officer's profile to logged in subject clerk.
    public function profile($user_ID)
    {
        $this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');

        $this->response['requests'] = $this->Form_data_model->get_Change_Requests_Officer($user_ID);
        $this->response['user_details'] = $this->Form_data_model->get_Officer_Details($user_ID);
        $this->response['deativate_type'] = $this->Form_data_model->select('deativate_type');
        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
        $this->response['designation'] = $this->Form_data_model->select('designation');
        $this->response['leavetype'] = $this->Form_data_model->select('leavetype');

        if($this->session->workplace == '7'){

            if ( $this->response['user_details']['0']['sub_location_id'] == $this->session->location) {
                $this->response['test'] = $this->response['user_details']['0']['sub_location_id'];
                $this->load->view('officer_profile', $this->response);
            } else {
                $this->error['error_msg'] = "You do not have permissions to view this officer's details";
                $this->load->view('officer_profile', $this->error);
            }

        }else {
            $this->load->view('officer_profile', $this->response);
        }
        //$this->load->view('officer_profile', $this->response);
		$this->load->view('footer');
    }

    //Function to get Change Requests applicable to particular subject clerk.
    public function getChangeRequests($sclerk)
    {
        $requests = $this->Form_data_model->get_Change_Requests($sclerk);
        if($requests){ return $requests; }

    }

    public function changeRequest()
    {

        $person_id = $this->security->xss_clean($this->input->post('person_id'));
        $sclerk = $this->security->xss_clean($this->input->post('sclerk'));
        $title = $this->security->xss_clean($this->input->post('title'));
        $message = $this->security->xss_clean($this->input->post('message'));

        $dataarray = array('person_id' => $person_id, 'sclerk' => $sclerk, 'message_title' => $title, 'message' => $message);
        $res = $this->Form_data_model->insertData('Change_Request', $dataarray);

        if($res = '1'){
            echo json_encode("success");
        }


    }

    //Function to update Officer's Personal and Contact Details
    public function updateProfile()
    {
        $person_id = $this->security->xss_clean($_REQUEST['id']);
        $initname = $this->security->xss_clean($_REQUEST['initname']);
        $si_initname = $this->security->xss_clean($_REQUEST['si_initname']);
        $ta_initname = $this->security->xss_clean($_REQUEST['ta_initname']);
        $fname = $this->security->xss_clean($_REQUEST['fname']);
        $mname = $this->security->xss_clean($_REQUEST['mname']);
        $lname = $this->security->xss_clean($_REQUEST['lname']);
        $dob = $this->security->xss_clean($_REQUEST['dob']);
        $mobile = $this->security->xss_clean($_REQUEST['mobile']);
        $telephone = $this->security->xss_clean($_REQUEST['telephone']);
        $email = $this->security->xss_clean($_REQUEST['email']);
        $address_1 = $this->security->xss_clean($_REQUEST['address1']);
        $address_2 = $this->security->xss_clean($_REQUEST['address2']);
        $address_3 = $this->security->xss_clean($_REQUEST['address3']);

        $personal_details = array('f_name' => $fname, 'm_name' => $mname, 'l_name' => $lname, 'in_name' => $initname, 'si_in_name' => $si_initname, 'ta_in_name' => $ta_initname, 'dob' => $dob, 'user_updated' => $this->session->user_name);

        $contact_details = array('address_1' => $address_1, 'address_2' => $address_2, 'address_3' => $address_3, 'mobile' => $mobile, 'telephone' => $telephone, 'email' => $email);

        $res = $this->Form_data_model->updateOfficer($person_id, $personal_details, $contact_details);

        if($res == '1'){
            $this->session->set_flashdata('update','success');
        }

        if($this->session->user_level == '1'){
            redirect("/admin/officer");
        }else if($this->session->user_level == '2'){
            redirect("/admin/profile/$person_id");
        }

    }

    public function deactivateOfficer()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $person_id = $this->security->xss_clean($this->input->post('user_id'));
        $deactivate_type_id = $this->security->xss_clean($this->input->post('deactivate_type_id'));
        $deactivate_date = $this->security->xss_clean($this->input->post('deactivate_date'));

        $dataarray = array("deactivate_type_id" => $deactivate_type_id, "deactivate_date" => $deactivate_date, "status" => Deactivated);


        //$table, $search_field, $search_key, $update_array
        $res = $this->Form_data_model->update('General_Service', 'person_id', $person_id, $dataarray);

        if($res = 1){
            echo "success";
        }
    }

    public function requiredDateUpdate()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $person_id = $this->security->xss_clean($this->input->post('user_id'));
        $field = $this->security->xss_clean($this->input->post('field'));
        $field_date = $this->security->xss_clean($this->input->post('field_date'));

        switch ($field) {
            case "eb_1":
                $field_name = 'eb_1_pass';
                break;
            case "eb_2":
                $field_name = 'eb_2_pass';
                break;
            case "eb_3":
                $field_name = 'eb_3_pass';
                break;
            case "pg_dip":
                $field_name = 'pg_dip_pass';
                break;
            case "pg_deg":
                $field_name = 'pg_deg_pass';
                break;
            case "cb_1":
                $field_name = 'cb_1_date';
                break;
            case "cb_2":
                $field_name = 'cb_2_date';
                break;
            case "cb_3":
                $field_name = 'cb_3_date';
                break;
        }

        $dataarray = array($field_name => $field_date);

        //$table, $search_field, $search_key, $update_array
        $res = $this->Form_data_model->update('General_Service', 'person_id', $person_id, $dataarray);

        if($res = 1){
            echo $field;
        }
    }

    public function deleteDateUpdate()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $person_id = $this->security->xss_clean($this->input->post('user_id'));
        $field = $this->security->xss_clean($this->input->post('field'));

        switch ($field) {
            case "eb_1":
                $field_name = 'eb_1_pass';
                break;
            case "eb_2":
                $field_name = 'eb_2_pass';
                break;
            case "eb_3":
                $field_name = 'eb_3_pass';
                break;
            case "pg_dip":
                $field_name = 'pg_dip_pass';
                break;
            case "pg_deg":
                $field_name = 'pg_deg_pass';
                break;
            case "cb_1":
                $field_name = 'cb_1_date';
                break;
            case "cb_2":
                $field_name = 'cb_2_date';
                break;
            case "cb_3":
                $field_name = 'cb_3_date';
                break;
        }

        $dataarray = array($field_name => NULL);

        //$table, $search_field, $search_key, $update_array
        $res = $this->Form_data_model->update('General_Service', 'person_id', $person_id, $dataarray);

        if($res = 1){
            echo "Success";
        }
    }

    public function registerUser()
    {

        header('Content-Type: application/x-json; charset=utf-8');
        $name = $this->security->xss_clean($this->input->post('name'));
        $uname = $this->security->xss_clean($this->input->post('uname'));
        $passwd = password_hash($this->security->xss_clean($this->input->post('passwd')), PASSWORD_DEFAULT);
        $utype = $this->security->xss_clean($this->input->post('utype'));
        $work_place = $this->security->xss_clean($this->input->post('work_place'));
        $province_office = $this->security->xss_clean($this->input->post('province_office'));
        $zonal_office = $this->security->xss_clean($this->input->post('zonal_office'));

        $user_array = array('name' => $name, 'user_name' => $uname, 'passwd' => $passwd, 'level' => $utype, 'workplace_id' => $work_place);

        if($work_place == '5' OR $work_place =='6'){
            $user_array['sub_location_id'] = $province_office;
        } else if($work_place == '7'){
            $user_array['sub_location_id'] = $zonal_office;
        }

        $res = $this->Form_data_model->insertData('User', $user_array);
        if(res == '1'){
            echo "Success";
        }
    }

    public function updateServiceForm($service_id)
    {
        $this->check_sess($this->session->user_logged);
        $searchArray = array('ID' => $service_id);
        $this->response['service'] = $this->Form_data_model->searchdb('Service', $searchArray);
        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
        $this->response['designation'] = $this->Form_data_model->select('designation');

        if($this->response['service']['0']['sub_location_id']){
            $this->response['institute'] = $this->Form_data_model->searchdbvalue('Institute', 'ID', $this->response['service']['0']['sub_location_id'] );
        }

        if($this->response['service']['0']['work_place_id'] == '7'){
            $this->response['zone'] = $this->Form_data_model->searchdbvalue('Zonal_Offices', 'ID', $this->response['service']['0']['sub_location_id'] );
        } else if($this->response['service']['0']['work_place_id'] == '8'){
            $this->response['division'] = $this->Form_data_model->searchdbvalue('Divisional_Offices', 'ID', $this->response['service']['0']['sub_location_id'] );
        }

        //echo $this->response['service']['0']['person_id'];
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');

		$this->load->view('service_update', $this->response);
		$this->load->view('footer');
    }

    public function updateService()
    {

        $person_id = $this->security->xss_clean($_REQUEST['person_id']);
        $service_id = $this->security->xss_clean($_REQUEST['service_id']);
        $service_mood = $this->security->xss_clean($_REQUEST['service_mood']);
        $work_place = $this->security->xss_clean($_REQUEST['work_place']);
        $work_other = $this->security->xss_clean($_REQUEST['work_other']);
        $main_division = $this->security->xss_clean($_REQUEST['main_division']);
        $main_branch = $this->security->xss_clean($_REQUEST['main_branch']);
        $designation = $this->security->xss_clean($_REQUEST['designation']);
        $present_grade = $this->security->xss_clean($_REQUEST['present_grade']);
        $date_promoted = $this->security->xss_clean($_REQUEST['date_promoted']);
        $date_assumed = $this->security->xss_clean($_REQUEST['date_assumed']);
        $official_letter_no = $this->security->xss_clean($_REQUEST['official_letter_no']);

        $province_office = $this->security->xss_clean($_REQUEST['province_office']);

        $province = $this->security->xss_clean($_REQUEST['province']);
        $district = $this->security->xss_clean($_REQUEST['district']);
        $zonal_office = $this->security->xss_clean($_REQUEST['zonal_office']);

        $zone = $this->security->xss_clean($_REQUEST['zone']);
        $divisional_office = $this->security->xss_clean($_REQUEST['divisional_office']);

        $division = $this->security->xss_clean($_REQUEST['division']);
        $institute = $this->security->xss_clean($_REQUEST['institute']);

        $salary_drawn = $this->security->xss_clean($_REQUEST['salary_drawn']);

        $release_type = $this->security->xss_clean($_REQUEST['release_type']);
        $release_institute_name = $this->security->xss_clean($_REQUEST['release_institute_name']);
        $release_study_st_date = $this->security->xss_clean($_REQUEST['release_study_st_date']);
        $release_study_end_date = $this->security->xss_clean($_REQUEST['release_study_end_date']);
        $release_work_designation = $this->security->xss_clean($_REQUEST['release_work_designation']);
        $release_work_date_assumed = $this->security->xss_clean($_REQUEST['release_work_date_assumed']);
        $release_official_letter = $this->security->xss_clean($_REQUEST['rel_official_letter_no']);
        $release_place = $this->security->xss_clean($_REQUEST['release_place']);
        $release_salary_drawn = $this->security->xss_clean($_REQUEST['release_salary_drawn']);

        $letter_create = $this->security->xss_clean($_REQUEST['letter_create']);


        //Populate Services Array
        $service = array('ID' => $service_id, 'user_updated' => $this->session->username);

        if ($service_mood == '7'){
            //releasement

            $releasement = array('service_id' => $service_id, 'rel_type_id' => $release_type, 'rel_place_id' => $release_place, 'rel_start_date' => date("y-m-d", strtotime($release_study_st_date)), 'rel_end_date' => date("y-m-d", strtotime($release_study_end_date)), 'rel_designation' => $release_work_designation, 'rel_date' => date("y-m-d", strtotime($release_work_date_assumed)), 'salary_drawn' => $release_salary_drawn, 'rel_institute' => $release_institute_name, 'off_letter_no' => $release_official_letter);
           // print_r($releasement);

        }else{
            $service['work_place_id'] = $work_place;
            $service['designation_id'] = $designation;
            $service['grade'] = $present_grade;
            $service['off_letter_no'] = $official_letter_no;
            $service['duty_date'] = date("y-m-d", strtotime($date_assumed));

            switch ($work_place) {
                case 1:
                case 2:
                case 3:
                case 4:
                    $service['work_division_id'] = $main_division;
                    $service['work_branch_id'] = $main_branch;
                    break;
                case 5:
                case 6:
                    $service['sub_location_id'] = $province_office;
                    break;
                case 7:
                    $service['sub_location_id'] = $zonal_office;
                    break;
                case 8:
                    $service['sub_location_id'] = $divisional_office;
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
                    $service['sub_location_id'] = $institute;
                    break;

                default:
            }
        }

        if($service_mood == '7'){
            $res = $this->Form_data_model->update('Releasement', 'service_id', $service_id, $releasement);
        } else {
            $res = $this->Form_data_model->update('Service', 'ID', $service_id, $service);
        }

        if($res == '1'){
            redirect('admin/profile/'.$person_id );
        } else {
            echo "Error updating!";
        }
    }

    public function updateGeneralServiceForm($id)
    {
        $this->check_sess($this->session->user_logged);
        $searchArray = array('ID' => $id);
        $this->response['general'] = $this->Form_data_model->searchdb('General_Service', $searchArray);
        $this->response['subjects'] = $this->Form_data_model->select('subject');

        //echo $this->response['service']['0']['person_id'];
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');

		$this->load->view('update_general', $this->response);
		$this->load->view('footer');
    }

    public function updateGeneralService()
    {

        $person_id = $this->security->xss_clean($_REQUEST['person_id']);
        $service_id = $this->security->xss_clean($_REQUEST['service_id']);
        $date_f_appoint = $this->security->xss_clean($_REQUEST['date_f_appoint']);
        $date_join = $this->security->xss_clean($_REQUEST['date_join']);
        $way_joined = $this->security->xss_clean($_REQUEST['way_joined']);
        $cadre = $this->security->xss_clean($_REQUEST['cadre']);
        $grade = $this->security->xss_clean($_REQUEST['grade']);
        $special_subject = $this->security->xss_clean($_REQUEST['special_subject']);
        $medium_recruit = $this->security->xss_clean($_REQUEST['medium_recruit']);
        $confirm = $this->security->xss_clean($_REQUEST['confirm']);
        $date_confirm = $this->security->xss_clean($_REQUEST['date_confirm']);
        $rank_entrance = $this->security->xss_clean($_REQUEST['rank_entrance']);

        //Populate Services Array
        $service = array('ID' => $service_id, 'f_appoint_date' => $date_f_appoint, 'date_join' => $date_join, 'way_join' => $way_joined, 'cadre' => $cadre, 'grade' => $grade, 'medium' => $medium_recruit, 'confirm' => $confirm, 'confirm_date' => $date_confirm, 'entrance_exam_rank' => $rank_entrance);

        if($special_subject){ $service['subject'] = $special_subject; }

        $res = $this->Form_data_model->update('General_Service', 'ID', $service_id, $service);

        if($res == '1'){
            redirect('admin/profile/'.$person_id );
        } else {
            echo "Error updating!";
        }
    }



    public function addLeave()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $person_id = $this->security->xss_clean($this->input->post('person_id'));
        $l_year = $this->security->xss_clean($this->input->post('l_year'));
        $l_type = $this->security->xss_clean($this->input->post('l_type'));
        $l_count = $this->security->xss_clean($this->input->post('l_count'));

        $dataarray = array("person_id" => $person_id, 'leave_year' => $l_year, 'leave_type_id' => $l_type, 'leave_count' => $l_count, 'user_updated' => $this->session->username);
        $res = $this->Form_data_model->insertData('Leaves', $dataarray);

        if ($res == '1'){
            echo json_encode('1');
        }
    }

    public function editLeave()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $l_id = $this->security->xss_clean($this->input->post('l_id'));
        $l_year = $this->security->xss_clean($this->input->post('l_year'));
        $l_type = $this->security->xss_clean($this->input->post('l_type'));
        $l_count = $this->security->xss_clean($this->input->post('l_count'));

        $dataarray = array('leave_year' => $l_year, 'leave_type_id' => $l_type, 'leave_count' => $l_count, 'user_updated' => $this->session->username);
        $res = $this->Form_data_model->update('Leaves', 'ID', $l_id,  $dataarray);

        if ($res == '1'){
            echo json_encode('1');
        }
    }

    public function deleteLeave()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $l_id = $this->security->xss_clean($this->input->post('l_id'));

        $res = $this->Main_data_model->delete('Leaves', 'ID', $l_id);
        if($res == '1'){
            echo "Success";
        }
    }

    public function verifyBarcode()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $barcode = $this->security->xss_clean($this->input->post('barcode'));
        $searchArray = array('barcode' => $barcode);
        $res = $this->Form_data_model->searchdb('Service', $searchArray);
        if ($res){
            echo 1;
        }else{
            echo 0;
        }

    }
}
