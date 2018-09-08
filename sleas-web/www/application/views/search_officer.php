<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <section id="content">
            <div class="container" style="padding-top: 20px;">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title">Search Officers</h3>

                            <div class="panel-tools">
                                <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                            </div>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                        <?php echo form_open(); ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Search by NIC</label>
                                    <input type="text" class="form-control" name="nic" id="nic" placeholder="NIC No" data-prompt-position="topLeft" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Search by Last name</label>
                                    <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Last name" data-prompt-position="topLeft" />
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover footable DynamicTable" id="officers_list">
                        <thead>
                            <tr>
                                <th> NIC no </th>
                                <th> Name With Initials </th>
                                <th> Designation </th>
                                <th> Working Place </th>
                                <th> <?php echo $class ?> </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>

    <script>
    $(document).ready(function(){ 
        $('#<?php echo $sidemenu ?>').addClass('active');
        
        $('#l_name').keyup(function(){
            var nic = $(this).val();
            var field = "l_name";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>', searchField: field, searchKey: nic};
            console.log(dataarray);
                var post_url = "index.php/FormControl/searchOfficers/";
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        $('.data-cell').remove();
                        $.each(res, function(ID){
                            $('#officers_list').append('<tr class="data-cell"><td>'+res[ID].NIC+'</td>'+
                                                       '<td>'+res[ID].in_name+'</td>'+
                                                      '<td>'+res[ID].designation+'</td>'+
                                                      '<td>'+res[ID].work_place+'</td>'+
                                                      '<td><a href="add/'+res[ID].ID+'"> <?php echo $class ?> </a></td>');
                        });
                    }
                });
        });
        
        $('#nic').keyup(function(){
            var nic = $(this).val();
            var field = "NIC";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>', searchField: field, searchKey: nic};
                var post_url = "index.php/FormControl/searchOfficers/";
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        $('.data-cell').remove();
                        $.each(res, function(ID){
                            $('#officers_list').append('<tr class="data-cell"><td>'+res[ID].NIC+'</td>'+
                                                       '<td>'+res[ID].in_name+'</td>'+
                                                      '<td>'+res[ID].designation+'</td>'+
                                                      '<td>'+res[ID].work_place+'</td>'+
                                                      '<td><a href="add/'+res[ID].ID+'"> <?php echo $class ?> </a></td>');
                        });
                    }
                });
        });
        
        $('td').click(  function (){
            alert('You clicked row '+ ($(this).index()+1) );
        });
        
    });
</script>