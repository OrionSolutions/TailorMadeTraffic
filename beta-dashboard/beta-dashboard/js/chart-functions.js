gapi.analytics.ready(function() {
    var selected = "ga:CTR";
    $('#myavatar').attr('src', localStorage["photoURL"]);

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
    var site_id = getCookie("siteID");
    var ACCESS_TOKEN = localStorage["token"];
    apiHeader = "https://www.googleapis.com/analytics/v3/data/ga?";
    siteID = "ga%3A"+site_id;
    metrics = "ga%3Asessions%2Cga%3AbounceRate%2Cga%3AadCost%2Cga%3AadClicks%2Cga%3ACTR";
    ActionKey = localStorage["token"];

    //Google Authentication
    gapi.analytics.auth.authorize({
        // container: 'embed-api-auth-container',
        clientid: '252782849558-mgs05q6950jfh7m2v3rk24l5e2ulkhlq.apps.googleusercontent.com',
        serverAuth: {
            access_token: ACCESS_TOKEN
        }
    });

    //Declaration of Selector
    var overviewSelector = new gapi.analytics.ext.ViewSelector2({
        container: 'overview-selector'
    });

    var ctrSelector = new gapi.analytics.ext.ViewSelector2({
        container: 'ctr-selector'
    });
  
    var clickSelector = new gapi.analytics.ext.ViewSelector2({
        container: 'clicks-selector'
    });
  
    var sessionSelector = new gapi.analytics.ext.ViewSelector2({
        container: 'session-selector'
    });
  
    var bouncebackSelector = new gapi.analytics.ext.ViewSelector2({
        container: 'bounce-back-selector'
    });
  
    var sessiondurationSelector = new gapi.analytics.ext.ViewSelector2({
        container: 'session-duration-selector'
    });



    //Selector Execution

    overviewSelector.execute();
    ctrSelector.execute();
    clickSelector.execute();
    sessionSelector.execute();
    bouncebackSelector.execute();
    sessiondurationSelector.execute();
    //Chart Creation

    var overviewConfig = {
        query: {
            metrics: 'ga:CTR',
            dimensions: 'ga:date'
        },
        chart: {
            type: 'LINE',
            options: {
                width: '100%',
                colors: ['#1abc9c', '#ff0033', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            }
        }
    };

    var ctrConfig = {
        query: {
            metrics: 'ga:CTR',
            dimensions: 'ga:date'
        },
        chart: {
            type: 'LINE',
            options: {
                width: '100%',
                colors: ['#1abc9c', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            }
        }
    };

    var durationConfig = {
        query: {
            metrics: 'ga:adCost',
            dimensions: 'ga:date'
        },
        chart: {
            type: 'LINE',
            options: {
                width: '100%',
                colors: ['#1abc9c', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            }
        }
    };

    var sessionConfig = {
        query: {
            metrics: 'ga:sessions',
            dimensions: 'ga:date'
        },
        chart: {
            type: 'LINE',
            options: {
                width: '100%',
                colors: ['#1abc9c', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            }
        }
    };

    var bounceConfig = {
        query: {
            metrics: 'ga:bounceRate',
            dimensions: 'ga:date'
        },
        chart: {
            type: 'LINE',
            options: {
                width: '100%',
                colors: ['#1abc9c', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            }
        }
    };

    var clicksConfig = {
        query: {
            metrics: 'ga:adClicks',
            dimensions: 'ga:date'
        },
        chart: {
            type: 'LINE',
            options: {
                width: '100%',
                colors: ['#1abc9c', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            }
        }
    };


    $('#filter').on('change', function() {
        var metric = {
            metrics: this.value      
        };
        selected = metric['metrics'];
        console.log(selected);

        var apiHeader = "https://www.googleapis.com/analytics/v3/data/ga?";
        var siteID = "ga%3A"+site_id;
        var sDate = '7daysAgo';
        var eDate = 'today';
        var metrics = "ga%3Asessions%2Cga%3AbounceRate%2Cga%3AadCost%2Cga%3AadClicks%2Cga%3ACTR";
        var ActionKey = localStorage["token"];
            
        var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
        //Load default page
        //console.log(url);
        $.getJSON(url, function (result) {
            //console.log(result);
            $.each(result, function (i, field) {
                if (i == "totalsForAllResults") {
                    var data = field;
                    var ctr = data["ga:CTR"];
                    var bounceRate = data["ga:bounceRate"];
                    var adClicks = data["ga:adClicks"];
                    var sessions = data["ga:sessions"];
                    var adCost =data["ga:adCost"];
                    if(selected=="ga:Sessions"){
                        selected="ga:sessions";
                        var overview = data[selected] ;
                    }else{
                        var overview = data[selected] ;
                    }
                    var selectionTitle = "";
                    switch(selected){
                        case "ga:CTR":
                        selectionTitle = "Average CTR: ";
                        break;
                        case "ga:bounceRate":
                        selectionTitle = "Average Bounce Rate: ";
                        break;
                        case "ga:adClicks":
                        selectionTitle = "Total Clicks: ";
                        break;
                        case "ga:Sessions":
                        selectionTitle = "Total Sessions: ";
                        break;
                        case "ga:adCost":
                        selectionTitle = "Total Spent: ";
                        break;
                        
                    }
                    $('#overview-total-desc').html("Average "+$('#filter').find(":selected").text()+": "+'<span id="overview"></span>');
                    $('#overview').html(overview);
                    
                }
                
            });
        });

        overviewChart.set({
            query: metric
        }).execute();

    });

    /* ------------------------------ Date Range Setup ------------------------------ */
    var dateRange1 = {
        'start-date': '7daysAgo',
        'end-date': 'today'
    };
/*================================= DATE SELECTOR ================================*/
    var duration_Selector = new gapi.analytics.ext.DateRangeSelector({
            container: 'date-range-selector-duration-container'
        })
        .set(dateRange1)
        .execute();

    var bounce_Selector = new gapi.analytics.ext.DateRangeSelector({
            container: 'date-range-selector-bb-container'
        })
        .set(dateRange1)
        .execute();

    var session_selector = new gapi.analytics.ext.DateRangeSelector({
            container: 'date-range-selector-session-container'
        })
        .set(dateRange1)
        .execute();

    var clicks_selector = new gapi.analytics.ext.DateRangeSelector({
            container: 'date-range-selector-clicks-container'
        })
        .set(dateRange1)
        .execute();

    var ctr_selector = new gapi.analytics.ext.DateRangeSelector({
            container: 'date-range-selector-ctr-container'
        })
        .set(dateRange1)
        .execute();

    var overview_selector = new gapi.analytics.ext.DateRangeSelector({
            container: 'date-range-selector-overview-container'
        })
        .set(dateRange1)
        .execute();
/*================================= DATE SELECTOR ================================*/


        apiHeader = "https://www.googleapis.com/analytics/v3/data/ga?";
        siteID = "ga%3A"+site_id;
        sDate = '7daysAgo';
        eDate = 'today';
        metrics = "ga%3Asessions%2Cga%3AbounceRate%2Cga%3AadCost%2Cga%3AadClicks%2Cga%3ACTR";
        ActionKey = localStorage["token"];
            
        var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
        //Load default page
        //console.log(url);
        $.getJSON(url, function (result) {
            //console.log(result);
            $.each(result, function (i, field) {
                if (i == "totalsForAllResults") {
                    var data = field;
                    var ctr = data["ga:CTR"];
                    var bounceRate = data["ga:bounceRate"];
                    var adClicks = data["ga:adClicks"];
                    var sessions = data["ga:sessions"];
                    var adCost =data["ga:adCost"];
                    var selectionTitle = "";
                    switch(selected){
                        case "ga:CTR":
                        selectionTitle = "Average CTR: ";
                        break;
                        case "ga:bounceRate":
                        selectionTitle = "Average Bounce Rate: ";
                        break;
                        case "ga:adClicks":
                        selectionTitle = "Total Clicks: ";
                        break;
                        case "ga:Sessions":
                        selectionTitle = "Total Sessions: ";
                        break;
                        case "ga:adCost":
                        selectionTitle = "Total Spent: ";
                        break;
                        
                    }
                    $('#overview-total-desc').html("Average "+$('#filter').find(":selected").text()+": "+'<span id="overview"></span>');
                    $('#overview').html(ctr);
                    $('#total-clicks').html(adClicks);
                    $('#total-spent').html(adCost);
                    $('#total-sessions').html(sessions);
                    $('#avg-bounce-rate').html(bounceRate);
                    $('#avg-ctr').html(ctr);
                }
            });
        });

    /* ------------------------------ Date Range Setup ------------------------------ */


    var sessiondurationChart = new gapi.analytics.googleCharts.DataChart(durationConfig)
        .set({
            query: dateRange1
        })
        .set({
            chart: {
                container: 'session-duration-graph-id'
            }
        });

    var bounceChart = new gapi.analytics.googleCharts.DataChart(bounceConfig)
        .set({
            query: dateRange1
        })
        .set({
            chart: {
                container: 'bounce-back-graph-id'
            }
        });

    var sessionChart = new gapi.analytics.googleCharts.DataChart(sessionConfig)
        .set({
            query: dateRange1
        })
        .set({
            chart: {
                container: 'session-graph-id',
                type: 'COLUMN',
            }
        });

    var clicksChart = new gapi.analytics.googleCharts.DataChart(clicksConfig)
        .set({
            query: dateRange1
        })
        .set({
            chart: {
                container: 'clicks-graph-id',
                type: 'LINE',
            }
        });

    var ctrChart = new gapi.analytics.googleCharts.DataChart(ctrConfig)
        .set({
            query: dateRange1
        })
        .set({
            chart: {
                container: 'ctr-graph-id',
                type: 'LINE',
            }
        });

    var overviewChart = new gapi.analytics.googleCharts.DataChart(overviewConfig)
        .set({
            query: dateRange1
        })
        .set({
            chart: {
                container: 'overview-graph-id',
                type: 'LINE',
            }
        });



    overviewSelector.on('viewChange', function(data) {
        overviewChart.set({
            query: {
                ids: data.ids,
            }
        }).execute();
        //console.log(data)
      
    });

    sessiondurationSelector.on('viewChange', function(data) {
        sessiondurationChart.set({
            query: {
                ids: data.ids
            }
        }).execute();
    });

    bouncebackSelector.on('viewChange', function(data) {
        bounceChart.set({
            query: {
                ids: data.ids
            }
        }).execute();
    });

    sessionSelector.on('viewChange', function(data) {
        sessionChart.set({
            query: {
                ids: data.ids
            }
        }).execute();
    });

    clickSelector.on('viewChange', function(data) {
        clicksChart.set({
            query: {
                ids: data.ids
            }
        }).execute();
    });

    ctrSelector.on('viewChange', function(data) {
        ctrChart.set({
            query: {
                ids: data.ids
            }
        }).execute();
    });
  
    duration_Selector.on('change', function(data) {
        sessiondurationChart.set({
            query: data
        }).execute();
        sDate = data['start-date'];
        eDate = data['end-date'];
        var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
        $.getJSON(url, function (result) {
            //console.log(result);
            $.each(result, function (i, field) {
                if (i == "totalsForAllResults") {
                    var data = field;
                    var ctr = data["ga:CTR"];
                    var bounceRate = data["ga:bounceRate"];
                    var adClicks = data["ga:adClicks"];
                    var sessions = data["ga:sessions"];
                    var adCost =data["ga:adCost"];
                  $('#total-spent').html(adCost);
                    }
            });
        });
    });

    bounce_Selector.on('change', function(data) {
        bounceChart.set({
            query: data
        }).execute();
        sDate = data['start-date'];
        eDate = data['end-date'];
        var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
        //console.log(url);
        $.getJSON(url, function (result) {
            //console.log(result);
            $.each(result, function (i, field) {
                if (i == "totalsForAllResults") {
                    var data = field;
                    var ctr = data["ga:CTR"];
                    var bounceRate = data["ga:bounceRate"];
                    var adClicks = data["ga:adClicks"];
                    var sessions = data["ga:sessions"];
                    var adCost =data["ga:adCost"];
                  $('#avg-bounce-rate').html(bounceRate);
                    }
            });
        });
    });

    session_selector.on('change', function(data) {
        sessionChart.set({
            query: data
        }).execute();
        sDate = data['start-date'];
        eDate = data['end-date'];
        var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
        //console.log(url);
        $.getJSON(url, function (result) {
            //console.log(result);
            $.each(result, function (i, field) {
                if (i == "totalsForAllResults") {
                    var data = field;
                    var ctr = data["ga:CTR"];
                    var bounceRate = data["ga:bounceRate"];
                    var adClicks = data["ga:adClicks"];
                    var sessions = data["ga:sessions"];
                    var adCost =data["ga:adCost"];
                  $('#total-sessions').html(sessions);
                    }
            });
        });
    });


    clicks_selector.on('change', function(data) {
        clicksChart.set({
            query: data
        }).execute();
        sDate = data['start-date'];
        eDate = data['end-date'];
        var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
        //console.log(url);
        $.getJSON(url, function (result) {
            //console.log(result);
            $.each(result, function (i, field) {
                if (i == "totalsForAllResults") {
                    var data = field;
                    var ctr = data["ga:CTR"];
                    var bounceRate = data["ga:bounceRate"];
                    var adClicks = data["ga:adClicks"];
                    var sessions = data["ga:sessions"];
                    var adCost =data["ga:adCost"];
                    $('#total-clicks').html(adClicks);
                    }
            });
        });
    });

    ctr_selector.on('change', function(data) {
        ctrChart.set({
            query: data
        }).execute();
        sDate = data['start-date'];
        eDate = data['end-date'];
        var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
        //console.log(url);
        $.getJSON(url, function (result) {
            //console.log(result);
            $.each(result, function (i, field) {
                if (i == "totalsForAllResults") {
                    var data = field;
                    var ctr = data["ga:CTR"];
                    var bounceRate = data["ga:bounceRate"];
                    var adClicks = data["ga:adClicks"];
                    var sessions = data["ga:sessions"];
                    var adCost =data["ga:adCost"];
                    $('#avg-ctr').html(ctr);
                    }
            });
        });
    });

    overview_selector.on('change', function(data) {
        overviewChart.set({
            query: data
        }).execute();
        //console.log("data is change");
       // console.log(data['start-date']);
        sDate = data['start-date'];
        eDate = data['end-date'];
        var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
        //console.log(url);
        $.getJSON(url, function (result) {
            //console.log(result);
            $.each(result, function (i, field) {
                if (i == "totalsForAllResults") {
                    var data = field;
                    var ctr = data["ga:CTR"];
                    var bounceRate = data["ga:bounceRate"];
                    var adClicks = data["ga:adClicks"];
                    var sessions = data["ga:sessions"];
                    var adCost =data["ga:adCost"];
                    if(selected=="ga:Sessions"){
                        selected="ga:sessions";
                        var overview = data[selected] ;
                    }else{
                        var overview = data[selected] ;
                    }
                    var selectionTitle = "";
                    switch(selected){
                        case "ga:CTR":
                        selectionTitle = "Average CTR: ";
                        break;
                        case "ga:bounceRate":
                        selectionTitle = "Average Bounce Rate: ";
                        break;
                        case "ga:adClicks":
                        selectionTitle = "Total Clicks: ";
                        break;
                        case "ga:Sessions":
                        selectionTitle = "Total Sessions: ";
                        break;
                        case "ga:adCost":
                        selectionTitle = "Total Spent: ";
                        break;
                        
                    }
                    $('#overview-total-desc').html("Average "+$('#filter').find(":selected").text()+": "+'<span id="overview"></span>');
                    $('#overview').html(overview);
                    }
            });
        });

    });


});