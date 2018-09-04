<?php 
require_once(APPPATH. "../reportico/reportico.php");        // Include Reportico

$q = new reportico();                         // Create instance
$q->access_mode = "ONEREPORT";                // Allows access to single specified report
$q->initial_execute_mode = "PREPARE";         // Starts user in report criteria selection mode
$q->reportico_ajax_mode = true;
$q->allow_debug = true;
$q->initial_project = "officers";            // Name of report project folder    
$q->initial_report = "officers";           // Name of report to run
$q->bootstrap_styles = "3";                   // Set to "3" for bootstrap v3, "2" for V2 or false for no bootstrap
$q->force_reportico_mini_maintains = true;    // Often required
$q->embedded_report = true;
$q->bootstrap_preloaded = false;               // true if you dont need Reportico to load its own bootstrap
$q->clear_reportico_session = true;           // Normally required
$q->execute();  


$q->access_mode = "REPORTOUTPUT";             // Allows access to report output only
$q->initial_execute_mode = "EXECUTE";         // Just executes specified report
$q->initial_project = "officers";         // Name of report project folder    
$q->initial_report = "officers";           // Name of report to run
$q->bootstrap_styles = "3";                   // Set to "3" for bootstrap v3, "2" for V2 or false for no bootstrap
$q->force_reportico_mini_maintains = true;    // Often required
$q->bootstrap_preloaded = false;               // true if you dont need Reportico to load its own bootstrap
$q->clear_reportico_session = true;           // Normally required
$q->execute(); 
    
?>