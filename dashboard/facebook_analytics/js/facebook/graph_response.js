google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

var data = new google.visualization.DataTable();
    data.addColumn('date', 'Date');
    data.addColumn('number', 'Reach');
    data.addColumn('number', 'Impression');
    data.addColumn('number', 'Spend');

var cpc = new google.visualization.DataTable();
    cpc.addColumn('date', 'Date');
    cpc.addColumn('number', 'Cost Per Click');

var cpa = new google.visualization.DataTable();
    cpa.addColumn('date', 'Date');
    cpa.addColumn('number', 'Cost Per Action');



    window.fbAsyncInit = function() {
        FB.init({
        appId      : '1702836673094421',
        cookie     : true,  // enable cookies to allow the server to access 
                            // the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.8' // use graph api version 2.8
    });


FB.api('https://graph.facebook.com/'+getCookie("id")+'/insights/page_post_engagements?date_preset=this_month&period=day',{access_token : getCookie("token_fb")}, function(response) {
    
  ',$_SESSION['fb_access_token']
    $chart_month =  getMonthlyDate($start_date,$end_date,$id);
        foreach ($chart_month as $j){        
            $reach  = $j['reach'];
            $cpc  = $j['cpc'];
            $impressions  = $j['impressions'];
            $cpa  = $j['cost_per_total_action'];
            $spend  = $j['spend'];
            $date = $j['date_start'];
            $newDate = date("m-d-Y", strtotime($date));
            echo "data.addRow([new Date('$newDate'), $reach, $impressions,$spend ]);";
            echo "cpc.addRow([new Date('$newDate'), $cpc ]);";
            echo "cpa.addRow([new Date('$newDate'), $cpa ]);";
        }


var options = {
    title: 'Reach, Impressions, Spend Insights',
    curveType: 'function',
    pointSize: 10,
    height: 400,
    width: '100%',
    curveType: 'none',
    pointShape: 'circle',
    legend: {position: 'top'}
};

var options1 = {
    title: 'Cost Per Click Insights',
    curveType: 'function',
    pointSize: 10,
    colors: ['#c0392b', 'blue', '#3fc26b'],
    curveType: 'none',
    pointShape: 'circle',
    lineWidth: 3,
    legend: {position: 'top'}
};

var options2 = {
    title: 'Cost Per Action Insights',
    curveType: 'function',
    pointSize: 10,
    colors: ['#16a085', 'blue', '#3fc26b'],
    curveType: 'none',
    pointShape: 'circle',
    legend: {position: 'top'}
};

var chart =  new google.visualization.LineChart(document.getElementById('reach_chart'));
var cpc_chart =  new google.visualization.LineChart(document.getElementById('cpc_chart'));
var cpa_chart =  new google.visualization.LineChart(document.getElementById('cpa_chart'));

chart.draw(data, options);
cpc_chart.draw(cpc, options1);
cpa_chart.draw(cpa, options2);
}

function refreshChart() {

var data = new google.visualization.DataTable();
    data.addColumn('date', 'Date');
    data.addColumn('number', 'Reach');
    data.addColumn('number', 'Impression');
    data.addColumn('number', 'Spend');

var cpc = new google.visualization.DataTable();
    cpc.addColumn('date', 'Date');
    cpc.addColumn('number', 'Cost Per Click');

var cpa = new google.visualization.DataTable();
    cpa.addColumn('date', 'Date');
    cpa.addColumn('number', 'Cost Per Action');


<?php 

    $chart_month =  getMonthlyDate($_SESSION['sDate'],$_SESSION['eDate'],$id);
    foreach ($chart_month as $j){        
        $reach  = $j['reach'];
        $cpc  = $j['cpc'];
        $impressions  = $j['impressions'];
        $cpa  = $j['cost_per_total_action'];
        $spend  = $j['spend'];
        $date = $j['date_start'];
        $newDate = date("m-d-Y", strtotime($date));
        echo "data.addRow([new Date('$newDate'), $reach, $impressions,$spend ]);";
        echo "cpc.addRow([new Date('$newDate'), $cpc ]);";
        echo "cpa.addRow([new Date('$newDate'), $cpa ]);";
    }
?>

var options = {
    title: 'Reach, Impressions, Spend Insights',
    curveType: 'function',
    pointSize: 10,
    height: 400,
    width: '100%',
    curveType: 'none',
    pointShape: 'circle',
    legend: {position: 'top'}
};

var options1 = {
    title: 'Cost Per Click Insights',
    curveType: 'function',
    pointSize: 10,
    colors: ['#c0392b', 'blue', '#3fc26b'],
    curveType: 'none',
    pointShape: 'circle',
    lineWidth: 3,
    legend: {position: 'top'}
};

var options2 = {
    title: 'Cost Per Action Insights',
    curveType: 'function',
    pointSize: 10,
    colors: ['#16a085', 'blue', '#3fc26b'],
    curveType: 'none',
    pointShape: 'circle',
    legend: {position: 'top'}
};

var chart =  new google.visualization.LineChart(document.getElementById('reach_chart'));
var cpc_chart =  new google.visualization.LineChart(document.getElementById('cpc_chart'));
var cpa_chart =  new google.visualization.LineChart(document.getElementById('cpa_chart'));

chart.draw(data, options);
cpc_chart.draw(cpc, options1);
cpa_chart.draw(cpa, options2);
}
});
function getCookie(cname) {
var name = cname + "=";
var decodedCookie = decodeURIComponent(document.cookie);
var ca = decodedCookie.split(';');
for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
        c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
    }
}
return "";
}