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
                            <h3 class="panel-title"> Institutes List </h3>
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
                                                      case 4: 
                                                      case 5: 
                                                      case 6: 
                                                      case 7: 
                                                      case 8: 
                                                    break;
                                                      default: ?>
                                                        <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>
                                                        break;
                                                <?php }?>
                                <?php    } ?>
                                    </select>
                                <?php } ?>
                            </div>
                            
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

                            <div class="form-group col-md-6">
                                <label>Zone</label>
                                <select class="select2 zone" name="zone" id="zone" style="width:100%">
                                    <option value="" hidden selected> ---------Please Select--------- </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Division</label>
                                <select class="select2 division" name="division" id="division" style="width:100%">
                                    <option value="" hidden selected> ---------Please Select--------- </option>
                                </select>
                            </div>
                            
                    <?php if ($workPlaces) { ?>
                        <table  class="table table-striped table-hover DynamicTable" border="0" id="institute">
                            <thead>
                                <tr>
                                    <th> Institute ID </th>
                                    <th> Institute Name </th>
                                    <th> Address </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                            
                            </tbody>
                        </table>
                        <table  class="table table-striped table-hover DynamicTable" border="0" >
                            <tr>
                                <td> <button class="delete_workplace btn btn-large btn-success " id="addInstitute" ><i class="fa fa-plus"></i></button> Add New Institute </td>
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
                                    <input type="text" class="form-control hidden" name="institute_data_id" id="institute_data_id" >
                                    <input type="text" class="form-control hidden" name="action" id="action" >
                                    <div class="form-group">
                                        <label class="modal_q"> Institute ID </label>
                                        <input type="text" class="form-control" name="institute_id" id="institute_id">
                                    </div>
                                    <div class="form-group">
                                        <label class="modal_q"> Institute Name </label>
                                        <input type="text" class="form-control" name="institute_name" id="institute_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="modal_q"> Address </label>
                                        <input type="text" class="form-control" name="institute_address" id="institute_address">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="border-top:0;">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="institute_submit">Save</button>
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
        $('#mnu_add_institute').addClass('active');            
        $('#addInstitute').attr('disabled', 'true');
        
        $('#work_place').change(function(){
            var workplace_id = $(this).val();
            var division_id = $('#division').val();
            
            if (division_id){
                getMainInstitute(workplace_id, division_id);
            }
            
            
        });
        
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
            var division_id = $(this).val();
            var workplace_id = $('#work_place').val();

            getMainInstitute(workplace_id, division_id);
            $('#addInstitute').removeAttr('disabled');

        });
        
        $(document).on('click', '.edit_institute', function(){
            var institute_data_id = $(this).data("id");
            var institute_name = $(this).data("name");
            var institute_id = $(this).closest("tr").find('td:eq(0)').text();
            var institute_address = $(this).closest("tr").find('td:eq(2)').text();
            var row = $(this).closest('tr');
            console.log(row[0].rowIndex);
            
            $('#institute_data_id').val(institute_data_id);
            $('#institute_id').val(institute_id);
            $('#institute_name').data("ID", institute_data_id);
            $('#institute_name').data("rowID", row[0].rowIndex);
            $('#institute_name').val(institute_name);
            $('#institute_address').val(institute_address);
            $('#action').val('edit');
            $('#modal_title').text("Edit Institute Details");
            $('#institute_submit').text("Save");
            $('#UpdateModal').modal('toggle');
        });
        
        $(document).on('click', '.delete_institute', function(){
            var post_url = "index.php/Main/deleteInstitute/"+'2';
            var form_data = new FormData();
            var institute_data_id = $(this).data("id");
            var work_place_id = $('#work_place').val();
            var division_id = $('#division').val();
            var row = $(this).closest('tr');
            var rowID = parseInt(row[0].rowIndex) - 1;
            
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('institute_data_id', institute_data_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'text',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    getMainInstitute(work_place_id, division_id);
                    },
                error: function (response) {
                    alert("Error Delete! Please try again.");
                }
            });
        });
        
        $('#addInstitute').click(function(){
            var work_place_id = $('#work_place').val();
            $('#work_place_id').val(work_place_id);
            $('#modal_title').text("Add New Institute");
            $('#institute_submit').text("Add");
            $('#action').val('add');
            $('#UpdateModal').modal('toggle');
        });
        
        $('#institute_submit').click(function(){
            var form_data = new FormData();
            var institute_data_id = $('#institute_data_id').val();
            var institute_id = $('#institute_id').val();
            var institute_name = $('#institute_name').val();
            var institute_address = $('#institute_address').val();
            var work_place_id = $('#work_place').val();
            var division_id = $('#division').val();
            var action = $('#action').val();
            var rowID = parseInt($('#institute_name').data("rowID")) - 1;
            
            if(action == 'edit'){
                var post_url = "index.php/Main/updateInstitute/"+'2';
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('work_place_id', work_place_id);
                form_data.append('division_id', division_id);
                form_data.append('institute_data_id', institute_data_id);
                form_data.append('institute_id', institute_id);
                form_data.append('institute_name', institute_name);
                form_data.append('institute_address', institute_address);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){

                        getMainInstitute(work_place_id, division_id);

                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }else if(action == 'add'){
                var post_url = "index.php/Main/addInstitute/"+'2';
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('division_id', division_id);
                form_data.append('institute_id', institute_id);
                form_data.append('work_place_id', work_place_id);
                form_data.append('institute_name', institute_name);
                form_data.append('institute_address', institute_address);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response);

                        getMainInstitute(work_place_id, division_id);
                        /*$('#institute tbody').append('<tr><td>'+institute_name+'</td>'+
                                                       '<td> <button class="edit_institute btn btn-xs btn-success " data-ID="'+response+'" data-name="'+institute_name+'" ><i class="fa fa-edit"></i></button> ' +
                                                       ' <button class="delete_institute btn btn-xs btn-danger " data-ID="'+response+'" data-name="'+institute_name+'" ><i class="fa fs-remove"></i></button> </td>'+
                                                       '</tr>');*/
                        console.log(response);
                        },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }
            
        });
            
        function getMainInstitute(workplace_id, div_id){
            var post_url = "index.php/FormControl/getInstitutes/2";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',division_id: div_id, work_place_id: workplace_id};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#tablebody').empty();
                    $.each(res, function(ID,provine_office){
                        
                        $('#institute tbody').append('<tr><td>'+res[ID].institute_id+'</td>'+
                                                       '<td>'+res[ID].institute_name+'</td>'+
                                                       '<td>'+res[ID].institute_address+'</td>'+
                                                       '<td> <button class="edit_institute btn btn-xs btn-success " data-ID="'+res[ID].ID+'" data-name="'+res[ID].institute_name+'" ><i class="fa fa-edit"></i></button> ' +
                                                       ' <button class="delete_institute btn btn-xs btn-danger " data-ID="'+res[ID].ID+'" data-name="'+res[ID].institute_name+'" ><i class="fa fs-remove"></i></button> </td>'+
                                                       '</tr>');
                    });
                },
                error: function(){
                    $('#tablebody').empty();
                    $('#institute tbody').append('<tr>Sorry No Institutes found in Selected Work Place <td></td><td></td></tr>');
                }
            });
        }
    });

</script>