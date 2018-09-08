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

                                            <div class="form-group">
                                                <label>Date of birth</label>
                                                <input type="text" class="form-control date-picker" name="dob" id="dob" value="<?php echo $user_details[0]['dob'] ;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

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
                                        <th colspan="6" style="text-align:center;"> SLEAS </th>
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
                                    <td><?php if($user_details[general][0]['eb_1_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['eb_1_pass']))  .  "</span>" ;?> </td>
                                    
                                    <td><?php if($user_details[general][0]['pg_dip_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['pg_dip_pass']))  .  "</span>" ;?> </td>
                                    
                                    <td><?php if($user_details[general][0]['cb_1_date'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['cb_1_date']))  .  "</span>" ;?> </td>
                                </tr>
                                <tr valign="top">
                                    <th> Grade II </th>
                                    <td><?php if($user_details[general][0]['eb_2_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['eb_2_pass']))  .  "</span>" ;?> </td>
                                    
                                    <td><?php if($user_details[general][0]['pg_deg_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['pg_deg_pass']))  .  "</span>" ;?> </td>
                                    
                                    <td><?php if($user_details[general][0]['cb_2_date'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['cb_2_date'])) .  "</span>" ; ?>
                                        </td>
                                </tr>
                                <tr valign="top">
                                    <th> Grade I </th>
                                    <td><?php if($user_details[general][0]['eb_3_pass'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['eb_3_pass']))  .  "</span>" ; ?> </td>
                                    
                                    <td> N/A </td>
                                    
                                    <td><?php if($user_details[general][0]['cb_3_date'])echo "<span>" . date("Y-m-d", strtotime($user_details[general][0]['cb_3_date'])) . "</span>" ;?> </td>
                                </tr>
                            </table>
                        </div>
                    </div> <!--Promotion Requirements-->

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
                                        </tr>
                                        <?php }?>
                                    <?php }?>
                                    <?php } ?>
                                </tbody>
                            </table>
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
                                            </tr>
                                            <?php }?>
                                        <?php }?>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
                                            </tr>
                                            <?php }?>
                                        <?php }?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!--Qualifications Div-->

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
                
            
                
            });  

        </script>
            