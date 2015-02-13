jQuery(function($){
	function dwpb_fix_hieght() { 
		var dwpb_height = $('#dwpb').outerHeight();

		setTimeout(function(){
			$('body.dwpb-push-page.dwpb-open').css({
				'margin-top' : dwpb_height + 'px',
			});
			$('body.dwpb-push-page.admin-bar.dwpb-open #wpadminbar').attr('style','top:'+dwpb_height+'px !important') 
		},1010);
	};

	$(document).ready(function(){
		dwpb_fix_hieght();
		
		$('.dwpb-action').click(function(){
			dwpb_fix_hieght();
		});
	});

	$(window).resize(function(){
		dwpb_fix_hieght();
	});
});