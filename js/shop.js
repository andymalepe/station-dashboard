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
              $.each(inventory, function(index, inventoryItem){
                $('#store-items-list').append('<li class="list-group-item justify-content-between align-items-center" style="display: flex;">'+inventoryItem.food_inventory_description+'<span class="badge badge-primary badge-pill">'+inventoryItem.food_inventory_items_count+'</span></li>');
              });
            }
         },
     error: function(a, b, c){
         console.log(a);
     }
   });

   $('#fld-search').on('keyup', function() {
      var value = $('#fld-search').val().toLowerCase();
      $('#store-items-list li').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
   });

   $('#shop-basket').on('click', function(){
     // retrieve basket from memory
     // Allow user to update basket remove, increase qty
     $('#store-modal').modal('toggle');
   });

   $('#checkout-items').on('click', function(){
     $.ajax({
        url: '/inventory/',
        type: 'GET',
        dataType: 'json',
        data: {
          checkout: true,
          signoutUser: 1,
          IDs: [1, 2, 3],
          Qty: [1, 1, 1]
        },
        success: function(response){
              if (response){
                 console.log(response);
               }
            },
        error: function(a, b, c){
            console.log(a);
        }
      });
   });


});
