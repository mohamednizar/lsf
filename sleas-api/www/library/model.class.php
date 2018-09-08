<?php
namespace Lib;
use QB;
class Model extends QB {
	protected $_model;

	function __construct() {
	}

	function __destruct() {
	}

	public function findLastId()
    {
        $results = QB::table($this->_table)
        ->select('ID')
        ->orderBy('ID', 'DESC')
        ->first();
        return $results->ID;
    }

}
