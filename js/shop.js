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
                if($('#store-expiry-date').val() == ''){
                  $('#checkout-message').text('Please enter expiry date');
                  // setTimeout(function(){ $('#checkout-message').text(''); }, 2000);
                }else{
                  let basket = JSON.parse(localStorage.getItem("basket") || "[]");
                  let item = {
                      id: $('#store-item-id').val(),
                      qty: $('#store-item-qty').val(),
                      desc: $('#store-item-name').html(),
                      expiry: $('#store-expiry-date').val()
                  };
                  basket.push(item);
                  $('#shop-basket-count').text(basket.length);
                  localStorage.setItem("basket", JSON.stringify(basket));
                  $('#checkout-message').text('Successfully added item to basket');
                  setTimeout(function(){ $('#checkout-message').text(''); }, 2000);
                } 
              });
            }
         },
     error: function(a, b, c){
       $('#store-message-modal-body').text('Error retrieving inventory data. Please confirm that MySQL database server is running.');
       $('#store-message-modal').modal('toggle');
     }
   });

   $('#fld-search').on('keyup', function() {
      var value = $('#fld-search').val().toLowerCase();
      $('#store-items-list li').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
   });

   $('#shop-basket, #checkout-items').on('click', function(){
     // retrieve basket from memory
     // Allow user to update basket remove, increase qty
     let basket = JSON.parse(localStorage.getItem("basket") || "[]");
     console.log(basket.length);
     // $('#shop-basket-count').text(basket.length);
     if (basket.length > 0) {
       $('#basket-store-items-list-body').empty();
       $.each(basket, function(index, baskeItem){
         // console.log(baskeItem.desc);
         $('#basket-store-items-list-body').append('\
         <tr style="line-height: 0.6;">\
          <td><span name="basket-store-remove-item'+baskeItem.id+'" id="basket-store-remove-item'+baskeItem.id+'" class="badge badge-secondary badge-pill">X</span></td> \
          <td>'+baskeItem.desc+'</td> \
          <td>'+baskeItem.expiry+'</td> \
          <td><span class="badge badge-primary badge-pill">'+baskeItem.qty+'</span></td>\
         </tr> \
         ');
        });
        //remove item from cart
        $('[id^=basket-store-remove-item]').on('click', function(){
            console.log(this);
        });
        $('#basket-store-modal').modal('toggle');

     }else {
       $('#store-message-modal-body').text('Please add items to your basket.');
       $('#store-message-modal').modal('toggle');
     }

   });

   $('[name^=basket-store-remove-item]').on('click', function(){
     let basket = JSON.parse(localStorage.getItem("basket") || "[]");
     console.log(this);
     // $.each(basket, function(index, baskeItem){
     //   $('#basket-store-items-list').append('\
     //   <tr>\
     //    <td>'+baskeItem.desc+'</td> \
     //    <td><span class="badge badge-primary badge-pill">'+baskeItem.qty+'</span></td>\
     //   </tr> \
     //   ');
     //  });
     // $('#basket-store-modal').modal('toggle');
   });

   $('#basket-checkout-items').on('click', function(){
     // retrieve basket from memory
     let basket = JSON.parse(localStorage.getItem("basket") || "[]");

     if(basket.length > 0){
       let IDs = [];
       let Qty = [];
       let Expiry = [];
       $.each(basket, function(index, baskeItem){
         IDs.push(baskeItem.id);
         Qty.push(baskeItem.qty);
         Expiry.push(baskeItem.expiry);
       });
       $.ajax({
          url: '/inventory/',
          type: 'GET',
          dataType: 'json',
          data: {
            checkout: true,
            signoutUser: 1,
            IDs: IDs,
            Qty: Qty,
            Expiry: Expiry
          },
          success: function(response){
                if (response){
                   // console.log(response);
                   $('#store-message-modal-body').text('Basket successfully checked out.');
                   $('#store-message-modal').modal('toggle');
                   localStorage.clear();
                 }
              },
          error: function(a, b, c){
            $('#store-message-modal-body').text('Error connecting to database. Please retry.');
            $('#store-message-modal').modal('toggle');
          }
        });
        // console.log(IDs);
        // console.log(Qty);
     }else {
       $('#store-message-modal-body').text('Please add items to your basket.');
       $('#store-message-modal').modal('toggle');
     }
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

    $('.datepicker').datepicker({
      format:'dd-mm-yyyy',
      autoclose: true
    });

    $('#store-expiry-date').on('changeDate', function(){
      if($('#store-expiry-date').val() != ''){
        $('#add-to-checkout-items').removeClass('disabled');
      }
    });
    

});
$(document).on('load', function(){

});
