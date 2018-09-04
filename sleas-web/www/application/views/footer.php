<?php
# @Author: Kosala Gangabadage <Kosala>
# @Date:   2017-12-29T09:59:52+05:30
# @Email:  kosala4@gmail.com
# @Last modified by:   Kosala
# @Last modified time: 2017-12-29T14:29:32+05:30

defined('BASEPATH') OR exit('No direct script access allowed');
?>


</div>
        <footer class="footerOutBox" style="background-color:#363636; color:#fff;">
            <div class="row push">
                <div class="col-md-12">
                        <center>
                            &copy; 2017-All Rights Reserved with Data Management Branch, Ministry of Education, Sri Lanka.<br>
                            T.P/Fax 011-2075854 | email: director.dmr@moe.gov.lk
                        </center>
                </div>
            </div>
         </footer>

    <a href="javascript:void(0);" class="scrollup">Scroll</a>

    <script src="<?php echo base_url()."assets/plugins/common/bootbox.js"?>"></script>


    <script src="<?php echo base_url()."assets/js/main.js"?>"></script>
    <script src="<?php echo base_url()."assets/js/plugins.js"?>"></script>

    <script>
        $(document).ready(function(){
            var user_type = $('#hidden-user-type').val();
            if (user_type == "editor") {
                $('.admin-menu').hide();
            };
        });
    </script>
</body>
</html>
