
var FormValidationTooltip = function (){
    
    var handelFormValidation = function() {
        $("#addMemberForm").validationEngine();
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


var FormValidationInline = function (){
    
    var handelFormValidation = function() {
        
        // validate signup form on keyup and submit
	$("#addMemberForm").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            
            rules: {
                nic: {
                    required: true,
                    pattern: /^([0-9]{9}[x|X|v|V])|([0-9]{12})$/
                },
                title: "required",
                fname: "required",
                lname: "required",
                dob: "required",
                ethnicity: "required",
                gender: "required",
                civil_st: "required",
                email: {
                        required: false,
                        email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                passwordc: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                url: {
                    required: true,
                    url: true
                },
                numbers: {
                    required: true,
                    digits: true
                },
                address1: "required",
                address2: "required"
            },
            
            messages: {
                fname: "Please enter your First Name",
                lname: "Please enter your Last Name",
                email: "Please enter Correct E-mail Address",
                password: "Please enter password",
                passwordc: "Please enter password",
                url: "Please enter valid URL",
                numbers: "Please enter Numbers only"

            }
	});
    };
    
    return {
        init: function() {
            handelFormValidation();
        }
        
    };
}();    // Handel Form Validation
