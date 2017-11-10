<?php
if(!session_id()) {
    session_start();
}
    require '../src/Facebook/autoload.php';
    $fb = new Facebook\Facebook([
        'app_id' => '1702836673094421', // Replace {app-id} with your app id
        'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
        'default_graph_version' => 'v2.10',
        ]);
    
    $helper = $fb->getRedirectLoginHelper();
    
    try {
        $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
    if (! isset($accessToken)) {
        if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
        } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
        }
        exit;
    }
    
    // Logged in
    echo '<h3>Access Token</h3>';
    var_dump($accessToken->getValue());
    
    // The OAuth 2.0 client handler helps us manage access tokens
    $oAuth2Client = $fb->getOAuth2Client();
    
    // Get the access token metadata from /debug_token
    $tokenMetadata = $oAuth2Client->debugToken($accessToken);
    echo '<h3>Metadata</h3>';
    var_dump($tokenMetadata);
    
    // Validation (these will throw FacebookSDKException's when they fail)
    $tokenMetadata->validateAppId('1702836673094421'); // Replace {app-id} with your app id
    // If you know the user ID this access token belongs to, you can validate it here
    //$tokenMetadata->validateUserId('123');
    $tokenMetadata->validateExpiration();
    
    if (! $accessToken->isLongLived()) {
        // Exchanges a short-lived access token for a long-lived one
        try {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
        exit;
        }
    
        echo '<h3>Long-lived</h3>';
        var_dump($accessToken->getValue());
    }
    
    $_SESSION['fb_access_token'] = (string) $accessToken;
    
    // User is logged in with a long-lived access token.
    // You can redirect them to a members-only page.
    //echo'<script>window.location.replace("http://localhost/OrionShare/TailorMadeTraffic/dashboard/facebook_analytics/dashboard.php");</script> ';
    echo'<script>window.location.replace("https://tailormadetraffic.com/dashboard/beta-dashboard/facebook_analytics/dashboard.php");</script> ';
?>