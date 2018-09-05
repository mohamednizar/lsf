<?php
namespace Controllers;

use Lib\Auth;
use Lib\Controller;
use Models\User;
use \Dsheiko\Validate;

class LoginController extends Controller
{

    public $_inputs;

    public function __construct()
    {
        $this->_inputs = $this->inputs();
        $this->User = new User();
    }

    public function post()
    {

        $uname = strtolower($this->_inputs['username']);
        $pwd = strtolower($this->_inputs['password']);

        $v = new Validate;

        $v->IsString($uname, ["minLength" => 4, 'NotEmpty' => true])
            ->IsString($pwd, ["minLength" => 4]);
        try {
            if ($v->isValid()) {
                $chk_login = $this->User->check_login($uname, $pwd);
                if ($chk_login == 1) {
                    $data = $this->User->login($uname, $pwd);
                    $_SESSION['username'] = $uname;
                    $auth = new Auth();
                    $token = $auth->IssueToken($data);
                    
                    $result = [
                        "token"=> $token
                    ];
                    $this->response($result,200,'Login Successfull');
                } else {
                    $this->response($result,401,'Login failed, the user name or password you enterd is incorrect');
                }
            } else {
                $this->response($result,400,$v->getMessages());
            }

        } catch (Exception $e) {
            $this->response($result,400,$v->getMessages());
        }

    }
}
