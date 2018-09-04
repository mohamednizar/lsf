<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <link rel="text/javascript" src="<?php echo base_url()."assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css"?>" />
    <link rel="text/javascript" src="<?php echo base_url()."assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css"?>" />
<?php if ($this->session->user_level == '1'){ ?>
    <style>
        #content{ margin-left: 0; }
        .sidebar-toggle{display: none;}
    </style>
        <div class="main-wrapper">
<?php } ?>



        <section id="content">   <!-- Start: Content -->
	        <div class="container" style="padding-top: 20px;">

            <?php if ($error_msg){ ?>
                <h3> <?php echo $error_msg; ?>! </h3>
                <h6>Please return to your <a href="<?php echo base_url()."index.php/admin/sclerk"?>"> dashboard </a></h6>
            <?php } else { ?>

            <?php if ($this->session->flashdata('update')=="success"){ ?>
                <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Successfully updated the member details
                            </div>
                        </div>
                </div>
            <?php } ?>

                <div class="col-md-3 col-sm-4">
                    <div style="text-align:center;text-align:-moz-center;">
                        <?php if ($user_details[0]['profile_pic']){ ?>
                            <img class="img-responsive profile_img" id="profile_img" src="<?php echo base_url().'file_library/'. $user_details[0]['ID'] . '/' . $user_details[0]['profile_pic'] ?>" alt="User Profile">
                        <?php } else{ ?>
                            <img class="img-responsive profile_img" id="profile_img" src="<?php echo base_url()."assets/images/users/user.png"?>" alt="User Profile">
                        <?php } ?>
                        <a role="button" class="btn btn-white btn-xs" style="margin-top:10px; margin-left:auto; margin-right:auto;" data-toggle="modal" data-target="#profilePicModal" >Change/ Add Profile picture</a>
                    </div>

                    <!-- Modal -->
                        <div id="profilePicModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Upload profile image</h4>

                              </div>

                            <?php echo form_open() ?>
                              <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <input type="file" name="file" id="file">
                                        <span class="fileinput-filename"></span>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="image_submit">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            <?php echo form_close() ?>
                            </div>

                          </div>
                        </div>

                    <div class="panel panel-success" style="margin-top:20px;">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title">Salary Details</h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            <table  class="table table-striped table-hover" border="0">
                                <tr valign="top">
                                    <th width="60%" style="padding-right: 0px;">Current Salary</th>
                                    <td><?php echo $user_details[salary][0]['salary']; ?></td>
                                </tr>
                                <tr valign="top">
                                    <th style="padding-right: 0px;">Salary Step</th>
                                    <td><?php echo $user_details[salary][0]['step']; ?></td>
                                </tr>
                                <tr valign="top">
                                    <th style="padding-right: 0px;">Next Increment Date</th>
                                    <td><?php if( strtotime(date( '-m-d' )) > strtotime(date("-m-d", strtotime($user_details[general][0]['promotion_date']))) ){
                                            echo date("Y-m-d", strtotime(date( 'Y' ) . date("-m-d", strtotime($user_details[general][0]['promotion_date'])) ."+1 year" ));
                                            } else { echo date("Y-m-d", strtotime(date( 'Y' ) . date("-m-d", strtotime($user_details[general][0]['promotion_date']))  )); } ?></td>
                                </tr>
                                <tr valign="top" <?php if(date("Y", strtotime($user_details[salary][0]['increment_date'])) < date( 'Y' )){echo 'class="danger"';}  ?> >
                                    <th style="padding-right: 0px;" >Last Increment Date</th>
                                    <td><?php echo $user_details[salary][0]['increment_date']; ?></td>
                                </tr>
                            </table>
                            <?php if($this->session->user_level != '1'){ ?>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <a href="<?php echo base_url()."index.php/increment/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Increment</a>
                                <a href="<?php echo base_url()."index.php/revision/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs" style="margin-top:5px;">Add Salary Revision</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title">Change Request</h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">

                            <?php if($this->session->user_level == '1'){ ?>
                                <?php echo form_open("admin/changeRequest", 'role="form" id="changeRequestForm"'); ?>
                                <input type="hidden" name="person_id" id="request_person_id" value="<?php echo $user_details[0]['ID']; ?>">
                                <input type="hidden" name="sclerk" id="request_sclerk" value="<?php echo $user_details[0]['user_updated']; ?>">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" id="request_title" placeholder="Title" >
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message" id="request_message" placeholder="Write your message here"></textarea>
                                </div>

                                <div class="form-actions pull-right">
                                    <button type="button" id="changeRequest" class="btn btn-info">Submit</button>
                                </div>
                                <?php echo form_close(); ?>
                            <?php }else { ?>
                            <?php if($requests){ ?>
                                    <?php foreach($requests as $row){ ?>
                                        <label><?php echo $row['message_title'] ?> </label>
                                        <button class="btn btn-danger btn-xs messagetoggle" data-toggle="modal" data-target="#messageModal" data-message='{"id":"<?php echo $row['person_id'] ?>","message_title":"<?php echo $row['message_title'] ?>","message":"<?php echo $row['message'] ?>"}' data-msgID="<?php echo $row['msg_id'] ?>"> View </button>

                                    <?php }  ?>
                            <?php }  ?>

                            <!-- Modal -->
                                <div id="messageModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                      </div>
                                      <div class="modal-body">
                                        <p id="messagebody">Some text in the modal.</p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-8">

                    <div class="tabbable tabbable-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1_1" data-toggle="tab">OVERVIEW</a></li>
                            <li><a href="#tab_1_2" data-toggle="tab">EDIT</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_1_1">
                                <h3><?php echo $user_details[0]['title'] . ' ' . $user_details[0]['in_name']?></h3>

                                <div class="col-md-6">
                                    <table border="0" width="100%">
                                        <tr valign="top">
                                            <td ><label style="margin-bottom:15px;"> <?php echo $user_details[0]['si_in_name'] ;?> </label></td>
                                        </tr>
                                        <tr valign="middle">
                                            <td><label style="margin-bottom:15;"> Active/ inactive </label></td>
                                            <td>
                                            <?php if($this->session->user_level == '1'){ ?>
                                                <label style="margin-bottom:15; float:left;">- <?php echo $user_details[general][0]['status'];?></label>
                                            <?php }else { ?>
                                                <label style="margin-bottom:15; float:left;">- </label>
                                                <div class="pull-left" style="margin-left:5px;"><input id="toggle-status" data-toggle="toggle" data-size="mini" data-width="100" data-on="Active" data-off="Deactivated" data-onstyle="success" type="checkbox"></div>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <td width="150px"><label style="margin-bottom:15px;"> NIC Number </label></td>
                                            <td>- <label id="fname:1"><?php echo $user_details[0]['NIC'] ;?> </label>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Title </label></td>
                                            <td><label>- <?php echo $user_details[0]['title'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> First Name </label></td>
                                            <td><label>- <?php echo $user_details[0]['f_name'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Middle Name </label></td>
                                            <td><label>- <?php echo $user_details[0]['m_name'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Last Name </label></td>
                                            <td><label>- <?php echo $user_details[0]['l_name'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Date of Birth </label></td>
                                            <td><label>- <?php echo $user_details[0]['dob'] ;?> </label></td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-md-6">
                                    <table border="0" width="100%">
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> <?php echo $user_details[0]['ta_in_name'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td width="130px"><label style="margin-bottom:15px;"> Address 1 </label></td>
                                            <td><label>- <?php echo $user_details['contact'][0]['address_1'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Address 2 </label></td>
                                            <td><label>- <?php echo $user_details['contact'][0]['address_2'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Address 3 </label></td>
                                            <td><label>- <?php echo $user_details['contact'][0]['address_3'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Mobile </label></td>
                                            <td><label>- <?php if($user_details['contact'][0]['mobile']){ echo '0'.$user_details['contact'][0]['mobile'] ; }?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Telephone </label></td>
                                            <td><label>- <?php if($user_details['contact'][0]['telephone']){ echo '0'.$user_details['contact'][0]['telephone'];} ?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Email </label></td>
                                            <td><label>- <?php echo $user_details['contact'][0]['email'] ;?> </label></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane" id="tab_1_2">
                                <?php echo form_open("admin/updateProfile", 'role="form" id="updateOfficerForm"'); ?>
                                    <div class="form-body">
                                        <input type="text" class="form-control hidden" name="id" value="<?php echo $user_details[0]['ID'] ;?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name with intials</label>
                                                <input type="text" class="form-control" name="initname" placeholder="Name with intials" value="<?php echo $user_details[0]['in_name'] ;?>">
                                            </div>

                                            <div class="form-group">
                                                <label> මුලකුරු සහිත නම - සිංහල  </label>
                                                <input type="text" class="form-control " name="si_initname" id="si_initname" placeholder="මුලකුරු සහිත නම - සිංහල " value="<?php echo $user_details[0]['si_in_name'] ;?>"/>
                                            </div>

                                            <div class="form-group">
                                                <label> தலைப்புகள் கொண்ட பெயர் - தமிழ்  </label>
                                                <input type="text" class="form-control " name="ta_initname" id="ta_initname" placeholder="தலைப்புகள் கொண்ட பெயர் - தமிழ் " value="<?php echo $user_details[0]['ta_in_name'] ;?>" />
                                            </div>

                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $user_details[0]['f_name'] ;?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type="text" class="form-control" name="mname" placeholder="Middle Name" value="<?php echo $user_details[0]['m_name'] ;?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $user_details[0]['l_name'] ;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Date of birth</label>
                                                <input type="text" class="form-control date-picker" name="dob" id="dob" value="<?php echo $user_details[0]['dob'] ;?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" name="mobile" placeholder="Mobile" value="<?php echo $user_details['contact'][0]['mobile'] ;?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control" name="telephone" placeholder="Telephone" value="<?php echo $user_details['contact'][0]['telephone'] ;?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user_details['contact'][0]['email'] ;?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Address line 1</label>
                                                <input type="text" class="form-control" name="address1" placeholder="Address line 1" value="<?php echo $user_details['contact'][0]['address_1'] ;?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Address line 2</label>
                                                <input type="text" class="form-control" name="address2" placeholder="Address line 2" value="<?php echo $user_details['contact'][0]['address_2'] ;?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Address line 3</label>
                                                <input type="text" class="form-control" name="address3" placeholder="Address line 3" value="<?php echo $user_details['contact'][0]['address_3'] ;?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions pull-right">
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>

                        <!-- Modal for Deactivation info-->
                            <div id="deactivationModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Deactivate officer service</h4>

                                  </div>

                                <?php echo form_open() ?>
                                  <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Reason to deactivate service</label>
                                        <?php if ($deativate_type) { ?>
                                            <select class="select2" name="deactivate_reason" id="deactivate_reason" style="width:100%">
                                                <option value="" hidden selected> ---------Please Select--------- </option>
                                                <?php foreach ($deativate_type as $row) { ?>
                                                    <option value="<?php echo $row['ID'];?>" > <?php echo $row['type'] ;?> </option>
                                                <?php } ?>
                                                <option value="other" class="c-other hidden"> Other </option>
                                            </select>
                                        <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of deactivating service</label>
                                            <input type="text" class="form-control date-picker" name="deactivate_date" id="deactivate_date" placeholder="yyyy-mm-dd">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer" style="border-top:0;">
                                    <button type="button" class="btn btn-success" data-dismiss="modal" id="deactive_submit">Save</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                <?php echo form_close() ?>
                                </div>

                              </div>
                            </div>

                        </div>
                    </div> <!--Basic Details --Personal and Contact -->
                    <div class="panel panel-info">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title">General Service Details</h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr valign="middle">
                                        <th> State Service </th>
                                        <th colspan="7" style="text-align:center;"> SLEAS </th>
                                        <th>  </th>
                                    </tr>
                                    <tr valign="top">
                                        <th> Date Joined </th>
                                        <th> Date Joined </th>
                                        <th> Grade </th>
                                        <th> Way of Joined </th>
                                        <th> Cadre when joining </th>
                                        <th> Medium </th>
                                        <th> Confirmation </th>
                                        <th> Pensionable Date </th>
                                        <th> Edit </th>
                                    </tr>
                                </thead>
                                <tr valign="top">
                                    <td><?php echo $user_details[general][0]['f_appoint_date'] ;?> </td>
                                    <td><?php echo $user_details[general][0]['date_join'] ;?> </td>
                                    <td style="min-width:80px;"><?php echo $user_details[general][0]['grade'] ;?> </td>
                                    <td><?php echo $user_details[general][0]['way_join'] ;?> </td>
                                    <td><?php echo $user_details[general][0]['cadre'] ;?> </td>
                                    <td><?php echo $user_details[general][0]['medium'] ;?> </td>
                                    <td><?php echo $user_details[general][0]['confirm'] ;?> </td>
                                    <td><?php echo date("Y-m-d", strtotime(date("Y-m-d", strtotime($user_details[0]['dob'])) . " +60 years")); ?> </td>
                                    <td> <a href="<?php echo base_url()."index.php/Admin/updateGeneralServiceForm/" . $user_details[general][0]['ID']; ?>" class="edit_service btn btn-xs btn-success pull-middle" role="button"><i class="fa fa-edit"></i></a> </td>
                                </tr>
                            </table>
                        </div>
                    </div> <!--General Service Details-->
                    <div class="panel panel-info">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title"> Requirements for Promotions </h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr valign="top">
                                        <th style="width:100px;">  </th>
                                        <th> Efficiency Bar Exam Pass Date </th>
                                        <th> P. G. D. E Pass Date </th>
                                        <th> Capacity Building Training Completed Date </th>
                                    </tr>
                                </thead>
                                <tr valign="top">
                                    <th> Grade III </th>
                                    <td><?php if($user_details[general][0]['eb_1_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['eb_1_pass']))  .  "</span>"  .   '<button class="delete_requirements btn btn-xs btn-danger pull-right" data-field="eb_1"><i class="fa fs-remove"></i></button>';?>
                                        <button class="edit_requirements btn btn-xs btn-success pull-right" data-field="eb_1"><i class="fa fa-edit"></i></button></td>

                                    <td><?php if($user_details[general][0]['pg_dip_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['pg_dip_pass']))  .  "</span>"  .   '<button class="delete_requirements btn btn-xs btn-danger pull-right" data-field="pg_dip"><i class="fa fs-remove"></i></button>' ;?>
                                        <button class="edit_requirements btn btn-xs btn-success pull-right" data-field="pg_dip"><i class="fa fa-edit"></i></button></td>

                                    <td><?php if($user_details[general][0]['cb_1_date'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['cb_1_date']))  .  "</span>"  .   '<button class="delete_requirements btn btn-xs btn-danger pull-right" data-field="cb_1"><i class="fa fs-remove"></i></button>' ;?>
                                        <button class="edit_requirements btn btn-xs btn-success pull-right" data-field="cb_1"><i class="fa fa-edit"></i></button></td>
                                </tr>
                                <tr valign="top">
                                    <th> Grade II </th>
                                    <td><?php if($user_details[general][0]['eb_2_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['eb_2_pass']))  .  "</span>"  .   '<button class="delete_requirements btn btn-xs btn-danger pull-right" data-field="eb_2"><i class="fa fs-remove"></i></button>'  ;?>
                                        <button class="edit_requirements btn btn-xs btn-success pull-right" data-field="eb_2"><i class="fa fa-edit"></i></button></td>

                                    <td><?php if($user_details[general][0]['pg_deg_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['pg_deg_pass']))  .  "</span>"  .   '<button class="delete_requirements btn btn-xs btn-danger pull-right" data-field="pg_deg"><i class="fa fs-remove"></i></button>' ;?>
                                        <button class="edit_requirements btn btn-xs btn-success pull-right" data-field="pg_deg"><i class="fa fa-edit"></i></button></td>

                                    <td><?php if($user_details[general][0]['cb_2_date'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['cb_2_date'])) .  "</span>"  .   '<button class="delete_requirements btn btn-xs btn-danger pull-right" data-field="cb_2"><i class="fa fs-remove"></i></button>'; ?>
                                        <button class="edit_requirements btn btn-xs btn-success pull-right" data-field="cb_2"><i class="fa fa-edit"></i></button>
                                        </td>
                                </tr>
                                <tr valign="top">
                                    <th> Grade I </th>
                                    <td><?php if($user_details[general][0]['eb_3_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['eb_3_pass']))  .  "</span>"  .   '<button class="delete_requirements btn btn-xs btn-danger pull-right" data-field="eb_3"><i class="fa fs-remove"></i></button>' ; ?>
                                        <button class="edit_requirements btn btn-xs btn-success pull-right" data-field="eb_3"><i class="fa fa-edit"></i></button></td>

                                    <td> N/A </td>

                                    <td><?php if($user_details[general][0]['cb_3_date'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['cb_3_date'])) . "</span>"  .  '<button class="delete_requirements btn btn-xs btn-danger pull-right" data-field="cb_3"><i class="fa fs-remove"></i></button>' ;?>
                                        <button class="edit_requirements btn btn-xs btn-success pull-right" data-field="cb_3"><i class="fa fa-edit"></i></button></td>
                                </tr>
                            </table>
                        </div>
                    </div> <!--Promotion Requirements-->

        <!-- Modal to get performance dates-->
                    <div id="requiredateModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 id="requiremodal-title"></h4>

                          </div>

                        <?php echo form_open() ?>
                          <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="modal-q"></label>
                                    <input type="text" class="form-control date-picker" name="require_date" id="require_date" placeholder="yyyy-mm-dd">
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer" style="border-top:0;">
                            <button type="button" class="btn btn-success" data-dismiss="modal" id="promotion_requirement_submit">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        <?php echo form_close() ?>
                        </div>

                      </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="panel panel-info">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title">Service Details</h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> Date </th>
                                        <th> Service mode </th>
                                        <th> Work place </th>
                                        <th> Division </th>
                                        <th> Institute / Branch </th>
                                        <th> Designation </th>
                                        <th> Edit </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($user_details)) {?>
                                    <?php foreach($user_details as $row) {?>
                                        <?php if($row['duty_date']) {?>
                                        <tr>
                                            <td><?php echo $row['duty_date']; ?></td>
                                            <td><?php echo $row['mode']; ?></td>
                                            <td><?php echo $row['work_place']; ?></td>
                                            <td><?php if($row['office_division']){ echo $row['office_division'];}else{ echo "Not Applicable" ;} ?></td>
                                            <td><?php echo $row['sub_location'] . $row['office_branch']; ?></td>
                                            <td><?php echo $row['designation']; ?></td>
                                            <td> <a href="<?php echo base_url()."index.php/Admin/updateServiceForm/" . $row['service_id']?>" class="edit_service btn btn-xs btn-success pull-middle" role="button"><i class="fa fa-edit"></i></a> </td>
                                        </tr>
                                        <?php }?>
                                    <?php }?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if($this->session->user_level != '1'){ ?>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <p>Add Service History</p>
                                <a href="<?php echo base_url()."index.php/placement/addHistory/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Placement </a>
                                <a href="<?php echo base_url()."index.php/transfer/addHistory/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Transfer</a>
                                <a href="<?php echo base_url()."index.php/promotion/addHistory/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Promotion</a>
                                <a href="<?php echo base_url()."index.php/promotionTransfer/addHistory/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Promotion Transfer</a>
                                <a href="<?php echo base_url()."index.php/transfer/addHistory/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Attachment</a>
                                <a href="<?php echo base_url()."index.php/secondment/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Secondment</a>
                                <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Releasement</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div> <!--Service History-->

                </div> <!--Service Details Div-->
                <div class="col-md-12">
                    <div class="col-md-6">

                        <div class="panel panel-info">
                            <div class="panel-heading reg-main-panel">
                                <h3 class="panel-title"> Educational Qualifications </h3>
                            </div><!--End of panel-heading-->
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover" id="q_1">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th> Date </th>
                                            <th> Marks/ Grade </th>
                                            <th> Institute/ School </th>
                                            <th style="width:80px;"> Edit </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($user_details)) {?>
                                        <?php foreach($user_details['qual'] as $row) {?>
                                            <?php if($row['qualification_type_id'] == '1') {?>
                                            <tr>
                                                <th><?php echo $row['qualification']; ?></th>
                                                <td><?php echo $row['qualified_date']; ?></td>
                                                <td><?php echo $row['qualification_grade']; ?></td>
                                                <td><?php echo $row['qualified_institute'] ?></td>
                                                <td><button class="edit_qualification btn btn-xs btn-success" data-type="academic" data-id="<?php echo $row['qid']; ?>"><i class="fa fa-edit"></i></button>&nbsp;<button class="delete_qualification btn btn-xs btn-danger" data-type="academic" data-id="<?php echo $row['qid']; ?>"><i class="fa fs-remove"></i></button></td>
                                            </tr>
                                            <?php }?>
                                        <?php }?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if($this->session->user_level != '1'){ ?>
                                <div class="col-md-12" style="margin-bottom:10px;">
                                    <p> Add Qualification </p>
                                    <a role="button" class="btn btn-white btn-xs add_qualification" data-type="academic"> Add Academic Qualification </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="panel panel-info">
                            <div class="panel-heading reg-main-panel">
                                <h3 class="panel-title"> Professional Qualifications </h3>
                            </div><!--End of panel-heading-->
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover" id="q_2">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th> Date </th>
                                            <th> Marks/ Grade </th>
                                            <th> Institute </th>
                                            <th style="width:80px;"> Edit </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($user_details)) {?>
                                        <?php foreach($user_details['qual'] as $row) {?>
                                            <?php if($row['qualification_type_id'] == '2') {?>
                                            <tr>
                                                <th><?php echo $row['qualification']; ?></th>
                                                <td><?php echo $row['qualified_date']; ?></td>
                                                <td><?php echo $row['qualification_grade']; ?></td>
                                                <td><?php echo $row['qualified_institute'] ?></td>
                                                <td><button class="edit_qualification btn btn-xs btn-success" data-type="professional" data-id="<?php echo $row['qid']; ?>"><i class="fa fa-edit"></i></button>&nbsp;<button class="delete_qualification btn btn-xs btn-danger" data-type="professional" data-id="<?php echo $row['qid']; ?>"><i class="fa fs-remove"></i></button></td>
                                            </tr>
                                            <?php }?>
                                        <?php }?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if($this->session->user_level != '1'){ ?>
                                <div class="col-md-12" style="margin-bottom:10px;">
                                    <p> Add Qualification </p>
                                    <a role="button" class="btn btn-white btn-xs add_qualification" data-type="professional"> Add Professional Qualification </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div> <!--Qualifications Div-->

                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title"> Leave Summary </h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="q_1">
                                <thead>
                                    <tr>
                                        <th> Leave Type </th>
                                        <th> Year </th>
                                        <th> Count </th>
                                        <th style="width:80px;"> Edit </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($user_details['leave'])) {?>
                                    <?php foreach($user_details['leave'] as $row) {?>
                                        <tr>
                                            <th><?php echo $row['leave_type']; ?></th>
                                            <td><?php echo $row['leave_year']; ?></td>
                                            <td><?php echo $row['leave_count']; ?></td>
                                            <td><button class="edit_leave btn btn-xs btn-success" data-id="<?php echo $row['lid']; ?>" data-type="<?php echo $row['leave_type_id']; ?>" data-year="<?php echo $row['leave_year']; ?>" data-count="<?php echo $row['leave_count']; ?>"><i class="fa fa-edit"></i></button>&nbsp;<button class="delete_leave btn btn-xs btn-danger" data-id="<?php echo $row['lid']; ?>"><i class="fa fs-remove"></i></button></td>
                                        </tr>
                                    <?php }?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if($this->session->user_level != '1'){ ?>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <p> Add Leave </p>
                                <a role="button" class="btn btn-white btn-xs add_leave" data-type="academic"> Add Leave </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        <!-- Modal to add qualifications details -->
                <div id="qualificationsModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 id="qualificationsModal-title"></h4>

                      </div>

                    <?php echo form_open() ?>
                      <div class="modal-body">
                        <input type="text" class="form-control hidden" name="q_type" id="q_type">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> NIC </label>
                                <input type="text" class="form-control" name="nic" id="qualified_nic" value="<?php echo $user_details[0]['NIC'] ;?>" readonly>
                            </div>
                            <div class="form-group ">
                                <label>Qualification</label>
                                <select class="select2 " name="q_name" id="q_name" style="width:100%">
                                    <option value="" > ---------Please Select---------</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label>Subject</label>
                                <select class="select2 " name="q_subj" id="q_subj" style="width:100%">
                                    <option value="" > ---------Please Select---------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Institute/ School </label>
                                <input type="text" class="form-control" name="q_institute" id="q_institute" placeholder="Institute or School">
                            </div>
                            <div class="form-group">
                                <label> Instition </label>
                                <input type="radio" class="form-control" name="q_institution" id="q_institution_l"> Local
                                <input type="radio" class="form-control" name="q_institution" id="q_institution_f"> Foreign
                            </div>
                            <div class="form-group">
                                <label> Grade/ Marks </label>
                                <input type="text" class="form-control" name="q_grade" id="q_grade" placeholder="Final Grade or Results">
                            </div>
                            <div class="form-group">
                                <label> Qualified Date </label>
                                <input type="text" class="form-control date-picker" name="qualified_date" id="qualified_date" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="form-group">
                                <label> Upload Scanned Certificate </label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <input type="file" name="certificate" id="certificate">
                                    <span class="fileinput-filename"></span>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer" style="border-top:0;">
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="qualification_submit">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    <?php echo form_close() ?>
                    </div>

                  </div>
                </div>
        <!-- Modal to add Leave details -->
                <div id="leaveModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 id="leaveModal-title"> Add Leave Summary </h4>

                      </div>

                    <?php echo form_open() ?>
                      <div class="modal-body">
                        <input type="text" class="form-control hidden" name="q_type" id="q_type">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> NIC </label>
                                <input type="text" class="form-control" name="nic" id="qualified_nic" value="<?php echo $user_details[0]['NIC'] ;?>" readonly>
                            </div>
                            <div class="form-group">
                                <label> Year </label>
                                <input type="text" class="form-control " name="l_year" id="l_year" placeholder="YYYY">
                            </div>
                            <div class="form-group ">
                                <label> Leave Type </label>
                                <select class="select2 " name="l_type" id="l_type" style="width:100%">
                                    <option value="" > ---------Please Select---------</option>
                            <?php if($leavetype){ ?>
                                <?php foreach($leavetype as $row){ ?>
                                    <option value="<?php echo $row['ID'] ?>" > <?php echo $row['leave_type'] ?> </option>
                                <?php } ?>
                            <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> No. of Leaves </label>
                                <input type="text" class="form-control" name="l_count" id="l_count" placeholder="Number of Leaves">
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer" style="border-top:0;">
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="leave_submit">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    <?php echo form_close() ?>
                    </div>

                  </div>
                </div>
                <?php //print_r($user_details); ?>
            </div><!--End of Conainer-->
        </section>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js"?>"></script>

        <script>

            $(document).ready(function(){
                if("<?php echo $user_details[general][0]['status'];?>" == "Active"){
                    $('#toggle-status').bootstrapToggle('on');
                }//Check whether officer is ACtive, If so show him as active

                $('.messagetoggle').click(function(){
                    var person_id = $(this).data('message').id;
                    var message_body = $(this).data('message').message;
                    var message_title = $(this).data('message').message_title;
                    $('#messageModal').on('show.bs.modal', function(e) {
                        $('#messagebody').text(message_body);
                        $('.modal-title').text(message_title);
                    });
                });

                $('#image_submit').click(function(){
                    var post_url = "index.php/FormControl/setProfileImage/"+'2';
                    var form_data = new FormData();
                    var file_data = $('#file').prop('files')[0];
                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('file', file_data);
                    form_data.append( 'user_id', '<?php echo $user_details[0]['ID'] ?>');
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            //console.log(JSON.parse(response));
                            console.log(response);
                            $('#profile_img').attr('src', "");
                            $('#profile_img').attr('src', "<?php echo base_url(); ?>" + response['path'] + "?" + new Date().getTime());
                            console.log($('#profile_img').attr('src'));
                            },
                        error: function (response) {
                            alert("Error Changing Profile Picture");
                        }
                    });
                });

                $('#changeRequest').click(function(){
                    var post_url = "index.php/admin/changeRequest/";
                    var form_data = new FormData();
                    var person_id = $('#request_person_id').val();
                    var sclerk = $('#request_sclerk').val();
                    var title = $('#request_title').val();
                    var message = $('#request_message').val();
                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('person_id', person_id);
                    form_data.append('sclerk', sclerk);
                    form_data.append('title', title);
                    form_data.append('message', message);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            alert("Successfully submitted the request!");
                            $('#request_title').val("");
                            $('#request_message').val("");
                            },
                        error: function (response) {

                            alert("not success");
                        }
                    });
                });

                $('#toggle-status').change(function(){
                    if($(this).prop('checked') == false){
                        $('#deactivationModal').modal('toggle');
                    }
                });

                $('#deactive_submit').click(function(){

                    var post_url = "index.php/Admin/deactivateOfficer/"+'2';
                    var form_data = new FormData();
                    var deactivate_reason = $('#deactivate_reason').val();
                    var deactivate_date = $('#deactivate_date').val();
                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('deactivate_type_id', deactivate_reason);
                    form_data.append( 'deactivate_date', deactivate_date);
                    form_data.append( 'user_id', '<?php echo $user_details[0]['ID'] ?>');
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'text',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            $('#toggle-status').bootstrapToggle('off');
                            },
                        error: function (response) {
                            alert("Error Deactivating Service! Please try again.");
                        }
                    });
                });

                $('#deactivationModal').on('hidden.bs.modal', function () {
                    if("<?php echo $user_details[general][0]['status'];?>" == "Active"){
                        $('#toggle-status').bootstrapToggle('on')
                    }
                })

                $(document).on('click', '.edit_requirements', function(){
                    var field = $(this).data("field");
                    if(field == "eb_1"){
                        var field_name = "Efficiency Bar Examination 1 Pass Date";
                    }else if(field == "eb_2"){
                        var field_name = "Efficiency Bar Examination 2 Pass Date";
                    }else if(field == "eb_3"){
                        var field_name = "Efficiency Bar Examination 3 Pass Date";
                    }else if(field == "pg_dip"){
                        var field_name = "Efficiency Bar Examination 2 or Post Graduate Diploma in Education Pass Date";
                    }else if(field == "pg_dip"){
                        var field_name = "Post Graduate Degree in Education Pass Date";
                    }else if(field == "cb_1"){
                        var field_name = "Capacity Building Training 1 Completed Date";
                    }else if(field == "cb_2"){
                        var field_name = "Capacity Building Training 2 Completed Date";
                    }else if(field == "cb_3"){
                        var field_name = "Capacity Building Training 3 Completed Date";
                    }
                    console.log(field_name);
                    $('#requiremodal-title').text(field_name);
                    $('#require_date').data("field", field);
                    $('#requiredateModal').modal('toggle');
                });

                $(document).on('click', '.delete_requirements', function(){
                    var post_url = "index.php/Admin/deleteDateUpdate/"+'2';
                    var form_data = new FormData();
                    var field = $(this).data("field");
                    var obj = $(this);
                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('field', field);
                    form_data.append('user_id', '<?php echo $user_details[0]['ID'] ?>');
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'text',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            $(this).prev().color='#ff0000';
                            console.log("success");
                            console.log(obj.siblings());
                            obj.siblings("span").text("");
                            },
                        error: function (response) {
                            alert("Error Updating! Please try again.");
                        }
                    });
                });

                $('#promotion_requirement_submit').click(function(){
                    var post_url = "index.php/Admin/requiredDateUpdate/"+'2';
                    var form_data = new FormData();
                    var field = $('#require_date').data("field");
                    var field_date = $('#require_date').val();
                    var obj1 = $(this);
                    var obj = $("[data-field="+ field +"]");
                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('field', field);
                    form_data.append('field_date', field_date);
                    form_data.append('user_id', '<?php echo $user_details[0]['ID'] ?>');
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'text',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            console.log("success");
                            console.log(obj.siblings());
                            //obj.siblings("span2").text(field_date);
                            var html ="<span>"+ field_date + "</span><button class='delete_requirements btn btn-xs btn-danger pull-right' data-field="+ field +"><i class='fa fs-remove'></i></button> <button class='edit_requirements btn btn-xs btn-success pull-right' data-field=" + field +"><i class='fa fa-edit'></i></button>"
                            obj.parent().html(html);

                            },
                        error: function (response) {
                            alert("Error Updating! Please try again.");
                        }
                    });
                });

                $('.add_qualification').click(function(){
                    var qual_type = $(this).data("type");
                    if(qual_type == 'academic'){
                        var q_type = '1';
                        $('#qualificationsModal-title').text("Add Educational Qualifications of <?php echo $user_details[0]['title'] . ' ' . $user_details[0]['in_name']?>");
                        $('#q_type').val('1');
                        $('#qualificationsModal').modal('toggle');
                    } else if(qual_type == 'professional'){
                        var q_type = '2';
                        $('#qualificationsModal-title').text("Add Professional Qualifications of <?php echo $user_details[0]['title'] . ' ' . $user_details[0]['in_name']?>");
                        $('#q_type').val('2');
                        $('#qualificationsModal').modal('toggle');
                    }
                    $('#qualification_submit').data('action', 'add');

                    var post_url = "index.php/FormControl/getQualifications/"+'2';
                    var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',q_type: q_type};
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: dataarray,
                        success: function(res){
                            $('#q_name').empty();
                            $('#q_name').append('<option value="" selected> ---------Please Select---------</option>');
                            $.each(res, function(ID,province_office){
                                $('#q_name').append('<option value='+res[ID].ID+' data-name ="'+ res[ID].qualification +'" >'+res[ID].qualification+'</option>');
                            });
                        }
                    });
                });

                $(document).on('click', '.edit_qualification', function(){
                    var qual_id = $(this).data("id");
                    var qual_type = $(this).data("type");
                    $('#qualification_submit').data('action', 'edit');
                    $('#qualification_submit').data('qual_id', qual_id);
                    if(qual_type == 'academic'){
                        var q_type = '1';
                        $('#qualificationsModal-title').text("Edit Qualifications of <?php echo $user_details[0]['title'] . ' ' . $user_details[0]['in_name']?>");
                        $('#q_type').val('1');
                    } else if(qual_type == 'professional'){
                        var q_type = '2';
                        $('#qualificationsModal-title').text("Edit Qualifications of <?php echo $user_details[0]['title'] . ' ' . $user_details[0]['in_name']?>");
                        $('#q_type').val('2');

                    }

                    var post_url = "index.php/FormControl/getQualifications/"+'2';
                    var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',q_type: q_type};
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        async: false,
                        data: dataarray,
                        success: function(res){
                            $('#q_name').empty();
                            $('#q_name').append('<option value="" > ---------Please Select---------</option>');
                            $.each(res, function(ID,province_office){
                                $('#q_name').append('<option value='+res[ID].ID+' data-name ="'+ res[ID].qualification +'" >'+res[ID].qualification+'</option>');
                            });
                        }
                    });

                    var post_url = "index.php/FormControl/getQualificationDetails/2";
                    var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',q_id: qual_id};
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: dataarray,
                        success: function(res){
                            $('#q_name').val(res[0].qualification_id).trigger('change');
                            if(res[0].qualification_subject_id){
                                $('#q_subj').val(res[0].qualification_subject_id).trigger('change');
                            }
                            $('#q_institute').val(res[0].qualified_institute);
                            $('#q_grade').val(res[0].qualification_grade);
                            $('#qualified_date').val(res[0].qualified_date);
                            $('.fileinput-filename').empty();
                            $('.fileinput-filename').append('<a href="<?php echo base_url()?>'+res[0].certificate_path+'" target="_blank"> Certificate </a>');
                            //$('#q_name').val(res[0].qualification_id);
                        }
                    });

                    $('#qualificationsModal').modal('toggle');
                    console.log($('#qualification_submit').data('action'));
                });

                $(document).on('click', '.delete_qualification', function(){
                    var qual_id = $(this).data("id");

                    var post_url = "index.php/FormControl/deleteQualification/2";
                    var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',qual_id: qual_id};
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        async: false,
                        data: dataarray,
                        success: function(res){
                            location.reload();
                            console.log(qual_id);
                        }
                    });


                });

                $('#q_name').change(function(){
                    var id = $(this).val();
                    var post_url = "index.php/FormControl/getQSubjects/"+id;
                    var dataarray = { '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',q_id: id };
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        async: false,
                        data: dataarray,
                        success: function(res){
                            $('#q_subj').empty();
                            $('#q_subj').append('<option value="" > ---------Please Select--------- </option>');
                            $.each(res, function(ID){
                                $('#q_subj').append('<option value='+res[ID].ID+'>'+res[ID].qualification_subject+'</option>');
                            });
                        }
                    });
                });

                $('#qualification_submit').click(function(){
                    var action = $(this).data('action');

                    var form_data = new FormData();
                    var file_data = $('#certificate').prop('files')[0];
                    var q_date = $('#qualified_date').val();
                    var q_type_id = $('#q_type').val();
                    var q_id = $('#q_name').val();
                    var q_subj_id = $('#q_subj').val();
                    var q_institute = $('#q_institute').val();
                    var q_grade = $('#q_grade').val();
                    var q_name = $('#q_name').find(':selected').data('name');

                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('q_date', q_date);
                    form_data.append('q_type_id', q_type_id);
                    form_data.append('q_id', q_id);
                    form_data.append('q_name', q_name);
                    form_data.append('q_subj_id', q_subj_id);
                    form_data.append('q_institute', q_institute);
                    form_data.append('q_grade', q_grade);
                    form_data.append('user_id', '<?php echo $user_details[0]['ID'] ?>');
                    form_data.append('nic', '<?php echo $user_details[0]['NIC'] ?>');
                    form_data.append('file', file_data);

                    if (action == 'add'){
                        var post_url = "index.php/FormControl/addQualification/"+'2';
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>" + post_url,
                            dataType :'json',
                            data: form_data,
                            contentType: false,
                            processData: false,
                            success: function(response){

                                $('#q_'+q_type_id+' tbody').append('<tr><th>'+q_name+'</th>'+
                                                           '<td>'+ q_date +'</td>' +
                                                           '<td>'+ q_grade +'</td>' +
                                                           '<td>'+ q_institute +'</td>' +
                                                           '</tr>');
                                //console.log('#q_'+q_id+' tbody');
                                },
                            error: function (response) {
                                alert("Error Adding Qualification");
                            }
                        });
                    }else if (action == 'edit'){
                        var qual_id = $(this).data('qual_id');
                        form_data.append('qual_id', qual_id);

                        var post_url = "index.php/FormControl/editQualification/2";
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>" + post_url,
                            dataType :'json',
                            data: form_data,
                            contentType: false,
                            processData: false,
                            success: function(response){
                                location.reload();
                                },
                            error: function (response) {
                                alert("Error Adding Qualification");
                            }
                        });
                    }

                });

                $('.add_leave').click(function(){

                    $('#leaveModal').modal('toggle');
                    $('#leave_submit').data('action', 'add');

                });

                $(document).on('click', '.edit_leave', function(){
                    var l_id = $(this).data("id");
                    var l_type = $(this).data("type");
                    var l_year = $(this).data("year");
                    var l_count = $(this).data("count");

                    $('#l_year').val(l_year);
                    $('#l_type').val(l_type).trigger('change');
                    $('#l_count').val(l_count);
                    $('#leave_submit').data('action', 'edit');
                    $('#leave_submit').data('l_id', l_id);
                    $('#leaveModal').modal('toggle');
                });

                $(document).on('click', '.delete_leave', function(){
                    var post_url = "index.php/Admin/deleteLeave/2/";
                    var form_data = new FormData();
                    var l_id = $(this).data("id");
                    var obj = $(this);
                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('l_id', l_id);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'text',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            location.reload();
                            },
                        error: function (response) {
                            alert("Error Deleting Leave Detail! Please try again.");
                        }
                    });
                });

                $('#leave_submit').click(function(){
                    var action = $(this).data('action');
                    var l_id = $(this).data('l_id');

                    var form_data = new FormData();
                    var leve_year = $('#l_year').val();
                    var leve_type_id = $('#l_type').val();
                    var leve_count = $('#l_count').val();

                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('l_year', leve_year);
                    form_data.append('l_type', leve_type_id);
                    form_data.append('l_count', leve_count);
                    form_data.append('person_id', '<?php echo $user_details[0]['ID'] ?>');

                    if(action == 'add'){
                        var post_url = "index.php/Admin/addLeave/2";
                        var errorMessage = "Error Adding Leave Details";
                    } else if(action == 'edit'){
                        form_data.append('l_id', l_id);
                        var post_url = "index.php/Admin/editLeave/2";
                        var errorMessage = "Error Updating Leave Details";
                    }
                    $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + post_url,
                                dataType :'json',
                                data: form_data,
                                contentType: false,
                                processData: false,
                                success: function(response){

                                    location.reload();
                                    },
                                error: function (response) {
                                    alert(errorMessage);
                                }
                            });

                });

            });
        </script>
<?php } ?>
