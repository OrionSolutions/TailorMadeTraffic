$(document).ready(function() {
	$(".chart").fancybox({
		type:'ajax',
		autoDimensions: false,
		autoSize  :false,
		maxWidth	: 2000,
		maxHeight	: 2000,
		width		: 1000,
		height		: '70%',
		openEffect	: 'none',
		closeEffect	: 'none',
		href: "graph_facebook.php" 
	});

	
});