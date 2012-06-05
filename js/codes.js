$(document).ready(function(){

	$('#codes').addClass('active');

	$('.sec-bod').jTruncate({
		length: 500,
	});
	
	$.getJSON("getposts.php", {}, function(data){
		$.each(data, function(i, member){
			$('#blogcomms').append("<div class='posted'>" +
				"<h1 class='post-h1'>" + member[0] + "</h1>" +
				"<h2 class='post-h2'>" + member[2] + "</h2>" +
				"<p class='post-p'>" + member[1] + "</p>" +
				"</div>"
			);
		});
	});
	
});