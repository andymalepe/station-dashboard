<?php

   require_once('database.php');
   
   if ($_GET['export'] == true && $_GET['consumption'] == true) {
        $pdo = startPDO();
        $startdate = $_GET['startdate'];
        $enddate = $_GET['enddate'];
        $request = $pdo->prepare("SELECT food_checkout.food_checkout_inventory_id,
            food_inventory.food_inventory_description,
            food_category.food_category_name,
            food_inventory.food_inventory_grams,
            food_inventory.food_inventory_ml,
            food_checkout.food_checkout_datetime 
        FROM station.food_checkout 
        INNER JOIN food_inventory ON food_inventory.food_inventory_id=food_checkout.food_checkout_inventory_id
        INNER JOIN food_category ON food_category.food_category_id=food_inventory.food_inventory_category_id 
        WHERE food_checkout_datetime>=? AND food_checkout_datetime<=?;");
        $request->execute(array($startdate, $enddate));
        $exportResult = $request->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($exportResult);
   }
   if ($_GET['export'] == true && $_GET['inventory'] == true) {
    $pdo = startPDO();
    $request = $pdo->query("SELECT * FROM station.food_inventory;");
    $exportResult = $request->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($exportResult);
}

 
   

?>
