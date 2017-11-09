<?php
/**
 * Copyright (c) 2015-present, Facebook, Inc. All rights reserved.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

require 'vendor/autoload.php';

use FacebookAds\Object\AdAccount;
use FacebookAds\Object\AdsInsights;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;

$access_token = 'EAAYMuI8CoxUBANPjHQ7OEVuaJOZCtuPraywl7w3jRZA4Lsu7Fx9zZBxVP3Ig2PEKrTqcUKptRNqK43QrENxOAoLPHfPQdxhUZAUCSzYj5oIrvnydCXcyFDZBAZCeB0qhdYUNeZCCM0F1fZB8fZCsZC1G4ZAph0o39ygGzuw64aPZBdJitzoWKPgTWQjXTIRrMVcx5vnFaRZA9YZATlivmgoTvH1eGDp8AQZANzHU8YZD';
$ad_account_id = 'act_118158295618209';
$app_secret = '8c135ba81b086443c41ee685ff2756f6';
$app_id = '1702836673094421';

// Initialize a new Session and instanciate an Api object
Api::init($app_id, $app_secret, $access_token);

// The Api object is now available trough singleton
$api = Api::instance();

$api = Api::init($app_id, $app_secret, $access_token);
//$api->setLogger(new CurlLogger());

use FacebookAds\Object\Campaign;
use FacebookAds\Object\Fields\CampaignFields;

$campaign = new Campaign($campaign_id);
$ads = $campaign->getAds(array(
  AdFields::NAME,
));

// Outputs names of Ads.
foreach ($ads as $ad) {
  echo $ad->name;
}
?>