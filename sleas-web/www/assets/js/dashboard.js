$(document).ready(function () {
    handlestatistics();
    handelSparkBar();
    handelDonetChart();
    handelTodoList();
    handleChat();
});

function handlestatistics(){
    
    var d1 = [[1, 715], [2, 985], [3, 1525], [4, 1254], [5, 1861], [6, 2621],
             [7, 1987], [8, 2136], [9, 2364], [10, 2851], [11, 1546],[12, 2541] ];
         
    var d2 = [[1, 463], [2, 578], [3, 327], [4, 984], [5, 1268], [6, 1684], 
            [7, 1425], [8, 1233], [9, 1354], [10, 1200],[11, 1260], [12, 1320] ];
        
    var months = ["January", "February", "March", "April", "May", "Juny", "July", 
                    "August", "September", "October", "November", "December"];

    // flot chart generate
    var plot = $.plotAnimator($("#statistics-chart"),
        [
            {
                label: 'Sales',
                data: d1,
                lines: {lineWidth: 1},
                shadowSize: 0,
                color: '#ffffff'
            },
            {
                label: "Visits",
                data: d2,
                animator: {steps: 99, duration: 1500, start: 200, direction: "left"},
                lines: {
                    fill: .1,
                    lineWidth: 1
                },
                color: ['#000']
                }, 
                {
                    label: 'Sales',
                    data: d1,
                    points: {show: true, fill: true, radius: 6, fillColor: "#3a3e49", lineWidth: 2},
                    color: '#fff',
                    shadowSize: 0
                },
                {
                    label: "Visits",
                    data: d2,
                    points: {show: true, fill: true, radius: 6, fillColor: "rgba(255,255,255,.5)", lineWidth: 1},
                    color: '#fff',
                    shadowSize: 0
                }
            ], {
        xaxis: {
            tickLength: 0,
            tickDecimals: 0,
            min: 1,
            ticks: [[1, "Jan"], [2, "Feb"], [3, "Mar"], [4, "Apr"], [5, "May"], 
                [6, "Jun"], [7, "Jul"], [8, "Aug"], [9, "Sep"], [10, "Oct"], [11, "Nov"], [12, "Dec"]],
            font: {
                lineHeight: 24,
                weight: "300",
                color: "#ffffff",
                size: 14
            }
        },
        yaxis: {
            ticks: 4,
            tickDecimals: 0,
            tickColor: "rgba(255,255,255,.3)",
            font: {
                lineHeight: 13,
                weight: "300",
                color: "#ffffff"
            }
        },
        grid: {
            borderWidth: {
                top: 0,
                right: 0,
                bottom: 1,
                left: 1
            },
            borderColor: 'rgba(255,255,255,.3)',
            margin: 0,
            minBorderMargin: 0,
            labelMargin: 20,
            hoverable: true,
            clickable: true,
            mouseActiveRadius: 6
        },
        legend: {show: false}
    });

    $(window).resize(function() {
        // redraw the graph in the correctly sized div
        plot.resize();
        plot.setupGrid();
        plot.draw();
    });

    // tooltips showing
    $("#statistics-chart").bind("plothover", function(event, pos, item) {
        if (item) {
            var x = item.datapoint[0],
                    y = item.datapoint[1];

            $("#tooltip").html('<h5 style="color: #e7604a">' + months[x - 1] + '</h5>' + '<strong>' + y + '</strong>' + ' ' + item.series.label)
                    .css({top: item.pageY + 5, left: item.pageX + 5})
                    .fadeIn(200);
        } else {
            $("#tooltip").hide();
        }
    });


    //tooltips options
    $("<div id='tooltip'></div>").css({
        position: "absolute",
        padding: "10px",
        "background-color": "#ffffff",
        "z-index": "99999"
    }).appendTo("body");

};

function handelSparkBar() {

    $(".sparkBar").sparkline([7,4,6,2,4,3,5,9,7,4,6,2,4,9], {
    type: 'bar',
    height: '60',
    barWidth: 15,
    zeroAxis: false,
    barColor: '#42bef7',
    negBarColor: '#ff6a44'});
};

// Function To handel Donut Chart
function handelDonetChart() {
    var dataforPie = [
        {
            label: "Rating 1",
            data: 100,
            color: "#61c0ed"
        },
        {
            label: "Rating 2",
            data: 250,
            color: "#a468fe"
        },
        {
            label: "Rating 3",
            data: 250,
            color: "#f66764"
        },
        {
            label: "Rating 4",
            data: 250,
            color: "#ffc038"
        },
        {
            label: "Rating 5",
            data: 250,
            color: "#9fd148"
        }
    ];

    var options = {
        series: {
            pie: {
                innerRadius: 0.5,
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        },
        legend: {
            show: true
        }
    };

    $.plot($("#donutChart"), dataforPie, options);
};

function handelTodoList() {
    $('.task-finish').click(function() {
        if ($(this).is(':checked')) {
            $(this).parent().parent().addClass('selected');
        }
        else {
            $(this).parent().parent().removeClass('selected');
        }
    });

    //Delete to do list
    $('.task-del').click(function() {
        var activeList = $(this).parent().parent();

        activeList.addClass('removed');

        setTimeout(function() {
            activeList.remove();
        }, 1000);

        return false;
    });
};  //  Function to Handel To do list

function handleChat() {
        var cont = $('#chats');
        var list = $('.chats', cont);
        var form = $('.chat-form', cont);
        var input = $('input', form);
        var btn = $('.btn', form);

        var handleClick = function() {
            var text = input.val();
            if (text.length == 0) {
                return;
            }

            var time = new Date();
            var time_str = time.toString('MMM dd, yyyy HH:MM');
            var tpl = '';
            tpl += '<li class="out">';
            tpl += '<img class="avatar" alt="" src="assets/images/users/user_02.jpg"/>';
            tpl += '<div class="message">';
            tpl += '<span class="arrow"></span>';
            tpl += '<a href="#" class="name">Letty</a>&nbsp;';
            tpl += '<span class="datetime">at ' + time_str + '</span>';
            tpl += '<span class="body">';
            tpl += text;
            tpl += '</span>';
            tpl += '</div>';
            tpl += '</li>';

            var msg = list.append(tpl);
            input.val("");
            $('.scroller', cont).slimScroll({
                scrollTo: list.height()
            });
        }

        btn.click(handleClick);
        input.keypress(function (e) {
            if (e.which == 13) {
                handleClick();
                return false; //<---- Add this line
            }
        });
    };   // Function To Handel Dashboard Chat
