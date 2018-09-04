<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>            
        <section id="content">
            <div class="container" style="padding-top: 20px;">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading reg-main-panel">
                        <h3 class="panel-title"> Edit Service Details </h3>

                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                        </div>
                    </div><!--End of panel-heading-->
                    <div class="panel-body">
                    <?php echo form_open("Admin/updateService", 'role="form" id="addServiceChangeForm"'); ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                    
                                <input type="hidden" name="person_id" value="<?php echo $service[0]['person_id'] ;?>">
                                <input type="hidden" name="service_mood" value="<?php echo $service[0]['service_mode'] ;?>">
                                <input type="hidden" name="service_id" value="<?php echo $service[0]['ID'] ;?>">
                                <input type="hidden" name="submit" id="submit" value="">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>NIC Number</label>
                                <input type="text" class="form-control " name="nic" id="nic" value="<?php echo $service[0]['NIC'] ;?>" readonly>
                            </div>
                            <div class="general hidden">
                                <div class="form-group ">
                                    <label><span style="color:red;">*</span>Working place</label>
                                    <?php if ($workPlaces) { ?>
                                        <select class="select2 workPlaces" name="work_place" id="work_place" style="width:100%">
                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                            <?php foreach ($workPlaces as $row) { ?>
                                                <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>
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
                                    <div class="form-group province">
                                        <label>Province</label>
                                        <?php if ($provinceList) { ?>
                                            <select class="select2 province" name="province" id="province" style="width:100%">
                                                <option value="" hidden selected> ---------Please Select--------- </option>
                                                <?php foreach ($provinceList as $row) { ?>
                                                    <option value="<?php echo $row['province_id'];?>" > <?php echo $row['province'] ;?> </option>
                                        <?php    } ?>
                                            </select>
                                            <?php } ?>
                                    </div>

                                    <div class="form-group district">
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
                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                        </select>
                                    </div>
                                </div> <!--End of work-institute--> <!--Hidden when loading-->

                            </div>
                        </div>

                        <div class="col-md-6 general hidden">
                            <div class="form-group">
                                <label><span style="color:red;">*</span>Designation</label>
                                <?php if ($designation) { ?>
                                    <select class="select2Search designation validate[required]" name="designation" id="designation" style="width:100%">
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                        <?php foreach ($designation as $row) { ?>
                                            <option value="<?php echo $row['ID'];?>" > <?php echo $row['designation'] ;?> </option>
                                <?php    } ?>
                                    </select>
                                    <?php } ?>
                            </div>

                            <div class="form-group " id="grade_div">
                                <label>Present SLEAS Grade</label>
                                <?php if ($class == 'PromotionTransfer'){ ?>
                                    <select class="select2 " name="present_grade" id="present_grade" style="width:100%">
                                        <option value="<?php echo $new_grade ?>"> <?php echo $new_grade ?> </option>
                                    </select>
                                <?php } else{ ?>
                                    <select class="select2 " name="present_grade" id="present_grade" style="width:100%">
                                    <option value="">  Select </option>
                                    <option value="Special Grade"> Special Grade </option>
                                    <option value="Grade I">  Grade I </option>
                                    <option value="Grade II">  Grade II </option>
                                    <option value="Grade III">  Grade III </option>
                                </select>
                                <?php } ?>
                                
                            </div>

                            <div class="form-group hidden" id="eb_1_date">
                                <label>Efficiency Bar Examination I Pass Date</label>
                                <input type="text" class="form-control date-picker" name="eb_1_date" id="eb_1_date">
                            </div>

                            <div class="form-group hidden" id="eb_2_date">
                                <label>Efficiency Bar Examination II Pass Date</label>
                                <input type="text" class="form-control date-picker" name="eb_2_date" id="eb_2_date">
                            </div>

                            <div class="form-group hidden" id="eb_3_date">
                                <label>Efficiency Bar Examination III Pass Date</label>
                                <input type="text" class="form-control date-picker" name="eb_3_date" id="eb_3_date">
                            </div>

                            <div class="form-group hidden date-promoted">
                                <label><span style="color:red;">*</span>Date Promoted</label>
                                <input type="text" class="form-control date-picker" name="date_promoted" id="date_promoted">
                            </div>

                            <div class="form-group">
                                <label><span style="color:red;" class="date_assumed_req">*</span>Date of appoint to the present working place</label>
                                <input type="text" class="form-control date-picker" name="date_assumed" id="date_assumed">
                            </div>

                            <div class="form-group">
                                <label><span style="color:red;">*</span>Respective official letter no.</label>
                                <input type="text" class="form-control validate[required]" name="official_letter_no" id="official_letter_no" placeholder="Respective official letter no." data-prompt-position="topLeft" />
                            </div>

                            <div class="form-group hidden salary-drawn">
                                <label>Place where salary drawn</label>
                                <?php if ($workPlaces) { ?>
                                    <select class="select2 workPlaces" name="salary_drawn" id="salary_drawn" style="width:100%">
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                        <?php foreach ($workPlaces as $row) { ?>
                                            <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label><span style="color:red;">*</span>PSC Letter Number</label>
                                <input type="text" class="form-control" name="psc_letter" id="psc_letter" placeholder="PSC Letter Number" data-prompt-position="topLeft" />
                            </div>
                            <div class="form-group">
                                <label><span style="color:red;">*</span>Date appointed by PSC</label>
                                <input type="text" class="form-control date-picker" name="appoint_date_psc" id="appoint_date" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                        
                        <div class="c-releasement_block hidden">

                            <div class="form-group">
                                <label> Releasement Type </label>
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
                                <select class="select2 " name="release_salary_drawn" id="release_salary_drawn" style="width:100%">
                                    <option value="" hidden selected> ------------------Please Select------------------ </option>
                                    <option value="moe"> MoE </option>
                                    <option value="exam"> Exams </option>
                                    <option value="epd"> EPD </option>
                                    <option value="nie" class="c-attach hidden"> NIE </option>
                                    <option value="province"> Province </option>
                                    <option value="zone"> Zone </option>
                                    <option value="division"> Division </option>
                                    <option value="ncoe"> NCoE </option>
                                    <option value="ttc"> TTC </option>
                                    <option value="school"> School </option>
                                    <option value="other" class="c-other hidden"> Other </option>
                                </select>
                            </div>

                        </div><!--End of releasement block-->
                        
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-success form-reset"><i class="fa fa-print"></i> Save </button>
                            </div>
                        </div>
                            
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            </div>
        </section>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/additional-methods.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/iCheck-master/jquery.icheck.min.js"?>"></script>

    <script>
    $(document).ready(function(){ 
        
        
        var gr = '<?php echo $service[0]['service_mode'] ?>';
        changeServiceMood(gr);
        
        $("#addServiceChangeForm").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            
            rules: {
                work_place: "required",
                designation: "required",
                work_date: "required",
                official_letter_no: "required",
                psc_letter: "required",
                appoint_date_psc: "required"
            }
        });
        
        $('#work_place').change(function(){
            var workplace_id = $(this).val();

            changeWorkPlace(workplace_id);
        });
        
        $('#province').change(function(){
            var id = $(this).val();
            getDistricts(id);
        });

        $('#district').change(function(){
            var id = $(this).val();
            getZones(id);
        });

        $('#zone').change(function(){
            var id = $(this).val();
            getDivisions(id);
        });

        $('#division').change(function(){
            var id = $(this).val();
            getInstitutes(id);
        });

        function changeServiceMood(gr){
            console.log(gr);
            if ($.inArray(gr, ['1', '2', '3', '4', '5', '6', '8', '9', '10']) >=0){
                $(".general").removeClass("hidden");
                $(".c-releasement_block").addClass("hidden");
            }else if(gr == "7"){
                $(".general").addClass("hidden");
                $(".c-releasement_block").removeClass("hidden");

            }
            switch(gr){
                case '1':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').addClass("hidden");
                    break;
                case '2':
                case '4':
                    $('.date-promoted').removeClass("hidden");
                    $('.salary-drawn').addClass("hidden");

                    var grade = $('#present_grade').val();
                    if(grade == 'Grade II'){
                        $("#eb_1_date").removeClass("hidden");
                    }else if(grade == 'Grade I'){
                        $('#eb_2_date').removeClass('hidden');
                    }else if(grade == 'Special Grade'){
                        $('#eb_3_date').removeClass('hidden');
                    }

                    break;
                case '5':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').removeClass("hidden");
                    break;
                case '6':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').removeClass("hidden");
                    break;
                case '8':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').removeClass("hidden");
                    break;
                case '9':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').removeClass("hidden");
                    break;
                case '7':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').addClass("hidden");
                    break;
                case '3':
                    $('.date_assumed_req').addClass("hidden");
                    break;
                case '10':
                    $('#grade_div').addClass("hidden");
                    break;
                default:
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').addClass("hidden");
                    break;
                     }

        }

        function getMainDivision(workPlace_id){
            var post_url = "index.php/FormControl/getMainDivision/"+workPlace_id;
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',workplace_id: workPlace_id};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                async: false,
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
                async: false,
                data: dataarray,
                success: function(res){
                    $('#main_branch').empty();
                    $.each(res, function(ID,province_office){
                        $('#main_branch').append('<option value='+res[ID].ID+'>'+res[ID].office_branch+'</option>');
                    });
                }
            });
        }

        function changeWorkPlace(workplace_id) {
            if ($.inArray(workplace_id, ['1','2','3', '4']) >=0){
                $(".c-firstapp-work-institute").addClass("hidden");
                $(".province_office").addClass("hidden");
                $(".c-firstapp-work-main-institue").removeClass("hidden");
                $(".divisional_office").addClass("hidden");
                $(".zonal_office").addClass("hidden");
                getMainDivision(workplace_id);
                getMainBranch(workplace_id);    

            }else if($.inArray(workplace_id, ['7','8','9','10','11','12', '13', '14', '15', '16', '17']) >=0){
                $(".c-firstapp-work-main-institue").addClass("hidden");
                $(".province_office").addClass("hidden");
                $(".c-firstapp-work-institute").removeClass("hidden");
                $(".province").removeClass("hidden");
                $(".district").removeClass("hidden");
                $(".zone").removeClass("hidden");
                $(".division").removeClass("hidden");
                $(".institute").removeClass("hidden");
                $(".zonal_office").removeClass("hidden");
                $(".divisional_office").removeClass("hidden");
                if(workplace_id == "7"){
                    $(".zone").addClass("hidden");
                    $(".division").addClass("hidden");
                    $(".institute").addClass("hidden");
                    $(".zonal_office").removeClass("hidden");
                    $(".divisional_office").addClass("hidden");
                }else if(workplace_id == "8"){
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

            }else if($.inArray(workplace_id, ['5','6']) >=0){
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
        }

        function getDistricts(id){

            var post_url = "index.php/FormControl/getDistricts/"+id;
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',province_id: id};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#district').empty();
                    $('#district').append('<option value="" hidden> ---------Please Select---------</option>');
                    $.each(res, function(ID){
                        $('#district').append('<option value='+res[ID].dist_id+'>'+res[ID].district+'</option>');
                    });
                }
            });
        }

        function getZones(id){

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
                        $('#zone').append('<option value="" hidden> ---------Please Select---------</option>');
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
                    async: false,
                    success: function(res){
                        $('#zonal_office').empty();
                        $('#zonal_office').append('<option value="" hidden selected> ---------Please Select---------</option>');
                        $.each(res, function(ID){
                            $('#zonal_office').append('<option value='+res[ID].ID+'>'+res[ID].zonal_office+'</option>');
                        });
                    }
                });
            }
        }

        function getDivisions(id){
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
                        $('#division').append('<option value="" hidden> ---------Please Select---------</option>');
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
                    async: false,
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
        }

        function getInstitutes(id){
            var work_place_id = $('#work_place').val();
            var post_url = "index.php/FormControl/getInstitutes/"+id;
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',division_id: id, work_place_id: work_place_id};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                async: false,
                data: dataarray,
                success: function(res){
                    $('#institute').empty();
                    $.each(res, function(ID){
                        
                        $('#institute').append('<option value='+res[ID].ID+' >'+res[ID].institute_name+'</option>');
                        
                    });
                }
            });
        }

        $('#addServiceChangeForm').submit(function(e){
            
            var submitCount = $('#submit').val() + 1;
            $('#submit').val(submitCount);
            
        });
        
        var workplace_id = '<?php echo $service[0]['work_place_id'] ?>'
        $('#work_place').val(workplace_id);
        $('#designation').val('<?php echo $service[0]['designation_id'] ?>');
        $('#date_assumed').val('<?php echo $service[0]['duty_date'] ?>');
        $('#official_letter_no').val('<?php echo $service[0]['off_letter_no'] ?>');
        $('#present_grade').val('<?php echo $service[0]['grade'] ?>');
        
        changeWorkPlace(workplace_id);
        switch (workplace_id){
            case '1':
            case '2':
            case '3':
            case '4':
                $('.c-firstapp-work-main-institue').removeClass("hidden");
                $('#main_division').val('<?php echo $service[0]['work_division_id'] ?>');
                $('#main_branch').val('<?php echo $service[0]['work_branch_id'] ?>');
                break;
                
            case '5':
            case '6':
                $('#province_office').val('<?php echo $service[0]['sub_location_id'] ?>');
                break;
                
            case '7':
                getZones('<?php echo $zone[0]['dist_id']; ?>');
                $(".province").addClass("hidden");
                $(".district").addClass("hidden");
                $("#zonal_office").val('<?php echo $service[0]['sub_location_id'] ?>');
                break;
                
            case '8':
                getDivisions('<?php echo $division[0]['zone_id']; ?>');
                $(".province").addClass("hidden");
                $(".district").addClass("hidden");
                $(".zone").addClass("hidden");
                $("#divisional_office").val('<?php echo $service[0]['sub_location_id'] ?>');
                break;
            case '9':
            case '10':
            case '11':
            case '12':
            case '13':
            case '14':
            case '15':
            case '16':
            case '17':
                getInstitutes('<?php echo $institute[0]['div_id'] ?>');
                $(".province").addClass("hidden");
                $(".district").addClass("hidden");
                $(".zone").addClass("hidden");
                $(".division").addClass("hidden");
                $(".institute").addClass("hidden");
                $(".zonal_office").addClass("hidden");
                $(".divisional_office").addClass("hidden");
                $(".institute").removeClass("hidden");
                $('#institute').val('<?php echo $service[0]['sub_location_id'] ?>');
                break;
                            }
        
        
        //$('#institute').val('251');
        //console.log('<?php //print_r($institute); ?>')
    });
</script>