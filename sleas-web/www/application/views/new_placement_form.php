<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <section id="content">
            <div class="container" style="padding-top: 20px;">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading reg-main-panel">
                        <h3 class="panel-title">Add Placement</h3>

                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                        </div>
                    </div><!--End of panel-heading-->
                    <div class="panel-body">
                    <?php echo form_open('Placement/placement_add', 'role="form" id="addPlacementForm"'); ?>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Add placement for</label>
                            <?php if ($result) { ?>
                                <label><?php echo $result[0]['title'] . ' ' ;?> <?php echo $result[0]['in_name'] ;?> </label>
                            <?php    } ?>

                                <input type="hidden" name="person_id" value="<?php echo $result[0]['ID'] ;?>">
                                <input type="hidden" name="type" value="<?php echo $type ;?>">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>NIC Number</label>
                                <input type="text" class="form-control " name="nic" id="nic" value="<?php echo $result[0]['NIC'] ;?>" readonly>
                            </div>
                            <div class="form-group ">
                                <label>Working place</label>
                                <?php if ($workPlaces) { ?>
                                    <select class="select2 workPlaces" name="work_place" id="work_place" style="width:100%">
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                        <?php foreach ($workPlaces as $row) { ?>
                                        <?php if($row['ID'] == '1' || $row['ID'] == '2' || $row['ID'] == '3' || $row['ID'] == '16' || $row['ID'] == '18'){ ?>
                                            <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>

                                        <?php    } ?>
                                <?php    } ?>
                                        <option value="other" class="c-other hidden"> Other </option>
                                    </select>
                                    <?php } ?>
                            </div>
                            <div class="work_main_institue hidden">

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
                            <div class="form-group province_list hidden">
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
                            <div class="schools hidden" >
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

                                <div class="form-group division">
                                    <label>Division</label>
                                    <select class="select2 division" name="division" id="division" style="width:100%">
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                    </select>
                                </div>

                                <div class="form-group institute">
                                    <label>School</label>
                                    <select class="select2 institute" name="institute" id="institute" style="width:100%">
                                        <option value="" hidden selected> ---------Please Select---------</option>
                                    </select>
                                </div>
                            </div> <!--End of work-institute--> <!--Hidden when loading-->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group designation">
                                <label>Designation</label>
                                <?php if ($designation) { ?>
                                    <select class="select2Search designation" name="designation" id="designation" style="width:100%">
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                        <?php foreach ($designation as $row) { ?>
                                            <option value="<?php echo $row['ID'];?>" > <?php echo $row['designation'] ;?> </option>
                                <?php    } ?>
                                        <option value="other" class="c-other hidden"> Other </option>
                                    </select>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Date of appoint</label>
                                <input type="text" class="form-control date-picker" name="work_date" id="work_date" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="form-group">
                                <label>Respective official letter no.</label>
                                <input type="text" class="form-control" name="official_letter_no" id="official_letter_no" placeholder="Respective official letter no." data-prompt-position="topLeft" />
                            </div>
                            <div class="form-group">
                                <label>PSC Letter Number</label>
                                <input type="text" class="form-control" name="psc_letter" id="psc_letter" placeholder="PSC Letter Number" data-prompt-position="topLeft" />
                            </div>
                            <div class="form-group">
                                <label>Date appointed by PSC</label>
                                <input type="text" class="form-control date-picker" name="appoint_date" id="appoint_date" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="form-group">
                                <label>Set Prefered Language for letter</label>
                                <select class="select2 " name="language" id="language" required>
                                    <option value="si" selected> Sinhala </option>
                                    <option value="ta" > Tamil </option>
                                </select>
                            </div>
                            <div class="col-md-offset-3 col-md-9">
                                <?php if($type){ ?>
                                <button type="submit" class="btn btn-success "> Save </button>
                                <?php } else {?>
                                <button type="submit" class="btn btn-info "><i class="fa fa-print"></i> Print letter </button>
                                <?php } ?>
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

    <script>
    $(document).ready(function(){

        $("#addPlacementForm").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",

            rules: {
                work_place: "required",
                official_letter_no: "required",
                psc_letter: "required",
                appoint_date: "required"
            }
        });

        $('#menu_placement').addClass('active');

        $('#work_place').change(function(){
            var id = $(this).val();
            switch(id){
                case '1':
                case '2':
                case '3':
                    $(".work_main_institue").removeClass("hidden");
                    $(".schools").addClass("hidden");
                    $(".province_list").addClass("hidden");
                    $(".designation").removeClass("hidden");
                    getMainDivision(id);
                    getMainBranch(id);
                    break;

                case '16':
                    $(".province_list").removeClass("hidden");
                    $(".schools").removeClass("hidden");
                    $(".work_main_institue").addClass("hidden");
                    $(".designation").removeClass("hidden");
                    $("#designation").rules( "add", { required: true });
                    break;

                case '18':
                    $(".province_list").removeClass("hidden");
                    $(".schools").addClass("hidden");
                    $(".work_main_institue").addClass("hidden");
                    $(".designation").addClass("hidden");
                    $("#designation").rules( "add", { required: false });
                    break;
                default:
                    $(".designation").removeClass("hidden");
                    $("#designation").rules( "add", { required: false });
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



    });
</script>
