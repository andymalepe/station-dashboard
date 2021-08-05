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
                                <p class="text-gray"> <span class="weather-date" id="forecast-weather-date"></span> <span class="weather-location">SANAE IV, Antarctica</span> </p>
                            </div>
                            <div class="weather-data d-flex">
                                <div class="mr-auto">
                                    <img width="60" id="forecast-symbol" src="" alt="">
                                    <h4 class="display-3" id="forecast-air-temperature"></h4>
                                    <h3 class="display-3" id="forecast-wind-speed"></h3>
                                    <h3 class="display-3" id="forecast-relative-humidity"></h3>
                                    <h3 class="display-3" id="forecast-wind-from-direction"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="d-flex weekly-weather">
                                <div class="weekly-weather-item">
                                    <p class="mb-0" id="forecast-day-0"> Sun </p>
                                    <img width="50" id="forecast-symbol-0" src="" alt="">
                                    <p class="mb-0" id="forecast-air-temperature-0"></p>
                                    <p class="mb-0" id="forecast-wind-speed-0"></p>
                                    <p  class="mb-0"id="forecast-relative-humidity-0"></p>
                                    <p class="mb-0" id="forecast-wind-from-direction-0"></p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-1"> Mon </p>
                                    <img width="50" id="forecast-symbol-1" src="" alt="">
                                    <p class="mb-0" id="forecast-air-temperature-1"></p>
                                    <p class="mb-0" id="forecast-wind-speed-1"></p>
                                    <p class="mb-0" id="forecast-relative-humidity-1"></p>
                                    <p class="mb-0" id="forecast-wind-from-direction-1"></p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-2"> Tue </p>
                                    <img width="50" id="forecast-symbol-2" src="" alt="">
                                    <p class="mb-0" id="forecast-air-temperature-2"></p>
                                    <p class="mb-0" id="forecast-wind-speed-2"></p>
                                    <p class="mb-0" id="forecast-relative-humidity-2"></p>
                                    <p class="mb-0" id="forecast-wind-from-direction-2"></p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-3"> Wed </p>
                                    <img width="50" id="forecast-symbol-3" src="" alt="">
                                    <p class="mb-0" id="forecast-air-temperature-3"></p>
                                    <p class="mb-0" id="forecast-wind-speed-3"></p>
                                    <p class="mb-0" id="forecast-relative-humidity-3"></p>
                                    <p class="mb-0" id="forecast-wind-from-direction-3"></p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-4"> Thu </p>
                                    <img width="50" id="forecast-symbol-4" src="" alt="">
                                    <p class="mb-0" id="forecast-air-temperature-4"></p>
                                    <p class="mb-0" id="forecast-wind-speed-4"></p>
                                    <p class="mb-0" id="forecast-relative-humidity-4"></p>
                                    <p class="mb-0" id="forecast-wind-from-direction-4"></p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-5"> Fri </p>
                                    <img width="50" id="forecast-symbol-5" src="" alt="">
                                    <p class="mb-0" id="forecast-air-temperature-5"></p>
                                    <p class="mb-0" id="forecast-wind-speed-5"></p>
                                    <p class="mb-0" id="forecast-relative-humidity-5"></p>
                                    <p class="mb-0" id="forecast-wind-from-direction-5"></p>
                                </div>
                                <div class="weekly-weather-item">
                                    <p class="mb-1" id="forecast-day-6"> Sat </p>
                                    <img width="50" id="forecast-symbol-6" src="" alt="">
                                    <p class="mb-0" id="forecast-air-temperature-6"></p>
                                    <p class="mb-0" id="forecast-wind-speed-6"></p>
                                    <p class="mb-0" id="forecast-relative-humidity-6"></p>
                                    <p class="mb-0" id="forecast-wind-from-direction-6"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--weather card ends-->
                </div>
       <!-- float: right;max-width: 41%; -->
                <div class="col aurora-forecast-col">
                  <div class="aurora-forecast-img">
                    <img src="../images/aurora-forecast-southern-hemisphere.jpg" alt="">
                    <!-- https://services.swpc.noaa.gov/images/aurora-forecast-southern-hemisphere.jpg -->
                  </div>
                  <div class="">
                    <img src="../images/ql_bar.gif" alt="">
                    <!-- https://spaceweather.gfz-potsdam.de/fileadmin/kpindex/ql_bar.gif -->
                  </div>
              </div>

              <div class="col station-stats-col">
                <div class="row currency-stats" >
                  <h5 class="display-3">Currency</h5>
                  <h5 class="display-3" id="ZAR_USD"></h5>
                  <h5 class="display-3" id="ZAR_EUR"></h5>
                  <h5 class="display-3" id="USD_BTC"></h5>
                </div>
                <div class="row bandwidth-stats">
                  <h5 class="display-3">Station Bandwidth</h5>
                  <h5 class="display-3" id="modem-rx"></h5>
                  <h5 class="display-3" id="modem-tx"></h5>
                </div>
            </div>
            </div>
        </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
    <script type="text/javascript" src="../js/functions.js"></script>
    <script type="text/javascript" src="../js/home.js"></script>
  </body>
</html>
