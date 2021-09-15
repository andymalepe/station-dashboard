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
    // $.each($('#store-items-list li'), function(index, listItem){
    //   console.log($(listItem).text());
    //   if($(listItem).text().toLowerCase().indexOf(value) > -1){
    //     $(listItem).hide();
    //   }
    // })

    $('#store-items-list li').filter(function() {
      // console.log(this);
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      // console.log($(this).text().toLowerCase().indexOf(value));
    });

  });
//$(document).on('load', function(){

  // $('#fld-search').on('keyup', function() {
  //  var value = $('#fld-search').val().toLowerCase();
  //  $('#store-items-list li').filter(function() {
  //    console.log(this);
  //    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  //    console.log($(this).text().toLowerCase().indexOf(value));
  //  });
 //});
});
