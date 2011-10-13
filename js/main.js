$(document).ready( function(){

	$(document).keyup(function(e) {
		if (e.keyCode == 27) {
			$("#lightBox").hide();
			$('#overlay').hide();
		}
	});

	$('.tooltip').click(function() {
		$('#overlay').show();
		var load_document =  $(this).attr('data-file');
		$("#lightBox").load(load_document);
		$("#lightBox").show();
	});
});
