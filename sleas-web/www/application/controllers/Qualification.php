<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qualification extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/DataAdmin
	 *	- or -
	 * 		http://example.com/index.php/DataAdmin/index
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
        $this->load->model('Report_model'); //load database model.
        
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

    
    public function newattachment()
    {
        $this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
		$this->load->view('search_officer', $this->response);

		$this->load->view('footer');
    }
    
}
?>