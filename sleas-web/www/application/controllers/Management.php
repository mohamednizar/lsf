<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Management
	 *	- or -
	 * 		http://example.com/index.php/Management/index
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
    
    public function index()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '3') {$this->logout();}
		$this->load->view('head');
		$this->load->view('manager_sidebar');
        
        $this->countOfficers("res");
        $this->load->view('mangement_dashboard', $this->response);
		$this->load->view('footer');
    }
    
    public function countOfficers($res)
    {
        //Count All Officers
        
        //header('Content-Type: application/x-json; charset=utf-8');
        
        $searchArray = array('1' => '1');
        $this->response['countAll'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Grade I Officers
        $searchArray = array('g.grade' => 'Grade I');
        $this->response['countgr1'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Grade II Officers
        $searchArray = array('g.grade' => 'Grade II', 'g.cadre' => 'General Cadre');
        $this->response['countgr2'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Grade III Officers
        $searchArray = array('g.grade' => 'Grade III', 'g.cadre' => 'General Cadre');
        $this->response['countgr3'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Grade III Special Officers
        $searchArray = array( 'g.cadre' => 'Special Cadre');
        $this->response['countspecial'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade I in MoE
        $searchArray = array('g.grade' => 'Grade I', 's1.work_place_id' => '1');
        $this->response['g01']['moe'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade II in MoE
        $searchArray = array('g.grade' => 'Grade II', 's1.work_place_id' => '1', 'g.cadre' => 'General Cadre');
        $this->response['g02']['moe'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade III in MoE
        $searchArray = array('g.grade' => 'Grade III', 's1.work_place_id' => '1', 'g.cadre' => 'General Cadre');
        $this->response['g03']['moe'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Special Cadre in MoE
        $searchArray = array('s1.work_place_id' => '1', 'g.cadre' => 'Special Cadre');
        $this->response['gsp']['moe'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Total Officers in MoE
        $this->response['tot']['moe'] = $this->response['g01']['moe'] + $this->response['g02']['moe'] + $this->response['g03']['moe'] + $this->response['gsp']['moe'];
        
        //Count officer Grade I in Exams
        $searchArray = array('g.grade' => 'Grade I', 's1.work_place_id' => '2');
        $this->response['g01']['exam'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade II in Exams
        $searchArray = array('g.grade' => 'Grade II', 's1.work_place_id' => '2', 'g.cadre' => 'General Cadre');
        $this->response['g02']['exam'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade III in Exams
        $searchArray = array('g.grade' => 'Grade III', 's1.work_place_id' => '2', 'g.cadre' => 'General Cadre');
        $this->response['g03']['exam'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Special Cadre in Exams
        $searchArray = array('s1.work_place_id' => '2', 'g.cadre' => 'Special Cadre');
        $this->response['gsp']['exam'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Total Officers in Exams
        $this->response['tot']['exam'] = $this->response['g01']['exam'] + $this->response['g02']['exam'] + $this->response['g03']['exam'] + $this->response['gsp']['exam'];
        
        //Count officer Grade I in Publications
        $searchArray = array('g.grade' => 'Grade I', 's1.work_place_id' => '3');
        $this->response['g01']['epub'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade II in Publications
        $searchArray = array('g.grade' => 'Grade II', 's1.work_place_id' => '3', 'g.cadre' => 'General Cadre');
        $this->response['g02']['epub'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade III in Publications
        $searchArray = array('g.grade' => 'Grade III', 's1.work_place_id' => '3', 'g.cadre' => 'General Cadre');
        $this->response['g03']['epub'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Special Cadre in Publications
        $searchArray = array('s1.work_place_id' => '3', 'g.cadre' => 'Special Cadre');
        $this->response['gsp']['epub'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Total Officers in Publications
        $this->response['tot']['epub'] = $this->response['g01']['epub'] + $this->response['g02']['epub'] + $this->response['g03']['epub'] + $this->response['gsp']['epub'];
        
        //Count Officer in Provinces
        
        $Province_list = array('01' => array('P01'=>0, 'P02'=>0, 'P03'=>0, 'P03'=>0, 'P04'=>0, 'P05'=>0, 'P06'=>0, 'P07'=>0, 'P08'=>0, 'P09'=>0),
                              '02' => array('P01'=>0, 'P02'=>0, 'P03'=>0, 'P03'=>0, 'P04'=>0, 'P05'=>0, 'P06'=>0, 'P07'=>0, 'P08'=>0, 'P09'=>0),
                              '03' => array('P01'=>0, 'P02'=>0, 'P03'=>0, 'P03'=>0, 'P04'=>0, 'P05'=>0, 'P06'=>0, 'P07'=>0, 'P08'=>0, 'P09'=>0),
                              'sp' => array('P01'=>0, 'P02'=>0, 'P03'=>0, 'P03'=>0, 'P04'=>0, 'P05'=>0, 'P06'=>0, 'P07'=>0, 'P08'=>0, 'P09'=>0) ,
                              'tot' => array('P01'=>0, 'P02'=>0, 'P03'=>0, 'P03'=>0, 'P04'=>0, 'P05'=>0, 'P06'=>0, 'P07'=>0, 'P08'=>0, 'P09'=>0) );
        
        //Count Grade I officers
        $searchArray = array('g.grade' => 'Grade I');
        $Grade1Array = $this->Report_model->countOfficers($searchArray, 'list');
        
        foreach($Grade1Array as $row){
            if ($row['province']){
                $Province_list['01'][$row['province']]++;
                $Province_list['tot'][$row['province']]++;
            }
        }
        
        //Count Grade II officers
        $searchArray = array('g.grade' => 'Grade II', 'g.cadre' => 'General Cadre');
        $Grade1Array = $this->Report_model->countOfficers($searchArray, 'list');
        
        foreach($Grade1Array as $row){
            if ($row['province']){
                $Province_list['02'][$row['province']]++;
                $Province_list['tot'][$row['province']]++;
            }
        }
        
        //Count Grade III officers
        $searchArray = array('g.grade' => 'Grade III', 'g.cadre' => 'General Cadre');
        $Grade1Array = $this->Report_model->countOfficers($searchArray, 'list');
        
        foreach($Grade1Array as $row){
            if ($row['province']){
                $Province_list['03'][$row['province']]++;
                $Province_list['tot'][$row['province']]++;
            }
        }
        
        //Count Special Cadre officers
        $searchArray = array('g.cadre' => 'Special Cadre');
        $Grade1Array = $this->Report_model->countOfficers($searchArray, 'list');
        
        foreach($Grade1Array as $row){
            if ($row['province']){
                $Province_list['sp'][$row['province']]++;
                $Province_list['tot'][$row['province']]++;
            }
        }
        
        if ($res == 'res'){
            $this->response['listgrade'] = $Province_list;
        }else{
            $this->response['provinces'] = $Province_list;
            //echo json_encode($Province_list);
            echo json_encode($this->response);
        }
        
        
        
        /*$Province_list = array('P01', 'P02', 'P03', 'P03', 'P04', 'P05', 'P06', 'P07', 'P08', 'P09');
        foreach ($Province_list as $Province){
            
            //Count officer Grade I in Publications
            $searchArray = "g.grade = 'Grade I' AND (pl1.province_id = '$Province' OR pl2.province_id = '$Province' OR pl3.province_id = '$Province' OR pl4.province_id = '$Province')";
            $this->response[$Province.'_1'] = $this->Report_model->countOfficers($searchArray);

            //Count officer Grade II in Publications
            $searchArray = "g.grade = 'Grade II' AND (pl1.province_id = '$Province' OR pl2.province_id = '$Province' OR pl3.province_id = '$Province' OR pl4.province_id = '$Province')";
            $this->response[$Province.'_2'] = $this->Report_model->countOfficers($searchArray);

            //Count officer Grade III in Publications
            $searchArray = "g.grade = 'Grade III' AND (pl1.province_id = '$Province' OR pl2.province_id = '$Province' OR pl3.province_id = '$Province' OR pl4.province_id = '$Province')";
            $this->response[$Province.'_3'] = $this->Report_model->countOfficers($searchArray);
        }*/
    }

}
?>