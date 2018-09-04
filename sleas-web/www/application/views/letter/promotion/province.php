<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

            <div class="col-md-8" style="color:#000;margin-top:20px;">
                <table border="0" width="100%">
                    <tr>
                        <td valign="top">
                            <p><?php echo $personal_details[0]['title'] . ' ' ;?> <?php echo $personal_details[0]['f_name'] ;?> <?php echo $personal_details[0]['l_name'] ;?></p>
                        </td>
                        <td align="right">
                            <img alt="testing" src="<?php echo base_url()."generated/barcode".$barcode.".png" ?>" width="250px" style="margin-right:0;"/>
                        </td>

                    </tr>
                </table>
            </div>
            <div class="col-md-8" style="color:#000;margin-top:20px; text-align:center;">
                <b><u>ශ්‍රී ලංකා අධ්‍යාපන පරිපාලන සේවයේ නවක නිලධාරීන් ස්ථානගත කිරීම</u></b>
            </div>

            <div class="col-md-8" style="color:#000;margin-top:20px;font-family:iskpota;">
            විවෘත තරඟ විභාගය ප්‍රතිඵල මත ශ්‍රී ලංකා අධ්‍යාපන පරිපාලන සේවයේ III පන්තියට පත් කරමින් ඔබ වෙත නිකුත් කරන ලද රාජ්‍ය සේවා කොමිෂන් සභා ලේකම්ගේ අංක <?php echo $psc_letter ?> හා  <?php echo $appoint_date ?>  දිනැති පත්වීම් ලිපියෙහි විධිවිධානයන්ට යටත්ව <?php echo $work_date ?> දින සිට ක්‍රියාත්මක වන පරිදි ඔබ පළාත් රාජ්‍ය සේවයට තාවකාලිකව පදනම මත මුදා හරිනු ලැබේ.
            </div>

            <div class="col-md-8" style="color:#000;margin-top:20px;">
            02. ඒ අනුව <?php echo $province[0]['province'] ?> Province පළාත් අධ්‍යාපන ලේකම්/පළාත් අධ්‍යාපන අධ්‍යක්ෂ වෙත රජකාරි සඳහා වාර්තා කොට ඒ බැව්  <?php echo $province[0]['province'] ?> Province පළාත් අධ්‍යාපන ලේකම්/පළාත් අධ්‍යාපන අධ්‍යක්ෂ මඟින් මා වෙත වාර්තා කරන්න.
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
                    <li>ලේකම්, රාජ්‍ය සේවා කොමිෂන් සභාව</li>
                    <li>පළාත් රාජ්‍ය සේවා කොමිෂන් සභාව - <?php echo $province[0]['province'] ?> Province</li>
                    <li>ප්‍රධාන ලේකම් - <?php echo $province[0]['province'] ?> Province</li>
                    <li>පළාත් අධ්‍යාපන ලේකම් - <?php echo $province[0]['province'] ?> Province</li>
                    <li>පළාත් අධ්‍යාපන අධ්‍යක්ෂ - <?php echo $province[0]['province'] ?> Province</li>
                    <li>පෞද්ගලික ලිපිගොනුව</li>
                </ol>
            </div>
