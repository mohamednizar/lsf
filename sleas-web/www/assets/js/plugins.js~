
var addStaffForm = function (){
    
    var handelFormValidation = function() {
        $("#addStaffForm").validationEngine();
    };
    
    return {
        init: function() {
            handelFormValidation();
        }
        
    };
}();    // Handel Form Validation
var DataTabels = function (){
    
    var handelDynamicTables = function() {
        var oTable = $('.DynamicTable').dataTable({
            "aoColumnDefs": [{
                    "aTargets": [0]
                }],
            "oLanguage": {
                "sLengthMenu": "_MENU_ Rows",
                "sSearch": ""                
            },
            "aaSorting": [
                [0, 'asc']
            ],
            "aLengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 5
        });
        
        $('.dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        // modify table search input
        $('.dataTables_length select').addClass("m-wrap small");
        // modify table per page dropdown
        $('.dataTables_length select').select2({minimumResultsForSearch: -1 });
        
    };
    
    return {
        init: function() {
            handelDynamicTables();
        }
        
    }
}();    // Dynamic Data Tabels
