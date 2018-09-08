<?php

class Form_data_model extends CI_Model{

    public function select($table){
        switch ($table){
            case "subject":
                $res = $this->getAllRecords('Sleas_Subject');
                break;
            case "workplace":
                $res = $this->getAllRecords('Work_Place');
                break;
            case "release_type":
                $res = $this->getAllRecords('Releasement_Type');
                break;
            case "province_list":
                $res = $this->getAllRecords('Province_List');
                break;
            case "designation":
                $res = $this->getAllRecords('Designation');
                break;
            case "deativate_type":
                $res = $this->getAllRecords('Deactivation_Type');
                break;
            case "disciplinary":
                $res = $this->getAllRecords('Disciplinary_Type');
                break;
            case "district_list":
                $res = $this->getAllRecords('District_List');
                break;
            case "service_mode":
                $res = $this->getAllRecords('Service_Mode');
                break;
            case "deactivation_type":
                $res = $this->getAllRecords('Deactivation_Type');
                break;
            case "disciplinary_type":
                $res = $this->getAllRecords('Disciplinary_Type');
                break;
            case "qtype":
                $res = $this->getAllRecords('Qualification_Type');
                break;
            case "leavetype":
                $res = $this->getAllRecords('Leave_Types');
                break;
        }

        return $res;
    }

    public function get_province_offices($work_place_id){
        $search_array = array('work_place_id'=> $work_place_id);
        $result = $this->searchdb('Province_Offices', $search_array);

        return $result;
    }

    public function get_main_division($work_place_id){
        $search_array = array('work_place_id'=> $work_place_id);
        $result = $this->searchdb('Main_Office_Divisions', $search_array);

        return $result;
    }

    public function get_main_branch($work_place_id){
        $search_array = array('work_place_id'=> $work_place_id);
        $result = $this->searchdb('Main_Office_Branches', $search_array);

        return $result;
    }

    public function get_rel_place($rel_type_id){
        $search_array = array('rel_type_id'=> $rel_type_id);
        $result = $this->searchdb('Releasement_Place', $search_array);

        return $result;
    }

    public function get_districts($province_id){
        $search_array = array('province_id'=> $province_id);
        $result = $this->searchdb('District_List', $search_array);

        return $result;
    }

    public function get_zones($district_id){
        $search_array = array('dist_id'=> $district_id);
        $result = $this->searchdb('Zone_List', $search_array);

        return $result;
    }

    public function get_zone_offices($district_id){
        $search_array = array('dist_id'=> $district_id);
        $result = $this->searchdb('Zonal_Offices', $search_array);

        return $result;
    }

    public function get_divisions($zone_id){
        $search_array = array('zone_id'=> $zone_id);
        $result = $this->searchdb('Division_List', $search_array);

        return $result;
    }

    public function get_divisional_offices($zone_id){
        $search_array = array('zone_id'=> $zone_id);
        $result = $this->searchdb('Divisional_Offices', $search_array);

        return $result;
    }

    public function get_institutes($workplace_id, $division_id){
        $search_array = array('div_id' => $division_id, 'workplace_id'=> $workplace_id);
        $result = $this->searchdb('Institute', $search_array);

        return $result;
    }

    public function searchdb($table, $search_array){
		$this->db->where($search_array);
		$query = $this->db->get($table);

		if ($query->num_rows() >= 1) {
			$res  = $query->result_array();
			return $res;
		} else{
			return 0;
		}
    }

    public function searchdbvalue($table, $field, $value){
        $array = array($field => $value);
		$this->db->where($array);
		$query = $this->db->get($table);

		if ($query->num_rows() >= 1) {
			$res  = $query->result_array();
			return $res;
		} else{
			return 0;
		}
    }

    public function getAllRecords($table){

		$this->db->select('*');
		$query = $this->db->get($table);

		if ($query->num_rows() >= 1) {
			$res  = $query->result_array();
			return $res;
		} else{
			return 0;
		}
    }

    public function insertData($table, $data){
        $this->db->insert($table, $data);

		if( $this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
    }

    public function updateprofileImage($key, $data){
        $this->db->where('ID', $key);
        $this->db->update('Personal_Details', $data);

		if( $this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
    }

    public function get_recent_service_id(){
        $this->db->select('ID');
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('Service');
        $res  = $query->result_array();

        return $res;
    }

    public function get_recent_person_id(){
        $this->db->select('ID');
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('Personal_Details');
        $res  = $query->result_array();

        return $res;
    }

    public function registerNew($personal_details, $contact_details_per, $general_service, $service, $releasement, $contact_details_temp, $userAccount){
        if (!$releasement){
            if (!$contact_details_temp){
                $res=0;
                $this->db->trans_start();

                $this->db->insert('Personal_Details', $personal_details);
                $this->db->insert('Contact_Details', $contact_details_per);
                $this->db->insert('General_Service', $general_service);
                $this->db->insert('Service', $service);
                $this->db->insert('User', $userAccount);

                if ($this->db->trans_status() === TRUE){
                    $res = 1;
                    $this->db->trans_complete();
                } else {
                    $err_message = $this->db->error();
                    log_message('error', $err_message);
                    $this->db->trans_complete();
                }

                return $res;
            }else{
                $res=0;
                $this->db->trans_start();

                $this->db->insert('Personal_Details', $personal_details);
                $this->db->insert('Contact_Details', $contact_details_per);
                $this->db->insert('General_Service', $general_service);
                $this->db->insert('Service', $service);
                $this->db->insert('Contact_Details', $contact_details_temp);
                $this->db->insert('User', $userAccount);

                if ($this->db->trans_status() === TRUE){
                    $res = 1;
                    $this->db->trans_complete();
                } else {
                    $err_message = $this->db->error();
                    log_message('error', $err_message);
                    $this->db->trans_complete();
                }

                return $res;

            }
        } else {
            if (!$contact_details_temp){
                $res=0;
                $this->db->trans_start();

                $this->db->insert('Personal_Details', $personal_details);
                $this->db->insert('Contact_Details', $contact_details_per);
                $this->db->insert('General_Service', $general_service);
                $this->db->insert('Service', $service);
                $this->db->insert('Releasement', $releasement);
                $this->db->insert('User', $userAccount);
                //user
                if ($this->db->trans_status() === TRUE){
                    $res = 1;
                    $this->db->trans_complete();
                } else {
                    $err_message = $this->db->error();
                    log_message('error', $err_message);
                    $this->db->trans_complete();
                }

                return $res;
            }else{
                $res=0;
                $this->db->trans_start();

                $this->db->insert('Personal_Details', $personal_details);
                $this->db->insert('Contact_Details', $contact_details_per);
                $this->db->insert('General_Service', $general_service);
                $this->db->insert('Service', $service);
                $this->db->insert('Contact_Details', $contact_details_temp);
                $this->db->insert('Releasement', $releasement);
                $this->db->insert('User', $userAccount);

                if ($this->db->trans_status() === TRUE){
                    $res = 1;
                    $this->db->trans_complete();
                } else {
                    $err_message = $this->db->error();
                    log_message('error', $err_message);
                    $this->db->trans_complete();
                }

                return $res;

            }
        }

    }

    public function get_Officers_List(){

        $this->db->select('Personal_Details.ID AS person_id, Personal_Details.NIC, Personal_Details.title, UPPER(Personal_Details.in_name) AS in_name, Designation.designation, Work_Place.work_place, s1.ID, s1.work_place_id, s1.sub_location_id');
        $this->db->from('Personal_Details');
        $this->db->join('Service s1', 'Personal_Details.ID = s1.person_id', 'inner');
        $this->db->join('Designation', 's1.designation_id = Designation.ID', 'left');
        $this->db->join('Work_Place', 's1.work_place_id = Work_Place.ID');
        $this->db->join('Service s2', 'Personal_Details.ID = s2.person_id AND (s1.time_updated < s2.time_updated OR s1.time_updated = s2.time_updated AND s1.time_updated < s2.time_updated)', 'left outer');
        $this->db->where('s2.person_id is NULL');

        if($this->session->workplace == '7'){
            $this->db->where('s1.work_place_id', '7');
            $this->db->where('s1.sub_location_id', $this->session->location);
        }

        $this->db->order_by('Personal_Details.NIC', 's1.NIC');
        $query = $this->db->get();
        $res  = $query->result_array();
        if ($query->num_rows() >= 1){
            return $res;
        }

    }

    public function search_officers($searchField, $searchKey){
        $this->db->cache_off();
        $this->db->select('Personal_Details.ID, Personal_Details.NIC, Personal_Details.title, Personal_Details.in_name, Designation.designation, Work_Place.work_place');
        $this->db->from('Personal_Details');
        $this->db->join('Service s1', 'Personal_Details.ID = s1.person_id');
        $this->db->join('Designation', 'Designation.ID = s1.designation_id', 'left');
        $this->db->join('Work_Place', 'Work_Place.ID = s1.work_place_id');
        $this->db->join('Service s2', 'Personal_Details.ID = s2.person_id AND (s1.time_updated < s2.time_updated OR s1.time_updated = s2.time_updated AND s1.time_updated < s2.time_updated)', 'left outer');
        $this->db->where('s2.person_id is NULL');

        if($this->session->workplace == '7'){
            $this->db->where('s1.work_place_id', '7');
            $this->db->where('s1.sub_location_id', $this->session->location);
        }

        $this->db->like('LOWER(Personal_Details.'.$searchField.')', $searchKey, after);
        $this->db->order_by('Personal_Details.NIC', 'Service.ID');
        $query = $this->db->get();
        $res = $query->result_array();
        if ($query->num_rows() >= 1) {
			$res  = $query->result_array();
			return $res;
		} else{
			return 0;
		}
        //return $query;
    }

    //LEFT JOIN (SELECT p2.PersonID, p2.PlaceTypeID, c.CityName FROM DLAccountingSystem.tblPersons p2 INNER JOIN DLAccountingSystem.tblCity c ON p2.ObjectID = c.CityID WHERE PlaceTypeID = @CityTypeID) tcity ON p1.PersonID = tcity.PersonID

    public function get_Officer_Details($personID){
        $this->db->cache_off();
        $this->db->select('*, UPPER(p.in_name) AS in_name, s1.work_place_id, p.ID, s1.ID AS service_id'); //ta_work_place.work_place AS ta_work_place, si_Work_Place.work_place AS si_work_place
        $this->db->from('Service s1');
        $this->db->join('Personal_Details p', 'p.ID = s1.person_id');
        $this->db->join('Main_Office_Branches br', 's1.work_branch_id = br.ID','left');
        $this->db->join('Main_Office_Divisions div', 's1.work_division_id = div.ID','left');
        $this->db->join('Service_Mode smood', 'smood.ID = s1.service_mode');
        $this->db->join('Work_Place', 'Work_Place.ID = s1.work_place_id');
        //$this->db->join('si_Work_Place', 'si_Work_Place.ID = s1.work_place_id');
        //$this->db->join('ta_Work_Place', 'ta_Work_Place.ID = s1.work_place_id', 'left');
        $this->db->join('si_Designation', 'si_Designation.ID = s1.designation_id', 'left');
        $this->db->where('p.ID', $personID);
        $this->db->order_by('s1.duty_date', 'DESC');
        $query = $this->db->get();
        $res = $query->result_array();

        //Get Contact Details of officer and add to $res Array
        $this->db->select('*');
        $this->db->from('Contact_Details');
        $this->db->where('person_id', $personID);
        $this->db->where('address_type', 'permanant');
        $query_contact = $this->db->get();
        $res['contact'] = $query_contact->result_array();

        //Get General Service Details of officer and add to $res Array
        $this->db->select('*');
        $this->db->from('General_Service');
        $this->db->where('person_id', $personID);
        $ge_service_query = $this->db->get();
        $res['general'] = $ge_service_query->result_array();

        //Get Salary Details of officer and add to $res Array
        $this->db->select('*');
        $this->db->from('Salary');
        $this->db->where('person_id', $personID);
        $ge_service_query = $this->db->get();
        $res['salary'] = $ge_service_query->result_array();

        //Get Qualifications Details of officer and add to $res Array
        $this->db->select('*, q.ID as qid');
        $this->db->from('Qualifications q');
        $this->db->join('Qualification_List ql', 'q.qualification_id = ql.ID');
        $this->db->join('Qualification_Type qt', 'q.qualification_type_id = qt.ID');
        $this->db->where('q.person_id', $personID);
        $this->db->order_by('q.qualified_date', 'ASC');
        $ge_service_query = $this->db->get();
        $res['qual'] = $ge_service_query->result_array();

        //Get Leave Details of officer and add to $res Array
        $this->db->select('*, l.ID as lid');
        //$this->db->select('MAX(l.ID) as lid, MAX(l.leave_year) as leave_year, SUM(l.leave_count) as leave_count, MAX(lt.leave_type) as leave_type');
        $this->db->from('Leaves l');
        $this->db->join('Leave_Types lt', 'l.leave_type_id = lt.ID');
        $this->db->where('l.person_id', $personID);
        $this->db->order_by('l.leave_year', 'ASC');
        $this->db->order_by('l.leave_type_id', 'ASC');
        //$this->db->group_by("l.leave_year, l.leave_type_id HAVING SUM(l.leave_type_id) > 0");
        $leave_query = $this->db->get();
        $res['leave'] = $leave_query->result_array();

        //Output Officer details
        if ($query->num_rows() >= 1) {
			//$res = $query->result_array();
            $i=0;
            foreach($res as $row){
                //print_r($row);
                switch ($row['work_place_id']) {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                        break;
                    case 5:
                    case 6:
                        $this->db->select('province_office');
                        $this->db->from('Province_Offices');
                        $this->db->where('ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        if (isset($sub_loc)){ $res[$i]['sub_location'] = $sub_loc['0']['province_office']; }

                        break;
                    case 7:
                        $this->db->select('zonal_office');
                        $this->db->from('Zonal_Offices');
                        $this->db->where('ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();

                        if (isset($sub_loc)){ $res[$i]['sub_location'] = $sub_loc['0']['zonal_office']; }

                        break;
                    case 8:
                        $this->db->select('division_office');
                        $this->db->from('Divisional_Offices');
                        $this->db->where('ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        if (isset($sub_loc)){ $res[$i]['sub_location'] = $sub_loc['0']['division_office']; }

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
                        $this->db->select('institute_name');
                        $this->db->from('Institute');
                        $this->db->where('ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        if (isset($sub_loc)){ $res[$i]['sub_location'] = $sub_loc['0']['institute_name']; }
                        break;

                    case 18:
                        $this->db->select('province');
                        $this->db->from('Province_List');
                        $this->db->where('province_id', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        if (isset($sub_loc)){ $res[$i]['sub_location'] = $sub_loc['0']['province']; }

                        break;
                }
                $i++;
            }
            //return $query;

            return $res;
		} else{
			return 0;
		}

    }

    public function get_Officer_recent_work_location($personID)
    {
        $this->db->cache_off();
        $this->db->select('s1.person_id, s1.work_place_id, s1.sub_location_id');
        $this->db->from('Service s1');

        $this->db->where('s1.person_id', $personID);
        $this->db->order_by('s1.duty_date', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->result_array();

        //Output Officer details
        if ($query->num_rows() >= 1) {
			//$res = $query->result_array();
            $i=0;
            foreach($res as $row){
                //print_r($row);
                switch ($row['work_place_id']) {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                        $this->db->select('province_id AS province');
                        $this->db->from('province_offices');
                        $this->db->where('ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        $res[0]['rel_zoneID'] = '';
                        $res[0]['rel_provinceID'] = $sub_loc['0']['province'];
                        break;
                    case 7:
                        break;
                    case 8:
                        $this->db->select('z.ID AS zone, p.province_id AS province');
                        $this->db->from('Divisional_Offices i');
                        $this->db->join('zone_list z', 'z.zone_id = i.zone_id');
                        $this->db->join('district_list d', 'd.dist_id = z.dist_id');
                        $this->db->join('province_list p', 'p.province_id = d.province_id');
                        $this->db->where('i.ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        $res[0]['rel_zoneID'] = $sub_loc['0']['zone'];
                        $res[0]['rel_provinceID'] = $sub_loc['0']['province'];
                        //if (isset($sub_loc)){  }

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
                        $this->db->select('z.ID AS zone, p.province_id AS province');
                        $this->db->from('Institute i');
                        $this->db->join('division_list dl', 'dl.div_id = i.div_id');
                        $this->db->join('zone_list z', 'z.zone_id = dl.zone_id');
                        $this->db->join('district_list d', 'd.dist_id = z.dist_id');
                        $this->db->join('province_list p', 'p.province_id = d.province_id');
                        $this->db->where('i.ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        $res[0]['rel_zoneID'] = $sub_loc['0']['zone'];
                        $res[0]['rel_provinceID'] = $sub_loc['0']['province'];
                        break;

                    case 18:
                        $this->db->select('province_id AS province');
                        $this->db->from('Province_List');
                        $this->db->where('province_id', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        $res[0]['rel_zoneID'] = '';
                        $res[0]['rel_provinceID'] = $sub_loc['0']['province'];
                        break;
                }
                $i++;
            }
        }
            //return $query;

    }

    public function get_Officer_recent_service($personID){
        $this->db->cache_off();
        $this->db->select('*, s1.work_place_id, s1.person_id');
        $this->db->from('Service s1');
        $this->db->join('Main_Office_Branches br', 's1.work_branch_id = br.ID','left');
        $this->db->join('Main_Office_Divisions div', 's1.work_division_id = div.ID','left');
        $this->db->join('Service_Mode smood', 'smood.ID = s1.service_mode');
        $this->db->join('Work_Place', 'Work_Place.ID = s1.work_place_id');
        $this->db->join('Designation', 'Designation.ID = s1.designation_id', 'left');
        $this->db->where('s1.person_id', $personID);
        $this->db->order_by('s1.duty_date', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->result_array();

        //Get General Service Details of officer and add to $res Array
        $this->db->select('*');
        $this->db->from('General_Service');
        $this->db->where('person_id', $personID);
        $ge_service_query = $this->db->get();
        $res['general'] = $ge_service_query->result_array();

        //Output Officer details
        if ($query->num_rows() >= 1) {
			//$res = $query->result_array();
            foreach($res as $row){
                //print_r($row);
                switch ($row['work_place_id']) {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                        break;
                    case 5:
                    case 6:
                        $this->db->select('province_office');
                        $this->db->from('Province_Offices');
                        $this->db->where('ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        if (isset($sub_loc)){ $res['0']['sub_location'] = $sub_loc['0']['province_office']; }

                        break;
                    case 7:
                        $this->db->select('zonal_office');
                        $this->db->from('Zonal_Offices');
                        $this->db->where('ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();

                        if (isset($sub_loc)){ $res['0']['sub_location'] = $sub_loc['0']['zonal_office']; }

                        break;
                    case 8:
                        $this->db->select('division_office');
                        $this->db->from('Divisional_Offices');
                        $this->db->where('ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        if (isset($sub_loc)){ $res['0']['sub_location'] = $sub_loc['0']['division_office']; }

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
                        $this->db->select('institute_name');
                        $this->db->from('Institute');
                        $this->db->where('ID', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        if (isset($sub_loc)){ $res['0']['sub_location'] = $sub_loc['0']['institute_name']; }
                        break;

                    case 18:
                        $this->db->select('province');
                        $this->db->from('Province_List');
                        $this->db->where('province_id', $row['sub_location_id']);
                        $sub_loc_query = $this->db->get();

                        $sub_loc = $sub_loc_query->result_array();
                        if (isset($sub_loc)){ $res['0']['sub_location'] = $sub_loc['0']['province']; }

                        break;
                }
            }
            //return $query;
			return $res;
		} else{
			return 0;
		}

    }

    public function updateOfficer($person_id, $personal_details, $contact_details){

        $this->db->where('ID', $person_id);
        $this->db->update('Personal_Details', $personal_details);


        $this->db->where('person_id', $person_id);
        $this->db->update('Contact_Details', $contact_details);

        if($this->db->affected_rows()){
            return 1;
        }
    }

    public function get_Change_Requests($sclerk){
        $this->db->select('*, C.ID AS msg_id');
        $this->db->from('Change_Request C');
        $this->db->join('Personal_Details p', 'p.ID = C.person_id');
        $this->db->where('C.sclerk', $sclerk);
        $this->db->where('C.viewed', '0');
        $query = $this->db->get();
        $res = $query->result_array();

        if($query->num_rows() >= 1){
            return $res;
        }
    }

    public function get_Change_Requests_Officer($person_id){
        $this->db->select('*, C.ID AS msg_id');
        $this->db->from('Change_Request C');
        $this->db->join('Personal_Details p', 'p.ID = C.person_id');
        $this->db->where('C.person_id', $person_id);
        $this->db->order_by('C.viewed', 'ASC');
        $query = $this->db->get();
        $res = $query->result_array();

        if($query->num_rows() >= 1){
            return $res;
        }
    }

    public function get_work_place($personID){
        $this->db->select('work_place');
        $this->db->from('Service s');
        $this->db->join('Work_Place w', 'w.ID = s.work_place_id');
        $this->db->where('s.person_id', $personID);
        $query = $this->db->get();
        $res = $query->result_array();
        if ($query->num_rows() >= 1){
            return $res;
        }
    }

    public function update($table, $search_field, $search_key, $update_array){

        $this->db->where($search_field, $search_key);
        $this->db->update($table, $update_array);

        if($this->db->affected_rows()){
            return '1';
        }
    }
}
?>
