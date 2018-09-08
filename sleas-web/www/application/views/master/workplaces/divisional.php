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
                            <h3 class="panel-title"> Divisional Offices List </h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            
                            <div class="form-group col-md-6" >
                                <label> District </label>
                                <?php if ($districtList) { ?>
                                    <select class="select2Search" name="district" id="district" style="width:100%">
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                        <?php foreach ($districtList as $row) { ?>
                                            <option value="<?php echo $row['dist_id'];?>" > <?php echo $row['district'] ;?> </option>
                                <?php    } ?>
                                    </select>
                                    <?php } ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label> Zone </label>
                                <select class="select2" name="zone" id="zone" style="width:100%">
                                    <option value="" hidden selected> ---------Please Select--------- </option>
                                </select>
                            </div>
                            
                        <table  class="table table-striped table-hover DynamicTable" border="0" id="divisional">
                            <thead>
                                <tr>
                                    <th> Divisional Office </th>
                                    <th> Address </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                            
                            </tbody>
                        </table>
                        <table  class="table table-striped table-hover DynamicTable" border="0" >
                            <tr>
                                <td> <button class="delete_workplace btn btn-large btn-success " id="addDivisional" ><i class="fa fa-plus"></i></button> Add New Divisional Office </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </table>
                  
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
                                    <input type="text" class="form-control hidden" name="work_place_id" id="work_place_id" value='7'>
                                    <input type="text" class="form-control hidden" name="zone_id" id="zone_id" >
                                    <input type="text" class="form-control hidden" name="action" id="action" >
                                    <div class="form-group">
                                        <label class="modal_q"> Zone </label>
                                        <input type="text" class="form-control" name="zone_name" id="zone_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="modal_q"> Divisional Office Name </label>
                                        <input type="text" class="form-control" name="divisional_name" id="divisional_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="modal_q"> Divisional Office Address </label>
                                        <input type="text" class="form-control" name="divisional_address" id="divisional_address">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="border-top:0;">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="divisional_submit">Save</button>
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
        $('#mnu_add_divisional_office').addClass('active');
        $('#addDivisional').attr('disabled', 'true');
        
        var workplace_id = '7';
        
        $('#district').change(function(){
            var id = $(this).val();
            var post_url = "index.php/FormControl/getZoneList/2";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',district_id: id};
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
            var zone_id = $(this).val();
            getDivisionalOffices(zone_id);
            $('#addDivisional').removeAttr('disabled');
            
        });

        $(document).on('click', '.edit_divisional', function(){
            var zone_id = $('#zone').val();
            var zone_name = $('#zone :selected').text();
            var divisional_id = $(this).data("id");
            var divisional_name = $(this).data("name");
            var divisional_address = $(this).closest("tr").find('td:eq(1)').text();
            var row = $(this).closest('tr');
            console.log(row[0].rowIndex);
            console.log($(this).closest("tr").find('td:eq(1)').text());
            
            $('#zone_name').val(zone_name);
            $('#zone_id').val(zone_id);
            $('#divisional_name').data("ID", divisional_id);
            $('#divisional_name').data("rowID", row[0].rowIndex);
            $('#divisional_name').val(divisional_name);
            $('#divisional_address').val(divisional_address);
            $('#action').val('edit');
            $('#modal_title').text("Edit Divisional Office Details");
            $('#divisional_submit').text("Save");
            $('#UpdateModal').modal('toggle');
        });
        
        $(document).on('click', '.delete_divisional', function(){
            var post_url = "index.php/Main/deleteDivisional/2";
            var form_data = new FormData();
            var zone_id = $('#zone_id').val();
            var divisional_id = $(this).data("id");
            var row = $(this).closest('tr');
            
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('divisional_id', divisional_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'text',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    getDivisionalOffices(zone_id);
                    },
                error: function (response) {
                    alert("Error Delete! Please try again.");
                }
            });
        });
        
        $('#addDivisional').click(function(){
            var zone_id = $('#zone').val();
            var zone_name = $('#zone :selected').text();
            
            $('#zone_name').val(zone_name);
            $('#zone_id').val(zone_id);
            $('#modal_title').text("Add New Divisional Office");
            $('#divisional_submit').text("Add");
            $('#action').val('add');
            $('#UpdateModal').modal('toggle');
            
        });
        
        $('#divisional_submit').click(function(){
            var form_data = new FormData();
            var zone_id = $('#zone_id').val();
            var workplace_id = '8';
            var divisional_id = $('#divisional_name').data("ID");
            var divisional_name = $('#divisional_name').val();
            var divisional_address = $('#divisional_address').val();
            var action = $('#action').val();
            var rowID = parseInt($('#province_name').data("rowID")) - 1;
            
            if(action == 'edit'){
                var post_url = "index.php/Main/updateDivisional/2";
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('zone_id', zone_id);
                form_data.append('workplace_id', workplace_id);
                form_data.append('divisional_id', divisional_id);
                form_data.append('divisional_name', divisional_name);
                form_data.append('divisional_address', divisional_address);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){

                        getDivisionalOffices(zone_id);

                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }else if(action == 'add'){
                var post_url = "index.php/Main/addDivisional/2";
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('zone_id', zone_id);
                form_data.append('workplace_id', workplace_id);
                form_data.append('divisional_name', divisional_name);
                form_data.append('divisional_address', divisional_address);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        getDivisionalOffices(zone_id);
                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }
            
        });
            
        function getDivisionalOffices(zone_id){
            
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',zone_id: zone_id};
            var post_url = "index.php/FormControl/getDivisionalOfficeList/2";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#tablebody').empty();
                    $.each(res, function(ID,province_office){
                        $('#divisional tbody').append('<tr><td>'+res[ID].division_office+'</td>'+
                                                       '<td>'+res[ID].division_office_address+'</td>'+
                                                       '<td> <button class="edit_divisional btn btn-xs btn-success " data-ID="'+res[ID].ID+'" data-name="'+res[ID].division_office+'" ><i class="fa fa-edit"></i></button> ' +
                                                       ' <button class="delete_divisional btn btn-xs btn-danger " data-ID="'+res[ID].ID+'" data-name="'+res[ID].division_office+'" ><i class="fa fs-remove"></i></button> </td>'+
                                                       '</tr>');
                    });
                }
            });
            
        }
            
    });

</script>