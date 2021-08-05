<?php require_once('api/routeros_api.class.php'); ?>
<?php
$ipRouteros = "172.17.40.1"; //ip router
$Username="Administrator"; //username
$Pass="Sanae4@2020"; //password
$api_port=8728;
$ARRAY = array();
    $API = new RouterosAPI();
    $API->debug = true;
    if ($API->connect($ipRouteros , $Username , $Pass, $api_port)) {
        $rows = array(); $rows2 = array();
           $API->write("/interface/monitor-traffic",false);
           $API->write("=interface=ether1",false); //change / ubah / ganti
           $API->write("=once=",true);
           $READ = $API->read(false);
           $ARRAY = $API->ParseResponse($READ);
            if(count($ARRAY)>0){
              echo json_encode($ARRAY[0]);
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
        echo "<font color='#ff0000'>Oh my god, why ?</font>";
    }
    $API->disconnect();

    // $result = array();
    // array_push($result,$rows);
    // array_push($result,$rows2);
    //print_r($result);
    // print json_encode($result, JSON_NUMERIC_CHECK);

?>
