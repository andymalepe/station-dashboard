$(document).ready(function(){
    $('#btnAdminLoginCancel').on('click', function(e){

    });

    const store = {};
    const loginButton = document.querySelector('#loginForm');
    // const btnGetResource = document.querySelector('#btnGetResource');
    const form = document.forms[0];

    // Inserts the jwt to the store object
    store.setJWT = function (data) {
      this.JWT = data;
    };

    $('#btnAdminLogin').on('click', function(e){
      e.preventDefault();
      location.origin+'/admin/'
      //alert('login');
      console.log(form.loginFormEmailAddress.value);
      $.ajax({
         url: '/authenticate/',
         type: 'POST',
         dataType: 'json',
         data: {
           username: form.loginFormEmailAddress.value,
           password: form.loginFormPassword.value
         },
         success: function(response){
               if (response){
                  console.log(response);
                  // $('#store-message-modal-body').text('Basket successfully checked out.');
                  // $('#store-message-modal').modal('toggle');
                  // localStorage.clear();
                }
             },
         error: function(a, b, c){
           // $('#store-message-modal-body').text('Error connecting to database. Please retry.');
           // $('#store-message-modal').modal('toggle');
         }
       });
    });
    // loginButton.addEventListener('submit', async (e) => {
    //   // e.preventDefault();
    //   $.ajax({
    //      url: '/authenticate/',
    //      type: 'POST',
    //      dataType: 'json',
    //      data: {
    //        username: form.loginFormEmailAddress.value,
    //        password: form.loginFormPassword.value
    //      },
    //      success: function(response){
    //            if (response){
    //               console.log(response);
    //               // $('#store-message-modal-body').text('Basket successfully checked out.');
    //               // $('#store-message-modal').modal('toggle');
    //               // localStorage.clear();
    //             }
    //          },
    //      error: function(a, b, c){
    //        // $('#store-message-modal-body').text('Error connecting to database. Please retry.');
    //        // $('#store-message-modal').modal('toggle');
    //      }
    //    });
    //
    //   // const res = await fetch('/authenticate/', {
    //   //   method: 'POST',
    //   //   headers: {
    //   //     'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
    //   //   },
    //   //   body: JSON.stringify({
    //   //     username: form.loginFormEmailAddress.value,
    //   //     password: form.loginFormPassword.value
    //   //   })
    //   // });
    //   // //
    //   // if (res.status >= 200 && res.status <= 299) {
    //   //   const jwt = await res.text();
    //   //   store.setJWT(jwt);
    //   //   loginForm.style.display = 'none';
    //   //   // btnGetResource.style.display = 'block';
    //   // } else {
    //   //   // Handle errors
    //   //   console.log(res.status, res.statusText);
    //   // }
    // });

    // btnGetResource.addEventListener('click', async (e) => {
    //   const res = await fetch('/resource/', {
    //     headers: {
    //       'Authorization': `Bearer ${store.JWT}`
    //     }
    //   });
    //   const timeStamp = await res.text();
    //   console.log(timeStamp);
    // });
});
