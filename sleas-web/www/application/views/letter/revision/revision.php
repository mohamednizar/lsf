<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <head><meta charset="utf-8"> </head>
<style>
    @page {
		margin-top: .5cm;
		margin-bottom: .5cm;
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
    table {
        font-size: 13px;
    }

</style>
<section id="content" style="font-size:13px;">

    <div class="col-md-8">  </div>
    <div class="col-md-4" style="color:#000;margin-top:10px;">
        <table border="0" width="100%">
            <tr>
                <td valign="top" width="60%">  </td>
                <td valign="top" width="10%"> මගේ අංකය </td>
                <td valign="top"> : </td>
            </tr>
            <tr>
                <td valign="top" width="60%">  </td>
                <td valign="top"> දිනය </td>
                <td valign="top"> : <?php echo date("Y-m-d"); ?> </td>
            </tr>
        </table>
    </div>
    <div class="col-md-4" style="color:#000;margin-top:10px; margin-bottom:0;">
        <table border="0" width="60%">
            <tr>
                <td valign="top" width="30%"> නිලධාරියාගේ නම </td>
                <td valign="top"> : <?php echo $name; ?></td>
            </tr>
            <tr>
                <td valign="top"> තනතුර </td>
                <td valign="top"> : <?php echo $designation; ?></td>
            </tr>
            <tr>
                <td valign="top"> සේවය </td>
                <td valign="top"> : ශ්‍රී ලංකා අධ්‍යාපන පරිපාලන සේවය </td>
            </tr>
            <tr>
                <td valign="top"> ශ්‍රේණිය </td>
                <td valign="top"> : <?php //echo $grade; ?> II ශ්‍රේණිය  </td>
            </tr>
        </table>
    </div>
    <div class="col-md-8" style="color:#000;margin-top:10px; text-align:center; font-size:15px; font-weight:700;">
        <b><center>රාජ්‍ය පරිපාලන චක්‍රලේඛ 03/2016 අනුව <?php echo $revision_date; ?> දිනට වැටුප පරිවර්තනය කිරිම</center></b>
    </div>

    <div class="col-md-8" style="color:#000;margin-top:10px;">
        යථෝක්ත චක්‍රලේඛය පරිදි ඔබගේ වැටුප <?php echo $revision_date; ?> දිනට පහත සඳහන් පරිදි පරිවර්තනය කරනු ලැබේ.
    </div>

    <div class="col-md-8" style="color:#000;margin-top:10px; margin-left: 20px;">
    1. රා.ප.ච.6/2006 වර්ගීකරණය අනුව <?php echo date("Y-m-d", strtotime("$revision_date -1 days")); ?> දිනට අදාළ,
        <div style="color:#000;margin-top:0px; margin-left:10px; margin-bottom:10px;">
            <table border="0" width="90%">
                <tr>
                    <td valign="top" width="50%"> (අ)	සේවා ගණය </td>
                    <td valign="top"> : විධායක නිලධාරීන් </td>
                </tr>
                <tr>
                    <td valign="top"> (ආ)	වැටුප් කේතය </td>
                    <td valign="top"> : SL 1-2016 </td>
                </tr>
                <tr>
                    <td valign="top"> (ඇ)	වැටුප් පරිමාණය </td>
                    <td valign="top"> : රු22935-10x1335-8x1630-17x2170-110895 </td>
                </tr>
                <tr>
                    <td valign="top"> (ඈ)	ශ්‍රේණිය	 </td>
                    <td valign="top"> : <?php echo $grade; ?> </td>
                </tr>
                <tr>
                    <td valign="top"> (ඉ)	වැටුප් පියවර </td>
                    <td valign="top"> : <?php echo $step; ?> </td>
                </tr>
                <tr>
                    <td valign="top"> (ඊ)	වැටුප් තලය </td>
                    <td valign="top"> : <?php echo number_format($final_salary, 2); ?> </td>
                </tr>
                <tr>
                    <td valign="top"> (උ)	අවසාන වැටුප් වර්ධක දිනය </td>
                    <td valign="top"> :  </td>
                </tr>
            </table>
        </div>
    2. රා.ප.ච.03/2006 වර්ගීකරණය අනුව <?php echo $revision_date; ?> දිනට උපලේඛන I හි සඳහන් පරිදි
        <div style="color:#000;margin-top:0px; margin-left:10px; margin-bottom:10px;">
            <table border="0" width="90%">
                <tr>
                    <td valign="top" width="50%"> (අ)	සේවා ගණය </td>
                    <td valign="top"> : විධායක නිලධාරීන් </td>
                </tr>
                <tr>
                    <td valign="top"> (ආ)	වැටුප් කේතය </td>
                    <td valign="top"> : SL 1-2016 </td>
                </tr>
                <tr>
                    <td valign="top"> (ඇ)	වැටුප් පරිමාණය </td>
                    <td valign="top"> : රු22935-10x1335-8x1630-17x2170-110895 </td>
                </tr>
                <tr>
                    <td valign="top"> (ඈ)	ශ්‍රේණිය	 </td>
                    <td valign="top"> : <?php echo $grade; ?> </td>
                </tr>
                <tr>
                    <td valign="top"> (ඉ)	වැටුප් පියවර </td>
                    <td valign="top"> : <?php echo $step; ?> </td>
                </tr>
                <tr>
                    <td valign="top"> (ඊ)	වැටුප් තලය </td>
                    <td valign="top"> : <?php echo number_format($final_salary, 2); ?> </td>
                </tr>
            </table>
        </div>
    3. ඉහත 1 (ඊ) හි වැටුප් තලයට අනුරූපි උපලේඛන II අනුව <?php echo $revision_date; ?> දින සිට ගෙවිය යුතු වැටුප
        <div style="color:#000;margin-top:0px; margin-left:10px; margin-bottom:10px;">
            <table border="0" width="90%">
                <tr>
                    <td valign="top" width="50%"> (අ)	මුලික වැටුප </td>
                    <td valign="top"> : <?php echo $new_salary; ?> </td>
                </tr>
                <tr>
                    <td valign="top"> (ආ)	දළ වැටුපෙහි ගැලපුම් දීමනාව </td>
                    <td valign="top"> :  </td>
                </tr>
            </table>
        </div>
    4. 2016.01.18 දිනට වැටුප වර්ධකය සමඟ වැටුප
        <div style="color:#000;margin-top:0px; margin-left:10px; margin-bottom:20px;">
            <table border="0" width="90%">
                <tr>
                    <td valign="top" width="50%"> (අ)	උපලේඛන I අනුව වැටුප් තලය </td>
                    <td valign="top"> : <?php echo number_format($final_salary_increment, 2); ?> </td>
                </tr>
                <tr>
                    <td valign="top"> (ආ)	උපලේඛන II අනුව ගෙවිය යුතු වැටුප </td>
                    <td valign="top"> : <?php echo $next_salary; ?> </td>
                </tr>
                <tr>
                    <td valign="top"> (ආ)	එදින සිට අදාළවන දළ වැටුපෙහි ගැලපුම් දීමනාව </td>
                    <td valign="top"> :  </td>
                </tr>
            </table>
        </div>
    5. ඔබගේ කාර්යක්ෂමතා කඩඉම් සමත්විය යුතු දිනය / වැටුප් වර්ධක දිනය නොවෙනස්ව පවතී.<br><br>
    6. සාවද්‍ය වර්ගීකරණයකින් හෝ ගණනය කිරිමේ දෝෂයකින් හෝ වෙනත් වරදක් හේතුවෙන් හෝ වැඩිපුර ගෙවීමක් සිදුවි ඇති බව අනාවරණය වුවහොත් එම මුදල් ආපසු අයකිරිමට යටත් වන බවද දන්වමි.
        <table border="0" width="100%">
            <tr>
                <td width="50%"> සකස් කළේ </td>
                <td width="50%"> පරීක්ෂා කළේ </td>
            </tr>
            <tr>
                <td width="50%"> අත්සන ................. </td>
                <td width="50%"> අත්සන ................. </td>
            </tr>
            <tr>
                <td width="50%"> නම ................. </td>
                <td width="50%"> නම ................. </td>
            </tr>
            <tr>
                <td width="50%"> තනතුර ................. </td>
                <td width="50%"> තනතුර ................. </td>
            </tr>
            <tr>
                <td width="50%"> දිනය <?php echo date("Y-m-d"); ?> </td>
                <td width="50%"> දිනය ................. </td>
            </tr>
        </table><br>
        <table border="0" width="80%">
            <tr>
                <td valign="top" width="25%"> ආයතන ප්‍රධානියා </td>
                <td valign="top"> :  </td>
                <td valign="top">  </td>
            </tr>
            <tr>
                <td valign="top"> අත්සන </td>
                <td valign="top"> :  </td>
                <td valign="top">  </td>
            </tr>
            <tr>
                <td valign="top"> තනතුර </td>
                <td valign="top"> :  </td>
                <td valign="top">  </td>
            </tr>
            <tr>
                <td valign="top"> දිනය </td>
                <td valign="top"> :  </td>
                <td valign="top">  </td>
            </tr>
            <tr>
                <td valign="top"> නිල මුද්‍රාව </td>
                <td valign="top"> :  </td>
                <td valign="top">  </td>
            </tr>
        </table>
    </div>

    <div class="col-md-8" style="color:#000;margin-top:10px;">
        පිටපත්
        <ol style="color:#000;margin-left:10px;">
            <li> විගණකාධිපති 		-කරු.අ.ක.ස.</li>
            <li> ගණකාධිකාරි(ගෙවීම්)		-කරු.අ.ක.ස. </li>
            <li> පෞද්ගලික ලිපි ගොනුවට </li>
        </ol>
    </div>

</section>
