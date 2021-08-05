$(document).ready(function(){
  $('li.nav-item.active').removeClass('active');
  $('#weather').addClass('active');
  loadYRshortForecast();
  loadWeatherForecastPlot('weather-plot');
  setInterval(function(){ location.reload(true); }, 60000);
});
