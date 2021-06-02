// YR LINK: https://api.met.no/weatherapi/locationforecast/2.0/complete?lat=-71.6703&lon=-2.8377&altitude=850
// https://services.swpc.noaa.gov/images/aurora-forecast-southern-hemisphere.jpg
//https://services.swpc.noaa.gov/text/daily-geomagnetic-indices.txt
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
      //display today's weather forecast
      $('#dayOfWeek').text(days[timeseries_dt.getUTCDay()]);
      $('#forecast-weather-date').text(timeseries_dt.getUTCDate() + ' ' +timeseries_dt.toLocaleString('default', { month: 'long' }) + ' ' + timeseries_dt.getUTCFullYear());
      $('#forecast-symbol')[0].src = location.origin+'/images/weathericon/png/'+data.properties.timeseries[0].data.next_1_hours.summary.symbol_code+'.png';
      $('#forecast-air-temperature').html(data.properties.timeseries[0].data.instant.details.air_temperature.toFixed(0)+' <span class="symbol">°</span>C');
      $('#forecast-wind-speed').html(data.properties.timeseries[0].data.instant.details.wind_speed.toFixed(0)+' m/s');
      $('#forecast-relative-humidity').html(data.properties.timeseries[0].data.instant.details.relative_humidity.toFixed(0)+' %');
      $('#forecast-wind-from-direction').html(data.properties.timeseries[0].data.instant.details.wind_from_direction.toFixed(0)+' <span class="symbol">°</span>');
      //loop through time series for future firecasts
      let forecastCount = 0;
      const maxForecastCount = 7;
      $.each(data.properties.timeseries, function(index, timeseries){
        let datetime = new Date(timeseries.time);
        //get tomorrow 12h time
          if (equal_dates(nextDay_dt, datetime) && forecastCount < maxForecastCount ) {
          //  display week forecast
            $('#forecast-day-'+forecastCount).text(shortDays[datetime.getUTCDay()]);
            $('#forecast-symbol-'+forecastCount)[0].src = location.origin+'/images/weathericon/png/'+timeseries.data.next_6_hours.summary.symbol_code+'.png';
            $('#forecast-air-temperature-'+forecastCount).html(timeseries.data.instant.details.air_temperature.toFixed(0)+' <span class="symbol">°</span>C');
            $('#forecast-wind-speed-'+forecastCount).html(timeseries.data.instant.details.wind_speed.toFixed(0)+' <span class="symbol">m/s</span>');
            $('#forecast-relative-humidity-'+forecastCount).html(timeseries.data.instant.details.relative_humidity.toFixed(0)+' <span class="symbol">%</span>');
            $('#forecast-wind-from-direction-'+forecastCount).html(timeseries.data.instant.details.wind_from_direction.toFixed(0)+' <span class="symbol">°</span>');
            forecastCount++;
            nextDay_dt.setUTCDate(nextDay_dt.getUTCDate() + 1);
            nextDay_dt.setUTCHours(12,0,0,0);
          }
      });
    },
    error: function(e){

    }
  });


  //kp index data

  $.ajax({
     url: '/api/',
     type: 'GET',
     dataType: 'json',
     data: {
       PlanetaryKp: true
     },
     success: function(data){
           if (data.length > 0){
              console.log(data);
              //plot kp 24h bar chart
            }
         },
     error: function(a, b, c){
         console.log(a);
     }
   });

});
