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

