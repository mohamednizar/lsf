



$(document).ready( function (){
    //handleAnimation();
    handle_sidebar();
    handle_panel_tools();
    handelSlimScroll();
    handleUniform();
    handeliCheckbox();
    handlenivoLightbox();
    handelSelect2();
    handelTagInput();
    handleDateRangePickers();
    handleDatePickers();
    //handleTimePicker();
    //handleClockface();
    //handelRatty();
    //handleSummernote();
    //handelTouchSpin();
    handelTooltip();
    handelPopovers();
    handelResponsivePagination();
    handleScrollToTop();
});

function handleAnimation() {
    
    $('body').addClass('animated fadeInDown');
    
}   //  Function to handle Animations

function handle_sidebar (){
    $(".sidebar-toggle").click(function (){
        if ($('body').hasClass('sidebar-collapsed')) {
            $('body').removeClass('sidebar-collapsed');
        }
        else {
            $('body').addClass('sidebar-collapsed');
        }
    });
    
    $('a.top-menu-toggle').append("<span class='caret-dwn'></span>");
        
    $('#sidebar-menu .sidebar-nav a.top-menu-toggle').click(function(e) {
        e.preventDefault();

        var SubMenus = $('#sidebar-menu ul.sub-nav'),
                MenuUrl = $(this).attr('href');

        if ($(this).hasClass('openable')) {

            // To create accordion effect we collapse all open menus
            $('#sidebar-menu .sidebar-nav > li > a.top-menu-toggle').addClass('openable');
            $(SubMenus).slideUp('fast');

            // When effect is complete we remove ".menu-open" class
            $(SubMenus).promise().done(function() {
                $(SubMenus).removeClass('menu-open');
            });

            // We now open the targeted menu item.
            $(this).removeClass('openable');
            $(MenuUrl).slideDown('fast', function() {
                // after the animation we apply the "menu-open" class. 
                // The animation leaves an inline "display:block" style.
                // We remove this as it interferes with media queries 
                $(MenuUrl).addClass('menu-open').attr('style', '');
            });
        } else {
            $(this).addClass('openable');
            $(MenuUrl).slideUp('fast', function() {
                $(MenuUrl).removeClass('menu-open');
            });
        }
    });
    
    $(window).resize(function() {
        if ($(window).width() < 1024) {
            if ($('body').hasClass('sidebar-collapsed')) {
                $('body').removeClass('sidebar-collapsed');
            }
        }
    });
    
    
}

function handle_panel_tools() {
    //  Panel Close
    $('.panel-tools .panel-close').bind('click', function(e) {
        e.preventDefault();
        //$(this).parents(".panel").addClass('animated rotateOutUpRight');     
        $(this).parents(".panel").remove();        
    });
    
    // For Panel Referesh
    $('.panel-tools .panel-refresh').bind('click', function(e) {
        var el = $(this).parents(".panel");
        el.block({
            overlayCSS: {
                backgroundColor: '#fff'
            },
            message: '<img src="assets/images/preloader.gif" /> Loading...',
            css: {
                border: 'none',
                color: '#333',
                background: 'none'
            }
        });
        window.setTimeout(function() {
            el.unblock();
        }, 1000);
        e.preventDefault();
    });
    
    // For Panel Collapse and expend
    $('.panel-tools .panel-collapse').bind('click', function(e) {
        e.preventDefault();
        var el = jQuery(this).parent().closest(".panel").children(".panel-body");
        if ($(this).hasClass("collapses")) {
            $(this).addClass("expand").removeClass("collapses");
            el.slideUp(200);
        } else {
            $(this).addClass("collapses").removeClass("expand");
            el.slideDown(200);
        }
    });
    
}   //  function to activate the panel tools

function handleUniform() {
    
    if (!jQuery().uniform) {
        return;
    }
    $('.uniforminpt').uniform();
    
}   //  Function to handle TimePicker

function handeliCheckbox() {
    if (!jQuery().iCheck) {
        return;
    }

    $('input.icheck').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
    });
};      //  Function to handel Checkbox

function handlenivoLightbox() {
    
    if (!jQuery().nivoLightbox) {
        return;
    }
    
    $('.nivoLightbox').nivoLightbox({
        effect: 'fadeScale',             // fade, fadeScale, slideLeft, slideRight, slideUp, slideDown, fall
        theme: 'default',           // The lightbox theme to use
        keyboardNav: true,          // Enable/Disable keyboard navigation (left/right/escape)
        clickOverlayToClose: true   // If false clicking the "close" button will be the only way to close the lightbox
    });

    
}   //  Function to handle Lightbox

function handelSlimScroll() {
    $(".scroller").each(function() {
        $(this).slimScroll({
            size: "5px",
            opacity: "0.6",
            position: $(this).attr("data-position"),
            height: $(this).attr("data-height"),
            alwaysVisible: ($(this).attr("data-always-visible") == "1" ? true : false),
            railVisible: ($(this).attr("data-rail-visible") == "1" ? true : false),
            disableFadeOut: true
        });
    });
};      // function to Handel Slim Scroll
    
function handelSelect2() {

    if (!jQuery().select2) {
        return;
    }

    $('.select2').select2({minimumResultsForSearch: -1});

    $('.select2Search').select2();
    
    $('.select2tags').select2({
        multiple: true,
        tags:["India", "Japan", "Australia","Singapore"]
    });
};         //  Function to handel  Sclect2

function handelTagInput() {
    if (!jQuery().tagsinput) {
        return;
    }

    $('.tags-labeld').tagsinput({
        tagClass: function(item) {
            switch (item.continent) {
                case 'Europe'   :
                    return 'label label-primary';
                case 'America'  :
                    return 'label label-danger label-important';
                case 'Australia':
                    return 'label label-success';
                case 'Africa'   :
                    return 'label label-default';
                case 'Asia'     :
                    return 'label label-warning';
            }
        },
        itemValue: 'value',
        itemText: 'text'
    });
    $('.tags-labeld').tagsinput('add', {"value": 1, "text": "Amsterdam", "continent": "Europe"});
    $('.tags-labeld').tagsinput('add', {"value": 4, "text": "Washington", "continent": "America"});
    $('.tags-labeld').tagsinput('add', {"value": 7, "text": "Sydney", "continent": "Australia"});
    $('.tags-labeld').tagsinput('add', {"value": 10, "text": "Beijing", "continent": "Asia"});
    $('.tags-labeld').tagsinput('add', {"value": 13, "text": "Cairo", "continent": "Africa"});


};      //  Function to handel Tags

function handleDateRangePickers() {
    if (!jQuery().daterangepicker) {
        return;
    }

    $('#defaultrange').daterangepicker();

    $('#reportrange').daterangepicker({
        opens: 'right',
        startDate: moment().subtract('days', 29),
        endDate: moment(),
        minDate: '01/01/2014',
        maxDate: '12/31/2024',
        dateLimit: {
            days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Last 7 Days': [moment().subtract('days', 6), moment()],
            'Last 30 Days': [moment().subtract('days', 29), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        buttonClasses: ['btn'],
        applyClass: 'btn-success',
        cancelClass: 'btn-default',
        format: 'YYYY/MM/DD',
        separator: ' to ',
        locale: {
            applyLabel: 'Apply',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom Range',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
    },
    function(start, end) {
        console.log("Callback has been called!");
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    );
    //Set the initial state of the picker label
    $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));


    $('#reportrange-top').daterangepicker({
        opens: 'left',
        startDate: moment().subtract('days', 29),
        endDate: moment(),
        minDate: '01/01/2014',
        maxDate: '12/31/2024',
        dateLimit: {
            days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Last 7 Days': [moment().subtract('days', 6), moment()],
        },
        buttonClasses: ['btn'],
        applyClass: 'btn-success',
        cancelClass: 'btn-default',
        format: 'YYYY/MM/DD/',
        separator: ' to ',
        locale: {
            applyLabel: 'Apply',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom Range',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
    },
    function(start, end) {
        $('#reportrange-top span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    );
    //Set the initial state of the picker label
    $('#reportrange-top span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

};  //Date Range Picker
    
function handleDatePickers() {
    if (!jQuery().datepicker) {
        return;
    }

    $('.date-picker').datepicker({
        autoclose: true,
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });

    $('#sandbox-container .input-group.date-picker').datepicker();
};
    /*
function handleTimePicker() {
    if (!jQuery().timepicker) {
        return;
    }
   $('.timepicker').timepicker();
};      //  Function to handle TimePicker
    
function handleClockface() {
    if (!jQuery().clockface) {
        return;
    }
   $('.clockface').clockface();
};      //  Function to handle TimePicker

function handelRatty () {
    if (!jQuery().raty) {
        return;
    }
        
    $(".raty").each(function() {
        $(this).raty({
            number: $(this).attr("data-number"),
            score: $(this).attr("data-score"),
            size: $(this).attr("data-size"),
            readOnly: ($(this).attr("data-readOnly") == "1" ? true : false),
            half: ($(this).attr("data-half") == "1" ? true : false)
        });
    });
};      // function to Handel Slim Scroll

function handleSummernote() {
    if (!jQuery().summernote) {
        return;
    }

    $('.summernote').summernote({
        height: 150 //set editable area's height
    });
};   // summernote Text Editor

function handelTouchSpin() {
    if (!jQuery().TouchSpin) {
        return;
    }

    $(".touchSpin").each(function() {
        $(this).TouchSpin({
            min: $(this).attr("data-min"),
            max: $(this).attr("data-max"),
            prefix: $(this).attr("data-prefix"),
            postfix: $(this).attr("data-postfix"),
            stepinterval: $(this).attr("data-stepinterval"),
            maxboostedstep: $(this).attr("data-maxboostedstep"),
            mousewheel: ($(this).attr("data-mousewheel") == "1" ? true : false),
            buttondown_class: $(this).attr("data-buttondown_class"),
            buttonup_class: $(this).attr("data-buttonup_class")
        });
    });
        
};      // function to Handel Slim Scroll
*/
function handelTooltip() {        
        jQuery('.bs-tooltip').tooltip();
                
};        //  function to Handel Bootstrap Tooltip

function handelPopovers() {
       jQuery('.popovers').popover();
};         //  Function to handel  Popovers

function handelResponsivePagination() {

    if (!jQuery().rPage) {
        return;
    }

    $(".rPage").rPage();        

};  // Responsive Pagination

function handleScrollToTop() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function() {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
};   //  scroll to top of the page

    