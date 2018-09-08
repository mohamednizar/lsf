<?php
namespace Models;

use Lib\Model;
use PDO;
use QB;

class Service extends Model
{

    public function __construct()
    {
        $this->_table = 'Service';
    }

  
}
