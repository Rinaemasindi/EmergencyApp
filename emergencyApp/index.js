function initMap() {
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 50,
      center: { lat: -25.731340, lng: 28.218370},
    });
    directionsRenderer.setMap(map);
    calculateAndDisplayRoute(directionsService, directionsRenderer);
    document.getElementById("mode").addEventListener("change", () => {
      calculateAndDisplayRoute(directionsService, directionsRenderer);
    });
    
  }




var origin_lat = parseFloat(address.origin_lat);
var origin_lng = parseFloat(address.origin_lng);

var dest_lat = parseFloat(address.dest_lat);
var dest_lng = parseFloat(address.dest_lng);

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