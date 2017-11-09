<?php 
use FacebookAds\Object\Campaign;
use FacebookAds\Object\Fields\CampaignFields;
use FacebookAds\Object\Fields\AdFields;
require 'facebook_sdk/vendor/autoload.php';

use FacebookAds\Object\AdAccount;
use FacebookAds\Object\AdsInsights;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;

$access_token = $_SESSION['fb_access_token'];
$ad_account_id = 'act_15686630';
$app_secret = '8c135ba81b086443c41ee685ff2756f6';
$app_id = '1702836673094421';

// Initialize a new Session and instanciate an Api object
Api::init($app_id, $app_secret, $access_token);
// The Api object is now available trough singleton
$api = Api::instance();
$api = Api::init($app_id, $app_secret, $access_token);


    function getCampaigns(){
        $id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $campaigns = $fb->get($id.'/campaigns?fields=id,name&effective_status=["ACTIVE"]',$_SESSION['fb_access_token']);
        $campaignList = $campaigns->getGraphEdge();
        /*foreach ($campaignList as $campaign){        
            $name = $campaign['id'];
            //echo $name;
            $campaignName = new Campaign($name);
            $campaignName->read(array(
              CampaignFields::ID,
              CampaignFields::NAME,
              CampaignFields::OBJECTIVE,
        ));*/
    return $campaignList;
    }

    function getImpressionWeek($id){
        $IM_VAL = 0;
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $page_impressions = $fb->get($id.'/insights/page_impressions?this_week_mon_today',$_SESSION['fb_access_token']);
        $impressions = $page_impressions->getGraphEdge();
        foreach ($impressions as $impression){        
            $name = $impression['values'];
            if($impression['period']=="week"){
            foreach($name as $val){
                $VAL = $val['value'];
                $IM_VAL = $IM_VAL + $VAL;
            }   
            }
        }
    return $IM_VAL;
    }

    function getImpressionMonth($id){
        $IM_VAL = 0;
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $page_impressions = $fb->get($id.'/insights/page_impressions?this_week_mon_today',$_SESSION['fb_access_token']);
        $impressions = $page_impressions->getGraphEdge();
        foreach ($impressions as $impression){        
            $name = $impression['values'];
            if($impression['period']=="days_28"){
            foreach($name as $val){
                $VAL = $val['value'];
                $IM_VAL = $IM_VAL + $VAL;
            }   
            }
        }
    return $IM_VAL;
    }

    /* ============================================= GET PAGE ENGAGED USERS ========================================== */

    function getEngagedDay($id){
        $IM_VAL = 0;
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $page_impressions = $fb->get($id.'/insights/page_engaged_users',$_SESSION['fb_access_token']);
        $impressions = $page_impressions->getGraphEdge();
        foreach ($impressions as $impression){        
            $name = $impression['values'];
            if($impression['period']=="day"){
            foreach($name as $val){
                $VAL = $val['value'];
                $IM_VAL = $IM_VAL + $VAL;
            }   
            }
        }
    return $IM_VAL;
    }

    function getReach($id){
        $IM_VAL = 0;
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $page_impressions = $fb->get($id.'/insights/page_engaged_users',$_SESSION['fb_access_token']);
        $impressions = $page_impressions->getGraphEdge();
        foreach ($impressions as $impression){        
            $name = $impression['values'];
            if($impression['period']=="week"){
            foreach($name as $val){
                $VAL = $val['value'];
                $IM_VAL = $IM_VAL + $VAL;
            }   
            }
        }
    return $IM_VAL;
    }

    function getEngagedMonth($id){
        $IM_VAL = 0;
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $page_impressions = $fb->get($id.'/insights/page_engaged_users',$_SESSION['fb_access_token']);
        $impressions = $page_impressions->getGraphEdge();
        foreach ($impressions as $impression){        
            $name = $impression['values'];
            if($impression['period']=="days_28"){
            foreach($name as $val){
                $VAL = $val['value'];
                $IM_VAL = $IM_VAL + $VAL;
            }   
            }
        }
    return $IM_VAL;
    }

    function  getAdReach($id){
        $IM_VAL = 0;
        //$id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $ad_reach = $fb->get($id.'/insights?fields=reach',$_SESSION['fb_access_token']);
        $reach = $ad_reach->getGraphEdge();
        foreach ($reach as $i){        
            $IM_VAL  = $i['reach'];
           
        }
    return $IM_VAL;
    }

    function getAdCPC($id){
        $IM_VAL = 0;
        //$id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $ad_reach = $fb->get($id.'/insights?fields=cpc',$_SESSION['fb_access_token']);
        $reach = $ad_reach->getGraphEdge();
        foreach ($reach as $i){        
            $IM_VAL  = $i['cpc'];
           
        }
    return $IM_VAL;
    }

    function getAdImpressions($id){
        $IM_VAL = 0;
        //$id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $ad_reach = $fb->get($id.'/insights?fields=impressions',$_SESSION['fb_access_token']);
        $reach = $ad_reach->getGraphEdge();
        foreach ($reach as $i){        
            $IM_VAL  = $i['impressions'];
           
        }
    return $IM_VAL;
    }

    function getAdSpend($id){
        $IM_VAL = 0;
        //$id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $ad_reach = $fb->get($id.'/insights?fields=spend',$_SESSION['fb_access_token']);
        $reach = $ad_reach->getGraphEdge();
        foreach ($reach as $i){        
            $IM_VAL  = $i['spend'];
           
        }
    return $IM_VAL;
    }

    function getCPTA($id){
        $IM_VAL = 0;
        //$id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $ad_reach = $fb->get($id.'/insights?fields=cost_per_total_action',$_SESSION['fb_access_token']);
        $reach = $ad_reach->getGraphEdge();
        foreach ($reach as $i){        
            $IM_VAL  = $i['cost_per_total_action'];
        }
    return $IM_VAL;
    }


    function getMonthly( $id){
        $IM_VAL = 0;
        $monthly = []; 
        //$id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $sdate = "2017-11-1";
        $eDate = "2017-11-6";
        $timeframe = "{'since':'".$sdate."','until':'".$eDate."'}";
        $ad_reach = $fb->get($id.'/insights?fields=cost_per_total_action,cpc,spend,reach,impressions&date_preset=this_month&time_increment=1',$_SESSION['fb_access_token']);
        $reach = $ad_reach->getGraphEdge();
        foreach ($reach as $i){        
            $IM_VAL  = $i['cost_per_total_action'];
            $IM_VAL  = $i['cpc'];
        }
    return $reach;
    }

    function getMonthlyDate($star_date, $end_date, $id){
        $IM_VAL = 0;
        $monthly = []; 
        //$id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        //$star_date = "2017-11-1";
        //$end_date = "2017-11-6";
        $timeframe = "{'since':'".$star_date."','until':'".$end_date."'}";
        $ad_reach = $fb->get($id.'/insights?fields=cost_per_total_action,cpc,spend,reach,impressions&time_range='.$timeframe.' &time_increment=1',$_SESSION['fb_access_token']);
        $reach = $ad_reach->getGraphEdge();
    return $reach;
    }

    function getWeek($id){
        $IM_VAL = 0;
        $monthly = []; 
        //$id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $ad_reach = $fb->get($id.'/insights?fields=cost_per_total_action,cpc,spend,reach,impressions&date_preset=last_7d',$_SESSION['fb_access_token']);
        $reach = $ad_reach->getGraphEdge();
        foreach ($reach as $i){        
            $IM_VAL  = $i['cost_per_total_action'];
            $IM_VAL  = $i['cpc'];
        }
    return $reach; 
    }

    function getLastMonth($id){
        $IM_VAL = 0;
        $monthly = []; 
        //$id= 'act_15686630';
        require 'src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
        $ad_reach = $fb->get($id.'/insights?fields=cost_per_total_action,cpc,spend,reach,impressions&date_preset=last_month',$_SESSION['fb_access_token']);
        $reach = $ad_reach->getGraphEdge();
        foreach ($reach as $i){        
            $IM_VAL  = $i['cost_per_total_action'];
            $IM_VAL  = $i['cpc'];
        }
    return $reach;
    }




    
?>