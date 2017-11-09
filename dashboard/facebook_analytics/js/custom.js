$(document).ready(function () {


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
	var apiHeader = "https://www.googleapis.com/analytics/v3/data/ga?";
	var siteID = "ga%3A"+site_id;
	var sDate = '2017-09-01';
	var eDate = '2017-09-30';
	var metrics = "ga%3Asessions%2Cga%3AbounceRate%2Cga%3AadCost%2Cga%3AadClicks%2Cga%3ACTR";
	var ActionKey = localStorage["token"];
	
	DefaultData();

	function DefaultData() {
	
	apiHeader = "https://www.googleapis.com/analytics/v3/data/ga?";
	siteID = "ga%3A"+site_id;
	sDate = '30daysAgo';
	eDate = 'yesterday';
	metrics = "ga%3Asessions%2Cga%3AbounceRate%2Cga%3AadCost%2Cga%3AadClicks%2Cga%3ACTR";
	ActionKey = localStorage["token"];
		
	var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
	//Load default page
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
				$("#ctr-monthly").append(RoundDecimal(ctr));
				$("#clicks-monthly").append(adClicks);
				$("#session-monthly").append(sessions);
				$("#bounce-monthly").append(RoundDecimal(bounceRate));
				$("#session-duration-monthly").append(adCost);
				}
		});
	});
	
	apiHeader = "https://www.googleapis.com/analytics/v3/data/ga?";
	siteID = "ga%3A"+site_id;
	sDate = '7daysAgo';
	eDate = 'today';
	metrics = "ga%3Asessions%2Cga%3AbounceRate%2Cga%3AadCost%2Cga%3AadClicks%2Cga%3ACTR";
	ActionKey = localStorage["token"];	

	var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
	//Load default page
	$.getJSON(url, function (result) {
		//console.log(result);
		$.each(result, function (i, field) {
			if (i == "totalsForAllResults") {
				var data = field;
				var ctr = data["ga:CTR"];
				var bounceRate = data["ga:bounceRate"];
				var adClicks = data["ga:adClicks"];
				var sessions = data["ga:sessions"];
				var adCost = data["ga:adCost"];
				
				$("#ctr-weekly").append(RoundDecimal(ctr));
				$("#clicks-weekly").append(adClicks);
				$("#session-weekly").append(sessions);
				$("#bounce-weekly").append(RoundDecimal(bounceRate));
				$("#session-duration-weekly").append(adCost);
				}
		});
	});
	
		apiHeader = "https://www.googleapis.com/analytics/v3/data/ga?";
	siteID = "ga%3A"+site_id;
	sDate = 'today';
	eDate = 'today';
	metrics = "ga%3Asessions%2Cga%3AbounceRate%2Cga%3AadCost%2Cga%3AadClicks%2Cga%3ACTR";
	ActionKey = localStorage["token"];	

	var url = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
	//Load default page
	$.getJSON(url, function (result) {
		//console.log(result);
		$.each(result, function (i, field) {
			if (i == "totalsForAllResults") {
				var data = field;
				var ctr = data["ga:CTR"];
				var bounceRate = data["ga:bounceRate"];
				var adClicks = data["ga:adClicks"];
				var sessions = data["ga:sessions"];
				var adCost = data["ga:adCost"];
				
				$("#ctr-daily").append(RoundDecimal(ctr));
				$("#clicks-daily").append(adClicks);
				$("#session-daily").append(sessions);
				$("#bounce-daily").append(RoundDecimal(bounceRate));
				$("#session-duration-daily").append(adCost);

				
				}
		});
	});	

}

	function RoundDecimal(i) {
		i=Number(i).toFixed(2)
		return i;
	}
	//Monthly Function 

	function LoadMonthlyChart() {
	//var url = "https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A137244157&start-date=2017-09-01&end-date=2017-09-30&metrics=ga%3Asessions%2Cga%3AbounceRate%2Cga%3AsessionDuration%2Cga%3AadClicks%2Cga%3ACTR&access_token="+ActionKey;
	$.getJSON(url, function (result) {
		console.log(result);
		$.each(result, function (i, field) {
			if (i == "totalsForAllResults") {
					var data = field;
					var users = data["ga:users"];
					var impressions = data["ga:impressions"];
					var cpm = data["ga:CPM"];
					$("#visitor-monthly").append(users);
					$("#cpm-monthly").append(cpm);
					$("#impression-monthly").append(impressions);
				
				}
		});
	});
	
	}	

	
	//Weekly Function 
	function WeeklyChart() {

		//var url = "https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A137244157&start-date=2017-09-01&end-date=2017-09-30&metrics=ga%3Asessions%2Cga%3AbounceRate%2Cga%3AsessionDuration%2Cga%3AadClicks%2Cga%3ACTR&access_token=" + ActionKey;
		$.getJSON(url, function (result) {
			console.log(result);
			$.each(result, function (i, field) {
				if (i == "totalsForAllResults") {
					var data = field;
					var users = data["ga:users"];
					var impressions = data["ga:impressions"];
					var cpm = data["ga:CPM"];
					$("#visitor-monthly").append(users);
					$("#cpm-monthly").append(cpm);
					$("#impression-monthly").append(impressions);
				
				}
			});
		});
	
	}		
	
	function DailyChart() {

	//var url = "https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A137244157&start-date=2017-09-22&end-date=2017-09-22&metrics=ga%3Ausers%2Cga%3Aimpressions%2Cga%3ACPM&access_token=ya29.GlzNBCqFsLkl7s9ziMPC9rscycc0vHYopuG2lIO91SgmAMTZCk6k9n-2aeplPddjYh-VaNII3tEwCs0a3gy7OdTpuhoC-xhdhiTamY4iK9xYGD1Rjkzy84_1HM2PHw";
	$.getJSON(url, function (result) {
		console.log(result);
		$.each(result, function (i, field) {
			if (i == "totalsForAllResults") {
					var data = field;
					var users = data["ga:users"];
					var impressions = data["ga:impressions"];
					var cpm = data["ga:CPM"];
					$("#visitor-monthly").append(users);
					$("#cpm-monthly").append(cpm);
					$("#impression-monthly").append(impressions);
				
				}
		});
	});	

	}


 $('#logout').click(function(){
      firebase.auth().signOut().then(function() {
      }).catch(function(error) {
          alert("Error");
      });
  });

});


   
