<?php

/**
 * Get header Authorization
 * */
function getAuthorizationHeader()
{
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
        $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
    } elseif (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
        $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
        //print_r($requestHeaders);
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }
    return $headers;
}

/**
 * get access token from header
 * */
function getBearerToken()
{
    $headers = getAuthorizationHeader();
// HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}

function getPerameter($peram = null){
    return xss_clean($_REQUEST[$peram]);
}


/* This function will return the name string of the function that called $function. To return the
    caller of your function, either call get_caller(), or get_caller(__FUNCTION__).
*/
function get_caller($function = NULL, $use_stack = NULL) {
    if ( is_array($use_stack) ) {
        // If a function stack has been provided, used that.
        $stack = $use_stack;
    } else {
        // Otherwise create a fresh one.
        $stack = debug_backtrace();
        // echo "\nPrintout of Function Stack: \n\n";
        // print_r($stack);
        // echo "\n";
    }

    if ($function == NULL) {
        // We need $function to be a function name to retrieve its caller. If it is omitted, then
        // we need to first find what function called get_caller(), and substitute that as the
        // default $function. Remember that invoking get_caller() recursively will add another
        // instance of it to the function stack, so tell get_caller() to use the current stack.
        $function = get_caller(__FUNCTION__, $stack);
    }

    if ( is_string($function) && $function != "" ) {
        // If we are given a function name as a string, go through the function stack and find
        // it's caller.
        for ($i = 0; $i < count($stack); $i++) {
            $curr_function = $stack[$i];
            // Make sure that a caller exists, a function being called within the main script
            // won't have a caller.
            if ( $curr_function["function"] == $function && ($i + 1) < count($stack) ) {
                return $stack[$i + 1]["function"];
            }
        }
    }

    // At this stage, no caller has been found, bummer.
    return "";
}


function processInput($uri){        
    $uri = implode('/', 
        array_slice(
            explode('/', $_SERVER['REQUEST_URI']), 3));         

        return $uri;    
}

function processOutput($data = null,$message){
    $respose = [
        "data"=> $data,
        "message"=> $message
    ];
    echo (json_encode($respose));    
}



function log_message($type,$message){
    $errBase = 'Log/error/';
    if (!file_exists($errBase)) {
        mkdir($errBase, 0777, true);
    }
    $newfile = 'Log/error/'.date("Y-m-d");
    switch($type){
        case ('error'):
            $myfile = fopen($newfile, !file_exists($newfile) ? 'w':'a');
            fwrite($myfile, $message ."\n");
            fclose($myfile);
            // error_log($message, 3, $fh) or die("Can't create file");

    }
}
function jsonDecode($json, $assoc = false)
{
    $ret = json_decode($json, $assoc);
    if ($error = json_last_error())
    {
        $errorReference = [
            JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded.',
            JSON_ERROR_STATE_MISMATCH => 'Invalid or malformed JSON.',
            JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded.',
            JSON_ERROR_SYNTAX => 'Syntax error.',
            JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded.',
            JSON_ERROR_RECURSION => 'One or more recursive references in the value to be encoded.',
            JSON_ERROR_INF_OR_NAN => 'One or more NAN or INF values in the value to be encoded.',
            JSON_ERROR_UNSUPPORTED_TYPE => 'A value of a type that cannot be encoded was given.',
        ];
        $errStr = isset($errorReference[$error]) ? $errorReference[$error] : "Unknown error ($error)";
        throw new \Exception("JSON decode error ($error): $errStr");
    }
    return $ret;
}
