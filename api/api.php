<?php
 require_once('../config.php');

 function startPDO(){
    $options = [
       \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
       \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
       \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";charset=".CHARSET;
    try {
        $pdo = new \PDO($dsn, DB_USER, DB_PASSWORD, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $pdo;
 }

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
            $stmt->execute([$UserId, $AreaId, $signedIn]);
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
            $stmt->execute([$signedIn, intval($key)]);
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

?>
