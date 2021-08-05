// YR LINK: https://api.met.no/weatherapi/locationforecast/2.0/complete?lat=-71.6703&lon=-2.8377&altitude=850
// https://services.swpc.noaa.gov/images/aurora-forecast-southern-hemisphere.jpg
//https://services.swpc.noaa.gov/text/daily-geomagnetic-indices.txt
$(document).ready(function(){
  $('li.nav-item.active').removeClass('active');
  $('#home').addClass('active');
  loadYRshortForecast();
  loadModemBandwidth();
  setInterval(function(){ location.reload(true); }, 60000);
  $.ajax({
    url: '../data/ZAR_USD.json',
    type: 'GET',
    dataType: 'json',
    success: function(data){
      $('#ZAR_USD').html('1 USD: ' + (1/data.ZAR_USD).toFixed(2)+' ZAR');
    }
  });
  $.ajax({
    url: '../data/ZAR_EUR.json',
    type: 'GET',
    dataType: 'json',
    success: function(data){
      $('#ZAR_EUR').html('1 EUR: ' + (1/data.ZAR_EUR).toFixed(2)+ ' ZAR');
    }
  });
  $.ajax({
    url: '../data/USD_BTC.json',
    type: 'GET',
    dataType: 'json',
    success: function(data){
      $('#USD_BTC').html('1 BTC: ' + (1/data.USD_BTC).toFixed(2)+ ' USD');
    }
  });

  setInterval(function(){
    loadModemBandwidth()
  }, 10000);
});
