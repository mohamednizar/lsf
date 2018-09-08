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
                            <h3 class="panel-title"> Deployment of SLEAS Officers </h3>

                            <div class="panel-tools">
                            </div>
                        </div>
                        <div id="columnchart_material" style="width: 100%; height: 350px; padding-left:20px; padding-right:20px;"></div>
                    </div>
                </div>
                
                <div class="col-md-6" style="margin-top:20px; padding-left:0; padding-right:0;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Deployment of SLEAS Officers </h3>

                            <div class="panel-tools">
                            </div>
                        </div>
                        <div id="piechart_div" style="width: 100%; height: 350px; padding-left:20px; padding-right:20px;"></div>
                    </div>
                </div>
                
                <div class="col-md-6" style="margin-top:20px; padding-left:0; padding-right:0;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Deployment of SLEAS Officers Vs Cadre </h3>

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
        //Define Cadre Size of Places
        /*0  - MoE
          1  - Exams
          2  - Publications
          12 - Services
          3  - Western Province
          4  - Central Province
          5  - Southern Province
          6  - Northern Province
          7  - Eastern Province
          8  - N. Western Province
          9  - N. Central Province
          10 - Uva Province
          11 - Sabaragamuwa Province
          */
        var cadreSize = {'01':'', '02':'', '03':'', 'sp':''};
        cadreSize['01'] = {'0' : 100, '1' : 8, '2' : 2, '12': 3, '3' : 20, '4' : 11, '5' : 11, '6' : 18, '7' : 10, '8' : 11, '9' : 15, '10' : 14, '11' : 15};
        cadreSize['02'] = {'0' : 0, '1' : 0, '2' : 0, '12': 0, '3' : 72, '4' : 36, '5' : 36, '6' : 65, '7' : 32, '8' : 36, '9' : 52, '10' : 48, '11' : 52};
        cadreSize['03'] = {'0' : 281, '1' : 64, '2' : 8, '12': 0, '3' : 49, '4' : 32, '5' : 32, '6' : 65, '7' : 32, '8' : 24, '9' : 34, '10' : 60, '11' : 52};
        cadreSize['sp'] = {'0' : 43, '1' : 0, '2' : 30, '12': 7, '3' : 146, '4' : 120, '5' : 112, '6' : 232, '7' : 84, '8' : 85, '9' : 125, '10' : 115, '11' : 168};
        
        $('.stater').click(function(){
            var selGrade = $(this).data("grade");
            var selGradeg = 'g' + selGrade;
            var modalTitle = "";
            <?php ?>
            $('#cadre_details').empty();
            if (selGrade == '01'){
                modalTitle = "GRADE I Officers Details.";
                
            }else if (selGrade == '02'){
                modalTitle = "General Cadre GRADE II Officers Details.";
                
            }else if (selGrade == '03'){
                modalTitle = "General Cadre GRADE II/III Officers Details.";
                
            }else if (selGrade == 'sp'){
                modalTitle = "Special Cadre GRADE II/III Officers Details.";
                
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
                    $('#cadre_details').append('<tr><th> Ministry of Education </th> <td>'+cadreSize[selGrade]['0']+'</td> <td>'+res[selGradeg].moe+'</td> <td>'+ (parseInt(cadreSize[selGrade]['0']) - parseInt(res[selGradeg].moe))+'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Department of Examinations </th> <td>'+cadreSize[selGrade]['1']+'</td> <td>'+res[selGradeg].exam+'</td> <td>'+ (parseInt(cadreSize[selGrade]['1']) - parseInt(res[selGradeg].exam))+'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Department of Publications </th> <td>'+cadreSize[selGrade]['2']+'</td> <td>'+res[selGradeg].epub+'</td> <td>'+ (parseInt(cadreSize[selGrade]['2']) - parseInt(res[selGradeg].epub)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Education service </th> <td>'+cadreSize[selGrade]['12']+'</td> <td></td> <td></td> </tr>');
                    $('#cadre_details').append('<tr><th> Western Province </th> <td>'+cadreSize[selGrade]['3']+'</td> <td>'+res.provinces[selGrade].P01+'</td> <td>'+ (parseInt(cadreSize[selGrade]['3']) - parseInt(res.provinces[selGrade].P01)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Central Province </th> <td>'+cadreSize[selGrade]['4']+'</td> <td>'+res.provinces[selGrade].P02+'</td> <td>'+ (parseInt(cadreSize[selGrade]['4']) - parseInt(res.provinces[selGrade].P02)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Southern Province </th> <td>'+cadreSize[selGrade]['5']+'</td> <td>'+res.provinces[selGrade].P03+'</td> <td>'+ (parseInt(cadreSize[selGrade]['5']) - parseInt(res.provinces[selGrade].P03)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Northern Province </th> <td>'+cadreSize[selGrade]['6']+'</td> <td>'+res.provinces[selGrade].P04+'</td> <td>'+ (parseInt(cadreSize[selGrade]['6']) - parseInt(res.provinces[selGrade].P04)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Eastern Province </th> <td>'+cadreSize[selGrade]['7']+'</td> <td>'+res.provinces[selGrade].P05+'</td> <td>'+ (parseInt(cadreSize[selGrade]['7']) - parseInt(res.provinces[selGrade].P05)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> North Western Province </th> <td>'+cadreSize[selGrade]['8']+'</td> <td>'+res.provinces[selGrade].P06+'</td> <td>'+ (parseInt(cadreSize[selGrade]['8']) - parseInt(res.provinces[selGrade].P06)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> North Central Province </th> <td>'+cadreSize[selGrade]['9']+'</td> <td>'+res.provinces[selGrade].P07+'</td> <td>'+ (parseInt(cadreSize[selGrade]['9']) - parseInt(res.provinces[selGrade].P07)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Uva Province </th> <td>'+cadreSize[selGrade]['10']+'</td> <td>'+res.provinces[selGrade].P08+'</td> <td>'+ (parseInt(cadreSize[selGrade]['10']) - parseInt(res.provinces[selGrade].P08)) +'</td> </tr>');
                    $('#cadre_details').append('<tr><th> Sabaragamuwa Province </th> <td>'+cadreSize[selGrade]['11']+'</td> <td>'+res.provinces[selGrade].P09+'</td> <td>'+ (parseInt(cadreSize[selGrade]['11']) - parseInt(res.provinces[selGrade].P09)) +'</td> </tr>');
                    
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

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Province', 'Grade I', 'Grade II', 'Grade III', 'Special Cadre', 'Total'],
            ['MoE', <?php echo $g01['moe']; ?>, <?php echo $g02['moe']; ?>, <?php echo $g03['moe']; ?>, <?php echo $gsp['moe']; ?>, <?php echo $tot['moe']; ?>],
            ['Exams', <?php echo $g01['exam']; ?>, <?php echo $g02['exam']; ?>, <?php echo $g03['exam']; ?>, <?php echo $gsp['exam']; ?>, <?php echo $tot['exam']; ?>],
            ['Publications', <?php echo $g01['epub']; ?>, <?php echo $g02['epub']; ?>, <?php echo $g03['epub']; ?>, <?php echo $gsp['epub']; ?>, <?php echo $tot['epub']; ?>],
            ['Western', <?php echo $listgrade['01']['P01']; ?>, <?php echo $listgrade['02']['P01']; ?>, <?php echo $listgrade['03']['P01']; ?>, <?php echo $listgrade['sp']['P01']; ?>, <?php echo $listgrade['tot']['P01']; ?>],
            ['Central', <?php echo $listgrade['01']['P02']; ?>, <?php echo $listgrade['02']['P02']; ?>, <?php echo $listgrade['03']['P02']; ?>, <?php echo $listgrade['sp']['P02']; ?>, <?php echo $listgrade['tot']['P02']; ?>],
            ['Southern', <?php echo $listgrade['01']['P03']; ?>, <?php echo $listgrade['02']['P03']; ?>, <?php echo $listgrade['03']['P03']; ?>, <?php echo $listgrade['sp']['P03']; ?>, <?php echo $listgrade['tot']['P03']; ?>],
            ['Northern', <?php echo $listgrade['01']['P04']; ?>, <?php echo $listgrade['02']['P04']; ?>, <?php echo $listgrade['03']['P04']; ?>, <?php echo $listgrade['sp']['P04']; ?>, <?php echo $listgrade['tot']['P04']; ?>],
            ['Eastern', <?php echo $listgrade['01']['P05']; ?>, <?php echo $listgrade['02']['P05']; ?>, <?php echo $listgrade['03']['P05']; ?>, <?php echo $listgrade['sp']['P05']; ?>, <?php echo $listgrade['tot']['P05']; ?>],
            ['N. Western', <?php echo $listgrade['01']['P06']; ?>, <?php echo $listgrade['02']['P06']; ?>, <?php echo $listgrade['03']['P06']; ?>, <?php echo $listgrade['sp']['P06']; ?>, <?php echo $listgrade['tot']['P06']; ?>],
            ["N. Central", <?php echo $listgrade['01']['P07']; ?>, <?php echo $listgrade['02']['P07']; ?>, <?php echo $listgrade['03']['P07']; ?>, <?php echo $listgrade['sp']['P07']; ?>, <?php echo $listgrade['tot']['P07']; ?>],
            ['Uva', <?php echo $listgrade['01']['P08']; ?>, <?php echo $listgrade['02']['P08']; ?>, <?php echo $listgrade['03']['P08']; ?>, <?php echo $listgrade['sp']['P08']; ?>, <?php echo $listgrade['tot']['P08']; ?>],
            ['Sabaragamuwa', <?php echo $listgrade['01']['P09']; ?>, <?php echo $listgrade['02']['P09']; ?>, <?php echo $listgrade['03']['P09']; ?>, <?php echo $listgrade['sp']['P09']; ?>, <?php echo $listgrade['tot']['P09']; ?>]
            ]);
            
            var piechart = new google.visualization.ChartWrapper({
              'chartType': 'PieChart',
              'containerId': 'piechart_div',
                'dataTable': data,
              'options': {
                'width': 500,
                'height': 300,
                'pieSliceText': 'label'
              },
              // Instruct the piechart to use colums 0 (Name) and 1 (Donuts Eaten)
              // from the 'data' DataTable.
              'view': {'columns': [0, 5]}
            });
            piechart.draw();
            
            google.visualization.events.addListener(piechart, 'select', selectHandler);
            
            var table = new google.visualization.Table(document.getElementById('table_div'));
            table.draw(data, {showRowNumber: false, width: '100%', sort: 'disable'});
            
            function selectHandler(){
                var chartObject = piechart.getChart();
                var selection = chartObject.getSelection();
                
                var Placedata = google.visualization.arrayToDataTable([
                    ['', 'Grade I', 'Grade II', 'Grade II/III', 'Special Cadre'],
                    ['Cadre Size', cadreSize['01'][selection[0].row], cadreSize['02'][selection[0].row], cadreSize['03'][selection[0].row], cadreSize['sp'][selection[0].row]],
                    ['Available Officers', data.getValue(selection[0].row, 1), data.getValue(selection[0].row, 2), data.getValue(selection[0].row, 3), data.getValue(selection[0].row, 4)]
                    
                ]);
                
                if ($.inArray(selection[0].row, [0, 1, 2]) > -1){
                    Placedata.addRow(['Difference', (cadreSize['01'][selection[0].row] - data.getValue(selection[0].row, 1)), 0, (cadreSize['03'][selection[0].row] - (data.getValue(selection[0].row, 3) + data.getValue(selection[0].row, 2))), (cadreSize['sp'][selection[0].row] - data.getValue(selection[0].row, 4))]);
                } else{
                    Placedata.addRow(['Difference', (cadreSize['01'][selection[0].row] - data.getValue(selection[0].row, 1)), (cadreSize['02'][selection[0].row] - data.getValue(selection[0].row, 2)), (cadreSize['03'][selection[0].row] - data.getValue(selection[0].row, 3)), (cadreSize['sp'][selection[0].row] - data.getValue(selection[0].row, 4))])
                }
                
                var table = new google.visualization.Table(document.getElementById('table_div'));
                table.draw(Placedata, {showRowNumber: false, width: '100%', sort: 'disable'});
            }
            
            var options = {
                chart: {
                    title: 'SLEAS Officers',
                    subtitle: 'Officers in areas',
                    chartArea:{left:5,top:0,width:'100%',height:'75%'},
                    tooltip: {trigger:'selection'},
                    
                }
            };
            data.removeColumn(data.getNumberOfColumns()-1);		// remove total column
            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));
            chart.draw(data, options);
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
