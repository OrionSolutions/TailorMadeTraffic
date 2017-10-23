var analytics = apiHeader + "ids=" + siteID + "&start-date=" + sDate + "&end-date=" + eDate + "&metrics=" + metrics + "&access_token=" + ActionKey;
$.ajax({
	url: analytics,
	dataType: 'json',
	async: false,
	data: myData,
	success: function(data) {
		alert(data);
		//JSON.parse('{ "name":"John", "age":30, "city":"New York"}');
	  //stuff
	  //...
	}
  });