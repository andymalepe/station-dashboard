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
        FROM food_inventory
        INNER JOIN food_category
        ON food_category.food_category_id=food_inventory.food_inventory_category_id")->fetchAll();
      echo json_encode($request);
   }
   if ($_GET['checkout'] == true) {
     $IDs = $_GET['IDs'];
     $quantities = $_GET['Qty'];
     $signoutUser = intval($_GET['signoutUser']);
     $update = false;
     $updateResult = array();
     $success = array();
     if (is_array($IDs) && is_array($quantities) && sizeof($IDs)>0 && sizeof($quantities)>0 && $signoutUser>0) {
       $pdo = startPDO();
       foreach ($IDs as $key => $food_inventory_id) {
         //subtract item from count
         //make entry in inventory checkout
         $stmt = $pdo->prepare("UPDATE food_inventory
              SET food_inventory.food_inventory_items_count = food_inventory.food_inventory_items_count-1
              WHERE food_inventory.food_inventory_id = ?");
          try {
              $pdo->beginTransaction();
              $stmt->execute(array(intval($food_inventory_id)));
              $pdo->commit();
              $update = true;
              array_push($updateResult, array($food_inventory_id => true ));
          }catch (Exception $e){
              $pdo->rollback();
              $update = false;
              array_push($updateResult, array($food_inventory_id => false ));
              throw $e;
          }
          if ($update) {
            try {
              $stmt = $pdo->prepare("INSERT INTO food_checkout(
                  food_checkout.food_checkout_inventory_id,
                  food_checkout.food_checkout_user_id )
                VALUES (?, ?) ");
              $pdo->beginTransaction();
              $stmt->execute(array(intval($food_inventory_id), intval($signoutUser)));
              $pdo->commit();
              array_push($success, array($food_inventory_id => true ));
            } catch (Exception $e) {
              $pdo->rollback();
              $update = false;
              array_push($success, array($food_inventory_id => false ));
              throw $e;
            }
          }
       }
       echo json_encode(array($updateResult, $success));
     }
   }

?>
