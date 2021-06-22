Author: Kagiso Malepe (kagisoandy@gmail.com)

# Station Dashboard (Marion/SANAE IV)

Dashboard layout for a station. Currently has Station sign out page and admin login front-end styling.
Sign In/Out code was re-written into PDO inside api/api.php


## Dashboard Stack
  * JavaScript ES6
  * PHP7
  * HTML5/CSS
  * MySQL

## Libraries
  * jQuery, version 3.5
  * Bootstrap4
  * DataTables, version: 1.10.23
  * Foundation

## Getting Started
  * Clone repo into a VHOST or public folder on a server (Apache/InginX)
  * Import create a MySQL DB
  * Import db/station.sql into your DB
  * Add station users and area to DB tables
  * Update config.php with MySQL DB login credentials
  * Navigate to <host-url>/home/

## Kp Index
### Source: https://services.swpc.noaa.gov/text/daily-geomagnetic-indices.txt
### Source ftp://ftp.gfz-potsdam.de/pub/home/obs/Kp_ap_Ap_SN_F107
*  Kp 0 – Quiet – Aurora oval mostly to the north of Iceland. Faint aurorae visible in photographs, low in the northern sky
*  Kp 1 – Quiet – Aurora oval over Iceland, faint and quiet aurorae visible to the unaided eye low in the northern sky
*  Kp 2 – Quiet – Auroras readily visible and become brighter and more dynamic
*  Kp 3 – Unsettled – Bright auroras visible at zenith. Pale green colour more obvious
*  Kp 4 – Active – Bright, constant and dynamic northern lights visible. More colours start to appear
*  Kp 5 – Minor storm – Bright, constant and colourful aurora display, red and purple colours appear. Aurora coronae likely
*  Kp 6 – Moderate storm – Bright, dynamic and colourful aurora display. Aurora coronae likely. Memorable to those who witness them
*  Kp 7 – Strong storm – Bright, dynamic and colourful aurorae. Visible in the southern sky. Aurora coronae very likely
*  Kp 8 – Severe storm – Bright, dynamic and colourful aurorae. Aurora seen around 50° latitude
*  Kp 9 – Intense storm – Aurorae seen around 40° latitude. Red aurorae and coronae very likely. Most often caused by powerful coronal mass ejections.
*
