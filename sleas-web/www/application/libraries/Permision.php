<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 10/26/17
 * Time: 10:11 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Permision {
    public function __construct()
    {

    }

    function check($personID){
        //$CI =& get_instance();
        $permision = 0;

        // $CI->load->model('Form_data_model');
        //
        // $result = $CI->Form_data_model->get_Officer_recent_service($personID);
        //
        //
        // if ($CI->session->work_place == '7') {
        //     if ($result['0']['work_place_id'] == '7' && $CI->session->location == $result['0']['sub_location_id']) {
        //         $permision = 1;
        //     }
        // }else {
        //     $permision = 1;
        // }
//$result['0']['work_place_id']

        echo $permision;
    }
}
