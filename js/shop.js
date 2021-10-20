$(document).ready(function() {
  localStorage.clear();
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
                  <input type="text" id="inventory-item-description-'+inventoryItem.food_inventory_id+'" value="'+inventoryItem.food_inventory_description+'" hidden> \
                </li>');
              });

              // add to cart functionality
              $('#store-items-list li').on('click', function(){
                $('#store-item-name').html($('#inventory-item-description-'+$(this).data().id).val());
                $('#store-item-stock').html('In Stock: ' + $(this).data().count);
                $('#store-item-id').val($(this).data().id);
                ($(this).data().g !=0 ) ? $('#store-item-grams').html($(this).data().g + ' g') : $('#store-item-grams').hide();
                ($(this).data().ml !=0 ) ? $('#sstore-item-ml').html($(this).data().ml + ' ml') : $('#store-item-ml').hide();
                $('.count').val(1);
                $('#add-to-checkout-items').show();
                $('#store-modal').modal('toggle');
              });

              $('#add-to-checkout-items').on('click', function(){
                let basket = JSON.parse(localStorage.getItem("basket") || "[]");
                let item = {
                    id: $('#store-item-id').val(),
                    qty: $('#store-item-qty').val(),
                    desc: $('#store-item-name').html()
                };
                basket.push(item);
                localStorage.setItem("basket", JSON.stringify(basket));
                $('#checkout-message').text('Successfully added item to basket');
                // setInterval(function(){ $('#checkout-message').text(''); }, 2000);
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
     $('#basket-store-modal').modal('toggle');
     let basket = JSON.parse(localStorage.getItem("basket") || "[]");
     $.each(basket, function(index, baskeItem){
       console.log(baskeItem.desc);
       $('#basket-store-items-list').append('\
       <tr>\
        <td>'+baskeItem.desc+'</td> \
        <td><span class="badge badge-primary badge-pill">'+baskeItem.qty+'</span></td>\
       </tr> \
       ');
      });
   });

   $('#checkout-items').on('click', function(){
     $('#basket-store-modal').modal('toggle');
   });

   $('#basket-checkout-items').on('click', function(){
     // retrieve basket from memory
     let basket = JSON.parse(localStorage.getItem("basket") || "[]");
     $.each(basket, function(index, baskeItem){

     });
     // $.ajax({
     //    url: '/inventory/',
     //    type: 'GET',
     //    dataType: 'json',
     //    data: {
     //      checkout: true,
     //      signoutUser: 1,
     //      IDs: [1, 2, 3],
     //      Qty: [1, 1, 1]
     //    },
     //    success: function(response){
     //          if (response){
     //             console.log(response);
     //           }
     //        },
     //    error: function(a, b, c){
     //        console.log(a);
     //    }
     //  });
   });

   $('.count').prop('disabled', true);
	 $(document).on('click','.plus',function(){
      $('.count').val(parseInt($('.count').val()) + 1 );
   });
   $(document).on('click','.minus',function(){
			$('.count').val(parseInt($('.count').val()) - 1 );
				if ($('.count').val() == 0) {
				$('.count').val(1);
			}
  	});

});
$(document).on('load', function(){

});
