$(document).ready(function() {
  $('li.nav-item.active').removeClass('active');
  $('#store').addClass('active');
  $.ajax({
     url: '/inventory/',
     type: 'GET',
     dataType: 'json',
     data: {
       inventory: true
     },
     success: function(inventory){
           if (inventory.length > 0){
              //console.log(data);
              $.each(inventory, function(index, inventoryItem){
                $('#store-items-list').append('<li class="list-group-item d-flex justify-content-between align-items-center">'+inventoryItem.food_inventory_description+'<span class="badge badge-primary badge-pill">'+inventoryItem.food_inventory_items_count+'</span></li>');
              });
            }
         },
     error: function(a, b, c){
         console.log(a);
     }
   });
});
