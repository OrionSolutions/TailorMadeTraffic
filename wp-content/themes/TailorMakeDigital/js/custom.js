$(document).ready(function() {
    console.log("Ready! -- bols");

    
/*================ rocket animate ============*/    
    function loop() {
    $('.heading .r-container img.rocket').animate({'top': '-70'}, {
        duration: 1000, 
        complete: function() {
            $('.heading .r-container img.rocket').animate({top: '-20'}, {
                duration: 1000, 
                complete: loop});
        }});
}
loop();
    
/*================ rocket animate ============*/   
/*================ Web-Designs Tabs ==========*/    
    $( ".tabs" ).tabs();
        
    var $active = $('.active')
    var $tab = $('.services-intro .tabs ul li');
    
    $('.tabs ul li').on('click', function() {
    
        
    show_content($(this).index());

  });


  show_content(0);

  function show_content(index) {
    // Set the tab to selected

    $('.tabs ulli.clicked').removeClass('clicked');
    $('.tabs ul li:nth-of-type(' + (index + 1) + ')').addClass('clicked');
  }

/*================= Bx Slider ================*/
        
$('.carousel').bxSlider({
      controls: true,
      nextText: 'Next',
      prevText: 'Prev',
      minSlides: 5,
      maxSlides: 5,
      slideWidth: 250,
      slideMargin: 30
});

});

/*==================== Maps ==================*/

function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(51.5, -0.12),
        zoom: 15,
        styles: [
    {
        "featureType": "all",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#f3f4f4"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
            {
                "weight": 0.9
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#83cead"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#fee379"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#fee379"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#7fc8ed"
            }
        ]
    }
]

    }
    var rsLatLng = new google.maps.LatLng(51.5, -0.12);
    var map = new google.maps.Map(document.getElementById("google-map"), mapOptions);
                            
    var marker = new google.maps.Marker({
        position: rsLatLng,
        map: map,
        title:'Tailor Made Design'
    });
    
    
                            }









    