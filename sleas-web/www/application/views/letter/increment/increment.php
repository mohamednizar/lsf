<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <head><meta charset="utf-8"> </head>
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
<section id="content">

<!--mpdf

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
This is a SLEAS-HRM System generated letter.
</div>
</htmlpagefooter>

<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

    <div class="col-md-8" style="color:#000;margin-top:20px;">
        <table border="0" width="100%">
            <tr>
                <td valign="top"> H 028033 – 1.50.000 (2007/01) P  </td>
                <td valign="top"> ශ්‍රී ලංකා රජයේ මුද්‍රණ දෙපාර්තමේන්තුව  </td>
                <td valign="top" align="right"> 185 වැනි පොදු ආකෘති පත්‍රය <br> General 185  </td>
            </tr>
        </table>
    </div>
    <div class="col-md-8" style="color:#000;margin-top:20px; text-align:center;">
        <b><p><center><font size="18px">පඩි වැඩි කිරීම් සහතික පත්‍රය</font><br>
        INCREMENT  CERTIFICATE FORM</center></p></b>
    </div>

    <div class="col-md-8" style="color:#000;margin-top:20px;">
        <?php echo $work_place ?> දෙපාර්තමේන්තුවේ සේවයෙහි නියුක්ත මෙහි පහත නම් සදහන් වන නිලධාරින්/ සේවකයන් විසින් ස්වකීය රාජකාරි සතුටු දායක ලෙස ඉෂ්ට කරන ලද බව ද ඵ් ඵ් පුද්ගලයාගේ නමට ඉදිරියෙන් සදහන් කර ඇති පඩි වැඩි වීම ඵ් ඵ් පුද්ගලයා විසින් උපයා ගන්නා ලද බව ද මම මෙයින් සහතික කරමි.
    </div>

    <div class="col-md-8" style="color:#000;margin-top:20px;">
    I hereby certify that the under- mentioned officers / employees borne on the Establishment of the <?php echo $work_place ?> has / have discharged his /their duties satisfactorily and earned the increment noted against his/their respective names.
    </div>

    <div class="col-md-8" style="color:#000;margin-top:20px;">
        <table border="0" width="100%">
            <tr>
                <td valign="top" width="50px">
                    <p style="text-align:left;">
                        දිනය<br>
                        Date
                    </p>
                </td>
                <td valign="middle" width="50%">
                    <p style="text-align:left;">
                        <?php echo date("Y-m-d") ?>
                    </p>
                </td>
                <td valign="top">
                    <p style="text-align:left;">
                        අත්සන<br>
                        Signature
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-8" style="color:#000;margin-top:20px;">
        <table cellspacing="0px" border="1" cellpading="2px" width="100%">
            <tr>
                <th valign="middle">
                    <p style="text-align:center;">
                        නම<br>
                        Name
                    </p>
                </th>
                <th valign="middle">
                    <p style="text-align:center;">
                        පදවිය<br>
                        Situation
                    </p>
                </th>
                <th valign="middle">
                    <p style="text-align:center;">
                        වැඩි වීම<br>
                        Increment<br>
                        රු. ශ. Rs c.
                    </p>
                </th>
                <th valign="middle">
                    <p style="text-align:center;">
                        දිනය<br>
                        Date
                    </p>
                </th>
            </tr>
            <tr>
                <td align="center" width="200px"> <?php echo $name ?> </td>
                <td align="center"><?php echo $designation ?></td>
                <td align="center"></td>
                <td align="center"></td>
            </tr>
            <tr>
                <td align="center">&nbsp; </td>
                <td align="center"> <?php //echo $grade ?> II ශ්‍රේණිය </td>
                <td align="center"> </td>
                <td align="center"> </td>
            </tr>
            <tr>
                <td align="center"> &nbsp; </td>
                <td align="center"> </td>
                <td align="center"> </td>
                <td align="center"> </td>
            </tr>
            <tr>
                <td align="right"> වර්තමාන වැටුප </td>
                <td align="right"> <?php echo $current_salary ?> </td>
                <td align="center"> </td>
                <td align="center"> </td>
            </tr>
            <tr>
                <td align="right"> මාසික වැටුප් වැඩිවීම </td>
                <td align="right" style="margin-right:100px;"> <?php echo $increment ?> </td>
                <td align="center"> <?php echo $increment ?> </td>
                <td align="center"> <?php echo $increment_date ?> </td>
            </tr>
            <tr>
                <td align="right"> වැඩිවීම සමඟ වැටුප </td>
                <td align="right"> <?php echo $new_salary ?> </td>
                <td align="center">  </td>
                <td align="center">  </td>
            </tr>
            <tr>
                <td align="center"> &nbsp; </td>
                <td align="center"> </td>
                <td align="center"> </td>
                <td align="center"> </td>
            </tr>
            <tr>
                <td align="center"> &nbsp; </td>
                <td align="center"> </td>
                <td align="center"> </td>
                <td align="center"> </td>
            </tr>
            <tr>
                <td align="left"> පිටපත් </td>
                <td align="center"> </td>
                <td align="center"> </td>
                <td align="center"> </td>
            </tr>
            <tr>
                <td align="left"> 1. විගණකාධිපති </td>
                <td align="center"> </td>
                <td align="center"> </td>
                <td align="center"> </td>
            </tr>
            <tr>
                <td align="left"> 2. <?php echo $name ?> </td>
                <td align="center"> </td>
                <td align="center"> </td>
                <td align="center"> </td>
            </tr>
            <tr>
                <td align="left"> 3. පෞද්ගලික ලිපිගොනුව </td>
                <td align="center"> </td>
                <td align="center"> </td>
                <td align="center"> </td>
            </tr>
        </table>
    </div>
</section>
