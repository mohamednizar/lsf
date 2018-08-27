<?php

class User extends Model {

    protected $passwd;
    private $level;

    function __construct() {
        $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = get_class($this);
        $this->_table = 'User';
    }
    
  

    function get_user($id) {
        $user = $this->select($id)['User'];
        $this->name = $user['name'];
        $this->workplace_id = $user['workplace_id'];
        $this->sub_location_id =$user['sub_location_id'];
        $this->person_id = $user['person_id'];
	    return ($this);
    }

}
