$(document).ready(function(){
    var dates= [];
    var data;
    var id = getUrlParameter('id');
    var tkn = getUrlParameter('tkn');
   
            window.fbAsyncInit = function() {
                FB.init({
                appId      : '1702836673094421',
                cookie     : true,  // enable cookies to allow the server to access 
                                    // the session
                xfbml      : true,  // parse social plugins on this page
                version    : 'v2.8' // use graph api version 2.8
            });

        
        FB.api('https://graph.facebook.com/'+id+'/insights/page_post_engagements?date_preset=this_month&period=day',{access_token : localStorage['fb-token']}, function(response) {
            
            //console.log(response.data);
            //console.log(response);
             //dates  = response.data;
             var date1 = [];
                //console.log(response.data[i]);
            $.each(response.data, function (i, field) {
                $.each(field.values, function(index, value){
                      // console.log(value.end_time); 
                      //var date = value.end_time;
                    // dates.push("Dates", value.end_time);
                
               // dates.push(date1);
                });
                date1.push(value.end_time);
            });
            dates.push(date1);
            console.log(dates);
        });
    };
    var sample = [
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
      ]
    console.log(sample);

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
   
    function drawChart() {
        var date = google.visualization.arrayToDataTable([
            ['Year', 'Sales', 'Expenses'],
            ['2004',  1000,      400],
            ['2005',  1170,      460],
            ['2006',  660,       1120],
            ['2007',  1030,      540]
          ]);
        var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('today_chart'));

        chart.draw(date, options);
    }

    function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
    
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
    
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

});
    