function initMap() {
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 7,
    center: { lat: 41.85, lng: -87.65 },
  });
  directionsRenderer.setMap(map);
  calculateAndDisplayRoute(directionsService, directionsRenderer);
  document.getElementById("mode").addEventListener("change", () => {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  });
  
}

var origin_lat = parseFloat(-23.040939);
var origin_lng = parseFloat(29.907181);

var dest_lat = parseFloat(-22.878830);
var dest_lng = parseFloat(30.093019);

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  directionsService
  .route({
      origin: { lat: origin_lat , lng: origin_lng },
    
    destination:  { lat: dest_lat, lng: dest_lng},  

      travelMode: google.maps.TravelMode.DRIVING,
      unitSystem: google.maps.UnitSystem.METRIC
    })
    .then((response) => {
      directionsRenderer.setDirections(response);
      
      const output = document.querySelector('#output');
      output.innerHTML = "Driving distance: " + response.routes[0].legs[0].distance.text +"<br><br>Duration: " + response.routes[0].legs[0].duration.text;

    })
    .catch((e) => window.alert("Directions request failed due to " + status));
}