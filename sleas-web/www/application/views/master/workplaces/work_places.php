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
                                Successfully updated the member details
                            </div>
                        </div>
                </div>
            <?php } ?>
                

                <div class="col-md-8">
                    <div class="panel panel-success" style="margin-top:20px;">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title"> Work Places List </h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            
                    <?php if ($workPlaces) { ?>
                        <table  class="table table-striped table-hover DynamicTable" border="0" id="workplace">
                            <thead>
                                <tr>
                                    <th> Work Place </th>
                                    <th> Work Place Code </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($workPlaces as $row) { ?>
                                <tr>
                                    <td><?php echo $row['work_place'] ;?> </td>
                                    <td><?php echo $row['work_place_code'] ;?> </td>
                                    <td> <button class="edit_workplace btn btn-xs btn-success " data-ID="<?php echo $row['ID'] ;?>" data-name="<?php echo $row['work_place'] ;?>" ><i class="fa fa-edit"></i></button>
                                        <button class="delete_workplace btn btn-xs btn-danger " data-ID="<?php echo $row['ID'] ;?>"><i class="fa fs-remove"></i></button> </td>
                                    
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <table  class="table table-striped table-hover DynamicTable" border="0" >
                            <tr>
                                <td> <button class="delete_workplace btn btn-large btn-success " id="addWorkplace" ><i class="fa fa-plus"></i></button> Add New Work Place </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </table>
                    <?php } ?>
                            
                  
                    <!-- Modal to update Work Places dates-->
                        <div id="workplaceUpdateModal" class="modal fade" role="dialog">
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
                                        <input type="text" class="form-control hidden" name="workplace_id" id="workplace_id" >
                                        <input type="text" class="form-control hidden" name="action" id="action" >
                                    <div class="form-group">
                                        <label class="modal_q"> Work Place Name </label>
                                        <input type="text" class="form-control" name="workplace_name" id="workplace_name">
                                    </div>
                                    <div class="form-group hidden" id="work_place_code">
                                        <label class="modal-q"> Work Place Code </label>
                                        <input type="text" class="form-control" name="workplace_code" id="workplace_code">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="border-top:0;">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="workplace_submit">Save</button>
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
        
        $('#mnuOne').addClass('menu-open');
        $('#mnu_add_work_place').addClass('active');   
        
        $(document).on('click', '.edit_workplace', function(){
            var place_id = $(this).data("id");
            var place_name = $(this).data("name");
            var row = $(this).closest('tr');
            console.log(row[0].rowIndex);
            
            $('#workplace_id').val(place_id);
            $('#workplace_name').data("ID", place_id);
            $('#workplace_name').data("rowID", row[0].rowIndex);
            $('#workplace_name').val(place_name);
            $('#action').val('edit');
            $('#modal_title').text("Edit Work Place");
            $('#work_place_code').addClass('hidden');
            $('#workplace_submit').text("Save");
            $('#workplaceUpdateModal').modal('toggle');
        });
        
        $(document).on('click', '.delete_workplace', function(){
            var post_url = "index.php/Main/deleteWorkplace/"+'2';
            var form_data = new FormData();
            var place_id = $(this).data("id");
            var row = $(this).closest('tr');
            var rowID = parseInt(row[0].rowIndex) - 1;
            
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('workplace_id', place_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'text',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#workplace tbody tr:eq('+rowID+')').remove();
                    },
                error: function (response) {
                    alert("Error Delete! Please try again.");
                }
            });
        });
        
        $('#addWorkplace').click(function(){
            
            $('#work_place_code').removeClass('hidden');
            $('#modal_title').text("Add New Work Place");
            $('#workplace_submit').text("Add");
            $('#action').val('add');
            $('#workplaceUpdateModal').modal('toggle');
        });
        
        $('#workplace_submit').click(function(){
            var form_data = new FormData();
            var workplace_id = $('#workplace_id').val();
            var workplace_name = $('#workplace_name').val();
            var workplace_code = $('#workplace_code').val();
            var action = $('#action').val();
            var rowID = parseInt($('#workplace_name').data("rowID")) - 1;
            
            if(action == 'edit'){
                var post_url = "index.php/Main/updateWorkplace/"+'2';
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('workplace_id', workplace_id);
                form_data.append('workplace_name', workplace_name);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log("success");

                        $('#workplace tbody tr:eq('+rowID+') td:eq("0")').text(workplace_name);

                        console.log($('#workplace tbody tr:eq('+rowID+') td:eq("0")').text());
                        //$("tr").index(rowID)
                        console.log(rowID);

                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }else if(action == 'add'){
                var post_url = "index.php/Main/addWorkplace/"+'2';
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('workplace_code', workplace_code);
                form_data.append('workplace_name', workplace_name);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response);

                        $('#workplace tbody').append('<tr><td>'+workplace_name+'</td>'+
                                                       '<td>'+workplace_code+'</td>'+
                                                       '<td> <button class="edit_workplace btn btn-xs btn-success " data-ID="'+response+'" data-name="'+workplace_name+'" ><i class="fa fa-edit"></i></button> ' +
                                                       ' <button class="delete_workplace btn btn-xs btn-danger " data-ID="'+response+'" data-name="'+workplace_name+'" ><i class="fa fs-remove"></i></button> </td>'+
                                                       '</tr><tr>...</tr>');
                        console.log(response);
                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }
            
        });
                      
    });

</script>