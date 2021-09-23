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
                //display item id and hide it
                $('#store-items-list').append('\
                <li \
                  class="list-group-item justify-content-between align-items-center" \
                  style="display: flex;" \
                  data-id='+inventoryItem.food_inventory_id+
                  ' data-g='+inventoryItem.food_inventory_grams+
                  ' data-ml='+inventoryItem.food_inventory_ml+
                  ' data-count='+inventoryItem.food_inventory_items_count+'>'+
                  inventoryItem.food_inventory_description+
                  '<span class="badge badge-primary badge-pill">'+
                    inventoryItem.food_inventory_items_count+
                  '</span> \
                </li>');
              });

              // add to cart functionality
              $('#store-items-list li').on('click', function(){
                $('#store-modal-body').html($(this)[0].outerText+'<br>'+
                  $(this).data().g+' grams<br>'+
                  $(this).data().ml+' ml<br>'+
                  'In stock: '+$(this).data().count);
                $('#add-to-checkout-items').show();
                $('#store-modal').modal('toggle');
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
     // retrieve basket from memory

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
