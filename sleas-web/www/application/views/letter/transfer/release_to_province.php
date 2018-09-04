<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

            <div class="col-md-8" style="color:#000;margin-top:20px;">
                <table border="0" width="100%">
                    <tr>
                        <td valign="top">
                            <p><?php echo $personal_details[0]['title'] . ' ' ;?> <?php echo $personal_details[0]['in_name'] ;?> <br>
                            (ශ්‍රී ලං.අ.ප.සේ. III) <br>
                            <?php echo $designation[0]['designation'] ?>, <br>
                            <?php echo $branch[0]['office_branch'] ?> Branch.</p>
                        </td>
                        <td align="right">
                            <img alt="testing" src="<?php echo base_url()."generated/barcode".$barcode.".png" ?>" width="250px" style="margin-right:0;"/>
                        </td>

                    </tr>
                </table>
            </div>
            <div class="col-md-8" style="color:#000;margin-top:20px; text-align:center;">
                <b><u>ශ්‍රී ලංකා අධ්‍යාපන පරිපාලන සේවයේ ස්ථාන මාරු</u></b>
            </div>

            <div class="col-md-8" style="color:#000;margin-top:20px;">
            ඔබගේ ඉල්ලීම අනුව ඔබ රාජකාරී භාර ගන්නා දින සිට ක්‍රියාත්මත වන පරිදි තාවකාලික පදනම මත මධ්‍යම රාජ්‍ය සේවයෙන් <?php echo $province[0]['province'] ?> Province රාජ්‍ය සේවයට මුදාහැරීම රාජ්‍ය සේවා කොමිෂන් සභා ලේකම්ගේ අංක <?php echo $psc_letter ?> හා <?php echo $appoint_date ?> දිනැති  ලිපිය මගින් අනුමත කර ඇත.
            </div>

            <div class="col-md-8" style="color:#000;margin-top:20px;">
            02. ස්ථාන මාරු වී යාමට ප්‍රථම ඔබ භාරයේ ඇති රජයට අයත් සියළුම රාජකාරී ලිපි ලේඛන හා බඩු බාහිරාදිය අධ්‍යාපන අධ්‍යක්ෂ (<?php echo $branch[0]['office_branch'] ?>) විසින් නම් කරනු ලබන නිළධාරියෙකු වෙත විධිමත් පරිදි භාර දීමට කටයුතු කරන්න.
            </div>

            <div class="col-md-8" style="color:#000;margin-top:20px;">
            03. නව සේවා ස්ථානයේ රාජකාරී භාර ගෙන ඒ බැව් පළාත් අධ්‍යාපන ලේකම්/පළාත් අධ්‍යාපන අධ්‍යක්ෂ  / additional secretary of Education Services (MoE) / Comissionar General(Publications and exam) මගින්  මා වෙත වාර්තා කරන්න.
            </div>

            <div class="col-md-12" style="margin-top:100px;">
                <table border="0" width="100%">
                    <tr>
                        <td valign="top">
                            <p style="text-align:center;">
                                .......................<br>
                                ජ්‍යෙෂ්ඨ සහකාර ලේකම්<br>
                                (අධ්‍යාපන සේවා ආයතන)
                            </p>

                        </td>
                        <td>

                        </td>
                        <td valign="top">
                            <p style="text-align:center;">
                                .......................<br>
                                අ/කලේ<br>
                                ලේකම්<br>
                                (අධ්‍යාපන අමාත්‍යාංශය)
                            </p>

                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <p>පිටපත්-</p>
                <ol>
                    <li>ලේකම්, රාජ්‍ය සේවා කොමිෂන් සභාවේ අධ්‍යාපන සේවා කමිටුව </li>
                    <li>පළාත් රාජ්‍ය සේවා කොමිෂන් සභාව - <?php echo $province[0]['province'] ?> Province</li>
                    <li>ප්‍රධාන ලේකම් - <?php echo $province[0]['province'] ?> Province</li>
                    <li>පළාත් අධ්‍යාපන ලේකම් - <?php echo $province[0]['province'] ?> Province</li>
                    <li>පළාත් අධ්‍යාපන අධ්‍යක්ෂ - <?php echo $province[0]['province'] ?> Province</li>
                    <li>පෞද්ගලික ලිපිගොනුව</li>
                </ol>
            </div>
