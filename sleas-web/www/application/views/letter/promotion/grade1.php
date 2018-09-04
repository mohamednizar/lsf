<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>            
        
            <div class="col-md-8" style="color:#000;margin-top:20px;">
                <table border="0" width="100%">
                    <tr>
                        <td valign="top">
                            <p><?php echo $personal_details[0]['title'] . ' ' ;?> <?php echo $personal_details[0]['in_name'] ;?><br>
                            (ශ්‍රී ලං.අ.ප.සේ. I<?php echo explode(" ", $grade)['1']  ;?>) <br>
                            <?php echo $designation['0']['designation'] ;?> <br>
                            <?php echo $work_place['0']['work_place'] ;?> <br></p>
                        </td>
                        <td align="right">
                            <img alt="testing" src="<?php echo base_url()."generated/barcode".$barcode.".png" ?>" width="250px" style="margin-right:0;"/>
                        </td>
                
                    </tr>
                </table>
            </div>
            <div class="col-md-8" style="color:#000;margin-top:20px; text-align:center;">
                <b><u>ශ්‍රී ලංකා අධ්‍යාපන පරිපාලන සේවයේ <?php echo explode(" ", $grade)['1']  ;?> පන්තියට උසස් කිරීම</u></b>
            </div>
            
            <div class="col-md-8" style="color:#000;margin-top:20px;">
            රාජ්‍ය සේවා කොමිෂන් සභාවේ අධ්‍යාපන සේවා කමිටුවේ ලේකම්ගේ අංක <?php echo $psc_letter ?> හා  <?php echo $appoint_date ?> දිනැති ලිපිය මඟින් ඔබ <?php echo $work_date ?> දින සිට ක්‍රියාත්මක වන පරිදි ශ්‍රී ලංකා අධ්‍යාපන පරිපාලන සේවයේ <?php echo explode(" ", $grade)['1']  ;?> පන්තියට උසස් කිරීම අනුමත කර ඇති බව බව සතුටින් දන්වමි.
            </div>
            
            <div class="col-md-8" style="color:#000;margin-top:20px;">            
            02. රාජ්‍ය සේවා කොමිෂන් සභාවේ අධ්‍යාපන සේවා කමිටුව විසින් නිකුත් කරන විධිමත් උසස්වීම් ලිපිය යථා කාලයේදී ඔබ වෙත එවීමට කටයුතු කරනු ලැබේ.
            </div>

            <div class="col-md-12" style="margin-top:100px;">
                <table border="0" width="100%">
                    <tr>
                        <td valign="top">
                            <p style="text-align:center;">
                                .......................<br>
                                බුද්ධිකා එස්.ගමගේ<br>
                                සහකාර ලේකම්<br>
                                (අධ්‍යාපන සේවා ආයතන)<br>
                                අධ්‍යාපන ලේකම් වෙනුවට
                            </p>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td valign="top">
                            
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <p>පිටපත්-</p>
                <ol>
                    <li>ලේකම්, රාජ්‍ය සේවා කොමිෂන් සභාවේ අධ්‍යාපන සේවා කමිටුව - ඔබේ අංක <?php echo $psc_letter ?> හා <?php echo $appoint_date ?> දිනැති ලිපිය අනුව දැ.ගැ.ස.  </li>
                    <?php if($work_place['0']['ID'] == '1'){ ?>
                     <?php }else if($work_place['0']['ID'] == '2'){ ?>
                        <li>විභාග කොමසාරිස් ජනරාල්</li>
                     <?php }else if($work_place['0']['ID'] == '3'){ ?>
                        <li>අධ්‍යාපන ප්‍රකාශන කොමසාරිස් ජනරාල්</li>
                    <?php }?>
                         
                    <li>පෞද්ගලික ලිපිගොනුව</li>
                </ol>
            </div>