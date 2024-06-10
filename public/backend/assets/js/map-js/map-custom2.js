// custom map js
var map = L.map("map").setView([51.505, -0.09], 13);

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

L.marker([51.5, -0.09])
  .addTo(map)
  .bindPopup("A pretty CSS3 popup.<br> Easily customizable.")
  .openPopup();

// Initialize the map and assign it to a variable for later use
var map = L.map("map", {
  // Set latitude and longitude of the map center (required)
  center: [37.7833, -122.4167],
  // Set the initial zoom level, values 0-18, where 0 is most zoomed-out (required)
  zoom: 10,
});

L.control.scale().addTo(map);

// Create a Tile Layer and add it to the map
var tiles = new L.tileLayer(
  "http://{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.png"
).addTo(map);
L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

var searchControl = new L.esri.Controls.Geosearch().addTo(map);

var results = new L.LayerGroup().addTo(map);

searchControl.on("results", function (data) {
  results.clearLayers();
  for (var i = data.results.length - 1; i >= 0; i--) {
    results.addLayer(L.marker(data.results[i].latlng));
  }
});

setTimeout(function () {
  $(".pointer").fadeOut("slow");
}, 3400);
