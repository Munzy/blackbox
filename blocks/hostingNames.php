<?php


$list = file_get_contents('./hosting.csv');
$list = explode(PHP_EOL, $list);
$hosting = array();
foreach($list as $item){

    $item = explode(',', $item);

    $item[0] = str_replace('"', '', $item[0]);
    
    if(!isset(item[2]){
    
      $item[2] = null;
      
    }

    if(is_numeric($item[0])){

        $hosting[$item[0]] = array(

            'asn' => $item[0],
            'name' => asName($item[0]),
            'comment => $item[2]
    
        );
    

    }

}

ksort($hosting);

foreach($hosting as $host){
  
  echo $host['asn'] . ',"' . $host['name'] . '","' . $host['comment'] . '"' . PHP_EOL;

}

function asName($asn){
  
  $data = json_decode(file_get_contents('https://asn.ipinfo.app/api/json/details/' . $asn), true);
  
  return $data['name'];

}

