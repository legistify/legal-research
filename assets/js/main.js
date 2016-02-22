$(document).ready(function() {
	$('.comments_open').click(function(){
		$(this).next().css('height','auto');
		$(this).fadeOut();
	});
	$(".js-example-basic-multiple").select2({
		placeholder: "Select tags to filter",
		maximumSelectionLength: 5,
	});
	$(".js-example-basic-hide-search").select2({
		minimumResultsForSearch: Infinity,
	});
});