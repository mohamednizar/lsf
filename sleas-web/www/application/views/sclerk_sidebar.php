    <div class="main-wrapper">      <!-- Start: Main Wrapper-->
        
        <aside id="sidebar">    <!-- Start: Sidebar -->
            
            <div id="sidebar-menu">
                <ul class="nav sidebar-nav menu-open">
                    <li class="menu menu_dashboard" id="menu_dashboard"> 
                        <a href="<?php echo base_url()."index.php/admin/sclerk"?>">
                            <span class="sicon"><i class="fa fa-tachometer"></i></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a> 
                    </li>
                    
                    <li class="menu" id="menu_add_officer"> 
                        <a class="" href="<?php echo base_url()."index.php/register/newmember"?>">
                            <span class="sicon"><i class="fa fs-users"></i></span>
                            <span class="sidebar-title">Add SLEAS Officer</span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_placement"> 
                        <a class="top-menu" href="<?php echo base_url()."index.php/placement/newplacement"?>">
                            <span class="sicon"><i class="fa fs-location"></i></span>
                            <span class="sidebar-title">Placement </span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_transfer"> 
                        <a class="top-menu" href="<?php echo base_url()."index.php/transfer/newtransfer"?>">
                            <span class="sicon"><i class="fa fs-transfer"></i></span>
                            <span class="sidebar-title">Transfer </span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_promotion"> 
                        <a class="top-menu" href="<?php echo base_url()."index.php/promotion/newpromotion"?>">
                            <span class="sicon"><i class="fa fa-level-up"></i></span>
                            <span class="sidebar-title">Promotion </span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_attachment"> 
                        <a class="top-menu" href="<?php echo base_url()."index.php/attachment/newattachment"?>">
                            <span class="sicon"><i class="fa fs-link-4"></i></span>
                            <span class="sidebar-title">Attachment </span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_attachment"> 
                        <a class="top-menu" href="<?php echo base_url()."index.php/secondment/newsecondment"?>">
                            <span class="sicon"><i class="fa fs-link-4"></i></span>
                            <span class="sidebar-title"> Secondment </span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_promotransfer"> 
                        <a class="top-menu" href="<?php echo base_url()."index.php/promotionTransfer/newpromotiontransfer"?>">
                            <span class="sicon"><i class="fa fs-upload-3"></i></span>
                            <span class="sidebar-title">Promotion Transfer </span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_revision"> 
                        <a class="top-menu" href="<?php echo base_url()."index.php/revision/addRevision"?>">
                            <span class="sicon"><i class="fa fa-retweet"></i></span>
                            <span class="sidebar-title">Salary Revision </span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_increment"> 
                        <a class="top-menu" href="<?php echo base_url()."index.php/increment/addIncrement"?>">
                            <span class="sicon"><i class="fa fa-plus"></i></span>
                            <span class="sidebar-title">Increment </span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_disciplinary"> 
                        <a class="top-menu" href="<?php echo base_url()."index.php/disciplinary/addDisciplinary"?>">
                            <span class="sicon"><i class="fa fa-plus"></i></span>
                            <span class="sidebar-title">Disciplinary Action </span>
                        </a>
                    </li>
                    
                    <li class="menu" id="menu_disciplinary"> 
                        <a class="top-menu" href="#" id="verify_letter">
                            <span class="sicon success"><i class="fa fa-check success"></i></span>
                            <span class="sidebar-title"> Verify Letter </span>
                        </a>
                    </li>

                </ul>
            </div>
        </aside>    <!-- End: Sidebar --> 
        
        <!-- Modal to verify letter from barcode-->
        <div id="verifyLetter" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 id="require_modal-title"> Verify Letter </h4>

              </div>

            <?php echo form_open() ?> 
              <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label> Barcode Number </label>
                        <input type="text" class="form-control" name="verify_barcode" id="verify_barcode" placeholder="Barcode Number" autofocus>
                    </div>
                </div>
                <div class="col-md-12 hidden" id="verified-letter">
                    <div class="form-group">
                        <label class="success"> <i class="fa fa-check-circle text-success"></i> Letter is Verified </label>
                    </div>
                </div>
                <div class="col-md-12 hidden" id="notverified-letter">
                    <div class="form-group">
                        <label class="success text-danger"> <i class="fa fa-check-circle text-danger"></i> Letter is Not Verified </label>
                    </div>
                </div>
              </div>
              <div class="modal-footer" style="border-top:0;">
                <button type="button" class="btn btn-success" id="verify_submit"> Verify </button>
                <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
              </div>
            <?php echo form_close() ?>
            </div>

          </div>
        </div>
        