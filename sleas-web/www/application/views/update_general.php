<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="content">   <!-- Start: Content -->
    <div class="container" style="padding-top: 20px;">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading reg-main-panel">
                    <h3 class="panel-title">Update General Service Details Form</h3>

                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                    </div>
                </div><!--End of panel-heading-->
                <div class="panel-body">
                <?php echo form_open('Admin/updateGeneralService', 'role="form" id="addMemberForm"'); ?>
                    <input type="text" class="hidden" name="service_id" value="<?php echo $general['0']['ID']; ?>">
                    <input type="text" class="hidden" name="person_id" value="<?php echo $general['0']['person_id']; ?>">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of first appoint to the pensionable post of the state service (If applicable)</label>
                            <input type="text" class="form-control date-picker " name="date_f_appoint" id="date_f_appoint" value="<?php echo $general['0']['f_appoint_date']; ?>">
                        </div>

                        <div class="form-group">
                            <label><span style="color:red;">*</span>Date of first join to the SLEAS</label>
                            <input type="text" class="form-control date-picker " name="date_join" id="date_join_gen" value="<?php echo $general['0']['date_join']; ?>">
                        </div>

                        <div class="form-group ">
                            <label><span style="color:red;">*</span>Way of joined the SLEAS</label>
                            <select class="select2  " name="way_joined" id="way_joined" style="width:100%;" value="<?php echo $general['0']['way_join']; ?>">
                                <option value="" hidden>---------Please Select--------- </option>
                                <option value="Open">Open</option>
                                <option value="Limited">Limited</option>
                                <option value="Merit">Merit</option>
                                <option value="Super Numeral (PVC)">Super Numeral (PVC)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>SLEAS Cadre when joining the SLEAS</label>
                            <select class="select2" name="cadre" id="cadre" style="width:100%;">
                                <option value="" hidden selected>---------Please Select--------- </option>
                                <option value="General Cadre">General Cadre</option>
                                <option value="Special Cadre">Special Cadre</option>
                                <option value="Not Specified" class="onPVC hidden">Not Specified</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>SLEAS Grade  when joining the SLEAS</label>
                            <select class="select2 " name="grade" id="grade" style="width:100%;">
                                <option value="" hidden selected>---------Please Select--------- </option>
                                <option value="Special"class="onGeneral hidden">Special</option>
                                <option value="Grade I"class="onGeneral hidden">Grade I</option>
                                <option value="Grade II">Grade II</option>
                                <option value="Grade III">Grade III</option>
                            </select>
                        </div>
                        
                        <div class="form-group onSpecial hidden ">
                            <label>Subject</label>
                            <select class="select2Search " name="special_subject" id="special_subject" style="width:100%;">
                                <option value="" hidden selected>---------Please Select--------- </option>
                                <?php if ($subjects) { ?>
                                    <?php foreach ($subjects as $row) { ?>
                                        <option value="<?php echo $row['ID'];?>"> <?php echo $row['sub_name'] ;?> </option>
                                    <?php } ?>
                                <?php } ?>

                            </select>
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
                            <input type="text" class="form-control date-picker " name="date_confirm" id="date_confirm" value="<?php echo $general['0']['confirm_date']; ?>">
                        </div>

                        <div class="form-group">
                            <label> Rank in Entrance Exam </label>
                            <input type="text" class="form-control " name="rank_entrance" id="rank_entrance" value="<?php echo $general['0']['entrance_exam_rank']; ?>">
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-info form-reset">Submit</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
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
        
        //Check Way joind in general service
        $('#way_joined').change(function(){
            var gr = $(this).val();
            if ($.inArray(gr, ['Open', 'Limited', 'Merit']) >=0){
                $(".onPVC").addClass("hidden");
            }else if(gr == "Super Numeral (PVC)"){
                $(".onPVC").removeClass("hidden");
            }
        });
        
        //Check When joining SLEAS
        $('#cadre').change(function(){
            var gr = $(this).val();
            if (gr == "General Cadre"){
                $(".onGeneral").removeClass("hidden");
                $(".onSpecial").addClass("hidden");
            }else if(gr == "Special Cadre"){
                $(".onSpecial").removeClass("hidden");
                $(".onGeneral").addClass("hidden");
            }
        });
        
        
        $('#way_joined').val('<?php echo $general['0']['way_join']; ?>').trigger('change');
        $('#cadre').val('<?php echo $general['0']['cadre']; ?>').trigger("change");
        $('#grade').val('<?php echo $general['0']['grade']; ?>').trigger("change");
        $('#special_subject').val('<?php echo $general['0']['subject']; ?>').trigger("change");
        $('#medium_recruit').val('<?php echo $general['0']['medium']; ?>').trigger("change");
        $('#confirm').val('<?php echo $general['0']['confirm']; ?>').trigger("change");
        
            
    });
</script>