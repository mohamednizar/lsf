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
                                Successfully updated the details
                            </div>
                        </div>
                </div>
            <?php } ?>
                
                <div class="col-md-8">
                    <div class="panel panel-success" style="margin-top:20px;">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title"> Divisions List </h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            
                            <div class="form-group ">
                                <label>Working place</label><br>
                                <?php if ($workPlaces) { ?>
                                    <select class="select2 col-md-10 workPlaces" name="work_place" id="work_place" style="padding-left:0;" >
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                        <?php foreach ($workPlaces as $row) { 
                                            switch($row['ID']){
                                                      case 1:
                                                      case 2: 
                                                      case 3: 
                                                      case 4: ?>
                                                        <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>
                                                        break;
                                                <?php default: ?>
                                                <?php }?>
                                        
                                            
                                <?php    } ?>
                                    </select>
                                <?php } ?>
                            </div>
                            
                    <?php if ($workPlaces) { ?>
                        <table  class="table table-striped table-hover DynamicTable" border="0" id="division">
                            <thead>
                                <tr>
                                    <th> Division Name </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                            
                            </tbody>
                        </table>
                        <table  class="table table-striped table-hover DynamicTable" border="0" >
                            <tr>
                                <td> <button class="delete_workplace btn btn-large btn-success " id="addNew" ><i class="fa fa-plus"></i></button> Add New Division </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </table>
                    <?php } ?>
                            
                  
                    <!-- Modal to update Work Places dates-->
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
                                        <input type="text" class="form-control hidden" name="work_place_id" id="work_place_id" >
                                        <input type="text" class="form-control hidden" name="division_id" id="division_id" >
                                        <input type="text" class="form-control hidden" name="action" id="action" >
                                    <div class="form-group">
                                        <label class="modal_q"> Division Name </label>
                                        <input type="text" class="form-control" name="division_name" id="division_name">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="border-top:0;">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="division_submit">Save</button>
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
        $('#mnu_add_division').addClass('active');   
        $('#addNew').attr('disabled', 'true');
                    
        $('#work_place').change(function(){
            var gr = $(this).find(':selected').data('code');
            var workplace_id = $(this).val();
            
            getMainDivision(workplace_id);  
            $('#addNew').removeAttr('disabled');
               
        });
        
        $(document).on('click', '.edit_division', function(){
            var place_id = $(this).data("id");
            var place_name = $(this).data("name");
            var row = $(this).closest('tr');
            console.log(row[0].rowIndex);
            
            $('#division_id').val(place_id);
            $('#division_name').data("ID", place_id);
            $('#division_name').data("rowID", row[0].rowIndex);
            $('#division_name').val(place_name);
            $('#action').val('edit');
            $('#modal_title').text("Edit Division Name");
            $('#division_submit').text("Save");
            $('#UpdateModal').modal('toggle');
        });
        
        $(document).on('click', '.delete_division', function(){
            var post_url = "index.php/Main/deleteDivision/"+'2';
            var form_data = new FormData();
            var work_place_id = $('#work_place').val();
            var place_id = $(this).data("id");
            var row = $(this).closest('tr');
            var rowID = parseInt(row[0].rowIndex) - 1;
            
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('division_id', place_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'text',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    getMainDivision(work_place_id);
                    },
                error: function (response) {
                    alert("Error Delete! Please try again.");
                }
            });
        });
        
        $('#addNew').click(function(){
            var work_place_id = $('#work_place').val();
            $('#work_place_id').val(work_place_id);
            $('#modal_title').text("Add New Division");
            $('#division_submit').text("Add");
            $('#action').val('add');
            $('#UpdateModal').modal('toggle');
        });
        
        $('#division_submit').click(function(){
            var form_data = new FormData();
            var division_id = $('#division_id').val();
            var division_name = $('#division_name').val();
            var work_place_id = $('#work_place_id').val();
            var action = $('#action').val();
            var rowID = parseInt($('#division_name').data("rowID")) - 1;
            
            if(action == 'edit'){
                var post_url = "index.php/Main/updateDivision/"+'2';
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('work_place_id', work_place_id);
                form_data.append('division_id', division_id);
                form_data.append('division_name', division_name);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        getMainDivision(work_place_id);
                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }else if(action == 'add'){
                var post_url = "index.php/Main/addDivision/"+'2';
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('work_place_id', work_place_id);
                form_data.append('division_name', division_name);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        getMainDivision(work_place_id);
                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }
            
        });
            
        function getMainDivision(workplace_id){
            var post_url = "index.php/FormControl/getMainDivision/"+workplace_id;
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',workplace_id: workplace_id};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#tablebody').empty();
                    $.each(res, function(ID,provine_office){
                        //$('#main_division').append('<option value='+res[ID].ID+'>'+res[ID].office_division+'</option>');
                        if(res[ID].office_division){
                        $('#division tbody').append('<tr><td>'+res[ID].office_division+'</td>'+
                                                       '<td> <button class="edit_division btn btn-xs btn-success " data-ID="'+res[ID].ID+'" data-name="'+res[ID].office_division+'" ><i class="fa fa-edit"></i></button> ' +
                                                       ' <button class="delete_division btn btn-xs btn-danger " data-ID="'+res[ID].ID+'" data-name="'+res[ID].office_division+'" ><i class="fa fs-remove"></i></button> </td>'+
                                                       '</tr>');
                        } else {
                            $('#tablebody').empty();
                            $('#division tbody').append('<tr>Sorry No Divisions found in Selected Work Place <td></td><td></td></tr>');
                        }
                    });
                },
                error: function(){
                    $('#tablebody').empty();
                    $('#division tbody').append('<tr>Sorry No Divisions found in Selected Work Place <td></td><td></td></tr>');
                }
            });
        }
    });

</script>