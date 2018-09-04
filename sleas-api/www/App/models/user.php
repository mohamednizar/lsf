<?php
namespace Models;
use Lib\Model;
class User extends Model {

    protected $passwd;
    private $level;

    public function __construct() {
        parent::__construct();
		$this->_model = get_class($this);
        $this->_table = 'User';
    }

    public function get_user($id) {
        $user = $this->select($id)['User'];
        $this->name = $user['name'];
        $this->workplace_id = $user['workplace_id'];
        $this->sub_location_id =$user['sub_location_id'];
        $this->person_id = $user['person_id'];
	    return ($this);
    }

    public function check_login($uname, $pwd){
      
        $query =  'select * from `'.$this->_table.'` where `user_name` = \''.mysqli_real_escape_string($this->_mysqli,$uname).'\'and   `passwd` = \''.mysqli_real_escape_string($this->_mysqli,$pwd).'\'';
        $results = $this->query($query ,1);
        if(count($results)==1){
            return 1;
        }
    }
    
    public function login($uname, $pwd){
        $query =  'select * from `'.$this->_table.'` where `user_name` = \''.mysqli_real_escape_string($this->_mysqli,$uname).'\'and   `passwd` = \''.mysqli_real_escape_string($this->_mysqli,$pwd).'\'';
        $results = $this->query($query ,1);
        return $results;
	}

}
