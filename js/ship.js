// Map appearance
    var width="100%";         // width in pixels or percentage
    var height="800";         // height in pixels
    var names=true;           // always show ship names (defaults to false)

    // Single ship tracking
    var mmsi=601986000;
    var imo="9577135";        // display latest position (by IMO, overrides MMSI)

    var show_track=true;      // display track line (last 24 hours)

$(document).ready(function(){
  $('li.nav-item.active').removeClass('active');
  
})
