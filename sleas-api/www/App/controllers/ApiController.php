<?php
namespace Controllers;

use Interfaces\ApiInterface;
use Lib\Controller;

class ApiController extends Controller implements ApiInterface
{

    public function __construct()
    {
    }

    public function get()
    {
      include '././swagger.json';
    }

    public function put()
    {
    }

    public function post()
    {
    }

    public function delete()
    {
    }

}
