$(document).ready(function() {
	$('.comments_open').click(function(){
		$(this).parents('.rsh_ans_body').next().toggleClass('height_auto');
	});
	$(".js-example-basic-multiple").select2({
		placeholder: "Select tags to filter",
		maximumSelectionLength: 5,
	});
	$(".js-example-basic-hide-search").select2({
		minimumResultsForSearch: Infinity,
	});
});