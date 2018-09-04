<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <section id="content">
            <div class="container" style="padding-top: 20px;">

            <?php if ($error_msg){ ?>
                <h3> <?php echo $error_msg; ?>! </h3>
                <h6>Please return to your <a href="<?php echo base_url()."index.php/admin/sclerk"?>"> dashboard </a></h6>
            <?php } else { ?>


            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading reg-main-panel">
                        <h3 class="panel-title">Add <?php echo $class ?></h3>

                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                        </div>
                    </div><!--End of panel-heading-->
                    <div class="panel-body">
                    <?php echo form_open("$class/$method", 'role="form" id="addPromotionForm"'); ?>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Add <?php echo $class ?> for</label>
                            <?php if ($result) { ?>
                                <label><?php echo $result[0]['title'] . ' ' ;?> <?php echo $result[0]['in_name'] ;?></label>
                            <?php    } ?>

                                <input type="hidden" name="person_id" value="<?php echo $result[0]['ID'] ;?>">
                                <input type="hidden" name="type" value="<?php echo $type ;?>">
                                <input type="hidden" name="submit" id="submit" value="">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>NIC Number</label>
                                <input type="text" class="form-control " name="nic" id="nic" value="<?php echo $result[0]['NIC'] ;?>" readonly>
                            </div>

                            <div class="form-group ">
                                <label><span style="color:red;">*</span>Working place</label>
                                <select class="select2 " name="work_place" id="work_place" style="width:100%" readonly>
                                    <option value="<?php echo $result[0]['work_place_id']; ?>"> <?php echo $result[0]['work_place']; ?> </option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label><span style="color:red;">*</span>Branch / Institute</label>
                                <select class="select2 " name="sub_location" id="sub_location" style="width:100%">
                                    <option value="<?php echo $result[0]['work_branch_id'] . $result[0]['sub_location_id'] ; ?>"> <?php echo $result[0]['office_branch'] . $result[0]['sub_location'] ; ?> </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><span style="color:red;">*</span>Designation</label>
                                <select class="select2 " name="designation" id="designation" style="width:100%">
                                    <option value="<?php echo $result[0]['designation_id']; ?>"> <?php echo $result[0]['designation']; ?> </option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label>SLEAS Grade</label>
                                <select class="select2 " name="present_grade" id="present_grade" style="width:100%">
                                    <option value="<?php echo $new_grade ?>"> <?php echo $new_grade ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group hidden" id="eb_1_date_div">
                                <label>Efficiency Bar Examination I Pass Date</label>
                                <input type="text" class="form-control date-picker" name="eb_1_date">
                            </div>

                            <div class="form-group hidden" id="eb_2_grade3_date_div">
                                <label>Efficiency Bar Examination II (P. G. D. or Equalent) Pass Date</label>
                                <input type="text" class="form-control date-picker" name="eb_2_grade3_date">
                            </div>

                            <div class="form-group hidden" id="eb_2_date_div">
                                <label>Efficiency Bar Examination II Pass Date</label>
                                <input type="text" class="form-control date-picker" name="eb_2_date" id="eb_2_date">
                            </div>

                            <div class="form-group hidden" id="eb_3_date_div">
                                <label>Efficiency Bar Examination III Pass Date</label>
                                <input type="text" class="form-control date-picker" name="eb_3_date" id="eb_3_date">
                            </div>

                            <div class="form-group">
                                <label>Date of promotion</label>
                                <input type="text" class="form-control date-picker" name="work_date" id="date_assumed">
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
                                        <?php    } ?>
                                        <option value="other" class="c-other hidden"> Other </option>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label><span style="color:red;">*</span>PSC Letter Number</label>
                                <input type="text" class="form-control" name="psc_letter" id="psc_letter" placeholder="PSC Letter Number" data-prompt-position="topLeft" />
                            </div>
                            <div class="form-group">
                                <label><span style="color:red;">*</span>Date appointed by PSC</label>
                                <input type="text" class="form-control date-picker" name="appoint_date" id="appoint_date" placeholder="yyyy-mm-dd">
                            </div>
                        </div>

                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <?php if($type){ ?>
                                <button type="submit" class="btn btn-success form-reset"> Save </button>
                                <?php } else {?>
                                <button type="submit" class="btn btn-info form-reset"><i class="fa fa-print"></i> Print letter </button>
                                <?php } ?>
                            </div>
                        </div>

                    <?php echo form_close(); ?>

                        <?php //print_r($error_msg); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </section>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/additional-methods.js"?>"></script>

    <script>
    $(document).ready(function(){

        var grade = $(present_grade).val();
        if(grade == 'Grade II'){
            $("#eb_1_date_div").removeClass("hidden");
            $("#eb_2_grade3_date_div").removeClass("hidden");
        }else if(grade == 'Grade I'){
            $('#eb_2_date_div').removeClass('hidden');
        }else if(grade == 'Special Grade'){
            $('#eb_3_date_div').removeClass('hidden');
        }

        $("#addPromotionForm").validate({
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
                appoint_date: "required"
            }
        });

        $('#<?php echo $sidemenu ?>').addClass('active');


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

            }else if($.inArray(gr, ['zone','division','ncoe','ttc','nschool','pschool', 'tc']) >=0){
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
        });

        $('#zone').change(function(){
            var id = $(this).val();
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',zone_id: id};
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

        $('#addPromotionForm').submit(function(e){

            var submitCount = $('#submit').val() + 1;
            $('#submit').val(submitCount);

        });

    });
</script>
