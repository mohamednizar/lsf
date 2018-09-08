<?php
# @Author: Kosala Gangabadage <Kosala>
# @Date:   2017-12-29T09:59:47+05:30
# @Email:  kosala4@gmail.com
# @Last modified by:   Kosala Gangabadage
# @Last modified time: 2018-05-22T20:03:48+05:30



defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Login Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -
	 * 		http://example.com/index.php/login/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/login/<method_name>
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->helper('url'); //load url helper.
        $this->load->helper('form');
    }
	public function index()
	{
        $this->session->sess_destroy();
		$this->load->view('login');
	}

	function redirect_user($user_level)
	{
		//check user type to redirect
		if ($user_level == "0") {
			redirect('/admin/index');
		}else if ($user_level == "1") {
            redirect('/admin/officer');
        }else if ($user_level == "2") {
            redirect('/admin/sclerk');
        }else if ($user_level == "3") {
            redirect('/management/index');
        }else{
			redirect('/editor/index');
		}
	}

	function login_user()
	{
		$uname = strtolower($this->security->xss_clean($_REQUEST['username']));
		//$pwd  = password_hash($this->security->xss_clean($_REQUEST['password']), PASSWORD_DEFAULT);
		$pwd  = $this->security->xss_clean($_REQUEST['password']);

		$chk_login = $this->User_model->login($uname, $pwd);

		if ($chk_login == 1) {
			$this->load->library('session');
			$data = $this->User_model->get_a_record('LOWER(user_name)',$uname);
            $name = $data[0]['name'];
            $level = $data[0]['level'];
            $id = $data[0]['person_id'];
            $workplace = $data[0]['workplace_id'];
            $location = $data[0]['sub_location_id'];
			$userData = array('username' => $uname, 'name' => $name, 'user_level'=>$level, 'officer_ID' =>$id, 'workplace' => $workplace, 'location' => $location, 'user_logged' => "in");
			$this->session->set_userdata($userData);

            $this->redirect_user($data[0]['level']);
            //echo($data[0]['level']);

			//redirect('/admin/index');
		}else {
			echo "Invalid User name or Password";
			redirect('/login/index');
		}
	}
}
