<?php
namespace Lib;

class SQLQuery {
    protected $_dbHandle;
    protected $_result;
    protected $_mysqli;

    /** Connects to database **/

    function connect($address, $account, $pwd, $name) {
        $this->_mysqli =  mysqli_connect($address,$account, $pwd, $name);
        if ($this->_mysqli != null) {
            return 1;
        }
        else {
            echo 'DB Connection error';
            exit();
            return 0;
        }
    }

    /** Disconnects from database **/

    function disconnect() {
        if (@mysqli_close($this->_dbHandle) != 0) {
            return 1;
        }  else {
            return 0;
        }
    }
    
    function selectAll() {
    	$query = 'select * from `'.$this->_table.'`';
    	return $this->query($query);
    }
    
    function select($id) {
    	$query = 'select * from `'.$this->_table.'` where `ID` = \''.mysqli_real_escape_string($this->_mysqli,$id).'\'';
    	return $this->query($query, 1);    
    }

	
    /** Custom SQL Query **/

	function query($query, $singleResult = 0) {

        $this->_result = mysqli_query($this->_mysqli,$query);
    
		if (preg_match("/select/i",$query)) {
		$result = array();
		$table = array();
		$field = array();
		$tempResults = array();
		$numOfFields = mysqli_num_fields($this->_result);
		for ($i = 0; $i < $numOfFields; ++$i) {
            $table_info = mysqli_fetch_field_direct($this->_result,$i);
		    array_push($table,($table_info->table));
		    array_push($field,($table_info->name));
        }
        

		
			while ($row = mysqli_fetch_row($this->_result)) {
				for ($i = 0;$i < $numOfFields; ++$i) {
					$table[$i] = trim(ucfirst($table[$i]),"s");
					$tempResults[$table[$i]][$field[$i]] = $row[$i];
				}
				if ($singleResult == 1) {
                     mysqli_free_result($this->_result);
					return $tempResults;
                }
                
				array_push($result,$tempResults);
            }
            
			mysqli_free_result($this->_result);
			return($result);
		}
		

	}
	
	

    /** Get number of rows **/
    function getNumRows() {
        return mysqli_num_rows($this->_result);
    }

    /** Free resources allocated by a query **/

    function freeResult() {
        mysqli_free_result($this->_result);
    }

    /** Get error string **/

    function getError() {
        return mysqli_error($this->_mysqli);
    }
}
