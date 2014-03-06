var map;
var geocoder;
var bounds = new google.maps.LatLngBounds();
var markersArray = [];

var origin1;
var origin2 = 'B3h4a5';
var destinationA;
var destinationB = new google.maps.LatLng(50.087, 14.421);

var destinationIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=D|FF0000|000000';
var originIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=O|FFFF00|000000';

function initialize() {
  var opts = {
    center: new google.maps.LatLng(55.53, 9.4),
    zoom: 10
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), opts);
  geocoder = new google.maps.Geocoder();
}

function calculateDistances() {
  origin1 = document.getElementById('startLoc').value;
  destinationA = document.getElementById('endLoc').value;
  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
    {
      origins: [origin1],
      destinations: [destinationA],
      travelMode: google.maps.TravelMode.DRIVING,
      unitSystem: google.maps.UnitSystem.METRIC,
      avoidHighways: false,
      avoidTolls: false
    }, callback);
}

function callback(response, status) {
  if (status != google.maps.DistanceMatrixStatus.OK) {
    alert('Error was: ' + status);
  } else {
    var origins = response.originAddresses;
    var destinations = response.destinationAddresses;
    var outputDiv = document.getElementById('outputDiv');
    var tripCost = document.getElementById('tripCost');
    var distance = document.getElementById('distance');
    var duration = document.getElementById('duration');
        var gas = document.getElementById('gas');

    document.getElementById('startLoc').value = origins[0];
    document.getElementById('endLoc').value = destinations[0];
    outputDiv.innerHTML = '';
    deleteOverlays();
    var results = response.rows[0].elements;
    addMarker(origins[0], false);
    addMarker(destinations[0], true);
            outputDiv.innerHTML += origins[0] + ' to ' + destinations[0]
            + ': ' + results[0].distance.text + ' in '
            + results[0].duration.text 
            + ' costing ' + results[0].distance.value +  '<br>';
            //TODO: ADD SPECIFIC CAR's L/KM
        tripCost.value = gas.value*results[0].distance.value;
        distance.value = results[0].distance.text;
        duration.value = results[0].duration.text;
  }
}

function addMarker(location, isDestination) {
  var icon;
  if (isDestination) {
    icon = destinationIcon;
  } else {
    icon = originIcon;
  }
  geocoder.geocode({'address': location}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      bounds.extend(results[0].geometry.location);
      map.fitBounds(bounds);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location,
        icon: icon
      });
      markersArray.push(marker);
    } else {
      alert('Geocode was not successful for the following reason: '
        + status);
    }
  });
}

function deleteOverlays() {
  for (var i = 0; i < markersArray.length; i++) {
    markersArray[i].setMap(null);
  }
  markersArray = [];
}

google.maps.event.addDomListener(window, 'load', initialize);