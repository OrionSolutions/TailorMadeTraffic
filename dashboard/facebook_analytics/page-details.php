<?php 
    //error_reporting(0);
    session_start();
    if($_GET['id']){
        $pageid = $_GET['id'];
    }
    include('fb-get-data.php');
    require 'facebook_sdk/vendor/autoload.php';
    
?>

<!doctype html>
<html>
    <head>
        <title>Managed Campaigns</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
        <link rel="shortcut icon" href="images/tailor-favicon.ico"/>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <script src="js/fancy-custom.js"></script>
   
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
 <?php include('./sidebar.php'); ?>
        <div class="dashboard-wrapper">
        <?php include('menu.php'); ?>
            <div class="page-engagements">
                
            <h1>Campaign Ads</h1>

            <?php 
            use FacebookAds\Object\Campaign;
            use FacebookAds\Object\Fields\CampaignFields;
            use FacebookAds\Object\Fields\AdFields;
            //$campaign_id = '6046006571207';
            $campaign = new Campaign($pageid);
            $ads = $campaign->getAds(array(
              AdFields::NAME,
              AdFields::ID,
              AdFields::EFFECTIVE_STATUS,
            ));
            
            // Outputs names of Ads.
            foreach ($ads as $ad) {
              $AdName = $ad->name;
              $ID = $ad->id;
              $status = $ad->effective_status;
            ?>
                <div class="ad-items">
                    <div class="spacer">
                        <?php 
                             /*$data =  getMonthly($ID);
                             foreach ($data as $i){        
                                 $reach  = $i['reach'];
                                 $cpc  = $i['cpc'];
                                 $impressions  = $i['impressions'];
                                 $cpa  = $i['cost_per_total_action'];
                                 $spend  = $i['spend'];
                             }*/
                        ?>
                        <h2><?php echo $AdName; ?> <a href="graph_facebook.php?id=<?php echo $ID ?>&name=<?php echo $AdName ?>" target="_blank" class="chart fancybox.ajax"> <i class="fa fa-line-chart"></i>Detailed Chart</a> </h2>
                        
                        <div class="one-fifth first ">
                            <h3>Reach: <span><?php echo getAdReach($ID); //$reach;?></span></h3>
                        </div>

                        <div class="one-fifth">
                            <h3>CPC: <span><?php echo getAdCPC($ID); //$cpc; ?></span></h3>
                        </div>

                        <div class="one-fifth">
                            <h3>CPA: <span><?php echo getCPTA($ID); //$cpa; ?></span></h3>
                        </div>

                        <div class="one-fifth">
                            <h3>Impressions: <span><?php echo getAdImpressions($ID); //$impressions; ?></span></h3>
                        </div>

                        <div class="one-fifth last">
                            <h3>Spend: <span><?php echo getAdSpend($ID); //$spend; ?></span></h3>
                        </div>

                        <div class="clear"></div>
                        <p>Status: <?php echo $status ?></p>
                    </div>
                </div>

            <?php } ?>

            </div>
        </div>

    </body>
   
</html>