SELECT food_inventory.food_inventory_description AS 'Description',food_category.food_category_name AS 'Category',food_inventory.food_inventory_grams AS 'grams',food_inventory.food_inventory_ml AS 'ml', COUNT(food_inventory.food_inventory_description) AS 'Quantity',food_checkout.food_checkout_datetime AS 'Checkout Datetime' FROM station.food_checkout 
INNER JOIN food_inventory ON food_inventory.food_inventory_id=food_checkout.food_checkout_inventory_id
INNER JOIN food_category ON food_category.food_category_id=food_inventory.food_inventory_category_id
WHERE food_checkout.food_checkout_datetime>='2021-10-01 00:00:00' AND food_checkout.food_checkout_datetime<='2021-11-30 23:59:59'
GROUP BY (food_inventory.food_inventory_description)
ORDER BY food_checkout.food_checkout_datetime ASC