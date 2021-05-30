// YR LINK: https://api.met.no/weatherapi/locationforecast/2.0/complete?lat=-71.6703&lon=-2.8377&altitude=850
$(document).ready(function(){
  let equal_dates = function(dt1, dt2){
     if (dt1 > dt2) return false;
     else if (dt1 < dt2) return false;
     else return true;
  }
  const lat = '-71.6703';
  const lon = '-2.8377';
  const altitude = '850';
  const weatherLocation = 'SANAE IV, Antarctica';

//   var dt = new Date();
//   dt.setHours( dt.getHours() + 2 );    
//   // document.write( dt );
//   console.log(dt);
//   if ('caches' in window) {
//     //const newCache = await caches.open('new-cache');
//   }

  $.ajax({
    //url: 'https://api.met.no/weatherapi/locationforecast/2.0/compact?lat='+lat+'&lon='+lon+'&altitude='+altitude,
    url: '../js/forecast.json',
    type: 'GET',
    dataType: 'json',
    success: function(data){
      const days = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      const shortDays = ['Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
      let current_dt = new Date(data.properties.meta.updated_at);
      let nextDay_dt = new Date(current_dt);
      nextDay_dt.setUTCDate(nextDay_dt.getUTCDate() + 1);
      nextDay_dt.setUTCHours(12,0,0,0);
      let timeseries_dt = new Date(data.properties.timeseries[0].time);
      //set current weather forecast
      $('#dayOfWeek').text(days[timeseries_dt.getUTCDay()]);
      $('#weather-date').text(timeseries_dt.getUTCDate() + ' ' +timeseries_dt.toLocaleString('default', { month: 'long' }) + ' ' + timeseries_dt.getUTCFullYear());
      $('#air-temperature').html(data.properties.timeseries[0].data.instant.details.air_temperature+' <span class="symbol">°</span>C');
      //loop through time series for future firecasts
      let forecastCount = 0;
      const maxForecastCount = 7;
      $.each(data.properties.timeseries, function(index, timeseries){
        let datetime = new Date(timeseries.time);
        //get tomorrow 12h time
        //console.log(datetime.getUTCDate());
          if (equal_dates(nextDay_dt, datetime)) {
            $('#forecast-air-temperature-'+forecastCount).html(timeseries.data.instant.details.air_temperature+' <span class="symbol">°</span>C');
            $('#forecast-day-'+forecastCount).text(shortDays[datetime.getUTCDay()]);
            forecastCount++;

            console.log(timeseries.time);
            console.log(timeseries.data.instant.details);
            console.log(nextDay_dt);
            console.log(datetime);
            nextDay_dt.setUTCDate(nextDay_dt.getUTCDate() + 1);
            nextDay_dt.setUTCHours(12,0,0,0);
          }else {
            //console.log('not equal');
          }
      });
    },
    error: function(e){

    }
  });
});
