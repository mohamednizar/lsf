<?php
namespace Controllers;

use Controllers\ApiController;
use Models\CRUDModel;
use Models\Service;
use Models\User;
use Rakit\Validation\Validator;
use \Dsheiko\Validate;

class UserController extends ApiController
{
    public $_error = [];
    private $personal_details;
    private $permanent_contact_details;
    private $temperary_contact_details;
    private $account_details;
    private $general_service;
    private $current_service;

    public function __construct()
    {
        $this->_crud = new CRUDModel();
        $this->_service = new Service();
        $this->_inputs = $this->inputs();
        $this->_user = new User();
    }

    /**
     *
     */
    public function get($id = null)
    {
        $data = $this->User->get_user($id);
        $this->response($data, 200, 'User data succesfully retrived');
    }

    public function post()
    {
        try {
            /**  */
            $res = 0;

            $this->setPersonalDetails();
            $this->setPermContactDetails();
            $this->setTempContactDetails();
            $this->setAccountDetails();
            $this->setGeneralServiceDetails();
            $this->setCurrentSerivceDetails();

            if ($this->_error != []) {
                $this->response(null, 400, $this->_error);
                exit;
            }

            $service_id = $this->_service->findLastId() + 1;
            $person_id = $this->_user->findLastId() + 1;

            $general_service = $this->_inputs['General_Service'];
            //array('person_id' => $person_id, 'nic' => $nic, 'date_join' => date("y-m-d", strtotime($date_join)), 'way_join' => $way_joined, 'grade' => $present_grade, 'medium' => $medium_recruit, 'confirm' => $confirm, 'confirm_date' => $date_confirm, 'f_appoint_date' => $date_f_appoint, 'entrance_exam_rank' => $rank_entrance);

            $currentService = $this->_inputs['Current_Service'];

            switch ($general_service['way_join']) {
                case 'open':
                case 'limited':
                case 'merit':
                    $general_service['cadre'] = $cadre;
                    break;
                case 'supern':
                    $general_service['cadre'] = $cadre_supern;
                    $general_service['grade_join'] = $grade_supern;

            }
            switch ($general_service['cadre']) {
                case 'general-carder':
                    $general_service['grade_join'] = $grade_general;
                    break;
                case 'special-carder':
                    $general_service['grade_join'] = $grade_special;
                    $general_service['subject'] = $special_subject;

            }

            if ($currentService['service_mode'] != 1) {
                $general_service['promotion_date'] = date("y-m-d", strtotime($currentService['appoint_date']));
            } else {
                $general_service['promotion_date'] = date("y-m-d", strtotime($currentService['appoint_date']));
            }

            //Populate Services Array
            $service = $this->_inputs['Current_Service'];
            // array('person_id' => $person_id, 'ID' => $service_id, 'nic' => $nic, 'service_mode' => $service_mood, 'user_updated' => '$this->session->username');

            if ($currentService['service_mode'] == 7) {
                //releasement
                // $service_id_array = $this->Form_data_model->get_recent_service_id();
                // $service_id = $service_id_array['0']['ID'] + 1;

                // $releasement = array('service_id' => $service_id, 'rel_type_id' => $release_type, 'rel_place_id' => $release_place, 'rel_start_date' => date("y-m-d", strtotime($release_study_st_date)), 'rel_end_date' => date("y-m-d", strtotime($release_study_end_date)), 'rel_designation' => $release_work_designation, 'rel_date' => date("y-m-d", strtotime($release_work_date_assumed)), 'salary_drawn' => $release_salary_drawn, 'rel_institute' => $release_institute_name, 'off_letter_no' => $release_official_letter);
                print_r($releasement);

            } else {
                // $service['work_place_id'] = $work_place;
                // $service['designation_id'] = $designation;
                // $service['grade'] = $present_grade;
                // $service['off_letter_no'] = $official_letter_no;
                // $service['duty_date'] = date("y-m-d", strtotime($date_assumed));

                switch ($service['work_place_id']) {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                        $service['work_division_id'] = $currentService['work_division_id'];
                        $service['work_branch_id'] = $currentService['work_branch_id'];
                        break;
                    case 5:
                    case 6:
                        $service['sub_location_id'] = $currentService['sub_location_id'];
                        break;
                    case 7:
                        $service['sub_location_id'] = $currentService['sub_location_id'];
                        break;
                    case 8:
                        $service['sub_location_id'] = $currentService['sub_location_id'];
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
                        $service['sub_location_id'] = $currentService['sub_location_id'];
                        break;

                    default:
                }
            }

            //Generate Data for user account
            // $uname = $lname . date("Ymd", strtotime($dob));
            // $name = $fname . ' ' . $lname;
            // $passwd = uniqid();
            // $passwdToDb = password_hash($passwd, PASSWORD_DEFAULT);
            // $pdfFileName = $name . 'User Account Details';

            $userAccount = $this->_inputs['Account_Details'];
            //  array('name' => $name, 'user_name' => $uname, 'passwd' => $passwdToDb, 'person_id' => $person_id, 'level' => '1');
            // $userAccountDisplay = array('name' => $name, 'user_name' => $uname, 'passwd' => $passwd, 'person_id' => $person_id, 'level' => '1');

            if ($v->isValid()) {
                if (!$contact_details_temp) {

                    if ($currentService['service_mode'] != 7) {
                        $res = $this->_crud->reisterNew($personal_details, $contact_details_per, $general_service, $service, '', '', $userAccount);
                    } else {
                        $res = $this->_crud->reisterNew($personal_details, $contact_details_per, $general_service, $service, $releasement, '', $userAccount);
                    }
                } else {

                    if ($currentService['service_mode'] != 7) {
                        $res = $this->_crud->reisterNew($personal_details, $contact_details_per, $general_service, $service, '', $contact_details_temp, $userAccount);
                    } else {
                        $res = $this->_crud->reisterNew($personal_details, $contact_details_per, $general_service, $service, $releasement, $contact_details_temp, $userAccount);
                    }
                }
            } else {
                // var_dump($v);
                $this->response(null, 400, $v->getMessages());
            }

            //$res = 1;
            if ($res == 1) {

                // $this->session->set_flashdata('register', 'success');
                // $this->createUserPdf($userAccountDisplay, $pdfFileName);
                // redirect('/admin/sclerk');

            } else {
                // $this->session->set_flashdata('register', 'not-success');
                //redirect('/register/newmember');
                // $this->newMember();
            }

        } catch (Exception $e) {
            // var_dump($e);
        }

    }

    private function setPersonalDetails()
    {
        $personal_details = $this->_inputs['Personal_Details'];
        $validator = new Validator;

        $validation = $validator->make($personal_details, [
            'NIC' => 'required|min:10|alpha_num',
            'title' => 'required|alpha',
            'f_name' => 'required|min:6',
            'l_name' =>'required|min:6',
            'm_name' => 'min:6',
            'in_name' => 'min:6',
            'si_in_name' => 'min:6',
            'ta_in_name' => 'min:6',
            'dob'   => 'required|date:Y-d-m',
            'ethinicity'=> 'required|alpha',
            'gender'    => 'required|alpha',
            'civil_status'  => 'required|alpha',
            'f_appoint_data'=>'required|date:Y-m-d',
        ]);
        $validation->setAliases([
            'f_name' => 'First Name',
            'l_name' => 'Last Name',
            'm_name' => 'Middle Name',
            'in_name' => 'Name with Initial',
            'si_in_name' => 'Name In Sinhala',
            'ta_in_name' => 'Name In Tamil',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors();
            $this->_error['Personal_Details'] = $errors->firstOfAll();
            // $this->response(null, 400,$this->_error );
        } else {
            $this->personal_details = $personal_details;
        }
    }

    private function getPersonalDetails()
    {
        return $this->personal_details;
    }

    private function setPermContactDetails()
    {
        $permanent_contact_details = $this->_inputs['Permanent_Contact_Details'];
        $validator = new Validator;

        $validation = $validator->make($permanent_contact_details, [
            'address_type' => 'required|alpha_num',
            'address_1' => 'required',
            'address_2' => 'required',
            'address_3' => 'required',
            'postal_code' => 'required|numeric',
            'mobile' => 'required|numeric',
            'telephone' => 'required|numeric',
            'email' => 'required|email',
        ]);
        $validation->setAliases([
            'address_1' => 'Address Line 1',
            'address_2' => 'Address Line 2',
            'address_3' => 'Address Line 3',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors();
            $this->_error['Permanent_Contact_Details'] = $errors->firstOfAll();
        } else {
            $this->permanent_contact_details = $permanent_contact_details;
        }
    }

    private function getPermContactDetails()
    {
        return $this->permanent_contact_details;
    }

    private function setTempContactDetails()
    {

        $temperary_contact_details = $this->_inputs['Temparary_Contact_Details'];
        $validator = new Validator;

        $validation = $validator->make($temperary_contact_details, [
            'address_type' => 'required|alpha_num',
            'address_1' => 'required',
            'address_2' => 'required',
            'address_3' => 'required',
            'postal_code' => 'required|numeric',
            'mobile' => 'required|numeric',
            'telephone' => 'required|numeric',
            'email' => 'required|email',
        ]);
        $validation->setAliases([
            'address_1' => 'Address Line 1',
            'address_2' => 'Address Line 2',
            'address_3' => 'Address Line 3',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors();
            $this->_error['Temparary_Contact_Details'] = $errors->firstOfAll();
        } else {
            $this->temperary_contact_details = $temperary_contact_details;
        }

    }

    private function getTempContactDetails()
    {
        return $this->temperary_contact_details;
    }

    private function setAccountDetails(Type $var = null)
    {
        $account_details = $this->_inputs['Account_Details'];
        $validator = new Validator;

        $validation = $validator->make($account_details, [
            'user_name' => 'required|alpha_num',
            'passwd' => 'required',
            'name' => 'required|alpha',
            'level' => 'required|numeric',
            'workplace_id' => 'required|numeric',
            'sub_location_id' => 'required|numeric',
        ]);

        $validation->validate();

        $account_details['passwd'] = md5($account_details['passwd']);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $this->_error['Account_Details'] = $errors->firstOfAll();
        } else {
            $this->account_details = $account_details;
        }
    }

    private function setGeneralServiceDetails()
    {
        $general_service = $this->_inputs['General_Service'];
        $validator = new Validator;

        $validation = $validator->make($general_service, [
            'date_join' => 'required|date:Y-m-d',
            'way_join' => 'required|alpha',
            'cadre' => 'required|alpha',
            'grade_join' => 'required|alpha',
            'entrance_exam_rank' => 'numeric',
            'grade' => 'alpha',
            'subject' => 'numeric',
            'medium' => 'alpha',
            'confirm' => 'required|alpha',
            'confirm_date' => 'date:Y-m-d',
            'promotion_date' => 'date:Y-m-d',
            'f_appoint_date' => 'date:Y-m-d',
            'eb_1_pass' => 'date:Y-m-d',
            'eb_2_pass' => 'date:Y-m-d',
            'eb_3_pass' => 'date:Y-m-d',
            'pg_dip_pass' => 'date:Y-m-d',
            'pg_deg_pass' => 'date:Y-m-d',
            'cb_1_date' => 'date:Y-m-d',
            'cb_2_date' => 'date:Y-m-d',
            'cb_3_date' => 'date:Y-m-d',
            'status'=> 'alpha',
            'deactivate_type_id' => 'numeric',
            'deactivate_date' => 'date:Y-m-d'
        ]);

        $validation->setAliases([
            'f_appoint_date' => 'first_appint_date',
            'pg_dip_pass' => 'PG.Dip pass',
            'pg_deg_pass' => 'PG.Deg pass',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors();
            $this->_error['General_Service'] = $errors->firstOfAll();
        } else {
            $this->general_service = $general_service;
        }

       
    }

    private function getGeneralServiceDetails(){
        return $this->temperary_contact_details;
    }

    private function setCurrentSerivceDetails(){
        $current_service = $this->_inputs['Current_Service'];
        $validator = new Validator;

        $validation = $validator->make($current_service, [
            'service_mode' => 'required',
            'service_sector'=> 'required',
            'work_place_id'=>   'required|numaric',
            'sub_location_id'=>   'numaric',
            'work_branch_id'=>   'required|numaric',
            'work_division_id'=>   'required|numaric',
            'designation_id'=>   'required|numaric',
            'appoint_date'  => 'required|date:Y-m-d',
            'duty_date'  => 'required|date:Y-m-d',
            'off_letter_no'  =>  'required|numaric'
        ]);

        $validation->setAliases([
            'off_letter_no' => 'Offer Letter No'
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors();
            $this->_error['Current_Service'] = $errors->firstOfAll();
        } else {
            $this->current_service = $current_service;
        }


    }

    public function put(Type $var = null)
    {
        # code...
    }

    public function delete(Type $var = null)
    {
        # code...
    }
}
