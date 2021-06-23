$(document).ready(function() {
  $('li.nav-item.active').removeClass('active');
  $('#signout').addClass('active');

    let rowData = [];
    let logTable = {};
    function signInUser(logData){
      if (logData.length > 0) {
        $.ajax({
           url: '/api/',
           type: 'GET',
           dataType: 'json',
           data: {
             signIn: true,
             LogIds: logData
           },
           success: function(response){
                 if (response == 200){
                   $('#standard-dashboard-modal-body').text('Successfully Signed In');
                   $('#standard-dashboard-modal').modal('toggle');
                 }else {
                   $('#standard-dashboard-modal-body').text('Unable to Sign In user. Please retry!');
                   $('#standard-dashboard-modal').modal('toggle');
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
                    location.reload();
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
           $('#standard-dashboard-modal-body').text('Select User');
           $('#standard-dashboard-modal').modal('toggle');
           valid = false;
         }else if (!(AreaId > 0)) {
           $('#standard-dashboard-modal-body').text('Select Area');
           $('#standard-dashboard-modal').modal('toggle');
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
                      $('#standard-dashboard-modal-body').text('Successfully Signed Out');
                      $('#standard-dashboard-modal').modal('toggle');
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
           if (rowData.length > 0) {
              let rowIds = rowData.map(function (row) {
                return row.Id;
              });
              let result = signInUser(rowIds);
           }else {
             $('#standard-dashboard-modal-body').text('Please select user to Sign In');
             $('#standard-dashboard-modal').modal('toggle');
           }
       });
       $(document).on('hide.bs.modal','#standard-dashboard-modal', function () {
          location.reload()
        });

} );
