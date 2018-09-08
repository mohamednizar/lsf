<?php

class Report_model extends CI_Model{
    
    
    public function countOfficers($array, $return){
        /*$this->db->where($array);
        $query = $this->db->get('General_Service');*/
        
        $this->db->select('*, s1.time_updated, COALESCE(pl1.province_id, pl2.province_id, pl3.province_id, pl4.province_id, pl5.province_id) AS province');
        $this->db->from('Personal_Details');
        $this->db->join('Service s1', 'Personal_Details.ID = s1.person_id');
        $this->db->join('General_Service g', 'Personal_Details.ID = g.person_id');
        $this->db->join('Designation', 'Designation.ID = s1.designation_id', 'left');
        $this->db->join('Work_Place', 'Work_Place.ID = s1.work_place_id');
        
        $this->db->join('Province_Offices po', 's1.sub_location_id = po.ID', 'left');
        $this->db->join('Zonal_Offices zn1', 's1.sub_location_id = zn1.ID', 'left');
        $this->db->join('Divisional_Offices dof', 's1.sub_location_id = dof.ID', 'left');
        $this->db->join('Institute ins', 's1.sub_location_id = ins.ID', 'left');
        
        $this->db->join('Division_List div1', 'ins.div_id = div1.div_id', 'left');
        $this->db->join('Zone_List z1', 'dof.zone_id = z1.zone_id', 'left');
        $this->db->join('Zone_List z2', 'div1.zone_id = z2.zone_id', 'left');
        $this->db->join('District_List dl1', 'zn1.dist_id = dl1.dist_id', 'left');
        $this->db->join('District_List dl2', 'z1.dist_id = dl2.dist_id', 'left');
        $this->db->join('District_List dl3', 'z2.dist_id = dl3.dist_id', 'left');
        $this->db->join('Province_List pl1', 'po.province_id = pl1.province_id', 'left');
        $this->db->join('Province_List pl2', 'dl1.province_id = pl2.province_id', 'left');
        $this->db->join('Province_List pl3', 'dl2.province_id = pl3.province_id', 'left');
        $this->db->join('Province_List pl4', 'dl3.province_id = pl4.province_id', 'left');
        $this->db->join('Province_List pl5', 's1.sub_location_id = pl5.province_id', 'left');
        
        $this->db->join('Service s2', 'Personal_Details.ID = s2.person_id AND 
        (s1.time_updated < s2.time_updated OR s1.time_updated = s2.time_updated AND s1.time_updated < s2.time_updated)', 'left outer');
        $this->db->where('s2.person_id is NULL');
        $this->db->where($array);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            if($return == 'count'){
                $count  = $query->num_rows();
                return $count;
            } else if($return == 'list'){
                $res  = $query->result_array();
			return $res;
            } 
        } else{
            return 0;
        }
    }

}

?>

<?php
/*
    


LEFT JOIN Division_List div1 ON ins.div_id = div1.div_id
LEFT JOIN Zone_List z1 ON dof.zone_id = z1.zone_id
LEFT JOIN Zone_List z2 ON div1.zone_id = z2.zone_id
LEFT JOIN District_List dl1 ON zn1.dist_id = dl1.dist_id
LEFT JOIN District_List dl2 ON z1.dist_id = dl2.dist_id
LEFT JOIN District_List dl3 ON z2.dist_id = dl3.dist_id
LEFT JOIN Province_List pl1 ON po.province_id = pl1.province_id
LEFT JOIN Province_List pl2 ON dl1.province_id = pl2.province_id
LEFT JOIN Province_List pl3 ON dl2.province_id = pl3.province_id
LEFT JOIN Province_List pl4 ON dl3.province_id = pl4.province_id

*/
