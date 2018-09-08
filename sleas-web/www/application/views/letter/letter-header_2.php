<style>
    @page {
		margin-top: .5cm;
		margin-bottom: 2.5cm;
		margin-left: 2cm;
		margin-right: 2cm;
		background-color: white;
	}

    .header-definitions{
        line-height: 1;
    }
    .header-values{
        line-height: 1.4;
    }
    .page-footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
}


</style>



<?php if ($this->session->workplace == '1') { ?>
    <!--mpdf

    <htmlpagefooter name="myfooter">
    <div class="col-md-12">
        <img src="<?php echo base_url()."assets/letter/1/footer.jpg" ?>" width="100%">

        <div style=" font-size: 9pt; text-align: center; padding-top: 3mm;" >
            This is a SLEAS-HRM System generated letter.
        </div>
    </div>
    </htmlpagefooter>

    <sethtmlpagefooter name="myfooter" value="on" />
    mpdf-->

            <section id="content">
                <div class="col-md-12">
                    <img src="<?php echo base_url()."assets/letter/1/head.jpg" ?>" width="100%">
                    <table border="0" width="80%" style="line-height:1" align="center">
                        <tr>
                            <td width="100px">
                                My Ref.
                            </td>
                            <td width="10px">
                                <span style="font-weight:100; font-size: 40px;">}</span>
                            </td>
                            <td width="30%">
                                <?php echo $off_letter_no; ?>
                            </td>
                            <td width="80px" width="10px">
                                Your Ref.
                            </td>
                            <td width="10px" width="10px">
                                <span style="font-weight:100; font-size: 40px;">}</span>
                            </td>
                            <td width="30%">

                            </td>
                            <td width="80px" width="10px">
                                Date
                            </td>
                            <td width="10px" width="10px">
                                <span style="font-weight:100; font-size: 40px;">}</span>
                            </td>
                            <td width="30%">
                                <?php echo date("Y-m-d"); ?>
                            </td>
                        </tr>
                    </table>
                </div>

<?php } else { ?><!--mpdf

        <htmlpagefooter name="myfooter">
        <div class="col-md-12">
            <img src="<?php echo base_url()."assets/letter/'.$this->session->workplace .'/'.$this->session->location.'/footer.jpg" ?>" width="100%">

            <div style=" font-size: 9pt; text-align: center; padding-top: 3mm;" >
                This is a SLEAS-HRM System generated letter.
            </div>
        </div>
        </htmlpagefooter>

    <sethtmlpagefooter name="myfooter" value="on" />
    mpdf-->

            <section id="content">
                <div class="col-md-12">
                    <img src="<?php echo base_url()."assets/letter/'.$this->session->workplace .'/'.$this->session->location.'/head.jpg" ?>" width="100%">
                    <table border="0" width="80%" style="line-height:1" align="center">
                        <tr>
                            <td width="100px">
                                My Ref.
                            </td>
                            <td width="10px">
                                <span style="font-weight:100; font-size: 40px;">}</span>
                            </td>
                            <td width="30%">
                                <?php echo $off_letter_no; ?>
                            </td>
                            <td width="80px" width="10px">
                                Your Ref.
                            </td>
                            <td width="10px" width="10px">
                                <span style="font-weight:100; font-size: 40px;">}</span>
                            </td>
                            <td width="30%">

                            </td>
                            <td width="80px" width="10px">
                                Date
                            </td>
                            <td width="10px" width="10px">
                                <span style="font-weight:100; font-size: 40px;">}</span>
                            </td>
                            <td width="30%">
                                <?php echo date("Y-m-d"); ?>
                            </td>
                        </tr>
                    </table>
                </div>

<?php } ?>
