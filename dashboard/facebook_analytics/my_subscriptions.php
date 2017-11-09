<html>

<head>
    <title>TailorMadeTraffic - Dashboard Reports</title>

    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="google-signin-scope" content="https://www.googleapis.com/auth/analytics.readonly">

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/font-awsome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="js/jquery.js"></script>

    <script src="js/moment.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="js/firebase-config.js"></script>
    <script src="js/google.js"></script>
    <script>
        (function(w, d, s, g, js, fs) {
            g = w.gapi || (w.gapi = {});
            g.analytics = {
                q: [],
                ready: function(f) {
                    this.q.push(f);
                }
            };
            js = d.createElement(s);
            fs = d.getElementsByTagName(s)[0];
            js.src = 'https://apis.google.com/js/platform.js';
            fs.parentNode.insertBefore(js, fs);
            js.onload = function() {
                g.load('analytics');
            };
        }(window, document, 'script'));
    </script>
</head>

<body>
    <!-- Top Menu -->
    <div class="top-header">
        <div class="container">
            <div class="full-width">
                <!-- Menu and Logo -->
                <div class="two-third first">
                    <div class="one-fourth first"><img src="images/logo.png" class="logo"></div>

                    <div class="three-fourth last">
                        <ul class="top-menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Account Settings</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a id="logout">Logout</a></li>
                        </ul>
                    </div>

                    <div class="clear"></div>
                </div>
                <!-- Menu and Logo -->

                <!-- Info -->
                <div class="one-third last">

                    <div class="user-info">
                        <img src="images/avatar.jpg" id="myavatar" class="avatar">
                        <p>Welcome back,<span><?php echo $_GET["id"]; ?></span></p>
                    </div>

                </div>
                <!-- Info -->

                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- Top Menu -->
    <!-- Middle Menu -->
    <div class="middle-header">
        <div class="container">
            <div class="full-width">
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li class="current"><a href="#">My Subscriptions</a></li>
                    <li><a href="my_payment.php"><i class="fa fa-code"></i> Development Service</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Middle Menu -->
    <!-- Dashboard -->
    <div class="container">
        <div class="full-width">
            <div class="subscriptions-holder">
                <h1>Current Subscriptions</h1>
                <div class="subscription-details">
                    <div class="one-fourth first items">
                        <h2>Subscription Type</h2>
                    </div>
                    <div class="one-fourth items">
                        <h2>Subscription Amount</h2>
                    </div>
                    <div class="one-fourth items">
                        <h2>Start Date</h2>
                    </div>
                    <div class="one-fourth last items">
                        <h2>Expiration Date</h2>
                    </div>
                    <div class="clear"></div>

                    <div class="subscriptions">
                        <div class="s-items">
                            <div class="one-fourth first items">
                                <h3>Basic</h3>
                            </div>
                            <div class="one-fourth items">
                                <h3>1,200 <i class="fa fa-gbp"></i></h3>
                            </div>
                            <div class="one-fourth items">
                                <h3>2017-10-9</h3>
                            </div>
                            <div class="one-fourth last items">
                                <h3>2018-10-9</h3>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="controls">
                            <a href="#" class="button">View Invoice</a>
                            <a href="#" class="button">Renew</a>
                            <div class="clear"></div>
                        </div>

                    </div>

                    <div class="subscriptions">
                        <div class="s-items">
                            <div class="one-fourth first items">
                                <h3>Premium</h3>
                            </div>
                            <div class="one-fourth items">
                                <h3>2,200 <i class="fa fa-gbp"></i></h3>
                            </div>
                            <div class="one-fourth items">
                                <h3>2017-10-9</h3>
                            </div>
                            <div class="one-fourth last items">
                                <h3>2018-10-9</h3>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="controls">
                            <a href="#" class="button">View Invoice</a>
                            <a href="#" class="button">Renew</a>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <div class="subscriptions">
                        <div class="s-items">
                            <div class="one-fourth first items">
                                <h3>Basic</h3>
                            </div>
                            <div class="one-fourth items">
                                <h3>1,200 <i class="fa fa-gbp"></i></h3>
                            </div>
                            <div class="one-fourth items">
                                <h3>2017-10-9</h3>
                            </div>
                            <div class="one-fourth last items">
                                <h3>2018-10-9</h3>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="controls">
                            <a href="#" class="button">View Invoice</a>
                            <a href="#" class="button">Renew</a>
                            <div class="clear"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>


<script src="js/geturi.js" type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script>
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/view-selector2.js"></script>
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/date-range-selector.js"></script>
<script type="text/javascript" src="js/chart-functions.js"></script>

</html>