<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_check_session extends CI_Controller {

	public function check_sess($user)
	{
		if ($this->session->username != $user) {
			redirect('login/index');
		}//Redirect to login page if session not initiated.
	}
?>