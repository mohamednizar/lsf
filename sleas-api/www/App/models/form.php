<?php
namespace Models;

use Exception;
use Lib\Model;
use QB;

class CRUDModel extends Model
{
    protected $personal_details;
    protected $contact_details_temp;
    protected $contact_details_per;
    protected $general_service;
    protected $service;
    protected $userAccount;

    public function __construct()
    {
        parent::__construct();

    }

    public function reisterNew($personal_details, $contact_details_per, $general_service, $service, $releasement, $contact_details_temp, $userAccount)
    {
        $this->personal_details = $personal_details;
        $this->contact_details_temp = $contact_details_temp;
        $this->contact_details_per = $contact_details_per;
        $this->general_service = $general_service;
        $this->service = $service;
        $this->userAccount = $userAccount;

        QB::transaction(function ($qb) {
            try {
                $person_id = $qb->table('Personal_Details')->insert($this->personal_details);
                $this->setPersonId($person_id);
                $qb->table('Contact_Details')->insert($this->contact_details_temp);
                $qb->table('Contact_Details')->insert($this->contact_details_per);
                $qb->table('General_Service')->insert($this->general_service);
                $qb->table('Service')->insert($this->service);
                $qb->table('User')->insert($this->userAccount);
                $qb->commit(); // to commit the changes (data would be saved)
            } catch (Exception $e) {
                // var_dump($e->getMessage());
                $qb->rollback(); // to rollback the changes (data would be rejected)
            }
        });

        // try {

        //     if (!$releasement) {
        //         if (!$contact_details_temp) {
        //             $res = 0;
        //             try {
        //                 $this->beginTransaction();
        //                 $this->insert('Personal_Details', $personal_details);
        //                 $this->insert('Contact_Details', $contact_details_per);
        //                 $this->insert('General_Service', $general_service);
        //                 $this->insert('Service', $service);
        //                 $this->insert('User', $userAccount);
        //                 $this->trans_complete();
        //             } catch (Exception $e) {
        //                 $this->trans_rollback();
        //                 $err_message = $this->getError();
        //                 log_message('error', $e->getMessage());
        //             }

        //             return $res;
        //         } else {
        //             $res = 0;
        //             try {
        //                 DB::beginTransaction();
        //                 $q1 = $this->insert('Personal_Details', $personal_details);
        //                 $personId = ($this->db->insert_id);
        //                 $contact_details_temp['person_id'] = $personId;
        //                 $service['person_id'] = $personId;
        //                 $general_service['person_id'] = $personId;
        //                 $userAccount['person_id'] = $personId;

        //                 $q2 = $this->insert('Contact_Details', $contact_details_temp);
        //                 $q3 = $this->insert('General_Service', $general_service);
        //                 $q4 = $this->insert('Service', $service);
        //                 $q5 = $this->insert('User', $userAccount);
        //                 var_dump($q1,$q2,$q3,$q4,$q5);
        //                 DB::commit();
        //             } catch (Exception $e) {
        //                 $this->trans_rollback();
        //                 $err_message = $this->getError();
        //                 log_message('error', $e->getMessage());
        //             }

        //             return $res;

        //         }
        //     } else {
        //         if (!$contact_details_temp) {
        //             $res = 0;
        //             $this->db->trans_start();

        //             $this->db->insert('Personal_Details', $personal_details);
        //             $this->db->insert('Contact_Details', $contact_details_per);
        //             $this->db->insert('General_Service', $general_service);
        //             $this->db->insert('Service', $service);
        //             $this->db->insert('Releasement', $releasement);
        //             $this->db->insert('User', $userAccount);
        //             //user
        //             if ($this->db->trans_status() === true) {
        //                 $res = 1;
        //                 $this->trans_complete();
        //             } else {
        //                 $err_message = $this->db->error();
        //                 log_message('error', $err_message);
        //                 $this->db->trans_complete();
        //             }

        //             return $res;
        //         } else {
        //             $res = 0;
        //             $this->db->trans_start();

        //             $this->db->insert('Personal_Details', $personal_details);
        //             $this->db->insert('Contact_Details', $contact_details_per);
        //             $this->db->insert('General_Service', $general_service);
        //             $this->db->insert('Service', $service);
        //             $this->db->insert('Contact_Details', $contact_details_temp);
        //             $this->db->insert('Releasement', $releasement);
        //             $this->db->insert('User', $userAccount);

        //             if ($this->db->trans_status() === true) {
        //                 $res = 1;
        //                 $this->trans_complete();
        //             } else {
        //                 $err_message = $this->db->error();
        //                 try {
        //                     $this->trans_complete();
        //                 } catch (Exception $e) {
        //                     log_message('error', $e->getMessagge());
        //                 }

        //             }

        //             return $res;

        //         }
        //     }

        // } catch (Exception $e) {
        //     log_message('error', $e->getMessage());
        // }

    }

    protected function setPersonId($person_id){

        $this->contact_details_temp['person_id']= $person_id;
        $this->contact_details_per ['person_id']= $person_id;
        $this->general_service ['person_id']= $person_id;
        $this->service ['person_id']= $person_id;
        $this->userAccount ['person_id']= $person_id;
    }

}
