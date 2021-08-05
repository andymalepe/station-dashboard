#!/bin/bash
rm forecast.json ql_bar.gif aurora-forecast-southern-hemisphere.jpg sanaeiv-yr.pdf sanaeiv-amps.png ZAR_USD.json USD_BTC.json ZAR_EUR.json
curl 'https://api.met.no/weatherapi/locationforecast/2.0/compact?lat=-71.6703&lon=-2.8377&altitude=850'   \
-H 'Connection: keep-alive'   \
-H 'Pragma: no-cache'   \
-H 'Cache-Control: no-cache'   \
-H 'sec-ch-ua: " Not;A Brand";v="99", "Google Chrome";v="91", "Chromium";v="91"'   \
-H 'sec-ch-ua-mobile: ?0'   \
-H 'DNT: 1'   \
-H 'Upgrade-Insecure-Requests: 1'   \
-H 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36'   \
-H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'   \
-H 'Sec-Fetch-Site: none'   \
-H 'Sec-Fetch-Mode: navigate'   \
-H 'Sec-Fetch-User: ?1'   \
-H 'Sec-Fetch-Dest: document'   \
-H 'Accept-Language: en-US,en;q=0.9,en-GB;q=0.8'   \
--compressed \
-o forecast.json

curl 'https://services.swpc.noaa.gov/images/aurora-forecast-southern-hemisphere.jpg' \
  -H 'authority: services.swpc.noaa.gov'   \
  -H 'pragma: no-cache'   \
  -H 'cache-control: no-cache'   \
  -H 'sec-ch-ua: " Not;A Brand";v="99", "Google Chrome";v="91", "Chromium";v="91"'   \
  -H 'sec-ch-ua-mobile: ?0'   \
  -H 'dnt: 1'   \
  -H 'upgrade-insecure-requests: 1'   \
  -H 'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36'   \
  -H 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'   \
  -H 'sec-fetch-site: none'   \
  -H 'sec-fetch-mode: navigate'   \
  -H 'sec-fetch-user: ?1'   \
  -H 'sec-fetch-dest: document'   \
  -H 'accept-language: en-US,en;q=0.9,en-GB;q=0.8'   \
  -H 'cookie: _ga=GA1.2.1365380897.1622672777'   \
  --compressed \
  -o aurora-forecast-southern-hemisphere.jpg

curl 'https://spaceweather.gfz-potsdam.de/fileadmin/kpindex/ql_bar.gif' \
  -H 'Connection: keep-alive' \
  -H 'Pragma: no-cache' \
  -H 'Cache-Control: no-cache' \
  -H 'sec-ch-ua: " Not;A Brand";v="99", "Google Chrome";v="91", "Chromium";v="91"' \
  -H 'sec-ch-ua-mobile: ?0' \
  -H 'DNT: 1' \
  -H 'Upgrade-Insecure-Requests: 1' \
  -H 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36' \
  -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9' \
  -H 'Sec-Fetch-Site: none' \
  -H 'Sec-Fetch-Mode: navigate' \
  -H 'Sec-Fetch-User: ?1' \
  -H 'Sec-Fetch-Dest: document' \
  -H 'Accept-Language: en-US,en;q=0.9,en-GB;q=0.8' \
  --compressed \
  --insecure \
  -o ql_bar.gif

# wget --retry-connrefused \
#   --waitretry=1 \
#   --read-timeout=20 \
#   --timeout=15 -t 0 \
#   -O sanaeiv-yr.pdf \
#   https://www.yr.no/en/print/forecast/2-6620785/Antarctica/SANAE%20IV
DATE=`date -d yesterday +\%Y\%m\%d12`
curl 'https://www2.mmm.ucar.edu/rt/amps/wrf_plots/'$DATE'/8km/meteogram/san4.png' \
  -H 'Connection: keep-alive' \
  -H 'Pragma: no-cache' \
  -H 'Cache-Control: no-cache' \
  -H 'sec-ch-ua: "Chromium";v="92", " Not A;Brand";v="99", "Google Chrome";v="92"' \
  -H 'sec-ch-ua-mobile: ?0' \
  -H 'DNT: 1' \
  -H 'Upgrade-Insecure-Requests: 1' \
  -H 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36' \
  -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9' \
  -H 'Sec-Fetch-Site: none' \
  -H 'Sec-Fetch-Mode: navigate' \
  -H 'Sec-Fetch-User: ?1' \
  -H 'Sec-Fetch-Dest: document' \
  -H 'Accept-Language: en-US,en;q=0.9,en-GB;q=0.8' \
  --compressed \
  --insecure \
  -o sanaeiv-amps.png

wget  --retry-connrefused \
  --waitretry=1 \
  --read-timeout=20 \
  --timeout=15 -t 0 \
  --no-check-certificate \
  -O sanaeiv-amps.png -t inf "http://www2.mmm.ucar.edu/rt/amps/wrf_plots/`date -d yesterday +\%Y\%m\%d00`/8km/meteogram/san4.png"

curl 'https://free.currconv.com/api/v7/convert?q=ZAR_USD&compact=ultra&apiKey=6a4f74c2ce95052ffbfd' \
  -H 'authority: free.currconv.com' \
  -H 'pragma: no-cache' \
  -H 'cache-control: no-cache' \
  -H 'sec-ch-ua: "Chromium";v="92", " Not A;Brand";v="99", "Google Chrome";v="92"' \
  -H 'sec-ch-ua-mobile: ?0' \
  -H 'dnt: 1' \
  -H 'upgrade-insecure-requests: 1' \
  -H 'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36' \
  -H 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9' \
  -H 'sec-fetch-site: none' \
  -H 'sec-fetch-mode: navigate' \
  -H 'sec-fetch-user: ?1' \
  -H 'sec-fetch-dest: document' \
  -H 'accept-language: en-US,en;q=0.9,en-GB;q=0.8' \
  --compressed \
  -o ZAR_USD.json

curl 'https://free.currconv.com/api/v7/convert?q=ZAR_EUR&compact=ultra&apiKey=6a4f74c2ce95052ffbfd' \
  -H 'authority: free.currconv.com' \
  -H 'pragma: no-cache' \
  -H 'cache-control: no-cache' \
  -H 'sec-ch-ua: "Chromium";v="92", " Not A;Brand";v="99", "Google Chrome";v="92"' \
  -H 'sec-ch-ua-mobile: ?0' \
  -H 'dnt: 1' \
  -H 'upgrade-insecure-requests: 1' \
  -H 'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36' \
  -H 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9' \
  -H 'sec-fetch-site: none' \
  -H 'sec-fetch-mode: navigate' \
  -H 'sec-fetch-user: ?1' \
  -H 'sec-fetch-dest: document' \
  -H 'accept-language: en-US,en;q=0.9,en-GB;q=0.8' \
  --compressed \
  -o ZAR_EUR.json

  curl 'https://free.currconv.com/api/v7/convert?q=USD_BTC&compact=ultra&apiKey=6a4f74c2ce95052ffbfd' \
    -H 'authority: free.currconv.com' \
    -H 'pragma: no-cache' \
    -H 'cache-control: no-cache' \
    -H 'sec-ch-ua: "Chromium";v="92", " Not A;Brand";v="99", "Google Chrome";v="92"' \
    -H 'sec-ch-ua-mobile: ?0' \
    -H 'dnt: 1' \
    -H 'upgrade-insecure-requests: 1' \
    -H 'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36' \
    -H 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9' \
    -H 'sec-fetch-site: none' \
    -H 'sec-fetch-mode: navigate' \
    -H 'sec-fetch-user: ?1' \
    -H 'sec-fetch-dest: document' \
    -H 'accept-language: en-US,en;q=0.9,en-GB;q=0.8' \
    --compressed \
    -o USD_BTC.json

mv forecast.json data/forecast.json
mv ql_bar.gif images/ql_bar.gif
mv aurora-forecast-southern-hemisphere.jpg images/aurora-forecast-southern-hemisphere.jpg
# mv sanaeiv-yr.pdf images/sanaeiv-yr.pdf
mv sanaeiv-amps.png images/sanaeiv-amps.png
mv ZAR_USD.json data/ZAR_USD.json
mv ZAR_EUR.json data/ZAR_EUR.json
mv USD_BTC.json data/USD_BTC.json
