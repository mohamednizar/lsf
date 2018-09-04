<?php

class Main_data_model extends CI_Model{
    
    public function insert($table, $data){
        
        $this->db->insert($table, $data); 
		
		if( $this->db->affected_rows() ) {
			return 1;
		} else {
			return 0;
		}
    }
    
    public function update($table, $search_field, $search_key, $update_array){
        $this->db->where($search_field, $search_key);
        $this->db->update($table, $update_array);
        
        if($this->db->affected_rows()){
            return 1;
        }
    }
    
    public function delete($table, $field, $value){
        $this->db->where($field, $value);
        $this->db->delete($table);
        
        if( $this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
    }
        
    public function get_recent_id($table){
        $this->db->select('ID');
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($table);
        $res  = $query->result_array();
        
        return $res;
    }
    
}
?>