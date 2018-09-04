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
                </div>

<?php } ?>
