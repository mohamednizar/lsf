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
                            <h3 class="panel-title"> Provincial Offices List </h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            
                            <div class="form-group ">
                                <label>Working place</label><br>
                                <?php if ($workPlaces) { ?>
                                    <select class="select2 col-md-10 workPlaces" name="work_place" id="work_place" style="padding-left:0;" >
                                        <option value="" hidden selected> ---------Please Select--------- </option>
                                        <?php foreach ($workPlaces as $row) { 
                                            switch($row['ID']){
                                                      case 5:
                                                      case 6:  ?>
                                                        <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>
                                                        break;
                                                <?php default: ?>
                                                <?php }?>
                                        
                                            
                                <?php    } ?>
                                    </select>
                                <?php } ?>
                            </div>
                            
                    <?php if ($workPlaces) { ?>
                        <table  class="table table-striped table-hover DynamicTable" border="0" id="province">
                            <thead>
                                <tr>
                                    <th> Provincial Office </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                            
                            </tbody>
                        </table>
                        <table  class="table table-striped table-hover DynamicTable" border="0" >
                            <tr>
                                <td> <button class="delete_workplace btn btn-large btn-success " id="addProvince" ><i class="fa fa-plus"></i></button> Add New Office </td>
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
                                    <input type="text" class="form-control hidden" name="province_id" id="province_id" >
                                    <input type="text" class="form-control hidden" name="action" id="action" >
                                    <div class="form-group hidden" id="province_id_no">
                                        <label class="modal_q"> Province </label>
                                        
                                    <?php if ($provinceList) { ?>
                                        <select class="select2 province" name="province_id_val" id="province_id_val" style="width:100%">
                                            <option value="" hidden selected> ---------Please Select--------- </option>
                                            <?php foreach ($provinceList as $row) { ?>
                                                <option value="<?php echo $row['province_id'];?>" > <?php echo $row['province'] ;?> </option>
                                            <?php    } ?>
                                        </select>
                                    <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="modal_q"> Office Name </label>
                                        <input type="text" class="form-control" name="province_name" id="province_name">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="border-top:0;">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="province_submit">Save</button>
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
        $('#mnu_add_province').addClass('active');   
        $('#addProvince').attr('disabled', 'true');
                    
        $('#work_place').change(function(){
            var gr = $(this).find(':selected').data('code');
            var workplace_id = $(this).val();
            
            getMainDivision(workplace_id);  
            $('#addProvince').removeAttr('disabled');
               
        });
        
        $(document).on('click', '.edit_province', function(){
            var place_id = $(this).data("id");
            var place_name = $(this).data("name");
            var row = $(this).closest('tr');
            console.log(row[0].rowIndex);
            
            $('#province_id').val(place_id);
            $('#province_name').data("ID", place_id);
            $('#province_name').data("rowID", row[0].rowIndex);
            $('#province_name').val(place_name);
            $('#action').val('edit');
            $('#modal_title').text("Edit Province Office Name");
            $('#province_submit').text("Save");
            $('#province_id_no').addClass('hidden');
            $('#UpdateModal').modal('toggle');
        });
        
        $(document).on('click', '.delete_province', function(){
            var post_url = "index.php/Main/deleteProvince/"+'2';
            var form_data = new FormData();
            var place_id = $(this).data("id");
            var row = $(this).closest('tr');
            var rowID = parseInt(row[0].rowIndex) - 1;
            
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('province_id', place_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'text',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#province tbody tr:eq('+rowID+')').remove();
                    },
                error: function (response) {
                    alert("Error Delete! Please try again.");
                }
            });
        });
        
        $('#addProvince').click(function(){
            var work_place_id = $('#work_place').val();
            $('#work_place_id').val(work_place_id);
            $('#modal_title').text("Add New Province Office");
            $('#province_submit').text("Add");
            $('#action').val('add');
            $('#province_id_no').removeClass('hidden');
            $('#UpdateModal').modal('toggle');
            
        });
        
        $('#province_submit').click(function(){
            var form_data = new FormData();
            var province_id = $('#province_id').val();
            var province_name = $('#province_name').val();
            var province_id_no = $('#province_id_val').val();
            var work_place_id = $('#work_place_id').val();
            var action = $('#action').val();
            var rowID = parseInt($('#province_name').data("rowID")) - 1;
            
            if(action == 'edit'){
                var post_url = "index.php/Main/updateProvince/"+'2';
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('work_place_id', work_place_id);
                form_data.append('province_id', province_id);
                form_data.append('province_name', province_name);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){

                        $('#province tbody tr:eq('+rowID+') td:eq("0")').text(province_name);

                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }else if(action == 'add'){
                var post_url = "index.php/Main/addProvince/"+'2';
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('work_place_id', work_place_id);
                form_data.append('province_id_no', province_id_no);
                form_data.append('province_name', province_name);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response);

                        $('#province tbody').append('<tr><td>'+province_name+'</td>'+
                                                       '<td> <button class="edit_province btn btn-xs btn-success " data-ID="'+response+'" data-name="'+province_name+'" ><i class="fa fa-edit"></i></button> ' +
                                                       ' <button class="delete_province btn btn-xs btn-danger " data-ID="'+response+'" data-name="'+province_name+'" ><i class="fa fs-remove"></i></button> </td>'+
                                                       '</tr>');
                        
                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }
            
        });
            
        function getMainDivision(workplace_id){
            
            var post_url = "index.php/FormControl/getProvinceOffices/"+workplace_id;
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',workplace_id: workplace_id};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#tablebody').empty();
                    $.each(res, function(ID,province_office){
                        $('#province tbody').append('<tr><td>'+res[ID].province_office+'</td>'+
                                                       '<td> <button class="edit_province btn btn-xs btn-success " data-ID="'+res[ID].ID+'" data-name="'+res[ID].province_office+'" ><i class="fa fa-edit"></i></button> ' +
                                                       ' <button class="delete_province btn btn-xs btn-danger " data-ID="'+res[ID].ID+'" data-name="'+res[ID].province_office+'" ><i class="fa fs-remove"></i></button> </td>'+
                                                       '</tr>');
                    });
                }
            });
            
        }
            
        
        
        
    });

</script>