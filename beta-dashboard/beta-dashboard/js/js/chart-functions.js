gapi.analytics.ready(function() {
    $('#myavatar').attr('src', localStorage["photoURL"]);

    var ACCESS_TOKEN = localStorage["token"];

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
            metrics: 'ga:sessionDuration',
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
            metrics: 'ga:Sessions',
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

    /* ------------------------------ Date Range Setup ------------------------------ */
    var dateRange1 = {
        'start-date': '14daysAgo',
        'end-date': '8daysAgo'
    };

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



    var sessiondurationChart = new gapi.analytics.googleCharts.DataChart(durationConfig)
        .set({
            query: {
                dateRange1
            }
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



    $('#filter').on('change', function() {
        var metric = {
            metrics: this.value
        };
        console.log(metric);
        overviewChart.set({
            query: metric
        }).execute();
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
                ids: data.ids
            }
        }).execute();
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
        console.log("data is change");
    });

    bounce_Selector.on('change', function(data) {
        bounceChart.set({
            query: data
        }).execute();
        console.log("data is change");
    });

    session_selector.on('change', function(data) {
        sessionChart.set({
            query: data
        }).execute();
        console.log(data);
    });


    clicks_selector.on('change', function(data) {
        clicksChart.set({
            query: data
        }).execute();
        console.log("data is change");
    });

    ctr_selector.on('change', function(data) {
        ctrChart.set({
            query: data
        }).execute();
        console.log("data is change");
    });

    overview_selector.on('change', function(data) {
        overviewChart.set({
            query: data
        }).execute();
        console.log("data is change");
    });


});