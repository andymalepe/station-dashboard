<?php

   require_once('database.php');

   if ($_GET['inventory'] == true) {
     $pdo = startPDO();
     $request = $pdo->query("SELECT food_inventory.food_inventory_category_id,
        	food_category.food_category_name,
            food_inventory.food_inventory_description,
            food_inventory.food_inventory_grams,
            food_inventory.food_inventory_ml,
            food_inventory.food_inventory_items_count,
            food_inventory.food_inventory_expiry_dates
        FROM station.food_inventory
        INNER JOIN food_category
        ON food_category.food_category_id=food_inventory.food_inventory_category_id")->fetchAll();
      echo json_encode($request);
   }

?>
