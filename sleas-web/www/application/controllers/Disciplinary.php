<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disciplinary extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
    }

    public $response = array("result"=>"none", "data"=>"none", "register"=>"x", "sidemenu" => "menu_disciplinary",  "class" => "Disciplinary");
    public $view_data_array = array();

    public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			redirect('/login/index');
		}//Redirect to login page if admin session not initiated.
	}

    public function addDisciplinary()
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
            $this->response['disciplinary'] = $this->Form_data_model->select('disciplinary');
            $this->response['method'] = 'disciplinary_add';
    		$this->load->view('disciplinary_form', $this->response);
        }
		$this->load->view('footer');
    }

    public function disciplinary_add()
    {
        $this->check_sess($this->session->user_logged);
        //Get form data

        $person_id = $this->security->xss_clean($_REQUEST['person_id']);
        $disciplinary_date = $this->security->xss_clean($_REQUEST['disciplinary_date']);
        $disciplinary_type_id = $this->security->xss_clean($_REQUEST['disciplinary_type']);
        $disciplinary_action_id = $this->security->xss_clean($_REQUEST['disciplinary_action']);

        $disciplinary = array('person_id' => $person_id, 'disciplinary_type_id'=>$disciplinary_type_id,  'disciplinary_action_id'=>$disciplinary_action_id, 'effective_date' => $disciplinary_date, 'user_updated' => $this->session->username);

        $res = $this->Form_data_model->insertData('Disciplinary_Actions', $disciplinary);

        //$res =1;
        if ($res == 1){
            $this->session->set_flashdata('update','success');
            redirect('/admin/sclerk');
        }else {
            redirect('/disciplinary/add' . $person_id);
            echo ('alert("Please Check the Data and Try Again!");');
        }
    }

    public function checkPermision($personID){
        $permision = 0;

        $result = $this->Form_data_model->get_Officer_recent_service($personID);

        if ($this->session->workplace == '7') {
            if ($result['0']['work_place_id'] == '7' && $this->session->location == $result['0']['sub_location_id']) {
                $permision = 1;
            }
        }else {
            $permision = 1;
        }

        return $permision;
    }

}
?>
