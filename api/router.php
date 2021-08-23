<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require_once('vendor/autoload.php');
//
// use \RouterOS\Client;
// use \RouterOS\Query;
//
// $client = new Client(array(
//     'host' => '172.17.40.1',
//     'user' => 'Administrator',
//     'pass' => 'Sanae4@2020',
//     'port' => 8728,
//     'ssl' => true,
//     'ssh_port'    => 22,
//     'ssh_timeout' => 60,
// ));
// echo $client->host; die();
//
// // Execute export command via ssh
// $response = $client->query('/export');
// // or
// $response = $client->export();
//
// var_dump($response);

require_once('routeros_api.class.php');
$ipRouteros = "172.17.20.10"; //ip router
$Username="Administrator"; //username
$Pass="Sanae4@2020"; //password
$api_port=8729;
$ARRAY = array();
    $API = new RouterosAPI();
    $API->debug = false;
    if ($API->connect($ipRouteros , $Username , $Pass, $api_port)) {
        $rows = array(); $rows2 = array();
           $API->write("/interface/monitor-traffic",false);
           $API->write("=interface=ether1",false); //change / ubah / ganti
           $API->write("=once=",true);
           $READ = $API->read(false);
           $ARRAY = $API->ParseResponse($READ);
            if(count($ARRAY)>0){

              echo json_encode(array(
                "rx" => number_format($ARRAY[0]["rx-bits-per-second"]/1024,1),
                "tx" => number_format($ARRAY[0]["tx-bits-per-second"]/1024,1)
              ));
                // $rx = number_format($ARRAY[0]["rx-bits-per-second"]/1024,1);
                // $tx = number_format($ARRAY[0]["tx-bits-per-second"]/1024,1);
                // $rows['name'] = 'Tx';
                // $rows['data'][] = $tx;
                // $rows2['name'] = 'Rx';
                // $rows2['data'][] = $rx;
            }else{
                // echo $ARRAY['!trap'][0]['message'];

            }
    }else{
        echo "";
    }
    $API->disconnect();

    // $result = array();
    // array_push($result,$rows);
    // array_push($result,$rows2);
    //print_r($result);
    // print json_encode($result, JSON_NUMERIC_CHECK);



?>
