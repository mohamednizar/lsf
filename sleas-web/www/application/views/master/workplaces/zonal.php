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
                            <h3 class="panel-title"> Zonal Offices List </h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            
                            <div class="form-group col-md-6" >
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

                            <div class="form-group col-md-6">
                                <label>District</label>
                                <select class="select2 district" name="district" id="district" style="width:100%">
                                    <option value="" hidden selected> ---------Please Select--------- </option>
                                </select>
                            </div>
                            
                    <?php if ($workPlaces) { ?>
                        <table  class="table table-striped table-hover DynamicTable" border="0" id="zonal">
                            <thead>
                                <tr>
                                    <th> Zonal Office </th>
                                    <th> Address </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                            
                            </tbody>
                        </table>
                        <table  class="table table-striped table-hover DynamicTable" border="0" >
                            <tr>
                                <td> <button class="delete_workplace btn btn-large btn-success " id="addZonal" ><i class="fa fa-plus"></i></button> Add New Zonal Office </td>
                                <td> </td>
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
                                    <input type="text" class="form-control hidden" name="work_place_id" id="work_place_id" value='7'>
                                    <input type="text" class="form-control hidden" name="dist_id" id="dist_id" >
                                    <input type="text" class="form-control hidden" name="action" id="action" >
                                    <div class="form-group">
                                        <label class="modal_q"> District </label>
                                        <input type="text" class="form-control" name="dist_name" id="dist_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="modal_q"> Zonal Office Name </label>
                                        <input type="text" class="form-control" name="zonal_name" id="zonal_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="modal_q"> Zonal Office Address </label>
                                        <input type="text" class="form-control" name="zonal_address" id="zonal_address">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="border-top:0;">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="zonal_submit">Save</button>
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
        $('#mnu_add_zone').addClass('active');   
        $('#addZonal').attr('disabled', 'true');
        
        var workplace_id = '7';
        
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
            var dist_id = $(this).val();
            getZonalOffices(dist_id);
            $('#addZonal').removeAttr('disabled');
            
        });

        $(document).on('click', '.edit_zonal', function(){
            var dist_id = $('#district').val();
            var dist_name = $('#district :selected').text();
            var zone_id = $(this).data("id");
            var zone_name = $(this).data("name");
            var zone_address = $(this).closest("tr").find('td:eq(1)').text();
            var row = $(this).closest('tr');
            console.log(row[0].rowIndex);
            console.log($(this).closest("tr").find('td:eq(1)').text());
            
            $('#dist_name').val(dist_name);
            $('#dist_id').val(dist_id);
            $('#zonal_name').data("ID", zone_id);
            $('#zonal_name').data("rowID", row[0].rowIndex);
            $('#zonal_name').val(zone_name);
            $('#zonal_address').val(zone_address);
            $('#action').val('edit');
            $('#modal_title').text("Edit Zonal Office Name");
            $('#zonal_submit').text("Save");
            $('#UpdateModal').modal('toggle');
        });
        
        $(document).on('click', '.delete_zonal', function(){
            var post_url = "index.php/Main/deleteZonal/2";
            var form_data = new FormData();
            var dist_id = $('#district').val();
            var zonal_id = $(this).data("id");
            var row = $(this).closest('tr');
            
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('zonal_id', zonal_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'text',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    getZonalOffices(dist_id);
                    },
                error: function (response) {
                    alert("Error Delete! Please try again.");
                }
            });
        });
        
        $('#addZonal').click(function(){
            var dist_id = $('#district').val();
            var dist_name = $('#district :selected').text();
            
            $('#dist_name').val(dist_name);
            $('#dist_id').val(dist_id);
            $('#modal_title').text("Add New Zonal Office");
            $('#zonal_submit').text("Add");
            $('#action').val('add');
            $('#UpdateModal').modal('toggle');
            
        });
        
        $('#zonal_submit').click(function(){
            var form_data = new FormData();
            var dist_id = $('#dist_id').val();
            var workplace_id = '7';
            var zonal_id = $('#zonal_name').data("ID");
            var zonal_name = $('#zonal_name').val();
            var zonal_address = $('#zonal_address').val();
            var action = $('#action').val();
            var rowID = parseInt($('#province_name').data("rowID")) - 1;
            
            if(action == 'edit'){
                var post_url = "index.php/Main/updateZonal/2";
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('zonal_id', zonal_id);
                form_data.append('dist_id', dist_id);
                form_data.append('workplace_id', workplace_id);
                form_data.append('zonal_name', zonal_name);
                form_data.append('zonal_address', zonal_address);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){

                        getZonalOffices(dist_id);

                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }else if(action == 'add'){
                var post_url = "index.php/Main/addZonal/2";
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('workplace_id', workplace_id);
                form_data.append('dist_id', dist_id);
                form_data.append('zonal_name', zonal_name);
                form_data.append('zonal_address', zonal_address);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        getZonalOffices(dist_id);
                        
                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }
            
        });
            
        function getZonalOffices(dist_id){
            
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',district_id: dist_id};
            var post_url = "index.php/FormControl/getZonalOfficeList/2";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#tablebody').empty();
                    $.each(res, function(ID,province_office){
                        $('#zonal tbody').append('<tr><td>'+res[ID].zonal_office+'</td>'+
                                                       '<td>'+res[ID].zonal_office_address+'</td>'+
                                                       '<td> <button class="edit_zonal btn btn-xs btn-success " data-ID="'+res[ID].ID+'" data-name="'+res[ID].zonal_office+'" ><i class="fa fa-edit"></i></button> ' +
                                                       ' <button class="delete_zonal btn btn-xs btn-danger " data-ID="'+res[ID].ID+'" data-name="'+res[ID].zonal_office+'" ><i class="fa fs-remove"></i></button> </td>'+
                                                       '</tr>');
                    });
                }
            });
            
        }
            
    });

</script>