<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <section id="content">   <!-- Start: Content -->
	        <div class="container" style="padding-top: 20px;">
                <div id="topbar">

                    <div class="col-xs-6 col-sm-3 stater" data-grade="01">
                        <span class="count"><?php echo $countgr1; ?></span>
                        <span class="title">GRADE I</span><br>
                        <span class="time">SLEAS Officers</span>
                    </div>

                    <div class="col-xs-6 col-sm-3 stater" data-grade="02">
                        <span class="count"><?php echo $countgr2; ?></span>
                        <span class="title">GRADE II</span><br>
                        <span class="time">SLEAS Officers</span>
                   </div>

                    <div class="col-xs-6 col-sm-3 stater" data-grade="03">
                        <span class="count"><?php echo $countgr3; ?></span>
                        <span class="title">GRADE III</span><br>
                        <span class="time">SLEAS Officers</span>
                    </div>

                    <div class="col-xs-6 col-sm-3 stater" data-grade="sp">
                        <span class="count"><?php echo $countspecial; ?></span>
                        <span class="title"> Special Cadre </span><br>
                        <span class="time">SLEAS Officers</span>
                    </div>

                </div>

                <div class="col-md-12" style="margin-top:20px; padding-left:0; padding-right:0;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> SLEAS Officers by Area </h3>

                            <div class="panel-tools">
                            </div>
                        </div>
                        <div id="columnchart_material" style="width: 100%; height: 350px; padding-left:20px; padding-right:20px;"></div>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top:20px; padding-left:0; padding-right:0;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> SLEAS Officers by Area </h3>

                            <div class="panel-tools">
                            </div>
                        </div>
                        <div id="piechart_div" style="width: 100%; height: 350px; padding-left:20px; padding-right:20px;"></div>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top:20px; padding-left:0; padding-right:0;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> SLEAS Officers by Area </h3>

                            <div class="panel-tools">
                            </div>
                        </div>
                        <div id="table_div" style="width: 100%; height: 350px; padding-left:20px; padding-right:20px;"></div>
                    </div>
                </div>

            <!-- Modal to update Work Places dates-->
                <div id="GradeModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 id="modal_title">  </h4>
                      </div>

                    <?php echo form_open() ?>
                      <div class="modal-body">
                        <div class="col-md-12">
                            <table style="width:100%" border="1" class="table DataTable">
                                <tr>
                                    <th></th>
                                    <th> Cadre Size </th>
                                    <th> Current Officers </th>
                                    <th> Vacant posts </th>
                                </tr>
                                <tbody id="cadre_details"></tbody>
                            </table>
                        </div>
                      </div>
                      <div class="modal-footer" style="border-top:0;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    <?php echo form_close() ?>
                    </div>

                  </div>
                </div>
            </div>
        </section>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/additional-methods.js"?>"></script>

    <script src="<?php echo base_url()."assets/plugins/flot/excanvas.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/iCheck-master/jquery.icheck.min.js"?>"></script>

    <!--<script src="<?php //echo base_url()."assets/js/loader.js"?>"></script>-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script>

    $(document).ready(function(){

    });
    </script>

    <script type="text/javascript">
        var cadreSize = {'01':'', '02':'', '03':'', 'sp':''};
        $('.stater').click(function(){
            var selGrade = $(this).data("grade");
            var selGradeg = 'g' + selGrade;
            var modalTitle = "";
            <?php ?>
            $('#cadre_details').empty();
            if (selGrade == '01'){
                modalTitle = "GRADE I Officers Details.";
                cadreSize[selGrade] = {'moe' : 100, 'exam' : 8, 'epub' : 2, 'service': 3, 'west' : 20, 'cent' : 11, 'sout' : 11, 'nort' : 18, 'east' : 10, 'nw' : 11, 'nc' : 15, 'uva' : 14, 'saba' : 15}

            }else if (selGrade == '02'){
                modalTitle = "General Cadre GRADE II Officers Details.";
                cadreSize[selGrade] = {'moe' : 0, 'exam' : 0, 'epub' : 0, 'service': 0, 'west' : 72, 'cent' : 36, 'sout' : 36, 'nort' : 65, 'east' : 32, 'nw' : 36, 'nc' : 52, 'uva' : 48, 'saba' : 52}

            }else if (selGrade == '03'){
                modalTitle = "General Cadre GRADE II/III Officers Details.";
                cadreSize[selGrade] = {'moe' : 281, 'exam' : 64, 'epub' : 8, 'service': 0, 'west' : 49, 'cent' : 32, 'sout' : 32, 'nort' : 65, 'east' : 32, 'nw' : 24, 'nc' : 34, 'uva' : 60, 'saba' : 52}

            }else if (selGrade == 'sp'){
                modalTitle = "Special Cadre GRADE II/III Officers Details.";
                cadreSize[selGrade] = {'moe' : 43, 'exam' : 0, 'epub' : 30, 'service': 7, 'west' : 146, 'cent' : 120, 'sout' : 112, 'nort' : 232, 'east' : 84, 'nw' : 85, 'nc' : 125, 'uva' : 115, 'saba' : 168}

            }

            var post_url = "index.php/Management/countOfficers/2";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){

                if (selGrade == '02'){
                    res[selGradeg].moe = 0;
                    res[selGradeg].exam = 0;
                    res[selGradeg].epub = 0;

                }else if (selGrade == '03'){
                    res[selGradeg].moe = parseInt(res['g02'].moe) + parseInt(res['g03'].moe);
                    res[selGradeg].exam = parseInt(res['g02'].exam) + parseInt(res['g03'].exam);
                    res[selGradeg].epub = parseInt(res['g02'].epub) + parseInt(res['g03'].epub);

                }else if (selGrade == 'sp'){

                }

                    $('#cadre_details').empty();
                    $('#cadre_details').append('<tr><th> Ministry of Education </th> <td>'+cadreSize[selGrade]['moe']+'</td> <td>'+res[selGradeg].moe+'</td> <td>'+ (parseInt(cadreSize[selGrade]['moe']) - parseInt(res[selGradeg].moe))+'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Department of Examinations </th> <td>'+cadreSize[selGrade]['exam']+'</td> <td>'+res[selGradeg].exam+'</td> <td>'+ (parseInt(cadreSize[selGrade]['exam']) - parseInt(res[selGradeg].exam))+'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Department of Publications </th> <td>'+cadreSize[selGrade]['epub']+'</td> <td>'+res[selGradeg].epub+'</td> <td>'+ (parseInt(cadreSize[selGrade]['epub']) - parseInt(res[selGradeg].epub)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Education service </th> <td>'+cadreSize[selGrade]['service']+'</td> <td></td> <td></td> </tr>');
                    $('#cadre_details').append('<tr><th> Western Province </th> <td>'+cadreSize[selGrade]['west']+'</td> <td>'+res.provinces[selGrade].P01+'</td> <td>'+ (parseInt(cadreSize[selGrade]['west']) - parseInt(res.provinces[selGrade].P01)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Central Province </th> <td>'+cadreSize[selGrade]['cent']+'</td> <td>'+res.provinces[selGrade].P03+'</td> <td>'+ (parseInt(cadreSize[selGrade]['cent']) - parseInt(res.provinces[selGrade].P03)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Southern Province </th> <td>'+cadreSize[selGrade]['sout']+'</td> <td>'+res.provinces[selGrade].P02+'</td> <td>'+ (parseInt(cadreSize[selGrade]['sout']) - parseInt(res.provinces[selGrade].P02)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Northern Province </th> <td>'+cadreSize[selGrade]['nort']+'</td> <td>'+res.provinces[selGrade].P07+'</td> <td>'+ (parseInt(cadreSize[selGrade]['nort']) - parseInt(res.provinces[selGrade].P07)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Eastern Province </th> <td>'+cadreSize[selGrade]['east']+'</td> <td>'+res.provinces[selGrade].P09+'</td> <td>'+ (parseInt(cadreSize[selGrade]['east']) - parseInt(res.provinces[selGrade].P09)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> North Western Province </th> <td>'+cadreSize[selGrade]['nw']+'</td> <td>'+res.provinces[selGrade].P05+'</td> <td>'+ (parseInt(cadreSize[selGrade]['nw']) - parseInt(res.provinces[selGrade].P05)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> North Central Province </th> <td>'+cadreSize[selGrade]['nc']+'</td> <td>'+res.provinces[selGrade].P06+'</td> <td>'+ (parseInt(cadreSize[selGrade]['nc']) - parseInt(res.provinces[selGrade].P06)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Uva Province </th> <td>'+cadreSize[selGrade]['uva']+'</td> <td>'+res.provinces[selGrade].P04+'</td> <td>'+ (parseInt(cadreSize[selGrade]['uva']) - parseInt(res.provinces[selGrade].P04)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Sabaragamuwa Province </th> <td>'+cadreSize[selGrade]['saba']+'</td> <td>'+res.provinces[selGrade].P08+'</td> <td>'+ (parseInt(cadreSize[selGrade]['saba']) - parseInt(res.provinces[selGrade].P08)) +'</td> </tr>');

                },
                error: function(){
                    $('#cadre_details').empty();
                }
            });


            $('#modal_title').text(modalTitle);
            $('#GradeModal').modal('toggle');
        });

        google.charts.load('current', {'packages':['corechart', 'table']});
        google.charts.setOnLoadCallback(drawChart);
        //google.charts.setOnLoadCallback(drawPieChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Province', 'Grade I', 'Grade II', 'Grade III', 'Special Cadre'],
            ['MoE', <?php echo $g01['moe']; ?>, <?php echo $g02['moe']; ?>, <?php echo $g03['moe']; ?>, <?php echo $gsp['moe']; ?>],
            ['Exams', <?php echo $g01['exam']; ?>, <?php echo $g02['exam']; ?>, <?php echo $g03['exam']; ?>, <?php echo $gsp['exam']; ?>],
            ['Publications', <?php echo $g01['epub']; ?>, <?php echo $g02['epub']; ?>, <?php echo $g03['epub']; ?>, <?php echo $gsp['epub']; ?>],
            ['Western', <?php echo $listgrade['01']['P01']; ?>, <?php echo $listgrade['02']['P01']; ?>, <?php echo $listgrade['03']['P01']; ?>, <?php echo $listgrade['sp']['P01']; ?>],
            ['Central', <?php echo $listgrade['01']['P02']; ?>, <?php echo $listgrade['02']['P02']; ?>, <?php echo $listgrade['03']['P02']; ?>, <?php echo $listgrade['sp']['P02']; ?>],
            ['Southern', <?php echo $listgrade['01']['P03']; ?>, <?php echo $listgrade['02']['P03']; ?>, <?php echo $listgrade['03']['P03']; ?>, <?php echo $listgrade['sp']['P03']; ?>],
            ['Northern', <?php echo $listgrade['01']['P04']; ?>, <?php echo $listgrade['02']['P04']; ?>, <?php echo $listgrade['03']['P04']; ?>, <?php echo $listgrade['sp']['P04']; ?>],
            ['Eastern', <?php echo $listgrade['01']['P05']; ?>, <?php echo $listgrade['02']['P05']; ?>, <?php echo $listgrade['03']['P05']; ?>, <?php echo $listgrade['sp']['P05']; ?>],
            ['N. Western', <?php echo $listgrade['01']['P06']; ?>, <?php echo $listgrade['02']['P06']; ?>, <?php echo $listgrade['03']['P06']; ?>, <?php echo $listgrade['sp']['P06']; ?>],
            ["N. Central", <?php echo $listgrade['01']['P07']; ?>, <?php echo $listgrade['02']['P07']; ?>, <?php echo $listgrade['03']['P07']; ?>, <?php echo $listgrade['sp']['P07']; ?>],
            ['Uva', <?php echo $listgrade['01']['P08']; ?>, <?php echo $listgrade['02']['P08']; ?>, <?php echo $listgrade['03']['P08']; ?>, <?php echo $listgrade['sp']['P08']; ?>],
            ['Sabaragamuwa', <?php echo $listgrade['01']['P09']; ?>, <?php echo $listgrade['02']['P09']; ?>, <?php echo $listgrade['03']['P09']; ?>, <?php echo $listgrade['sp']['P09']; ?>]
            ]);

            var options = {
                chart: {
                    title: 'SLEAS Officers',
                    subtitle: 'Officers in areas',
                    chartArea:{left:5,top:0,width:'100%',height:'75%'},
                    tooltip: {trigger:'selection'},
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));
            chart.draw(data, options);

            var PieOptions = {
                chart: {
                    title: 'SLEAS Officers',
                    subtitle: 'Officers in areas',
                    tooltip: {trigger:'selection'},
                    width: 500,
                    height: 400,
                }
            };
            var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
            piechart.draw(data, PieOptions);

            google.visualization.events.addListener(piechart, 'select', selectHandler);

            var table = new google.visualization.Table(document.getElementById('table_div'));
            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});

            function selectHandler(){
                var selection = piechart.getSelection();
                alert(data.getValue(selection[0].row, 4));

            }
        }

        function drawPieChart() {
          var jsonData = $.ajax({
              url: "<?php echo base_url(); ?>" + "index.php/Management/getData",
              dataType: "json",
              async: false
              }).responseText;

          // Create our data table out of JSON data loaded from server.
          var data = new google.visualization.DataTable(jsonData);

          // Instantiate and draw our chart, passing in some options.
          var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
          piechart.draw(data, {width: 600, height: 400});
        }

        </script>
