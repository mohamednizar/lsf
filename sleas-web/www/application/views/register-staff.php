<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <section id="content">   <!-- Start: Content -->
	        <div class="container" style="padding-top: 20px;">

		        <div class="row">
                    <?php if ($this->session->flashdata('register')=="not-success"){ ?>
                        <div class="col-md-6">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>Error!</strong> Could not register the member
                            </div>
                        </div>
                    <?php } ?>
		            <div class="col-md-12">
		                <div class="panel panel-info">
		                    <div class="panel-heading reg-main-panel">
		                        <h3 class="panel-title">Registration Form</h3>

		                        <div class="panel-tools">
		                            <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
		                        </div>
		                    </div><!--End of panel-heading-->
		                    <div class="panel-body">
                                <?php echo form_open('Register/register_new', 'role="form" id="addMemberForm"'); ?>
		                            <div class="form-body">
                                        <div class="panel-group" id="accordion">

                                            <div class="panel panel-default">
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Personal Information</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse1" class="panel-collapse collapse in">
                                                    <div class="panel-body personal_details">
                                                    <!--<h3>Personal Information</h3><hr>-->

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>NIC</label>
                                                            <input type="text" class="form-control " name="nic" id="nic" placeholder="NIC No" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>Title</label>
                                                            <select class="select2 " name="title" id="title" style="width:100%;">
                                                                <option value="" hidden selected>---------Please Select--------- </option>
                                                                <option value="Rev">Rev.</option>
                                                                <option value="Mr">Mr.</option>
                                                                <option value="Mrs">Mrs.</option>
                                                                <option value="Ms">Ms.</option>
                                                                <option value="Rev. Dr.">Rev. Dr.</option>
                                                                <option value="Dr.">Dr.</option>
                                                                <option value="Dr. (Ms)">Dr. (Ms)</option>
                                                                <option value="Dr. (Mrs)">Dr. (Mrs)</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>First Name</label>
                                                            <input type="text" class="form-control " name="fname" id="fname" placeholder="Full Name" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Middle Name</label>
                                                            <input type="text" class="form-control" name="mname" id="mname" placeholder="Middle Name" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>Last Name</label>
                                                            <input type="text" class="form-control " name="lname" id="lname" placeholder="Last Name" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>Name with Intials</label>
                                                            <input type="text" class="form-control " name="inname" id="inname" placeholder="Name with Intials" data-prompt-position="topLeft" required/>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label> මුලකුරු සහිත නම - සිංහල  </label>
                                                            <input type="text" class="form-control " name="inname" id="si_inname" placeholder="මුලකුරු සහිත නම - සිංහල " data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label> தலைப்புகள் கொண்ட பெயர் - தமிழ்  </label>
                                                            <input type="text" class="form-control " name="inname" id="ta_inname" placeholder="தலைப்புகள் கொண்ட பெயர் - தமிழ் " data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>Date of Birth</label>
                                                            <input type="text" class="form-control date-picker " name="dob" id="dob">
                                                        </div>

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>Ethnicity</label>
                                                            <select class="select2  " name="ethnicity" id="ethnicity" style="width:100%;">
                                                                <option value="" hidden selected>---------Please Select--------- </option>
                                                                <option value="Sinhala">Sinhala</option>
                                                                <option value="Sri Lankan Tamil">Sri Lankan Tamil</option>
                                                                <option value="Indian Tamil">Indian Tamil</option>
                                                                <option value="Muslim">Muslim</option>
                                                                <option value="Burger">Burger</option>
                                                                <option value="Malay">Malay</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>Gender</label>
                                                            <select class="select2  " name="gender" id="gender" style="width:100%;">
                                                                <option value="" hidden selected>---------Please Select--------- </option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>Civil Status</label>
                                                            <select class="select2  " name="civil_st" id="civil_st" style="width:100%;">
                                                                <option value="" hidden selected>---------Please Select--------- </option>
                                                                <option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Widowed">Widowed</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div><!--End of Personal details-->
                                                </div>
                                            </div><!--End of Personal details-->

                                            <div class="panel panel-default">
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> Contact Information (Permanent) </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse2" class="panel-collapse collapse">
                                                    <div class="panel-body contact_details">
                                                    <!--<h3>Contact Information (Permanent)</h3><hr>-->
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>Address Line 1 </label> 50 Characters maximum
                                                            <input type="text" class="form-control " name="address1" id="address1" placeholder="Address Line 1" data-prompt-position="topLeft" maxlength="50"/>
                                                        </div>

                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>Address Line 2</label>
                                                            <input type="text" class="form-control " name="address2" id="address2" placeholder="Address Line 2" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Address Line 3</label>
                                                            <input type="text" class="form-control " name="address3" id="address3" placeholder="Address Line 3" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input type="text" class="form-control " name="pocode" id="pocode" placeholder="Postal Code" data-prompt-position="topLeft" />
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Mobile Phone number</label>
                                                            <input type="text" class="form-control validate[custom[phone]]" name="mobile" id="mobile" placeholder="Mobile number" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Land phone number</label>
                                                            <input type="text" class="form-control validate[custom[phone]]" name="landp" id="landp" placeholder="Land Phone number" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input type="text" class="form-control validate[custom[email]]" name="email" id="email" placeholder="Email Address" data-prompt-position="topLeft" />
                                                        </div>

                                                    </div>
                                                </div> <!--End of Contact details Permanent-->
                                                </div>
                                            </div><!--End of Contact details Permanent-->

                                            <div class="panel panel-default">
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Contact Information (Temporary)</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse3" class="panel-collapse collapse">

                                                    <div class="panel-body contact_details-temp">
                                                    <!--<h3>Contact Information (Tempory)</h3><hr>-->
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Address Line 1</label>
                                                            <input type="text" class="form-control " name="addresstemp1" id="addresstemp1" placeholder="Address Line 1" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Address Line 2</label>
                                                            <input type="text" class="form-control " name="addresstemp2" id="addresstemp2" placeholder="Address Line 2" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Address Line 3</label>
                                                            <input type="text" class="form-control " name="addresstemp3" id="addresstemp3" placeholder="Address Line 3" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input type="text" class="form-control " name="pocodetemp" id="pocodetemp" placeholder="Postal Code" data-prompt-position="topLeft" />
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Land phone no 02</label>
                                                            <input type="text" class="form-control validate[custom[phone]]" name="landptemp" id="landptemp" placeholder="Land No" data-prompt-position="topLeft" />
                                                        </div>

                                                    </div>
                                                </div> <!--End of Contact details Tempory-->
                                                </div>
                                            </div><!--End of Contact details Tempory-->

                                            <div class="panel panel-default"><!--General Service-->
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        General service information</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse4" class="panel-collapse collapse">

                                                    <div class="panel-body general-service">
                                                   <!-- <h3>General service information</h3><hr>-->

                                                    <div class="col-md-12">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label>Date of first appoint to the pensionable post of the state service (If applicable)</label>
                                                                <input type="text" class="form-control date-picker " name="date_f_appoint" id="date_f_appoint">
                                                            </div>

                                                            <div class="form-group">
                                                                <label><span style="color:red;">*</span>Date of first join to the SLEAS</label>
                                                                <input type="text" class="form-control date-picker " name="date_join" id="date_join_gen">
                                                            </div>

                                                            <div class="form-group ">
                                                                <label><span style="color:red;">*</span>Way of joined the SLEAS</label>
                                                                <select class="select2  " name="way_joined" id="way_joined" style="width:100%;">
                                                                    <option value="" hidden selected>---------Please Select--------- </option>
                                                                    <option value="Open">Open</option>
                                                                    <option value="Limited">Limited</option>
                                                                    <option value="Merit">Merit</option>
                                                                    <option value="Super Numeral (PVC)">Super Numeral (PVC)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="gen-serv-set1 hidden">

                                                                <div class="form-group ">
                                                                    <label>SLEAS Cadre when joining the SLEAS</label>
                                                                    <select class="select2 gen-serv-set1-cadre" name="cadre" id="cadre" style="width:100%;">
                                                                        <option value="" hidden selected>---------Please Select--------- </option>
                                                                        <option value="General Cadre">General Cadre</option>
                                                                        <option value="Special Cadre">Special Cadre</option>
                                                                    </select>
                                                                </div>

                                                                    <div class="form-group gen-serv-set1-general hidden">
                                                                        <label>SLEAS Grade  when joining the SLEAS</label>
                                                                        <select class="select2 " name="grade_general" id="grade_general" style="width:100%;">
                                                                            <option value="" hidden selected>---------Please Select--------- </option>
                                                                            <option value="Special">Special</option>
                                                                            <option value="Grade I">Grade I</option>
                                                                            <option value="Grade II">Grade II</option>
                                                                            <option value="Grade III">Grade III</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group gen-serv-set1-special hidden">
                                                                        <label>SLEAS Grade  when joining the SLEAS</label>
                                                                        <select class="select2 " name="grade_special" id="grade_special" style="width:100%;">
                                                                            <option value="" hidden selected>---------Please Select--------- </option>
                                                                            <option value="Grade II">Grade II</option>
                                                                            <option value="Grade III">Grade III</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group gen-serv-set1-special hidden ">
                                                                        <label>Subject</label>
                                                                        <select class="select2Search " name="special_subject" id="special_subject" style="width:100%;">
                                                                            <option value="" hidden selected>---------Please Select--------- </option>
                                                                            <?php if ($subjects) { ?>
                                                                                    <?php foreach ($subjects as $row) { ?>
                                                                                        <option value=<?php echo $row['ID'];?> > <?php echo $row['sub_name'] ;?> </option>
                                                                            <?php    } ?>
                                                                                <?php } ?>

                                                                            </select>
                                                                    </div>
                                                            </div>
                                                            <div class="gen-serv-set2 hidden">

                                                                <div class="form-group ">
                                                                    <label>SLEAS Cadre when joining the SLEAS</label>
                                                                    <select class="select2 " name="cadre_supern" id="cadre_supern" style="width:100%;">
                                                                        <option value="" hidden selected>---------Please Select--------- </option>
                                                                        <option value="General Cadre">General Cadre</option>
                                                                        <option value="Special Cadre">Special Cadre</option>
                                                                        <option value="Not Specified">Not Specified</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label>SLEAS Grade  when joining the SLEAS</label>
                                                                    <select class="select2 " name="grade_supern" id="grade_supern" style="width:100%;">
                                                                        <option value="" hidden selected>---------Please Select--------- </option>
                                                                        <option value="Grade I">Grade I</option>
                                                                        <option value="Grade II">Grade II</option>
                                                                        <option value="Grade III">Grade III</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label><span style="color:red;">*</span>Medium in which recruited</label>
                                                                <select class="select2  " name="medium_recruit" id="medium_recruit" style="width:100%;">
                                                                    <option value="" hidden selected>---------Please Select--------- </option>
                                                                    <option value="Sinhala">Sinhala</option>
                                                                    <option value="Tamil">Tamil</option>
                                                                    <option value="English">English</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label><span style="color:red;">*</span>Confirmed</label>
                                                                <select class="select2  " name="confirm" id="confirm" style="width:100%;">
                                                                    <option value="" hidden selected>---------Please Select--------- </option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Activate Date of Confirmation</label>
                                                                <input type="text" class="form-control date-picker " name="date_confirm" id="date_confirm">
                                                            </div>

                                                            <div class="form-group">
                                                                <label> Rank in Entrance Exam </label>
                                                                <input type="text" class="form-control " name="rank_entrance" id="rank_entrance">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div><!--End of General-Service-->
                                                </div>
                                            </div><!--End of General-Service-->

                                            <div class="panel panel-default"><!--Current Service-->
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        Current service information</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse5" class="panel-collapse collapse">

                                                    <div class="current-service">
                                        <!--<h3>Current service information</h3><hr>-->

                                                        <div class="col-md-12">
                                                        <div class="col-md-6">

                                                            <div class="form-group ">
                                                                <label><span style="color:red;">*</span>Mode of service status</label>
                                                                <select class="select2  " name="service_mood" id="service_mood" style="width:100%">
                                                                    <option value="" hidden selected>---------Please Select---------</option>
                                                                    <option value="1" data-val="firstappoint"> First Appointment </option>
                                                                    <option value="2" data-val="promo"> Promotion </option>
                                                                    <option value="3" data-val="trans"> Transfer </option>
                                                                    <option value="4" data-val="promoTrans"> Promotion / Transfer </option>
                                                                    <option value="5" data-val="attach"> Attachment </option>
                                                                    <option value="6" data-val="second"> Secondment </option>
                                                                    <option value="7" data-val="release"> Releasement </option>
                                                                    <option value="8" data-val="acting"> Acting Duty </option>
                                                                    <option value="9" data-val="perform"> Performing Duty </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group date_appoint">
                                                                <label><span style="color:red;">*</span>Date of appoint to the present SLEAS Grade </label>
                                                                <input type="text" class="form-control date-picker " name="date_appoint" id="date_appoint">
                                                            </div>
                                                        </div>

                                                        <div class="c-firstapp_block hidden">
                                                            <div class="col-md-6">

                                                                <div class="form-group ">
                                                                    <label>Working place</label>
                                                                    <?php if ($workPlaces) { ?>
                                                                        <select class="select2 col-md-12 workPlaces" name="work_place" id="work_place" style="padding-left:0;" >
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                            <?php foreach ($workPlaces as $row) { ?>
                                                                                <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>
                                                                    <?php    } ?>
                                                                            <option value="other" class="c-other hidden"> Other </option>
                                                                        </select>
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="form-group hidden work_other">
                                                                    <label>Other</label>
                                                                    <input type="text" class="form-control" name="work_other" id="work_other" placeholder="Mother’s Occupation" data-prompt-position="topLeft" />
                                                                </div>

                                                                <div class="province_office hidden">
                                                                    <div class="form-group ">
                                                                        <label>Province</label>
                                                                        <select class="select2 " name="province_office" id="province_office" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select---------</option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <div class="c-firstapp-work-main-institue hidden">

                                                                    <div class="form-group ">
                                                                        <label>Division</label>
                                                                        <select class="select2 main_division" name="main_division" id="main_division" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>\
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group ">
                                                                        <label>Branch</label>
                                                                        <select class="select2Search main_branch" name="main_branch" id="main_branch" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>\
                                                                        </select>
                                                                    </div>

                                                                </div><!--End of work-main-institue-->  <!--Hidden when loading-->

                                                                <div class="c-firstapp-work-institute hidden" >
                                                                    <div class="form-group ">
                                                                        <label>Province</label>
                                                                        <?php if ($provinceList) { ?>
                                                                            <select class="select2 province" name="province" id="province" style="width:100%">
                                                                                <option value="" hidden selected> ---------Please Select--------- </option>
                                                                                <?php foreach ($provinceList as $row) { ?>
                                                                                    <option value="<?php echo $row['province_id'];?>" > <?php echo $row['province'] ;?> </option>
                                                                        <?php    } ?>
                                                                                <option value="other" class="c-other hidden"> Other </option>
                                                                            </select>
                                                                            <?php } ?>
                                                                    </div>

                                                                    <div class="form-group ">
                                                                        <label>District</label>
                                                                        <select class="select2 district" name="district" id="district" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group zone">
                                                                        <label>Zone</label>
                                                                        <select class="select2 zone" name="zone" id="zone" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group zonal_office hidden">
                                                                        <label>Zonal Office</label>
                                                                        <select class="select2 zonal_office" name="zonal_office" id="zonal_office" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group division">
                                                                        <label>Division</label>
                                                                        <select class="select2 division" name="division" id="division" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group divisional_office hidden">
                                                                        <label>Divisional Office</label>
                                                                        <select class="select2 divisional_office" name="divisional_office" id="divisional_office" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group institute">
                                                                        <label>School / institute</label>
                                                                        <select class="select2 institute" name="institute" id="institute" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select---------</option>
                                                                        </select>
                                                                    </div>
                                                                </div> <!--End of work-institute--> <!--Hidden when loading-->

                                                                <div class="form-group">
                                                                    <label>Designation</label>
                                                                    <?php if ($designation) { ?>
                                                                        <select class="select2Search designation " name="designation" id="designation" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                            <?php foreach ($designation as $row) { ?>
                                                                                <option value="<?php echo $row['ID'];?>" > <?php echo $row['designation'] ;?> </option>
                                                                    <?php    } ?>
                                                                            <option value="other" class="c-other hidden"> Other </option>
                                                                        </select>
                                                                        <?php } ?>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label>Present SLEAS Grade</label>
                                                                    <select class="select2 " name="present_grade" id="present_grade" style="width:100%">
                                                                        <option value="">  Select </option>
                                                                        <option value="Grade I">  Grade I </option>
                                                                        <option value="Grade II">  Grade II </option>
                                                                        <option value="Grade III">  Grade III </option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group hidden date-promoted">
                                                                    <label>Date Promoted</label>
                                                                    <input type="text" class="form-control date-picker" name="date_promoted" id="date_promoted">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Date of assumed duties at the present working place</label>
                                                                    <input type="text" class="form-control date-picker" name="date_assumed" id="date_assumed">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Respective official letter no.</label>
                                                                    <input type="text" class="form-control " name="official_letter_no" id="official_letter_no" placeholder="Respective official letter no." data-prompt-position="topLeft" />
                                                                </div>

                                                                <div class="form-group hidden salary-drawn">
                                                                    <label>Place where salary drawn</label>
                                                                    <?php if ($workPlaces) { ?>
                                                                        <select class="select2 col-md-12 workPlaces" name="salary_drawn" id="salary_drawn" style="padding-left:0;" >
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                            <?php foreach ($workPlaces as $row) { ?>
                                                                                <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>
                                                                    <?php    } ?>
                                                                            <option value="other" class="c-other hidden"> Other </option>
                                                                        </select>
                                                                    <?php } ?>
                                                                </div>

                                                            </div><!--End of first appointment block-->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="c-releasement_block hidden">

                                                                <div class="form-group">
                                                                    <label>Releasement Type</label>
                                                                    <?php if ($release_type) { ?>
                                                                        <select class="select2 " name="release_type" id="release_type" style="width:100%">
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                            <?php foreach ($release_type as $row) { ?>
                                                                                <option value="<?php echo $row['ID'];?>" data-type="<?php echo $row['rel_type'];?>" > <?php echo $row['rel_type'] ;?> </option>
                                                                    <?php    } ?>
                                                                            <option value="other" class="c-other hidden"> Other </option>
                                                                        </select>
                                                                        <?php } ?>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Place</label>
                                                                    <select class="select2 " name="release_place" id="release_place" style="width:100%">
                                                                        <option value="" hidden selected> ---------Please Select---------</option>
                                                                    </select>
                                                                </div>


                                                                <div class="release_study_block hidden">

                                                                    <div class="form-group release_study_institute">
                                                                        <label>Institute name</label>
                                                                            <input type="text" class="form-control " name="release_institute_name" id="release_institute_name" placeholder="Institute name" data-prompt-position="topLeft" />
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Start date</label>
                                                                        <input type="text" class="form-control date-picker" name="release_study_st_date" id="release_study_st_date">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>End date</label>
                                                                        <input type="text" class="form-control date-picker" name="release_study_end_date" id="release_study_end_date">
                                                                    </div>

                                                                </div>


                                                                <div class="release_work_block hidden">

                                                                    <div class="form-group">
                                                                        <label>Designation</label>
                                                                        <input type="text" class="form-control " name="release_work_designation" id="release_work_designation" placeholder="Designation" data-prompt-position="topLeft" />
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Date of assumed duties at the present working place</label>
                                                                        <input type="text" class="form-control date-picker" name="release_work_date_assumed" id="release_work_date_assumed">
                                                                    </div>

                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Respective official letter no.</label>
                                                                    <input type="text" class="form-control " name="rel_official_letter_no" id="rel_official_letter_no" placeholder="Respective official letter no." data-prompt-position="topLeft" />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Place where salary drawn</label>
                                                                    <?php if ($workPlaces) { ?>
                                                                        <select class="select2 col-md-12 workPlaces" name="release_salary_drawn" id="release_salary_drawn" style="padding-left:0;" >
                                                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                                                            <?php foreach ($workPlaces as $row) { ?>
                                                                                <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>
                                                                    <?php    } ?>
                                                                            <option value="other" class="c-other hidden"> Other </option>
                                                                        </select>
                                                                    <?php } ?>
                                                                </div>

                                                            </div><!--End of releasement block-->

                                                        </div>
                                                    </div>
                                                    </div><!--End of current-service-->
                                                </div>
                                            </div><!--End of current-service-->

                                        </div><!--End of accordian-->

                                        <div class="form-actions fluid">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="reset" id="reset-button" class="btn btn-info">Clear</button>
                                                <button type="submit" class="btn btn-info form-reset">Submit</button>
                                            </div>
                                        </div>
                                    </div><!--End of form body-->
		                        <?php echo form_close(); ?>

		                      </div><!--End of panel-body-->
                            </div>

                    </div>
                </div><!--End of row-->
                <div class="row" id="selected_profile">

                </div>

            </div><!--End of container-->
        </section>

    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/additional-methods.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validationEngine/languages/jquery.validationEngine-en.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validationEngine/jquery.validationEngine.js"?>"></script>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>

    <script>
        $(document).ready(function(){
            FormValidationInline.init();

            /*$('#addMemberForm').validate({
                rules: {
                    nic: "required"
                }

            });*/

            //$('.menu').removeClass('active');
            $('#menu_add_officer').addClass('active');

            //Check Way joind in general service
            $('#way_joined').change(function(){
                var gr = $(this).val();
                if ($.inArray(gr, ['Open', 'Limited', 'Merit']) >=0){
                    $(".gen-serv-set1").removeClass("hidden");
                    $(".gen-serv-set2").addClass("hidden");
                }else if(gr == "Super Numeral (PVC)"){
                    $(".gen-serv-set1").addClass("hidden");
                    $(".gen-serv-set2").removeClass("hidden");

                }
            });


            //Check When joining SLEAS
            $('.gen-serv-set1-cadre').change(function(){
                var gr = $(this).val();
                if (gr == "General Cadre"){
                    $(".gen-serv-set1-general").removeClass("hidden");
                    $(".gen-serv-set1-special").addClass("hidden");
                }else if(gr == "Special Cadre"){
                    $(".gen-serv-set1-general").addClass("hidden");
                    $(".gen-serv-set1-special").removeClass("hidden");

                }
            });

            $('#service_mood').change(function(){
                var gr = $(this).find(':selected').data('val');
                $('.date_appoint').removeClass("hidden");
                if ($.inArray(gr, ['firstappoint', 'promo', 'trans', 'promoTrans', 'attach', 'second', 'acting', 'perform']) >=0){
                    $(".c-firstapp_block").removeClass("hidden");
                    $(".c-releasement_block").addClass("hidden");
                }else if(gr == "release"){
                    $(".c-firstapp_block").addClass("hidden");
                    $(".c-releasement_block").removeClass("hidden");

                }
                switch(gr){
                    case 'firstappoint':
                        $('.date-promoted').addClass("hidden");
                        $('.c-nie').addClass("hidden");
                        $('.salary-drawn').addClass("hidden");
                        $('.date_appoint').addClass("hidden");
                        break;
                    case 'promo':
                        $('.date-promoted').removeClass("hidden");
                        $('.c-nie').addClass("hidden");
                        $('.salary-drawn').addClass("hidden");
                        break;
                    case 'promoTrans':
                        $('.date-promoted').removeClass("hidden");
                        $('.c-nie').addClass("hidden");
                        $('.salary-drawn').addClass("hidden");
                        break;
                    case 'attach':
                        $('.c-nie').removeClass("hidden");
                        $('.salary-drawn').removeClass("hidden");
                        $('.date-promoted').addClass("hidden");
                        break;
                    case 'second':
                        $('.date-promoted').addClass("hidden");
                        $('.salary-drawn').removeClass("hidden");
                        $('.c-nie').removeClass("hidden");
                        break;
                    case 'acting':
                        $('.date-promoted').addClass("hidden");
                        $('.salary-drawn').removeClass("hidden");
                        $('.c-nie').removeClass("hidden");
                        break;
                    case 'perform':
                        $('.date-promoted').addClass("hidden");
                        $('.salary-drawn').removeClass("hidden");
                        $('.c-nie').removeClass("hidden");
                        break;
                    case 'release':
                        $('.date-promoted').addClass("hidden");
                        $('.salary-drawn').addClass("hidden");
                        $('.c-nie').addClass("hidden");
                        break;
                    default:
                        $('.date-promoted').addClass("hidden");
                        $('.c-nie').addClass("hidden");
                        $('.salary-drawn').addClass("hidden");
                        break;
                         }
            });

            $('#work_place').change(function(){
                var gr = $(this).find(':selected').data('code');
                var workplace_id = $(this).val();

                if ($.inArray(gr, ['moe','exam','epd']) >=0){
                    $(".c-firstapp-work-institute").addClass("hidden");
                    $(".province_office").addClass("hidden");
                    $(".c-firstapp-work-main-institue").removeClass("hidden");
                    $(".divisional_office").addClass("hidden");
                    $(".zonal_office").addClass("hidden");
                    getMainDivision(workplace_id);
                    getMainBranch(workplace_id);

                }else if($.inArray(gr, ['zone','division','ncoe','ttc','nschool','pschool']) >=0){
                    $(".c-firstapp-work-main-institue").addClass("hidden");
                    $(".province_office").addClass("hidden");
                    $(".c-firstapp-work-institute").removeClass("hidden");
                    if(gr == "zone"){
                        $(".zone").addClass("hidden");
                        $(".division").addClass("hidden");
                        $(".institute").addClass("hidden");
                        $(".zonal_office").removeClass("hidden");
                        $(".divisional_office").addClass("hidden");
                    }else if(gr == "division"){
                        $(".institute").addClass("hidden");
                        $(".division").addClass("hidden");
                        $(".zone").removeClass("hidden");
                        $(".divisional_office").removeClass("hidden");
                        $(".zonal_office").addClass("hidden");
                    }else{
                        $(".division").removeClass("hidden");
                        $(".institute").removeClass("hidden");
                        $(".divisional_office").addClass("hidden");
                        $(".zonal_office").addClass("hidden");
                    }

                }else if($.inArray(gr, ['provinced','provincem']) >=0){
                    $(".c-firstapp-work-main-institue").addClass("hidden");
                    $(".c-firstapp-work-institute").addClass("hidden");
                    $(".province_office").removeClass("hidden");
                    $(".divisional_office").addClass("hidden");
                    $(".zonal_office").addClass("hidden");

                    var post_url = "index.php/FormControl/getProvinceOffices/"+workplace_id;
                    var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',workplace_id: workplace_id};
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: dataarray,
                        success: function(res){
                            $('#province_office').empty();
                            $.each(res, function(ID,province_office){
                                $('#province_office').append('<option value='+res[ID].ID+'>'+res[ID].province_office+'</option>');
                            });
                        }
                    });
                }
            });

            $('#release_type').change(function(){
                var gr = $(this).find(':selected').data('type');
                var id = $(this).val();

                if(gr == "Study"){
                    $(".release_study_block").removeClass("hidden");
                    $(".release_work_block").addClass("hidden");
                }else if(gr == "Work"){
                    $(".release_work_block").removeClass("hidden");
                    $(".release_study_block").addClass("hidden");
                }

                var post_url = "index.php/FormControl/getReleaseWorkPlaces/";
                var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>', rel_type_id: id};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        $('#release_place').empty();
                        $.each(res, function(ID, AA){
                            $('#release_place').append('<option value='+res[ID].ID+'>'+res[ID].rel_place+'</option>');
                        });
                    }
                });


            });

            $('#province').change(function(){
                var id = $(this).val();
                var post_url = "index.php/FormControl/getDistricts/"+id;
                var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',province_id: id};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        $('#district').empty();
                        $('#district').append('<option value="" hidden selected> ---------Please Select---------</option>');
                        $.each(res, function(ID){
                            $('#district').append('<option value='+res[ID].dist_id+'>'+res[ID].district+'</option>');
                        });
                    }
                });
            });

            $('#district').change(function(){
                var id = $(this).val();
                var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',district_id: id};
                if($('#zonal_office').hasClass('hidden')){
                    var post_url = "index.php/FormControl/getZoneList/"+id;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: dataarray,
                        success: function(res){
                            $('#zone').empty();
                            $('#zone').append('<option value="" hidden selected> ---------Please Select---------</option>');
                            $.each(res, function(ID){
                                $('#zone').append('<option value='+res[ID].zone_id+'>'+res[ID].zone+'</option>');
                            });
                        }
                    });
                }else{
                    var post_url = "index.php/FormControl/getZonalOfficeList/"+id;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: dataarray,
                        success: function(res){
                            $('#zonal_office').empty();
                            $('#zonal_office').append('<option value="" hidden selected> ---------Please Select---------</option>');
                            $.each(res, function(ID){
                                $('#zonal_office').append('<option value='+res[ID].ID+'>'+res[ID].zonal_office+'</option>');
                            });
                        }
                    });
                }
            });

            $('#zone').change(function(){
                var id = $(this).val();
                var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',zone_id: id};
                if($('#divisional_office').hasClass('hidden')){
                    var post_url = "index.php/FormControl/getDivisionsList/"+id;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: dataarray,
                        success: function(res){
                            $('#division').empty();
                            $('#division').append('<option value="" hidden selected> ---------Please Select---------</option>');
                            $.each(res, function(ID){
                                $('#division').append('<option value='+res[ID].div_id+'>'+res[ID].division_name+'</option>');
                            });
                        }
                    });
                }else{
                    var post_url = "index.php/FormControl/getDivisionalOfficeList/"+id;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: dataarray,
                        success: function(res){
                            $('#divisional_office').empty();
                            $('#divisional_office').append('<option value="" hidden selected> ---------Please Select---------</option>');
                            $.each(res, function(ID){
                                $('#divisional_office').append('<option value='+res[ID].ID+'>'+res[ID].division_office+'</option>');
                            });
                        }
                    });
                }
            });

            $('#division').change(function(){
                var id = $(this).val();
                var work_place_id = $('#work_place').val();
                var post_url = "index.php/FormControl/getInstitutes/"+id;
                var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',division_id: id, work_place_id: work_place_id};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        $('#institute').empty();
                        $('#institute').append('<option value="" hidden selected> ---------Please Select---------</option>');
                        $.each(res, function(ID){
                            $('#institute').append('<option value='+res[ID].ID+'>'+res[ID].institute_name+'</option>');
                        });
                    }
                });
            });

            function getMainDivision(workPlace_id){
                var post_url = "index.php/FormControl/getMainDivision/"+workPlace_id;
                var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',workplace_id: workPlace_id};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        $('#main_division').empty();
                        $.each(res, function(ID,province_office){
                            $('#main_division').append('<option value='+res[ID].ID+'>'+res[ID].office_division+'</option>');
                        });
                    }
                });
            }

            function getMainBranch(workPlace_id){
                var post_url = "index.php/FormControl/getMainBranch/"+workPlace_id;
                var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',workplace_id: workPlace_id};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        $('#main_branch').empty();
                        $.each(res, function(ID,province_office){
                            $('#main_branch').append('<option value='+res[ID].ID+'>'+res[ID].office_branch+'</option>');
                        });
                    }
                });
            }


            $('#reset-button').click(function(){
               //$('.formErrorContent').addClass('hidden');
               //$('.formErrorArrow').remove();
               validater.resetForm();
            });

            $('#list-staff').on('click','tr', function(e){
                var selected_id = $(this.cells[1]).text();
                //alert(selected_id);
                get_profile(selected_id);
            });

            function get_profile (selected_id) {
                var p = new {};
                p['selected_id'] = selected_id;
                $('#selected_profile').load('/admin/load_profile',p);
            }

            function get_province(){

            }

            DataTabels.init();
        });
    </script>
