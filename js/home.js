// YR LINK: https://api.met.no/weatherapi/locationforecast/2.0/complete?lat=-71.6703&lon=-2.8377&altitude=850
$(document).ready(function(){
  $.ajax({
    url: 'https://api.met.no/weatherapi/locationforecast/2.0/complete?lat=-71.6703&lon=-2.8377&altitude=850',
    type: 'GET',
    dataType: 'json',
    success: function(data){
      console.log(data);
    },
    error: function(e){

    }
  });
});
