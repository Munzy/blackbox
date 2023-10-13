<?php


function asName($asn){
  
  $data = json_decode(@file_get_contents('https://asn.ipinfo.app/api/json/details/' . $asn), true);
  
  return $data['name'];

}

$list = file_get_contents('./raw.txt');
$list = explode(PHP_EOL, $list);
$proxy = array();
foreach($list as $item){

    $item = explode(',', $item);

    $item[0] = str_replace('"', '', $item[0]);
    if(!isset($item[2])){
    
      $item[2] = null;
      
    }

    $item[2] = str_replace('"', '', $item[2]);
    $item[2] = str_replace(PHP_EOL, '', $item[2]);
    if(is_numeric($item[0])){

        $proxy[$item[0]] = array(

            'asn' => $item[0],
            'name' => asName($item[0]),
            'comment' => $item[2]
    
        );
    

    }

}

ksort($proxy);

unlink('./proxy.csv');
$output = fopen('./proxy.csv', 'w');

fputcsv($output, array('ASN', 'Name'));

foreach($proxy as $host){

  fputcsv($output, array($host['asn'], $host['name']));

}
