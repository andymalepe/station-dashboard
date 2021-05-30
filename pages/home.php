<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once('../includes/header.php'); ?>
    <link rel="stylesheet" href="../lib/css/materialdesignicons.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>
  </head>
  <body>
    <?php require_once('../includes/navbar.php'); ?>
        <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-lg-8 grid-margin stretch-card">
                    <!--weather card-->
                    <!-- YR LINK: https://api.met.no/weatherapi/locationforecast/2.0/complete?lat=-71.6703&lon=-2.8377&altitude=850 -->
                    <div class="card card-weather">
                        <div class="card-body">
                            <div class="weather-date-location">
                                <h3 id="dayOfWeek">Friday</h3>
                                <p class="text-gray"> <span class="weather-date" id="weather-date"></span> <span class="weather-location">SANAE IV, Antarctica</span> </p>
                            </div>
                            <div class="weather-data d-flex">
                                <div class="mr-auto">
                                    <h4 class="display-3" id="air-temperature"> </h4>
                                    <p> Cloudy </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="d-flex weekly-weather">
                                <div class="weekly-weather-item">
                                    <p class="mb-0" id="forecast-day-0"> Sun </p> <i class="mdi mdi-weather-cloudy"></i>
                                    <p class="mb-0" id="forecast-air-temperature-0"> 30° </p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-1"> Mon </p> <i class="mdi mdi-weather-hail"></i>
                                    <p class="mb-0" id="forecast-air-temperature-1"> 31° </p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-2"> Tue </p> <i class="mdi mdi-weather-partlycloudy"></i>
                                    <p class="mb-0" id="forecast-air-temperature-2"> 28° </p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-3"> Wed </p> <i class="mdi mdi-weather-pouring"></i>
                                    <p class="mb-0" id="forecast-air-temperature-3"> 30° </p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-4"> Thu </p> <i class="mdi mdi-weather-pouring"></i>
                                    <p class="mb-0" id="forecast-air-temperature-4"> 29° </p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-5"> Fri </p> <i class="mdi mdi-weather-snowy-rainy"></i>
                                    <p class="mb-0" id="forecast-air-temperature-5"> 31° </p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-6"> Sat </p> <i class="mdi mdi-weather-snowy"></i>
                                    <p class="mb-0" id="forecast-air-temperature-6"> 32° </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--weather card ends-->
                </div>
            </div>
        </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
    <script type="text/javascript" src="../js/home.js">

    </script>
  </body>
</html>
