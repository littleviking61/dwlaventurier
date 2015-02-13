jQuery(function($) {
	// Style selector 
	function style_selector(){
		var val = $('#customize-control-style_selector select').val();
		var array = [
			['default','#accordion-section-dw_timeline_cover, #accordion-section-dw_timeline_header_mask'],
			['flat','#customize-control-flat_header_mask, #customize-control-flat_timline_background']
		]
		for (var i = 0; i < array.length; i++) {
			if (val != array[i][0]) {
				$(array[i][1]).css({
					'display': 'none'
				});
			} else {
				$(array[i][1]).removeAttr('style');
			}
		};
	}

	style_selector();

	$('#customize-control-style_selector select').change(function() {
		style_selector();
	});
});