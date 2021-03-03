$(document).ready(function() {

    let rowData = [];
    let logTable = {};
    function signInUser(logData){
      console.log(logData.Area);
      console.log(logData.Id);
      if (parseInt(logData.Id) > 0) {
        $.ajax({
           url: '/api/',
           type: 'GET',
           dataType: 'json',
           data: {
             signIn: true,
             LogId: logData.Id
           },
           success: function(response){
                 if (response == 200){
                   return response;
                 }else {
                   return 400;
                 }
               },
           error: function(a, b, c){
               console.log(a);
           }
         });
      }
    }

    function loadTableSignOutUsers(tableId, tableData){
      let tblSignedOutUserAreas = $(tableId).DataTable({
          data: tableData,
          columns: [
            {'data':'Tickbox', 'title': ''},
            {'data':'Id', 'title': 'Id'},
            {'data':'Name', 'title': 'Name'},
            {'data':'Area', 'title': 'Area'},
            {'data':'OutTime', 'title': 'Time'},
            {'data':'HoursOut', 'title': 'Hours Outside'},
            {'data':'SignedIn', 'title': 'Action'},
          ],
          columnDefs: [ {
          orderable: false,
          className: 'select-checkbox',
          targets:   0
          },{
                "targets": [ 1,6 ],
                "visible": false
            } ],
          select: {
              style:    'os',
              selector: 'td:first-child'
          },
          order: [[ 1, 'asc' ]],
          dom: 'Bfrtip',
          buttons: [
              'selectAll',
              'selectNone',
                {
                text: 'Reload',
                action: function ( e, dt, node, config ) {
                    console.log(config);
                }
            }
          ],
      });
      if(tblSignedOutUserAreas){
        return tblSignedOutUserAreas;
      }else {
        return null;
      }
    }


    $.ajax({
       url: '/api/',
       type: 'GET',
       dataType: 'json',
       data: {
         signedOutLog: true
       },
       success: function(data){
             if (data.length > 0){
                let tableId = '#tbl-signed-out-user-areas';
                logTable = loadTableSignOutUsers(tableId, data);
              }
           },
       error: function(a, b, c){
           console.log(a);
       }
     });


    $.ajax({
       url: '/api/',
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
        url: '/api/',
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
              url: '/api/',
              type: 'GET',
              dataType: 'json',
              data: {
                signOut: true,
                UserId: UserId,
                AreaId: AreaId
              },
              success: function(data){
                    if (data){
                      //$('#tbl-signed-out-user-areas').DataTable().ajax.reload();
                      $('#standard-dashboard-modal-body').text('Successfully signed out');
                      $('#standard-dashboard-modal').modal('toggle');
                       //alert ('Successfully signed out');
                     }
                  },
              error: function(a, b, c){
                  console.log(a);
              }
            });
         }
       });

       $('#btn-user-area-sign-in').on('click', function(e){
           let rowData = $('#tbl-signed-out-user-areas').DataTable().rows({selected: true}).data().toArray();
           console.log(rowData);
           let result = 200;
           if (rowData) {
              rowData.forEach((user, i) => {
                let response = signInUser(user);
                if (response == 200) {
                  result = 200;
                }else {
                  result = 400;
                }
              });
              if (result == 200 ) {
                  $('#standard-dashboard-modal-body').text('Successfully signed in');
                  $('#standard-dashboard-modal').modal('toggle');
              }else {
                $('#standard-dashboard-modal-body').text('Unable to sign in user. Please retry!');
                $('#standard-dashboard-modal').modal('toggle');
              }
           }
       });

} );
