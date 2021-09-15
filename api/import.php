<?php

  require_once('database.php');

  //import single array of columns into food inventory table
  function importInventory($columns){
    $food_inventory_description = trim($columns[1]);
    $category_name = trim($columns[2]);
    $food_inventory_grams = intval($columns[3]);
    $food_inventory_ml = intval($columns[4]);
    $food_inventory_items_count = intval($columns[5]);

    $pdo = startPDO();
    $request = $pdo->prepare("SELECT food_category_id FROM station.food_category WHERE food_category_name=?");
    $request->execute(array($category_name));
    $result = $request->fetchAll(PDO::FETCH_ASSOC);

    $food_category_id = $result[0]['food_category_id'];

    $stmt = $pdo->prepare("INSERT INTO station.food_inventory ( food_inventory_description, food_inventory_category_id, food_inventory_grams, food_inventory_ml, food_inventory_items_count) VALUES (?,?,?,?,?)");
     try {
         $pdo->beginTransaction();
         $stmt->execute(array($food_inventory_description, $food_category_id, $food_inventory_grams, $food_inventory_ml, $food_inventory_items_count));
         $pdo->commit();
         print_r(array($pdo->lastInsertId(), $food_inventory_description, $food_category_id, $food_inventory_grams, $food_inventory_ml, $food_inventory_items_count));
         echo "\n";
     }catch (Exception $e){
         $pdo->rollback();
         print_r("Error importing data: ".$food_inventory_description."..");
         throw $e;
     }
  }

  // Open inventory file
  $file = fopen('march.csv', 'r');
  while(!feof($file)){
    $columnsArray = fgetcsv($file);
    importInventory($columnsArray);
  }

?>
