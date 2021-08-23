
function loadYRshortForecast(){
  let equal_dates = function(dt1, dt2){
     if (dt1 > dt2) return false;
     else if (dt1 < dt2) return false;
     else return true;
  }
  const lat = '-71.6703';
  const lon = '-2.8377';
  const altitude = '850';
  const weatherLocation = 'SANAE IV, Antarctica';
  const knots = 1.94384;
//   var dt = new Date();
//   dt.setHours( dt.getHours() + 2 );    
//   // document.write( dt );
//   console.log(dt);
//   if ('caches' in window) {
//     //const newCache = await caches.open('new-cache');
//   }

  $.ajax({
    //url: 'https://api.met.no/weatherapi/locationforecast/2.0/compact?lat='+lat+'&lon='+lon+'&altitude='+altitude,
    url: '../data/forecast.json',
    type: 'GET',
    dataType: 'json',
    success: function(data){
      console.log(data);
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
      $('#forecast-air-temperature').html('Air Temperature: '+data.properties.timeseries[0].data.instant.details.air_temperature.toFixed(0)+' <span class="symbol">°</span>C');
      $('#forecast-wind-speed').html('Wind Speed: '+(data.properties.timeseries[0].data.instant.details.wind_speed*knots).toFixed(0)+' kt');
      $('#forecast-relative-humidity').html('Humidity: '+data.properties.timeseries[0].data.instant.details.relative_humidity.toFixed(0)+' %');
      $('#forecast-wind-from-direction').html('Wind Direction: '+data.properties.timeseries[0].data.instant.details.wind_from_direction.toFixed(0)+' <span class="symbol">°</span>');
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
            $('#forecast-wind-speed-'+forecastCount).html((timeseries.data.instant.details.wind_speed*knots).toFixed(0)+' <span class="symbol">kt</span>');
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
}

function loadModemBandwidth(){
  $.ajax({
    url: '/router/',
    type: 'GET',
    dataType: 'json',
    success: function(data){
      if (data) {
        $('#modem-rx').html('Download: ' + data.rx + ' Kbps');
        $('#modem-tx').html('Upload: ' + data.tx + ' Kbps');
      };
    }
  });
}

function loadWeatherForecastPlot(container_id){
  $.ajax({
    url: '../data/forecast.json',
    dataType: 'json',
    type: 'GET',
    success: function(data){
      let time = [];
      let air_pressure_at_sea_level = [];
      let air_temperature = [];
      let cloud_area_fraction = [];
      let relative_humidity = [];
      let wind_from_direction = [];
      let wind_speed = [];
      const knots = 1.94384;
      const maxHours = 48;
      let count = 0;
      $.each(data.properties.timeseries, function(index, series){
      //  if (count < maxHours) {
          time.push(series.time);
          air_pressure_at_sea_level.push(series.data.instant.details.air_pressure_at_sea_level);
          air_temperature.push(series.data.instant.details.air_temperature);
          cloud_area_fraction.push(series.data.instant.details.cloud_area_fraction);
          relative_humidity.push(series.data.instant.details.relative_humidity);
          wind_from_direction.push(series.data.instant.details.wind_from_direction);
          wind_speed.push((series.data.instant.details.wind_speed*knots).toFixed(1));
      //  }
        count++;
      });

      // console.log(time);

      var trace1 = {
        x: time,
        y: air_temperature,
        type: 'scatter',
        name: 'Air Temperature (°C)'
      };

      var trace2 = {
        x: time,
        y: wind_speed,
        type: 'scatter',
        name: 'Wind Speed (Kt)'
      };

      var data = [trace1, trace2];
      var layout = {
        title: {
          text:'Hourly Weather Forecast',
        },
        xaxis: {
          autorange: true,
          range: [time[0], time[time.length - 1]],
          rangeselector: {buttons: [
              {
                count: 1,
                label: '1 Day',
                step: 'day',
                stepmode: 'backward'
              },
              {
                count: 4,
                label: '4 Days',
                step: 'day',
                stepmode: 'backward'
              },
              {
                label:'All',
                step: 'all'
              }
            ]},
          rangeslider: {range: [time[0], time[time.length - 1]]},
          type: 'date'
        },
      };

      Plotly.newPlot(container_id, data, layout);
    }
  });
}
