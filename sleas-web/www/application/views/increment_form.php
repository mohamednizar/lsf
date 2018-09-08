<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <section id="content">
            <div class="container" style="padding-top: 20px;">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading reg-main-panel">
                        <h3 class="panel-title">Add <?php echo $class ?></h3>

                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                        </div>
                    </div><!--End of panel-heading-->
                    <div class="panel-body">
                    <?php echo form_open("$class/$method", 'role="form" id="addIncrementForm"'); ?>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Add <?php echo $class ?> for</label>
                            <?php if ($result) { ?>
                                <label><?php echo $result[0]['title'] . ' ' ;?> <?php echo $result[0]['in_name'] ;?></label>
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

                                <div class="form-group ">
                                    <label>Present SLEAS Grade</label>
                                    <select class="select2 " name="present_grade" id="present_grade" style="width:100%">
                                        <option value="">  Select </option>
                                        <option value="Special Grade">  Special Grade </option>
                                        <option value="Grade I">  Grade I </option>
                                        <option value="Grade II">  Grade II </option>
                                        <option value="Grade III">  Grade III </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><span style="color:red;">*</span><?php echo $class ?> Date</label>
                                    <input type="text" class="form-control date-picker" name="increment_date" id="increment_date">
                                </div>

                                <div class="form-group">
                                    <label><span style="color:red;">*</span>Present Salary Step</label>
                                    <input type="text" class="form-control" name="salary_step" id="salary_step" maxlength="2">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Current Salary </label>
                                    <input type="text" class="form-control" name="current_salary" id="current_salary" readonly>
                                </div>
                                <div class="form-group">
                                    <label> Salary Increment </label>
                                    <input type="text" class="form-control" name="increment" id="increment" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> New Salary </label>
                                    <input type="text" class="form-control" name="new_salary" id="new_salary" readonly>
                                </div>
                            </div>
                        <?php if($class == "Revision"){ ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Salary After the Next Increment </label>
                                    <input type="text" class="form-control" name="next_salary" id="next_salary" readonly>
                                </div>
                            </div>
                        <?php } ?>
                        </div>

                        <div class="form-actions fluid">
                            <div class="form-group">
                                <label>Set Prefered Language for letter</label>
                                <select class="select2 " name="language" id="language" required>
                                    <option value="si" selected> Sinhala </option>
                                    <option value="ta" > Tamil </option>
                                </select>
                            </div>
                            <div class=" col-md-6">
                                <button type="reset" id="reset-button" class="btn btn-info form-reset">Clear</button>
                                <button type="button" id="calc-button" class="btn btn-success"> Calculate Increment </button>
                            </div>
                                <div class=" col-md-6">
                                    <button type="submit" id="submit-button" class="btn btn-info"><i class="fa fa-print"></i> Print letter </button>
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

        console.log("<?php echo $general[0]['grade']; ?>");
        $('#present_grade').val("<?php echo $general[0]['grade']; ?>");

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

        $('#calc-button').click(function(){
            var person_id = $('#person_id').val();
            var increment_date = $('#increment_date').val();
            var grade = $('#present_grade').val();
            var salary_step = $('#salary_step').val();

            var post_url = "index.php/<?php echo $class; ?>/calculate/";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',person_id: person_id, increment_date: increment_date, grade: grade, salary_step: salary_step };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    var current_salary = res['current_salary'].toFixed(2).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                    var new_salary = res['new_salary'].toFixed(2).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                    var increment = res['increment'].toFixed(2).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

                    $('#current_salary').val(current_salary);
                    $('#new_salary').val(new_salary);
                    $('#increment').val(increment);

                    if('<?php echo $class; ?>' == 'Revision'){
                        var next_salary = res['next_salary'].toFixed(2).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                        $('#next_salary').val(next_salary);
                    }
                }
            });
        });

        $('#addIncrementForm').submit(function(e){

            var submitCount = $('#submit').val() + 1;
            $('#submit').val(submitCount);

        });


    });
</script>
