<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataadmin extends CI_Controller {

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
        
    }
    
    public function index()
    {
		/*$this->load->view('head');
		$this->load->view('sclerk_sidebar');*/
        $this->load->view('report');
    }

}
?>