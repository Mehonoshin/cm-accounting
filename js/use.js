$(function() {
	$('#table-report').click(function() {
		$('.report-check').attr('disabled', '');
		$('.report-check').attr('checked', '');
	});
	$('#graph-report').click(function() {
		$('.report-check').attr('disabled', 'disabled');
		$('.report-check').attr('checked', 'checked');
	});
});