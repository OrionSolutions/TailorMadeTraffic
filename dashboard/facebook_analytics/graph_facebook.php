<?php 
    session_start();
    $id = $_GET['id'];
    $name = $_GET['name'];
    $_COOKIE['id'] = $id;
    $_COOKIE['token_fb'] = $_SESSION['fb_access_token'];
    include('fb-get-data.php');
    require 'facebook_sdk/vendor/autoload.php';   
    $last_week_date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 7, date('Y')));

    $data =  getMonthly($id);
    foreach ($data as $i){        
        $reach  = $i['reach'];
        $cpc  = $i['cpc'];
        $impressions  = $i['impressions'];
        $cpa  = $i['cost_per_total_action'];
        $spend  = $i['spend'];
    }

    $data_week =  getWeek($id);
    foreach ($data_week as $i){        
        $reach_week = $i['reach'];
        $cpc_week = $i['cpc'];
        $impressions_week = $i['impressions'];
        $cpa_week = $i['cost_per_total_action'];
        $spend_week = $i['spend'];
    }

    $data_last_month =  getLastMonth($id);
    foreach ($data_last_month as $i){        
        $reach_last_month = $i['reach'];
        $cpc_last_month = $i['cpc'];
        $impressions_last_month = $i['impressions'];
        $cpa_last_month = $i['cost_per_total_action'];
        $spend_last_month = $i['spend'];
        $sDate = $i['date_start'];
    }
?>

<!doctype html>
<html>
    <head>
        <title>Graph Facebook</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
        <link rel="shortcut icon" href="images/tailor-favicon.ico"/>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
            appId      : '1702836673094421',
            xfbml      : true,
            version    : 'v2.10'
            });
            FB.AppEvents.logPageView();
        };(function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<?php include('menu.php'); ?>
        <div class="facebook-graph">

        <h1 class="page-title"><?php echo $name; ?></h1>

                    <div class="one-third first days">
                        <div class="days-content">
                            <h1>This Month</h1>

                            <div class="one-fifth first">
                                <div class="stats">
                                    <h2>Reach</h2>
                                    <h3><?php echo $reach ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth ">
                                <div class="stats">
                                    <h2>Impression</h2>
                                    <h3><?php echo $impressions ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth ">
                                <div class="stats">
                                    <h2>CPA</h2>
                                    <h3><?php echo $cpa ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth ">
                                <div class="stats">
                                    <h2>CPC</h2>
                                    <h3><?php echo $cpc ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth last ">
                                <div class="stats">
                                    <h2>Spend</h2>
                                    <h3><?php echo $spend ?></h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <div class="one-third days">
                        <div class="days-content">
                            <h1>Last Week</h1>

                            <div class="one-fifth first">
                                <div class="stats">
                                    <h2>Reach</h2>
                                    <h3><?php echo $reach_week ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth ">
                                <div class="stats">
                                    <h2>Impression</h2>
                                    <h3><?php echo $impressions_week ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth ">
                                <div class="stats">
                                    <h2>CPA</h2>
                                    <h3><?php echo $cpa_week ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth ">
                                <div class="stats">
                                    <h2>CPC</h2>
                                    <h3><?php echo $cpc_week ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth last ">
                                <div class="stats">
                                    <h2>Spend</h2>
                                    <h3><?php echo $spend_week ?></h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <div class="one-third last days">
                        <div class="days-content">
                            <h1>Last Month</h1>

                            <div class="one-fifth first">
                                <div class="stats">
                                    <h2>Reach</h2>
                                    <h3><?php echo $reach_last_month ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth ">
                                <div class="stats">
                                    <h2>Impression</h2>
                                    <h3><?php echo $impressions_last_month ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth ">
                                <div class="stats">
                                    <h2>CPA</h2>
                                    <h3><?php echo $cpa_last_month ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth ">
                                <div class="stats">
                                    <h2>CPC</h2>
                                    <h3><?php echo $cpc_last_month ?></h3>
                                </div>
                            </div>
                            <div class="one-fifth last ">
                                <div class="stats">
                                    <h2>Spend</h2>
                                    <h3><?php echo $spend_last_month ?></h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <div class="clear"></div>


                   <form action="graph_facebook.php?id=<?php echo $id?>&name=<?php echo $name;?>" id="dateForm" method="POST" class="date-form"> 
                  <!-- <form id="dateForm" class="date-form"> -->
                        <div class="date-wrapper">
                            <span>Date from:</span>                       
                            <input type="date" id="start_date" name="start_date" class="date-selector">
                        </div> 
                        <div class="date-wrapper">
                            <span>Date to:</span>
                            <input type="date" id="end_date" name="end_date" class="date-selector">
                        </div>
                        <!-- <div class="breaker"></div> -->
                        <!-- <input type="submit" value="Query" class="submit-btn" id="btn_submit" name="btn_submit"> -->
                        <input type="submit" value="Query" class="submit-btn" id="btn_submit" name="btn_submit">
                        
                    </form>


            <div id="charts-container">
           
                <div id="reach_chart"></div>
                <div id="cpa_chart"></div>
                <div id="cpc_chart"></div> 
            </div>
                

        </div>

    </body>

    
    <script type="text/javascript">
        $(document).ready(function(){
            google.charts.load('current', {'packages':['corechart']});

            /*$('#btn_submit').on("click", function(){
            $("#cht").html('');
            $("#loader").show();
            
            console.log(getCookie("useremail"));
                var myData = 'start_date=' + encodeURIComponent( $("#start_date" ).val()) +
                        '&end_date=' + encodeURIComponent( $("#end_date").val() );
                    $.ajax( {
                        type: "POST",
                        url: "response.php?TypeID=LoadData&id=<?php echo $id; ?>",
                        dataType: "html",
                        data: myData,
                        success: function ( response ) {
            
                            setTimeout(function() {
                                $("#loader").hide();
                                $("#charts-container").html(response); 
                                //google.charts.load('current', {'packages':['corechart']});
                                //updateData();
                                alert("ajax");
                                
                            }, 2000);
                        
                        },
                        error: function ( xhr, ajaxOptions, thrownError ) {
                            alert( thrownError );
                            $("#loader").hide();
                        }
                    }); 
                  
            });*/

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


        <?php 
            $start_date = $last_week_date;
            $end_date = date("Y-m-d");
            if(isset($_POST['btn_submit'])){
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
            }
               
 
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
        ?>

        var options = {
            title: 'Reach, Impressions, Spend Insights',
            curveType: 'function',
            pointSize: 10,
            width: '1400',
            height: 350,
            curveType: 'none',
            pointShape: 'circle',
            legend: {position: 'top'}
        };

        var options1 = {
            title: 'Cost Per Click Insights',
            curveType: 'function',
            pointSize: 10,
            width: '1400',
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
            width: '1400',
            colors: ['#16a085', 'blue', '#3fc26b'],
            curveType: 'none',
            pointShape: 'circle',
            lineWidth: 3,
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
    </script>
</html>