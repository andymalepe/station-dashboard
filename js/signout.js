$(document).ready(function() {


    // $('.selectpicker').selectpicker();
    $.ajax({
       url: 'api/api.php',
       type: 'GET',
       dataType: 'json',
       data: {
         users: true
       },
       success: function(users){
             if (users.length > 0){
                $.each(users, function(index, user){
                  $("#sel-sign-out-users").append('<option value="' + user.Id + '">' + user.Name + '</option>');
                });
              }
           },
       error: function(a, b, c){
           console.log(a);
       }
     });

     $.ajax({
        url: 'api/api.php',
        type: 'GET',
        dataType: 'json',
        data: {
          areas: true
        },
        success: function(areas){
              if (areas.length > 0){
                $.each(areas, function(index, area){
                  $("#sel-sign-out-areas").append('<option value="' + area.Id + '">' + area.Area + '</option>');
                });
               }
            },
        error: function(a, b, c){
            console.log(a);
        }
      });

      $.ajax({
         url: 'api/api.php',
         type: 'GET',
         dataType: 'json',
         data: {
           signedOutLog: true
         },
         success: function(data){
               if (data.length > 0){
                  console.log(data);
                  $('#tbl-signed-out-user-areas').DataTable({
                      data: data,
                      columns: [
                        {'data':'Id', 'title': 'Id'},
                        {'data':'Name', 'title': 'Name'},
                        {'data':'Area', 'title': 'Area'},
                        {'data':'OutTime', 'title': 'Time'},
                        {'data':'HoursOut', 'title': 'Hours Outside'},
                        {'data':'SignedIn', 'title': 'Action'},
                      ],
                      select: {
                        style:    'os',
                        selector: 'td:first-child'
                      }
                    });
                }
             },
         error: function(a, b, c){
             console.log(a);
         }
       });

       $('#btn-user-area-sign-out').on('click', function(e){
         let UserId = $('#sel-sign-out-users').val();
         let AreaId = $('#sel-sign-out-areas').val();
         let valid = true;
         if (!(UserId > 0)) {
           alert('Select User');
           valid = false;
         }else if (!(AreaId > 0)) {
           alert('Select Area');
           valid = false;
         }
         if (valid) {
           $.ajax({
              url: 'api/api.php',
              type: 'GET',
              dataType: 'json',
              data: {
                signOut: true,
                UserId: UserId,
                AreaId: AreaId
              },
              success: function(data){
                    if (data){
                       alert ('Successfully signed out');
                     }
                  },
              error: function(a, b, c){
                  console.log(a);
              }
            });
         }
       });
} );
