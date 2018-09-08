<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <section id="content">   <!-- Start: Content -->
            <div class="row">

                    <?php if ($this->session->flashdata('register')=="success"){ ?>
                        <div class="col-md-6">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Successfully registered the member
                            </div>
                        </div>
                    <?php } else if ($this->session->flashdata('update')=="success"){ ?>
                        <div class="col-md-6">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Officer Details Successfully Updated.
                            </div>
                        </div>
                    <?php } ?>
            </div>
            <div id="topbar">
                <a href="<?php echo base_url()."index.php/register/newmember"?>">
                    <div class="col-xs-6 col-sm-4 stater" style="height:auto">
                        <div class="title text-center"> <i class="fa fs-users"> </i> Add SLEAS Officer </div>
                    </div>
                </a>

                <a href="<?php echo base_url()."index.php/transfer/newtransfer"?>">
                    <div class="col-xs-6 col-sm-4 stater" style="height:auto">
                        <div class="title text-center"> <i class="fa fs-transfer"> </i> Add Transfer </div>
                    </div>
                </a>

                <a href="<?php echo base_url()."index.php/promotion/newpromotion"?>">
                    <div class="col-xs-6 col-sm-4 stater" style="height:auto">
                        <div class="title text-center"> <i class="fa fa-level-up"> </i> Add Promotion </div>
                    </div>
                </a>

            </div>

            <div class="container" style="padding-top: 100px;">
                <div class="row">
                    <div class="col-md-6">

                        <div class="panel panel-default">
                            <div class="panel-heading reg-main-panel">
                                <h3 class="panel-title">Officer's change requests</h3>
                            </div><!--End of panel-heading-->
                            <div class="panel-body">
                                <?php if($requests){ ?>
                                    <?php foreach($requests as $row){ ?>
                                        <label><?php echo $row['message_title'] ?> - from <?php echo $row['f_name'] . ' ' . $row['l_name']?></label> <button class="btn btn-danger btn-xs messagetoggle" data-toggle="modal" data-target="#messageModal" data-message='{"id":"<?php echo $row['person_id'] ?>","message_sender":"<?php echo $row['in_name'] ?>","message":"<?php echo $row['message']?>","message_title":"<?php echo $row['message_title']  ?>"}' data-msgID="<?php echo $row['msg_id'] ?>"> View </button>

                                    <?php }  ?>
                                <?php }  ?>

                            <!-- Modal -->
                                <div id="messageModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                      </div>
                                      <div class="modal-body">
                                        <p id="messagetitle" class="title"></p>
                                        <p id="messagebody"></p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading reg-main-panel">
                                <h3 class="panel-title">Officer's who did not inform the date of duty assumed</h3>
                            </div><!--End of panel-heading-->
                            <div class="panel-body">

                                <?php //print_r($requests['0']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> SLEAS Officers </h3>
                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover footable DynamicTable">
                                    <thead>
                                        <tr>
                                            <th> NIC </th>
                                            <th> Title </th>
                                            <th> Name with Initials </th>
                                            <th> Designation </th>
                                            <th> Working Place </th>
                                            <th>  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($officers_list) { ?>

                                        <?php foreach ($officers_list as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['NIC'] ;?> </td>
                                                <td><?php echo $row['title'] ;?> </td>
                                                <td><?php echo $row['in_name'] ;?> </td>
                                                <td><?php echo $row['designation'] ;?> </td>
                                                <td><?php echo $row['work_place'] ;?> </td>
                                                <td><a href="profile/<?php echo $row['person_id'] ;?>"> View Profile </a> </td>
                                            </tr>
                                        <?php    } ?>
                                    <?php    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                    </div>

                </div>
                <?php //print_r($officers_list); ?>
            </div>
        </section>

    <script src="<?php echo base_url()."assets/plugins/flot/excanvas.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.time.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.orderBars.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.pie.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.resize.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.tooltip.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/iCheck-master/jquery.icheck.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>

    <script src="<?php echo base_url()."assets/plugins/morris/raphael-min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/morris/morris.min.js"?>"></script>

    <script>
        $(document).ready(function(){
            DataTabels.init();
            $('#menu_dashboard').addClass('active');


        /*$('#messageModal').on('show.bs.modal', function(e) {
            var person_id = $('#messagetoggle').data('message').id;
            var message_body = $('#messagetoggle').data('message').message;
            var message_sender = $('#messagetoggle').data('message').message_sender;
            var message_title = $('#messagetoggle').data('message').message_title;
            $('#messagebody').text(message_body);
            $('#messagetitle').text(message_title);
            $('.modal-title').text(message_sender);
        });*/

            $('#verify_letter').click(function(){
                $('#verifyLetter').modal('toggle');
            });

            $('.messagetoggle').click(function(){
                var person_id = $(this).data('message').id;
                var message_body = $(this).data('message').message;
                var message_sender = $(this).data('message').message_sender;
                var message_title = $(this).data('message').message_title;
                $('#messagebody').text(message_body);
                $('#messagetitle').text(message_title);
                $('.modal-title').text(message_sender);
                $('#messageModal').modal('toggle');

            });

            $('#verify_submit').click(function(){
                var barcode = $('#verify_barcode').val();
                $('#verified-letter').addClass('hidden');

                var post_url = "index.php/Admin/verifyBarcode/2";
                var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>', 'barcode' : barcode};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        if (res == 1){
                            $('#verified-letter').removeClass('hidden');
                            $('#notverified-letter').addClass('hidden');
                        }else{
                            $('#notverified-letter').removeClass('hidden');
                            $('#verified-letter').addClass('hidden');
                        }

                    }
                });
            });


        });
    </script>
