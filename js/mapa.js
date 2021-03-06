let map;
var infoObj = [];
var locations = [
  ['Lava jato da Silva', -20.184349, -49.349767, 'Rápido e ainda conta com uma promoção.', 'details.php?id=0'],
  ['Mercado da Martha', -20.178337, -49.353230, 'Supermercado e com preços acessiveis', 'details.php?id=1'],
  ['Lachoneto do Zé', -20.179184, -49.350405, 'Vendemos mini Pizzas','details.php?id=2'],
  ['Bar', -20.183580, -49.350506, 'Bebidas e Drinks','details.php?id=3']
  
];

// Verifica e pede permição de localização para o navegador
function navigatorGeolocationSuport(){
  if (navigator.geolocation){
    navigator.geolocation.getCurrentPosition(initMap);
  }
  else{
    alert("O seu navegador não possui suporte para esta ferramenta. Por favor utilizar navegadores que suportam geolocalização")
  }
}

// Obtem a latitude atual
function getCurrentLatitude(position){
  return position.coords.latitude;
}

// Obtem a longitude atual
function getCurrentLongitude(position){
  return position.coords.longitude; 
}

function initMap(position)
{
    var latitude = getCurrentLatitude(position);
    var longitude = getCurrentLongitude(position);
    var centerMap = {lat: latitude, lng: longitude};
    //Para criar controles customizados:
    // Interação é nossa responsabilidade;
    // Div- Controle;
        // Div- UI;
            // Div - Text.
    class CenterControl
    {
        constructor(map)
        {
            //construtor para centralizar o mapa 
            this.controlDiv = document.createElement('div');
            this.controlUI = document.createElement('div');
            this.controlText = document.createElement('div');

            this.controlUI.style.backgroundColor = '#F0ED4A';
            this.controlUI.style.border = 'none';
            this.controlUI.style.borderRadius = '0px 0px 25px 25px';
            this.controlUI.style.padding = '7px 37px';
            this.controlUI.style.cursor = 'pointer';  
            this.controlUI.title = 'Centralizar Mapa';

            this.controlDiv.appendChild(this.controlUI);

            this.controlText.style.fontSize = '18px';
            this.controlText.style.textAlign = 'center';
            this.controlText.style.lineHeight = '20px';
            this.controlText.style.color = '#545E75';
            this.controlText.innerHTML = 'Centralizar';

            this.controlUI.appendChild(this.controlText);

            this.controlUI.addEventListener('click', () => {
                    map.panTo(centerMap);
                 //map.setCenter(centerMap);
            });
        }
    }
    
    

    const mapOptions = 
    {
        center: {lat: latitude, lng: longitude},
        zoom: 18,
        mapTypeId: 'roadmap', // roadmap, satellite, hybrid, terrain
        disableDefaultUI: true,
        // alteração no estilo do mapa
        styles:
        [
            {
                "featureType": "landscape",
                "stylers": [
                    {
                        "hue": "#FFBB00"
                    },
                    {
                        "saturation": 43.400000000000006
                    },
                    {
                        "lightness": 37.599999999999994
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "stylers": [
                    {
                        "hue": "#FFC200"
                    },
                    {
                        "saturation": -61.8
                    },
                    {
                        "lightness": 45.599999999999994
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "stylers": [
                    {
                        "hue": "#FF0300"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 51.19999999999999
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "road.local",
                "stylers": [
                    {
                        "hue": "#FF0300"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 52
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "water",
                "stylers": [
                    {
                        "hue": "#0078FF"
                    },
                    {
                        "saturation": -13.200000000000003
                    },
                    {
                        "lightness": 2.4000000000000057
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "poi",
                "stylers": [
                    {
                        "hue": "#00FF6A"
                    },
                    {
                        "saturation": -1.0989010989011234
                    },
                    {
                        "lightness": 11.200000000000017
                    },
                    {
                        "gamma": 1
                    }
                ]
            }
        ]}
        // função para centralizar o mapa.
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        const centerControl = new CenterControl(map);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControl.controlDiv);

        // adicionar marcadores no mapa
        const marker = new google.maps.Marker
        ({
            position: {lat: latitude, lng: longitude},
            map: map,
            title: 'Você',
            // label: '',
            icon: '../imagens/logoPequena.svg',
            // animações
            animation: google.maps.Animation.DROP,
            // arrastável
            draggable: false
            // remover marcadores do mapa
            // marker.setMap(null);
        });

        // criando infoWindow
        let infoWindow = new google.maps.InfoWindow
        ({
            content: '<div class="infoWindow"><h4>Esta é a sua localização atual</h4></div>',
            // position = {},
            // maxWidth: 200
        });

        marker.addListener('click', () => 
        {
            infoWindow.open(map, marker);
        });      

    addBuyPoints(position);
}

function addBuyPoints(position){
    var latitude = getCurrentLatitude(position);
    var longitude = getCurrentLongitude(position);
    for (i = 0; i < locations.length; i++) {  
        if(locations[i][1]<latitude+0.004000 && locations[i][1]>latitude-0.004000 && locations[i][2]<longitude+0.004000 && locations[i][2]>longitude-0.004000){
            marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
              title: locations[i][0],
              map: map,
              animation: google.maps.Animation.DROP,
              icon: '../imagens/logoPequena.svg'
            });

            const infoWindow = new google.maps.InfoWindow
            ({
                content: '<div class="infoWindow"><a class="infoLink" href="'+locations[i][4]+'">'+locations[i][0]+'</a><br><p>'+locations[i][3]+'</p></div>',
            });


            marker.addListener('click', () => 
            {
                closeOtherInfo();
                infoWindow.open(map, marker);
                infoObj[0] = infoWindow
            }); 

        }
    }
}

function closeOtherInfo(){
    if(infoObj.length > 0){    
        infoObj[0].set("marker", null);
        infoObj[0].close();
        infoObj[0],length = 0;
    }
}