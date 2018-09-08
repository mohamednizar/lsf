<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <section id="content">
            <div class="container" style="padding-top: 10px;">
                <div class="col-md-12">
                    <?php echo form_open("letter/print_letter", 'role="form" id="leterViewForm"'); ?>
                        <input type="hidden" name="appoint_date" id="appoint_date" value="<?php echo $appoint_date ;?>">
                        <input type="hidden" name="off_letter_no" id="off_letter_no" value="<?php echo $off_letter_no ;?>">
                        <input type="hidden" name="fname" id="fname" value="<?php echo $pdfFileName ;?>">
                        <input type="hidden" name="fpath" id="fpath" value="<?php echo $pdfFilePath ;?>">

                        <textarea class="ckeditor" id="editor1" name="editor1"> <?php echo $letter; ?> </textarea>

                        <div class="form-actions fluid">
                            <div class="col-md-12">
                                <button type="submit" id="print-button" class="btn btn-info"><i class="fa fa-print"></i> Print letter </button>
                            </div>
                        </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </section>

    <script src="<?php echo base_url()."assets/plugins/ckeditor/ckeditor.js"?>"></script>
<script>
		CKEDITOR.replace( 'editor1', {
			// Define the toolbar groups as it is a more accessible solution.
			toolbarGroups: [
				{"name":"basicstyles","groups":["basicstyles"]},
				{"name":"links","groups":["links"]},
				{"name":"paragraph","groups":["list","blocks"]},
				{"name":"document","groups":["mode"]},
				{"name":"insert","groups":["insert"]},
				{"name":"styles","groups":["styles"]},
				{"name":"tools","groups":["tools"]},
				{"name":"about","groups":["about"]}
			],
			// Remove the redundant buttons from toolbar groups defined above.
			removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,Print,Save,NewPage'
		} );
	</script>
