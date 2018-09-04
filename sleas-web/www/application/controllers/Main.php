<?php
# @Author: Kosala Gangabadage <Kosala>
# @Date:   2017-12-29T09:59:47+05:30
# @Email:  kosala4@gmail.com
# @Last modified by:   Kosala
# @Last modified time: 2017-12-29T12:24:19+05:30



defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
        $this->load->model('Main_data_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.

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

    public $response = array("result"=>"none", "data"=>"none");

    //work_places
	public function Places($place)
	{
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}


		$this->load->view('head');
		$this->load->view('admin_sidebar');

        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
        $this->response['districtList'] = $this->Form_data_model->select('district_list');

		$this->load->view('master/workplaces/' . $place, $this->response);

		$this->load->view('footer');
	}

    public function updateWorkplace()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}


        header('Content-Type: application/x-json; charset=utf-8');
        $workplace_id = $this->security->xss_clean($this->input->post('workplace_id'));
        $workplace_name = $this->security->xss_clean($this->input->post('workplace_name'));

        $user_array = array('ID' => $workplace_id, 'work_place' => $workplace_name);
        $res = $this->Main_data_model->update('Work_Place', 'ID', $workplace_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addWorkplace()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}


        header('Content-Type: application/x-json; charset=utf-8');

        $workplace_id_array = $this->Main_data_model->get_recent_id('Work_Place');
        $workplace_id = $workplace_id_array['0']['ID'] + 1;

        $workplace_name = $this->security->xss_clean($this->input->post('workplace_name'));
        $workplace_code = $this->security->xss_clean($this->input->post('workplace_code'));

        $user_array = array('ID' => $workplace_id, 'work_place' => $workplace_name, 'work_place_code' => $workplace_code);
        $res = $this->Main_data_model->insert('Work_Place', $user_array);

        if(res == '1'){
            //echo strval($workplace_id);
            echo "success";
        }else {
            echo strval($workplace_id);
        }
    }

    public function deleteWorkplace()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $workplace_id = $this->security->xss_clean($this->input->post('workplace_id'));

        $res = $this->Main_data_model->delete('Work_Place', 'ID', $workplace_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addBranch()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $branch_id_array = $this->Main_data_model->get_recent_id('Main_Office_Branches');
        $branch_id = $branch_id_array['0']['ID'] + 1;

        $branch_name = $this->security->xss_clean($this->input->post('branch_name'));
        $work_place_id = $this->security->xss_clean($this->input->post('work_place_id'));

        $user_array = array('ID' => $branch_id, 'work_place_id' => $work_place_id, 'office_branch' => $branch_name);
        $res = $this->Main_data_model->insert('Main_Office_Branches', $user_array);

        if(res == '1'){
            //echo strval($workplace_id);
            echo "success";
        }else {
            echo strval($branch_id);
        }
    }

    public function updateBranch()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}


        header('Content-Type: application/x-json; charset=utf-8');
        $branch_id = $this->security->xss_clean($this->input->post('branch_id'));
        $branch_name = $this->security->xss_clean($this->input->post('branch_name'));

        $user_array = array('office_branch' => $branch_name);
        $res = $this->Main_data_model->update('Main_Office_Branches', 'ID', $branch_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteBranch()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $branch_id = $this->security->xss_clean($this->input->post('branch_id'));

        $res = $this->Main_data_model->delete('Main_Office_Branches', 'ID', $branch_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addDivision()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $division_id_array = $this->Main_data_model->get_recent_id('Main_Office_Divisions');
        $division_id = $division_id_array['0']['ID'] + 1;

        $division_name = $this->security->xss_clean($this->input->post('division_name'));
        $work_place_id = $this->security->xss_clean($this->input->post('work_place_id'));

        $user_array = array('ID' => $division_id, 'work_place_id' => $work_place_id, 'office_division' => $division_name);
        $res = $this->Main_data_model->insert('Main_Office_Divisions', $user_array);

        if(res == '1'){
            echo "success";
        }else {
            echo strval($division_id);
        }
    }

    public function updateDivision()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}


        header('Content-Type: application/x-json; charset=utf-8');
        $division_id = $this->security->xss_clean($this->input->post('division_id'));
        $division_name = $this->security->xss_clean($this->input->post('division_name'));

        $user_array = array('office_division' => $division_name);
        $res = $this->Main_data_model->update('Main_Office_Divisions', 'ID', $division_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteDivision()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $division_id = $this->security->xss_clean($this->input->post('division_id'));

        $res = $this->Main_data_model->delete('Main_Office_Divisions', 'ID', $division_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addProvince()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $province_id_no_array = $this->Main_data_model->get_recent_id('Province_Offices');
        $province_id_no = $province_id_no_array['0']['ID'] + 1;

        $province_name = $this->security->xss_clean($this->input->post('province_name'));
        $work_place_id = $this->security->xss_clean($this->input->post('work_place_id'));
        $province_id = $this->security->xss_clean($this->input->post('province_id_no'));

        $user_array = array('ID' => $province_id_no, 'work_place_id' => $work_place_id, 'province_id' => $province_id, 'province_office' => $province_name);
        $res = $this->Main_data_model->insert('Province_Offices', $user_array);

        if(res == '1'){
            echo strval($province_id_no);
        }else {
            echo strval($province_id_no);
        }
    }

    public function updateProvince()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $province_id_no = $this->security->xss_clean($this->input->post('province_id'));
        $province_name = $this->security->xss_clean($this->input->post('province_name'));

        $user_array = array('province_office' => $province_name);
        $res = $this->Main_data_model->update('Province_Offices', 'ID', $province_id_no, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteProvince()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $province_id_no = $this->security->xss_clean($this->input->post('province_id'));

        $res = $this->Main_data_model->delete('Province_Offices', 'ID', $province_id_no);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addZonal()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $zonal_id_no_array = $this->Main_data_model->get_recent_id('Zonal_Offices');
        $zonal_id_no = $zonal_id_no_array['0']['ID'] + 1;

        $workplace_id = $this->security->xss_clean($this->input->post('workplace_id'));
        $dist_id = $this->security->xss_clean($this->input->post('dist_id'));
        $zonal_name = $this->security->xss_clean($this->input->post('zonal_name'));
        $zonal_address = $this->security->xss_clean($this->input->post('zonal_address'));

        $user_array = array('ID' => $zonal_id_no, 'work_place_id' => $workplace_id, 'dist_id' => $dist_id, 'zonal_office' => $zonal_name, 'zonal_office_address' => $zonal_address);
        $res = $this->Main_data_model->insert('Zonal_Offices', $user_array);

        if(res == '1'){
            echo strval($zonal_id_no);
        }else {
            echo strval($zonal_id_no);
        }
    }

    public function updateZonal()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $zonal_id_no = $this->security->xss_clean($this->input->post('zonal_id'));
        $zonal_name = $this->security->xss_clean($this->input->post('zonal_name'));
        $zonal_address = $this->security->xss_clean($this->input->post('zonal_address'));

        $user_array = array('zonal_office' => $zonal_name, 'zonal_office_address' => $zonal_address);
        $res = $this->Main_data_model->update('Zonal_Offices', 'ID', $zonal_id_no, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteZonal()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $zonal_id_no = $this->security->xss_clean($this->input->post('zonal_id'));

        $res = $this->Main_data_model->delete('Zonal_Offices', 'ID', $zonal_id_no);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addDivisional()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $divisional_id_no_array = $this->Main_data_model->get_recent_id('Divisional_Offices');
        $divisional_id_no = $divisional_id_no_array['0']['ID'] + 1;

        $workplace_id = $this->security->xss_clean($this->input->post('workplace_id'));
        $zone_id = $this->security->xss_clean($this->input->post('zone_id'));
        $divisional_name = $this->security->xss_clean($this->input->post('divisional_name'));
        $divisional_address = $this->security->xss_clean($this->input->post('divisional_address'));

        $user_array = array('ID' => $divisional_id_no, 'work_place_id' => $workplace_id, 'zone_id' => $zone_id, 'division_office' => $divisional_name, 'division_office_address' => $divisional_address);
        $res = $this->Main_data_model->insert('Divisional_Offices', $user_array);

        if(res == '1'){
            echo strval($divisional_id_no);
        }else {
            echo strval($divisional_id_no);
        }
    }

    public function updateDivisional()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $divisional_id_no = $this->security->xss_clean($this->input->post('divisional_id'));
        $divisional_name = $this->security->xss_clean($this->input->post('divisional_name'));
        $divisionall_address = $this->security->xss_clean($this->input->post('divisional_address'));

        $user_array = array('division_office' => $divisional_name, 'division_office_address' => $divisionall_address);
        $res = $this->Main_data_model->update('Divisional_Offices', 'ID', $divisional_id_no, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteDivisional()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $divisional_id_no = $this->security->xss_clean($this->input->post('divisional_id'));

        $res = $this->Main_data_model->delete('Divisional_Offices', 'ID', $divisional_id_no);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addInstitute()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $institute_data_array = $this->Main_data_model->get_recent_id('Institute');
        $institute_data_id = $institute_data_array['0']['ID'] + 1;

        $work_place_id = $this->security->xss_clean($this->input->post('work_place_id'));
        $division_id = $this->security->xss_clean($this->input->post('division_id'));
        $institute_id = $this->security->xss_clean($this->input->post('institute_id'));
        $institute_name = $this->security->xss_clean($this->input->post('institute_name'));
        $institute_address = $this->security->xss_clean($this->input->post('institute_address'));

        $user_array = array('ID' => $institute_data_id, 'div_id' => $division_id, 'institute_id' => $institute_id, 'workplace_id' => $work_place_id, 'institute_name' => $institute_name, 'institute_address' => $institute_address);
        $res = $this->Main_data_model->insert('Institute', $user_array);

        if(res == '1'){
            //echo strval($workplace_id);
            echo "success";
        }else {
            echo strval($institute_data_id);
        }
    }

    public function updateInstitute()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}


        header('Content-Type: application/x-json; charset=utf-8');
        $work_place_id = $this->security->xss_clean($this->input->post('work_place_id'));
        $division_id = $this->security->xss_clean($this->input->post('division_id'));
        $institute_data_id = $this->security->xss_clean($this->input->post('institute_data_id'));
        $institute_id = $this->security->xss_clean($this->input->post('institute_id'));
        $institute_name = $this->security->xss_clean($this->input->post('institute_name'));
        $institute_address = $this->security->xss_clean($this->input->post('institute_address'));

        $user_array = array('div_id' => $division_id, 'institute_id' => $institute_id,'institute_name' => $institute_name, 'institute_address' => $institute_address);
        $res = $this->Main_data_model->update('Institute', 'ID', $institute_data_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteInstitute()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $institute_data_id = $this->security->xss_clean($this->input->post('institute_data_id'));

        $res = $this->Main_data_model->delete('Institute', 'ID', $institute_data_id);

        if(res == '1'){
            echo "Success";
        }

    }

    /******** End of WorkPlaces Changes ********/
    /******** Qualification Master Table Changes ********/

	public function Qualifications($qual)
	{
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}


		$this->load->view('head');
		$this->load->view('admin_sidebar');

        $this->response['modes'] = $this->Form_data_model->select('service_mode');

		$this->load->view('master/qualifications/' . $qual, $this->response);

		$this->load->view('footer');
	}

    public function addQualification()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $q_id_no_array = $this->Main_data_model->get_recent_id('Qualification_List');
        $q_id_no = $q_id_no_array['0']['ID'] + 1;

        $q_type_id = $this->security->xss_clean($this->input->post('q_id'));
        $q_name = $this->security->xss_clean($this->input->post('q_name'));

        $user_array = array('ID' => $q_id_no, 'qualification_type_id' => $q_type_id, 'qualification' => $q_name);
        $res = $this->Main_data_model->insert('Qualification_List', $user_array);

        if(res == '1'){
            echo strval($q_id_no);
        }else {
            echo strval($q_id_no);
        }
    }

    public function updateQualification()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $q_id = $this->security->xss_clean($this->input->post('q_id'));
        $q_name = $this->security->xss_clean($this->input->post('q_name'));

        $user_array = array('qualification' => $q_name);
        $res = $this->Main_data_model->update('Qualification_List', 'ID', $q_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteQualification()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $q_id = $this->security->xss_clean($this->input->post('q_id'));

        $res = $this->Main_data_model->delete('Qualification_List', 'ID', $q_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addQualificationSubject()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $q_id_no_array = $this->Main_data_model->get_recent_id('Qualification_Subjects');
        $q_id_no = $q_id_no_array['0']['ID'] + 1;

        $q_name_id = $this->security->xss_clean($this->input->post('q_name_id'));
        $q_subject = $this->security->xss_clean($this->input->post('q_subject'));

        $user_array = array('ID' => $q_id_no, 'qualification_name_id' => $q_name_id, 'qualification_subject' => $q_subject);
        $res = $this->Main_data_model->insert('Qualification_Subjects', $user_array);

        if(res == '1'){
            echo strval($q_id_no);
        }else {
            echo strval($q_id_no);
        }
    }

    public function updateQualificationSubject()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $q_subject_id = $this->security->xss_clean($this->input->post('q_subject_id'));
        $q_subject = $this->security->xss_clean($this->input->post('q_subject'));

        $user_array = array('qualification_subject' => $q_subject);
        $res = $this->Main_data_model->update('Qualification_Subjects', 'ID', $q_subject_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteQualificationSubject()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $q_subject_id = $this->security->xss_clean($this->input->post('q_subject_id'));

        $res = $this->Main_data_model->delete('Qualification_Subjects', 'ID', $q_subject_id);

        if(res == '1'){
            echo "Success";
        }

    }

    /******** End of ualification Master Table Changes ********/
    /******** Service Details Master Table Changes ********/

	public function Service($service)
	{
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}


		$this->load->view('head');
		$this->load->view('admin_sidebar');

        $this->response['modes'] = $this->Form_data_model->select('service_mode');

		$this->load->view('master/service/' . $service, $this->response);

		$this->load->view('footer');
	}

    public function addServiceMode()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $mode_id_no_array = $this->Main_data_model->get_recent_id('Service_Mode');
        $mode_id_no = $mode_id_no_array['0']['ID'] + 1;

        $mode_name = $this->security->xss_clean($this->input->post('mode_name'));

        $user_array = array('ID' => $mode_id_no, 'mode' => $mode_name);
        $res = $this->Main_data_model->insert('Service_Mode', $user_array);

        if(res == '1'){
            echo strval($mode_id_no);
        }else {
            echo strval($mode_id_no);
        }
    }

    public function updateServiceMode()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $mode_id = $this->security->xss_clean($this->input->post('mode_id'));
        $mode_name = $this->security->xss_clean($this->input->post('mode_name'));

        $user_array = array('mode' => $mode_name);
        $res = $this->Main_data_model->update('Service_Mode', 'ID', $mode_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteServiceMode()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $mode_id = $this->security->xss_clean($this->input->post('mode_id'));

        $res = $this->Main_data_model->delete('Service_Mode', 'ID', $mode_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addDeactType()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $deact_id_no_array = $this->Main_data_model->get_recent_id('Deactivation_Type');
        $deact_id_no = $deact_id_no_array['0']['ID'] + 1;

        $deact_name = $this->security->xss_clean($this->input->post('deact_name'));

        $user_array = array('ID' => $deact_id_no, 'type' => $deact_name);
        $res = $this->Main_data_model->insert('Deactivation_Type', $user_array);

        if(res == '1'){
            echo strval($deact_id_no);
        }else {
            echo strval($deact_id_no);
        }
    }

    public function updateDeactType()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $deact_id = $this->security->xss_clean($this->input->post('deact_id'));
        $deact_name = $this->security->xss_clean($this->input->post('deact_name'));

        $user_array = array('type' => $deact_name);
        $res = $this->Main_data_model->update('Deactivation_Type', 'ID', $deact_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteDeactType()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $deact_id = $this->security->xss_clean($this->input->post('deact_id'));

        $res = $this->Main_data_model->delete('Deactivation_Type', 'ID', $deact_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addDiscipType()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $discip_id_no_array = $this->Main_data_model->get_recent_id('Disciplinary_Type');
        $discip_id_no = $discip_id_no_array['0']['ID'] + 1;

        $discip_name = $this->security->xss_clean($this->input->post('discip_name'));

        $user_array = array('ID' => $discip_id_no, 'action_type' => $discip_name);
        $res = $this->Main_data_model->insert('Disciplinary_Type', $user_array);

        if(res == '1'){
            echo strval($discip_id_no);
        }else {
            echo strval($discip_id_no);
        }
    }

    public function updateDiscipType()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $discip_id = $this->security->xss_clean($this->input->post('discip_id'));
        $discip_name = $this->security->xss_clean($this->input->post('discip_name'));

        $user_array = array('action_type' => $discip_name);
        $res = $this->Main_data_model->update('Disciplinary_Type', 'ID', $discip_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteDiscipType()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $discip_id = $this->security->xss_clean($this->input->post('discip_id'));

        $res = $this->Main_data_model->delete('Disciplinary_Type', 'ID', $discip_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addDisciplinaryAction()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $discip_id_no_array = $this->Main_data_model->get_recent_id('Disciplinary_Actions_List');
        $discip_id_no = $discip_id_no_array['0']['ID'] + 1;

        $discip_name = $this->security->xss_clean($this->input->post('discip_name'));
        $discip_type = $this->security->xss_clean($this->input->post('discip_type'));

        $user_array = array('ID' => $discip_id_no, 'action_type_id' => $discip_type, 'action_name' => $discip_name);
        $res = $this->Main_data_model->insert('Disciplinary_Actions_List', $user_array);

        if(res == '1'){
            echo strval($discip_id_no);
        }else {
            echo strval($discip_id_no);
        }
    }

    public function updateDisciplinaryAction()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $discip_id = $this->security->xss_clean($this->input->post('discip_id'));
        $discip_name = $this->security->xss_clean($this->input->post('discip_name'));

        $user_array = array('action_name' => $discip_name);
        $res = $this->Main_data_model->update('Disciplinary_Actions_List', 'ID', $discip_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteDisciplinaryAction()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $discip_id = $this->security->xss_clean($this->input->post('discip_id'));

        $res = $this->Main_data_model->delete('Disciplinary_Actions_List', 'ID', $discip_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addRelType()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $reltype_id_no_array = $this->Main_data_model->get_recent_id('Releasement_Type');
        $reltype_id_no = $reltype_id_no_array['0']['ID'] + 1;

        $reltype_name = $this->security->xss_clean($this->input->post('reltype_name'));

        $user_array = array('ID' => $reltype_id_no, 'rel_type' => $reltype_name);
        $res = $this->Main_data_model->insert('Releasement_Type', $user_array);

        if(res == '1'){
            echo strval($reltype_id_no);
        }else {
            echo strval($reltype_id_no);
        }
    }

    public function updateRelType()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $reltype_id = $this->security->xss_clean($this->input->post('reltype_id'));
        $reltype_name = $this->security->xss_clean($this->input->post('reltype_name'));

        $user_array = array('rel_type' => $reltype_name);
        $res = $this->Main_data_model->update('Releasement_Type', 'ID', $reltype_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteRelType()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $reltype_id = $this->security->xss_clean($this->input->post('reltype_id'));

        $res = $this->Main_data_model->delete('Releasement_Type', 'ID', $reltype_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addLType()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $ltype_id_no_array = $this->Main_data_model->get_recent_id('Leave_Types');
        $ltype_id_no = $ltype_id_no_array['0']['ID'] + 1;

        $ltype_name = $this->security->xss_clean($this->input->post('leavetype_name'));

        $user_array = array('ID' => $ltype_id_no, 'leave_type' => $ltype_name);
        $res = $this->Main_data_model->insert('Leave_Types', $user_array);

        if(res == '1'){
            echo strval($ltype_id_no);
        }else {
            echo strval($ltype_id_no);
        }
    }

    public function updateLType()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $ltype_id = $this->security->xss_clean($this->input->post('leavetype_id'));
        $ltype_name = $this->security->xss_clean($this->input->post('leavetype_name'));

        $user_array = array('leave_type' => $ltype_name);
        $res = $this->Main_data_model->update('Leave_Types', 'ID', $ltype_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteLType()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $ltype_id = $this->security->xss_clean($this->input->post('leavetype_id'));

        $res = $this->Main_data_model->delete('Leave_Types', 'ID', $ltype_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addRelPlace()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $rel_id_no_array = $this->Main_data_model->get_recent_id('Releasement_Place');
        $rel_id_no = $rel_id_no_array['0']['ID'] + 1;

        $rel_type = $this->security->xss_clean($this->input->post('rel_type'));
        $relplace_name = $this->security->xss_clean($this->input->post('relplace_name'));

        $user_array = array('ID' => $rel_id_no, 'rel_type_id' => $rel_type, 'rel_place' => $relplace_name);
        $res = $this->Main_data_model->insert('Releasement_Place', $user_array);

        if(res == '1'){
            echo strval($rel_id_no);
        }else {
            echo strval($rel_id_no);
        }
    }

    public function updateRelPlace()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $relplace_id = $this->security->xss_clean($this->input->post('relplace_id'));
        $relplace_name = $this->security->xss_clean($this->input->post('relplace_name'));

        $user_array = array('rel_place' => $relplace_name);
        $res = $this->Main_data_model->update('Releasement_Place', 'ID', $relplace_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteRelPlace()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $relplace_id = $this->security->xss_clean($this->input->post('relplace_id'));

        $res = $this->Main_data_model->delete('Releasement_Place', 'ID', $relplace_id);

        if(res == '1'){
            echo "Success";
        }

    }

    public function addSpSubject()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');

        $spsubject_id_no_array = $this->Main_data_model->get_recent_id('Sleas_Subject');
        $spsubject_id_no = $spsubject_id_no_array['0']['ID'] + 1;

        $spsubject_name = $this->security->xss_clean($this->input->post('spsubject_name'));

        $user_array = array('ID' => $spsubject_id_no, 'sub_name' => $spsubject_name);
        $res = $this->Main_data_model->insert('Sleas_Subject', $user_array);

        if(res == '1'){
            echo strval($spsubject_id_no);
        }else {
            echo strval($spsubject_id_no);
        }
    }

    public function updateSpSubject()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $spsubject_id = $this->security->xss_clean($this->input->post('spsubject_id'));
        $spsubject_name = $this->security->xss_clean($this->input->post('spsubject_name'));

        $user_array = array('sub_name' => $spsubject_name);
        $res = $this->Main_data_model->update('Sleas_Subject', 'ID', $spsubject_id, $user_array);

        if(res == '1'){
            echo "Success";
        }

    }

    public function deleteSpSubject()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}

        header('Content-Type: application/x-json; charset=utf-8');
        $spsubject_id = $this->security->xss_clean($this->input->post('spsubject_id'));

        $res = $this->Main_data_model->delete('Sleas_Subject', 'ID', $spsubject_id);

        if(res == '1'){
            echo "Success";
        }

    }

}
?>
