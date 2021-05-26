// YR LINK: https://api.met.no/weatherapi/locationforecast/2.0/complete?lat=-71.6703&lon=-2.8377&altitude=850
$(document).ready(function(){
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
    url: 'https://api.met.no/weatherapi/locationforecast/2.0/compact?lat='+lat+'&lon='+lon+'&altitude='+altitude,
    type: 'GET',
    dataType: 'json',
    success: function(data){
      const days = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      let current_dt = new Date(data.properties.meta.updated_at);
      let tomorrow_dt = new Date(current_dt);
      tomorrow_dt.setDate(tomorrow_dt.getDate() + 1);
      tomorrow_dt.setHours(12,0,0,0);
      let timeseries_dt = new Date(data.properties.timeseries[0].time);

      console.log(tomorrow_dt);
      //set current weather forecast
      $('#dayOfWeek').text(days[timeseries_dt.getDay()]);
      $('.weather-date').text(data.properties.timeseries[0].time);
      $('#air-temperature').text(data.properties.timeseries[0].data.instant.details.air_temperature);
      //loop through time series for future firecasts
      $.each(data.properties.timeseries, function(index, timeseries){
        let datetime = new Date(timeseries.time);
        //get tomorrow 12h time
          if (tomorrow_dt.getDate() === datetime.getDate()) {
            console.log(tomorrow_dt);
            console.log(datetime);
            console.log('dates are equal');
          }else {
            console.log('not equal');
          }
      });
    },
    error: function(e){

    }
  });
});
