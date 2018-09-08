<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <section id="content">   <!-- Start: Content -->

            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add User</h3>

                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php echo form_open('admin/registerUser', 'role="form" id="addUserForm"'); ?>

                                <div class="form-group">
                                    <label class="control-label"><span style="color:red;">*</span> Name with Initials </label>
                                    <div class="controls">
                                        <div class="input-icon left">
                                            <i class="fs-user-2"></i>
                                            <input class="form-control" type="text" placeholder="Name with Initials" name="in_name" id="in_name" autofocus="autofocus" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"><span style="color:red;">*</span> Username </label>
                                    <div class="controls">
                                        <div class="input-icon left">
                                            <i class="fa fa-info"></i>
                                            <input class="form-control" type="text" placeholder="Username" name="username" id="username" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"><span style="color:red;">*</span> Password <span style="opacity:0.7; font-size:12px;">- Passwords are 8-25 characters with uppercase letters, lowercase letters and at least one number. </span> </label>
                                    <div class="controls">
                                        <div class="input-icon left">
                                            <i class="fs-key-2"></i>
                                            <input class="form-control" type="password" name="passwd" id="passwd" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"><span style="color:red;">*</span> Re type Password </label>
                                    <div class="controls">
                                        <div class="input-icon left">
                                            <i class="fs-key-2"></i>
                                            <input class="form-control" type="password" name="passwdrt" id="passwdrt" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><span style="color:red;">*</span> User Type </label>
                                    <select class="select2 " style="width:100%" name="type" id="type" >
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                        <option value="3"> Administrator </option>
                                        <option value="2"> Subject Clerk </option>
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <label><span style="color:red;">*</span> Working place </label>
                                    <?php if ($workPlaces) { ?>
                                        <select class="select2 workPlaces" name="work_place" id="work_place" style="width:100%" >
                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                            <?php foreach ($workPlaces as $row) {
                                                 switch($row['ID']){
                                                      case 1:
                                                      case 2:
                                                      case 3:
                                                      case 4:
                                                      case 5:
                                                      case 6:
                                                      case 7: ?>
                                                        <option value="<?php echo $row['ID'];?>" > <?php echo $row['work_place'] ;?> </option>
                                                        break;
                                                <?php default: ?>
                                                <?php }?>
                                            <?php    } ?>
                                        </select>
                                    <?php } ?>
                                </div>

                                <div class="province_office hidden">
                                    <div class="form-group ">
                                        <label>Province</label>
                                        <select class="select2 " name="province_office" id="province_office" style="width:100%">
                                            <option value="" hidden selected> ---------Please Select---------</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="zone_office hidden" >
                                    <div class="form-group">
                                        <label>Province</label>
                                        <?php if ($provinceList) { ?>
                                            <select class="select2 province" name="province" id="province" style="width:100%">
                                                <option value="" hidden selected> ---------Please Select--------- </option>
                                                <?php foreach ($provinceList as $row) { ?>
                                                    <option value="<?php echo $row['province_id'];?>" > <?php echo $row['province'] ;?> </option>
                                                <?php } ?>
                                            </select>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group ">
                                        <label>District</label>
                                        <select class="select2 district" name="district" id="district" style="width:100%">
                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                        </select>
                                    </div>

                                    <div class="form-group zonal_office">
                                        <label>Zonal Office</label>
                                        <select class="select2 zonal_office" name="zonal_office" id="zonal_office" style="width:100%">
                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                        </select>
                                    </div>

                                </div> <!--End of work-institute--> <!--Hidden when loading-->


                                <div class="form-actions fluid">
                                    <button type="button" class="btn btn-success form-reset pull-right" id="newusersubmit">Submit</button>
                                </div>

                                <?php echo form_close()?>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Daily progress Grade 11</h3>

                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                                </div>
                            </div>
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>-->

                </div>

            </div>
        </section>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/additional-methods.js"?>"></script>

    <script src="<?php echo base_url()."assets/plugins/flot/excanvas.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/iCheck-master/jquery.icheck.min.js"?>"></script>

    <script src="<?php echo base_url()."assets/plugins/morris/raphael-min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/morris/morris.min.js"?>"></script>

    <script>

        $(document).ready(function(){

            $.validator.addMethod("PASSWORD",function(value,element){
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,25}$/i.test(value);
            },"Passwords are 8-25 characters with uppercase letters, lowercase letters and at least one number.");

            $('#username').focusout(function(){
                var vald = $(this).valid();
                //$(this).valid();
                console.log("un");
                console.log(vald);

            });

            $('#work_place').change(function(){
                var work_place = $(this).val();

                if ($.inArray(work_place, ['5','6']) >=0){
                    $('.province_office').removeClass('hidden');
                    $('.zone_office').addClass('hidden');


                    var post_url = "index.php/FormControl/getProvinceOffices/"+work_place;
                    var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',workplace_id: work_place};
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: dataarray,
                        success: function(res){
                            $('#province_office').empty();
                            $.each(res, function(ID,province_office){
                                $('#province_office').append('<option value='+res[ID].province_id+'>'+res[ID].province_office+'</option>');
                            });
                        }
                    });
                } else if (work_place == '7') {
                    $('.province_office').addClass('hidden');
                    $('.zone_office').removeClass('hidden');
                } else {

                    $('.province_office').addClass('hidden');
                    $('.zone_office').addClass('hidden');
                }

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
            });

            $('#newusersubmit').click(function(){
                if( $("#addUserForm").valid()){
                    var post_url = "index.php/admin/registerUser/"+'2';
                    var form_data = new FormData();
                    var in_name = $('#in_name').val();
                    var uname = $('#username').val();
                    var passwd = $('#passwd').val();
                    var utype = $('#type').val();
                    var work_place = $('#work_place').val();
                    var province_office = $('#province_office').val();
                    var zonal_office = $('#zonal_office').val();

                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('name', in_name);
                    form_data.append('uname', uname);
                    form_data.append('passwd', passwd);
                    form_data.append('utype', utype);
                    form_data.append('work_place', work_place);
                    form_data.append('province_office', province_office);
                    form_data.append('zonal_office', zonal_office);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'text',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            alert("Successfully Created User Account");
                            $("#addUserForm").reset();
                            },
                        error: function (response) {
                            alert("Error Updating! Please try again.");
                        }
                    });
                }
            });



            $("#addUserForm").validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                rules: {
                    in_name: "required",
                    username: {
                        required: true,
                            remote: {
                            url: '/index.php/FormControl/checkUserName',
                            dataType :'json',
                            async: false,
                            type: 'POST',
                            data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'}
                            }
                    },
                    passwd: {
                        required: true,
                        PASSWORD: true
                    },
                    passwdrt: {
                        required: true,
                        minlength: 5,
                        equalTo: "#passwd"
                    },
                    type: "required",
                    work_place: "required"
                },

                messages: {
                    in_name: "Please enter your First Name",
                    username: {
                        required: "Please enter username",
                        remote: "User name is already taken",
                    },
                    email: "Please enter Correct E-mail Address",
                    passwd: "Passwords are 8-25 characters with uppercase letters, lowercase letters and at least one number.",
                    passwdrt: "Please enter password",
                    type: "Please select user type",
                    work_place: "Please select user's working place"

                }
            });

        });

        $('.menu_dashboard').addClass('active');
  // Draggable Portlets
    </script>
