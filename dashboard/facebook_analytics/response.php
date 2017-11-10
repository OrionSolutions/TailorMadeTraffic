

<?php
    $TypeID=$_GET['TypeID'];
    $id=$_GET['id'];

    if ($TypeID=="LoadData") {
        session_start();
        if(isset($_POST["start_date"]) && strlen($_POST["start_date"])>0) 
        {	 
            $start_date = filter_var($_POST["start_date"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
            $end_date = filter_var($_POST["end_date"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
            $_SESSION['sDate'] = ""; $_SESSION['eDate'] = ""; 
            $_SESSION['sDate'] = $start_date;  
            $_SESSION['eDate'] = $end_date;
            echo '<h1>'.$_SESSION['sDate'].' and '.$_SESSION['eDate'].'</h1>';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <div id="reach_chart"></div>
            
        <div class="one-half first l-chart">
            <div id="cpa_chart"></div>
        </div>
        <div class="one-half last l-chart">
            <div id="loader" style="display:none"><img src="images/load2.gif"></div>
            <div id="cht"> <div id="cpc_chart"></div> </div>
        </div>
        <div class="clear"></div>


 <script type="application/javascript">
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


        <?php
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

 </script>

<?php

}else{
    header('HTTP/1.1 500 Error!');
    exit();
}
}

?>