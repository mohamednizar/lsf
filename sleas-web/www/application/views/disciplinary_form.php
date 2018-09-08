<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>            
        <section id="content">
            <div class="container" style="padding-top: 20px;">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading reg-main-panel">
                        <h3 class="panel-title">Add Disciplinary Action</h3>

                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                        </div>
                    </div><!--End of panel-heading-->
                    <div class="panel-body">
                    <?php echo form_open("$class/$method", 'role="form" id="addIncrementForm"'); ?>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Add Disciplinary Action for</label>
                            <?php if ($result) { ?>
                                <label><?php echo $result[0]['title'] . ' ' ;?> <?php echo $result[0]['in_name'] ;?> </label>
                            <?php    } ?>
                                    
                                <input type="hidden" name="person_id" id="person_id" value="<?php echo $result[0]['ID'] ;?>">
                                <input type="hidden" name="work_place" id="work_place" value="<?php echo $result[0]['work_place'] ;?>">
                                <input type="hidden" name="submit" id="submit" value="">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>NIC Number</label>
                                    <input type="text" class="form-control " name="nic" id="nic" value="<?php echo $result[0]['NIC'] ;?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label><span style="color:red;">*</span> Effetive Date </label>
                                    <input type="text" class="form-control date-picker" name="disciplinary_date" id="disciplinary_date">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group ">
                                    <label> Disciplinary Action Type </label>
                                <?php if ($disciplinary) { ?>
                                    <select class="select2 " name="disciplinary_type" id="disciplinary_type" style="width:100%">
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                        <?php foreach ($disciplinary as $row) { ?>
                                            <option value="<?php echo $row['ID'];?>" > <?php echo $row['action_type'] ;?> </option>
                                <?php    } ?>
                                        <option value="other" class="c-other hidden"> Other </option>
                                    </select>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label><span style="color:red;">*</span> Disciplinary Action Taken </label>
                                    <select class="select2 " name="disciplinary_action" id="disciplinary_action" style="width:100%">
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="reset" id="reset-button" class="btn btn-info form-reset">Clear</button>
                                <button type="submit" id="calc-button" class="btn btn-success" id="submit" > Submit </button>
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
                
        $("#addIncrementForm").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",

            rules: {
                increment_date: "required",
                present_grade: "required",
                salary_step: "required"
            }
        });

        $('#<?php echo $sidemenu ?>').addClass('active');

        $('#disciplinary_type').click(function(){
            var action_type = $(this).val();
            var post_url = "index.php/FormControl/getDisciplinaryActions/";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>', action_type_id: action_type};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#disciplinary_action').empty();
                    $.each(res, function(ID, AA){
                        $('#disciplinary_action').append('<option value='+res[ID].ID+'>'+res[ID].action_name+'</option>');
                    });
                }
            });
        });
        
        
    });
</script>