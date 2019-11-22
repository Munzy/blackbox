<?php

function blackBox($ip){

    // Get file.
    $url = 'https://blackbox.ipinfo.app/lookup/';
    $res = file_get_contents($url . $ip);

    // Check to make sure we have a valid response.
    if(!is_string($res) || !strpos($http_response_header[0], "200")){
        // We didn't get what we were looking for.
        //http_response_code(503);
        exit("We didn't get what we were looking for.");
    }

    // Is found to be proxy in result, return !
    if($res !== null && $res === 'Y'){
       return true;
    }

    // return result
    return false;
    
}


// Examples

// if(blackBox($ip)){
// echo "Proxy Found";
// }
