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
                        <?php echo form_open("$class/$method", 'role="form" id="addServiceChangeForm"'); ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Add <?php echo $class ?> for</label>
                                <?php if ($result) { ?>
                                    <label><?php echo $result[0]['title'] . ' ' ;?> <?php echo $result[0]['in_name'] ;?> </label>
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
                                            <option value="other" class="c-other hidden"> Other </option>
                                        </select>
                                        <?php } ?>
                                </div>

                                <div class="form-group ">
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
                                    <input type="text" class="form-control date-picker" name="appoint_date_psc" id="appoint_date" placeholder="yyyy-mm-dd">
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

        var gr = '<?php echo $service_type ?>';
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

        $('#<?php echo $sidemenu ?>').addClass('active');

        $('#work_place').change(function(){
            var gr = $(this).find(':selected').data('code');
            var workplace_id = $(this).val();

            changeWorkPlace(gr, workplace_id);
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

        /*function changeServiceMood(gr){
            console.log(gr);
            if ($.inArray(gr, ['1', '2', '3', '4', '5', '6', '8', '9']) >=0){
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
                    $('.date_appoint').addClass("hidden");
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
                default:
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').addClass("hidden");
                    break;
                     }

        }*/

        function changeServiceMood(gr){
            if ($.inArray(gr, ['firstappoint', 'promo', 'trans', 'promoTrans', 'attach', 'second', 'acting', 'perform']) >=0){
                $(".general").removeClass("hidden");
                $(".c-releasement_block").addClass("hidden");
            }else if(gr == "release"){
                $(".general").addClass("hidden");
                $(".c-releasement_block").removeClass("hidden");

            }
            switch(gr){
                case 'firstappoint':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').addClass("hidden");
                    break;
                case 'promo':
                case 'promoTrans':
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
                case 'attach':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').removeClass("hidden");
                    break;
                case 'second':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').removeClass("hidden");
                    break;
                case 'acting':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').removeClass("hidden");
                    break;
                case 'perform':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').removeClass("hidden");
                    break;
                case 'release':
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').addClass("hidden");
                    break;
                case 'trans':
                    $('.date_assumed_req').addClass("hidden");
                    break;
                default:
                    $('.date-promoted').addClass("hidden");
                    $('.salary-drawn').addClass("hidden");
                    break;
                     }

        }

        function changeWorkPlace(gr, workplace_id) {
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
                data: dataarray,
                success: function(res){
                    $('#institute').empty();
                    $('#institute').append('<option value="" hidden> ---------Please Select---------</option>');
                    $.each(res, function(ID){
                        $('#institute').append('<option value='+res[ID].ID+'>'+res[ID].institute_name+'</option>');
                    });
                }
            });
        }

        $('#addServiceChangeForm').submit(function(e){

            var submitCount = $('#submit').val() + 1;
            $('#submit').val(submitCount);

        });

        //$('#work_place').val('1');
    });
</script>
