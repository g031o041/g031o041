/*
let mymap = L.map('mymap').setView([51.505, -0.09], 3);
L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="http://cartodb.com/attributions">CartoDB <a href="Search">トップに戻る</a>'　,
	subdomains: 'abcd',
	maxZoom: 19
}).addTo(mymap);


let makePopupContent = item => `日付: ${item.dt} <br>場所: ${item.ds}<br>形状: ${item.sh}<br>滞在時間: ${item.du}(秒)<br>経度: ${item.la}<br>緯度: ${item.lo}<br>コメント: ${item.cm}`;
let receivedJson = JSON.parse(document.getElementsByClassName('hidden')[0].innerText);

receivedJson.forEach(  element => {
  var marker = L.marker([element.latitude, element.longitude]).addTo(mymap); // bindPopup(makePopupContent(element))
  console.log(marker);
})
*/
let notYetReceivedJson = document.getElementsByClassName('hidden');
var geocoder;

function markerInfo(marker, name) {
  new google.maps.InfoWindow({
    content: name
  }).open(marker.getMap(), marker);
}

function initMap() {
  geocoder = new google.maps.Geocoder();
  // The location of Uluru
  var uluru = { lat: -25.344, lng: 131.036 };
  // The map, centered at Uluru
  var map = new google.maps.Map(
    document.getElementById('map'), { zoom: 1, center: uluru });
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({ position: uluru, map: map });

  var markers = new Array();

  Array.forEach(notYetReceivedJson, (element, index) => {
    let address;
    let parsedJson = JSON.parse(element.innerText);
    /*
    geocoder.geocode({ 'address': address, 'region': 'jp' }, (results, status) => {
      if (status == 'OK') {
        console.log(results);
        address = results[0];
      }
    })
    */
   setTimeout(()=> {
      markers[index] = new google.maps.Marker({
        position: /*addresses[index].geometry.location*/ uluru, 
        map: map
      });
      var infowindow = new google.maps.InfoWindow({
        content: parsedJson.name
      });
      markers[index].addListener('mouseover', () => {
        infowindow.open(map, markers[index]);
        console.log('open');
      });
      markers[index].addListener('mouseout', () => {
        infowindow.close();
        console.log('close');
      });
      markers[index].addListener('click', () => {
        window.location.href = `/g031o041/kanko/spots/view/${parsedJson.id}`;
        console.log('move');
      });
    }, 2000);
  });
}
