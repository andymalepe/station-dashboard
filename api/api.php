<?php

 require_once('database.php');

 if (isset($_GET['users']) && $_GET['users'] !== null) {
   if ($_GET['users'] == true) {
     $pdo = startPDO();
     $request = $pdo->query("SELECT * FROM signout_users WHERE signout_users.Overwinterer=1 ORDER BY Name ASC")->fetchAll();
     echo json_encode($request);
   }
 }

 if (isset($_GET['areas']) && $_GET['areas'] !== null) {
   if ($_GET['areas'] == true) {
     $pdo = startPDO();
     $request = $pdo->query("SELECT * FROM signout_areas ORDER BY Area ASC")->fetchAll();
     echo json_encode($request);
   }
 }

 if (isset($_GET['signedOutLog']) && $_GET['signedOutLog'] !== null) {
   if ($_GET['signedOutLog'] == true) {
     $pdo = startPDO();
     $request = $pdo->query("SELECT '' as Tickbox,
          signout_log.Id,
          signout_users.Name,
          signout_areas.Area,
          signout_log.OutTime,
          ROUND(((UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(signout_log.OutTime))/3600), 0) AS HoursOut,
          signout_log.SignedIn
        FROM signout_users
        INNER JOIN signout_log ON signout_users.Id=signout_log.UserId
        INNER JOIN signout_areas ON signout_areas.Id=signout_log.AreaId
        WHERE signout_log.SignedIn=0")->fetchAll();
      echo json_encode($request);
   }
 }

 if (isset($_GET['signOut']) && $_GET['signOut'] !== null) {
   if ($_GET['signOut'] && $_GET['AreaId'] && $_GET['UserId']) {
     $UserId = $_GET['UserId'];
     $AreaId = $_GET['AreaId'];
     $signedIn = 0;
     if ($AreaId > 0 && $UserId > 0) {
       $pdo = startPDO();
       $stmt = $pdo->prepare("INSERT INTO signout_log (UserId, AreaId, OutTime, SignedIn) VALUES (?,?,NOW(),?)");
        try {
            $pdo->beginTransaction();
            $stmt->execute(array($UserId, $AreaId, $signedIn));
            $pdo->commit();
            echo json_encode(true);
        }catch (Exception $e){
            $pdo->rollback();
            echo json_encode(false);
            throw $e;
        }
     }
   }
 }


 if (isset($_GET['signIn']) && $_GET['signIn'] !== null) {
   if (sizeof($_GET['LogIds']) > 0) {
     $LogIds = $_GET['LogIds'];
     $signedIn = 1;
     $pdo = startPDO();
     $stmt = $pdo->prepare("UPDATE signout_log SET SignedIn=?, InTime=NOW() WHERE Id=?");
      try {
          foreach ($LogIds as $key) {
            $pdo->beginTransaction();
            $stmt->execute(array($signedIn, intval($key)));
            $pdo->commit();
          }
          echo json_encode(200);
      }catch (Exception $e){
          $pdo->rollback();
          echo json_encode(500);
          throw $e;
      }
   }
 }

 if (isset($_GET['PlanetaryKp']) && $_GET['PlanetaryKp'] !== null) {
    // $url = 'https://services.swpc.noaa.gov/text/daily-geomagnetic-indices.txt';
    // $curl = curl_init();
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
    // curl_setopt($curl, CURLOPT_URL, $url);
    // $return = curl_exec($curl);
    // curl_close($curl);
    // // get last PlanetaryKp into array
    // echo json_encode($return);
//     $kp_ap_data = fopen('Kp_ap_Ap_SN_F107_format.txt', 'r');
//     $ftp_server = "ftp.example.com";
// $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
// $login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
//
// $local_file = "local.zip";
// $server_file = "server.zip";
//
// // download server file
// if (ftp_get($ftp_conn, $local_file, $server_file, FTP_ASCII))
//   {
//   echo "Successfully written to $local_file.";
//   }
// else
//   {
//   echo "Error downloading $server_file.";
//   }
//
// // close connection
// ftp_close($ftp_conn);

//end of file
    // $fp = fopen("Kp_ap_Ap_SN_F107_nowcast.txt");
    // fseek($fp, -1, SEEK_END);
    // $pos = ftell($fp);
    // $LastLine = "";
    // // Loop backword util "\n" is found.
    // while((($C = fgetc($fp)) != "\n") && ($pos > 0)) {
    //     $LastLine = $C.$LastLine;
    //     fseek($fp, $pos--);
    // }
    // fclose($fp);
 }

 // if (isset($_GET['cookingRoster']) && $_GET['cookingRoster'] !== null) {
 //   (isset($_GET['generateRoster']) && $_GET['generateRoster'] !== null) {
 //     // write into roster table for  the current month
 //   }
 //   //retrieve from the roster db table
 // }

?>
