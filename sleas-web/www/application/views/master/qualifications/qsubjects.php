<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <section id="content">   <!-- Start: Content -->
	        <div class="container" style="padding-top: 20px;">
                
            <?php if ($this->session->flashdata('update')=="success"){ ?>
                <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Successfully updated the qualification details
                            </div>
                        </div>
                </div>
            <?php } ?>
                

                <div class="col-md-8">
                    <div class="panel panel-success" style="margin-top:20px;">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title"> Qualification Subjects List </h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            
                            <div class="col-md-6 ">
                                <label> Qualifications Type </label><br>
                                <select class="select2" name="q_type" id="q_type" style="width:100%;">
                                    <option value="" hidden selected> ---------Please Select--------- </option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 ">
                                <label> Qualification </label><br>
                                <select class="select2" name="q_name" id="q_name" style="width:100%;">
                                    <option value="" hidden selected> ---------Please Select--------- </option>
                                </select>
                            </div>
                            
                        <table  class="table table-striped table-hover DynamicTable" border="0" id="dataTable">
                            <thead>
                                <tr>
                                    <th> Subject </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                            
                            </tbody>
                        </table>
                        <table  class="table table-striped table-hover DynamicTable" border="0" >
                            <tr>
                                <td> <button class="delete_workplace btn btn-large btn-success " id="addNew" ><i class="fa fa-plus"></i></button> Add New Subject </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </table>
                            
                  
                    <!-- Modal to update Qualifications -->
                        <div id="UpdateModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 id="modal_title">  </h4>

                              </div>

                            <?php echo form_open() ?> 
                              <div class="modal-body">
                                <div class="col-md-12">
                                        <input type="text" class="form-control hidden" name="q_subject_id" id="q_subject_id" >
                                        <input type="text" class="form-control hidden" name="action" id="action" >
                                    <div class="form-group">
                                        <label class="modal_q"> Subject </label>
                                        <input type="text" class="form-control" name="q_subject" id="q_subject">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="border-top:0;">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="submit">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            <?php echo form_close() ?>
                            </div>

                          </div>
                        </div>
                            
                        </div>
                    </div>
                </div>

            </div>
    </section>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js"?>"></script>
            
<script>
    $(document).ready(function(){
        
        $('#mnuTwo').addClass('menu-open');
        $('#mnu_add_qual_qsubjects').addClass('active');
        $('#addNew').attr('disabled', 'true');
        getQTypes();
        
        $('#q_type').change(function(){
            var q_id = $(this).val();
            
            getQNames(q_id);
            
        });
        
        $('#q_name').change(function(){
            var q_name_id = $(this).val();
            $('#addNew').removeAttr('disabled');
              
            getQSubjects(q_name_id);
                
        });
        
        $(document).on('click', '.edit', function(){
            var q_subject_id = $(this).data("id");
            var q_subject = $(this).data("name");
            
            $('#q_subject_id').val(q_subject_id);
            $('#q_subject').data("ID", q_subject_id);
            $('#q_subject').val(q_subject);
            $('#action').val('edit');
            $('#modal_title').text("Edit Qualification Subject");
            $('#submit').text("Save");
            $('#UpdateModal').modal('toggle');
        });
        
        $(document).on('click', '.delete', function(){
            var post_url = "index.php/Main/deleteQualificationSubject/2";
            var form_data = new FormData();
            var q_name_id = $('#q_name').val();
            var q_subject_id = $(this).data("id");
            var row = $(this).closest('tr');
            var rowID = parseInt(row[0].rowIndex) - 1;
            
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('q_subject_id', q_subject_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'text',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    getQSubjects(q_name_id);
                    },
                error: function (response) {
                    alert("Error Delete! Please try again.");
                }
            });
        });
        
        $('#addNew').click(function(){
            
            $('#modal_title').text("Add New Qualification Subject");
            $('#submit').text("Add");
            $('#action').val('add');
            $('#UpdateModal').modal('toggle');
        });
        
        $('#submit').click(function(){
            var form_data = new FormData();
            var q_name_id = $('#q_name').val();
            var q_subject_id = $('#q_subject_id').val();
            var q_subject = $('#q_subject').val();
            var action = $('#action').val();
            
            if(action == 'edit'){
                var post_url = "index.php/Main/updateQualificationSubject/2";
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('q_subject_id', q_subject_id);
                form_data.append('q_subject', q_subject);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        
                        getQSubjects(q_name_id);
                        
                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }else if(action == 'add'){
                var post_url = "index.php/Main/addQualificationSubject/2";
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('q_name_id', q_name_id);
                form_data.append('q_subject', q_subject);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        getQSubjects(q_name_id);
                        },
                    error: function (response) {
                        alert("Error Adding! Please try again.");
                    }
                });
            }
            
        });
            
        function getQNames(q_id){
            var post_url = "index.php/FormControl/getQualifications/2";
            var dataarray = { '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',q_type: q_id };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#q_name').empty();
                    $('#q_name').append('<option value="" selected> ---------Please Select--------- </option>');
                    $.each(res, function(ID){
                        $('#q_name').append('<option value='+res[ID].ID+'>'+res[ID].qualification+'</option>');
                        
                    });
                }
            });
        }
        
        function getQTypes(){
            
            var post_url = "index.php/FormControl/getQTypes/2";
            var dataarray = { '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#q_type').empty();
                    $('#q_type').append('<option value="" selected> ---------Please Select--------- </option>');
                    $.each(res, function(ID){
                        $('#q_type').append('<option value='+res[ID].ID+'>'+res[ID].qualification_type+'</option>');
                        
                    });
                }
            });
        }
            
        function getQSubjects(q_name_id){
            var post_url = "index.php/FormControl/getQSubjects/2";
            var dataarray = { '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',q_id: q_name_id };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#tablebody').empty();
                    $.each(res, function(ID){
                        $('#dataTable tbody').append('<tr><td>'+res[ID].qualification_subject+'</td>'+
                                                       '<td> <button class="edit btn btn-xs btn-success " data-ID="'+res[ID].ID+'" data-name="'+res[ID].qualification_subject+'" ><i class="fa fa-edit"></i></button> ' +
                                                       ' <button class="delete btn btn-xs btn-danger " data-ID="'+res[ID].ID+'" ><i class="fa fs-remove"></i></button> </td>'+
                                                       '</tr>');
                        
                    });
                }
            });
        }
    });

</script>