if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
	var msViewportStyle = document.createElement('style')
	msViewportStyle.appendChild(
	document.createTextNode(
		'@-ms-viewport{width:auto!important}'
	)
	)
	document.querySelector('head').appendChild(msViewportStyle)
}

jQuery(function($) {
	var timeline = $('.timeline'),
		perPage = timeline.data('perpage'),
		contentLoading = false,
		moveByScrubber = false,
		loadedPage = [1],
		viewWidth = $(window).outerWidth(),
		viewHeight = $(window).outerHeight();

	// Fix responsive iframe
	// -------------------------------------
	function responsiveIframe() {
		$('iframe').each(function() {
			var parent = $(this).parent().attr('class');
			if (!$(this).hasClass('twitter-tweet') && parent != 'video-preview form-group') {
				var iw = $(this).attr('width'),
					ih = $(this).attr('height'),
					ip = $(this).parent().width(),
					ipw = ip / iw,
					ipwh = ih * ipw; 
				if (iw != '100%') {
					$(this).css({
						'width': ip,
						'height': ipwh,
					});
				};
			}
		});
	}

	// Nivo lightbox
	// -------------------------------------
	function nivoLightbox() {
		if (dwtl.gallery_lightbox != 'disable') {
			$('.gallery .thumbnail, .lightbox').nivoLightbox();
		};
	} 

	// Timeline layout
	// -------------------------------------
	var left_Col = 0, right_Col = 0;
	function dwtl_layout(initIt) {
		var dwtl = $('.timeline');
		var dwtl_width = dwtl.outerWidth();
		var dwlt_half = dwtl.find('.dwtl');
		if (dwtl_width >= 800) {
			dwtl.removeClass('one-col').addClass('two-col');

			if(initIt)	left_Col = 0, right_Col = 0;

			dwlt_half.each(function(index, el) {
				if ($(el).hasClass('normal')) {
					if (left_Col <= right_Col) {
						$(el).removeClass('dwtl-right').addClass('dwtl-left');
						left_Col += $(el).outerHeight();
					} else {
						$(el).removeClass('dwtl-left').addClass('dwtl-right');
						right_Col += $(el).outerHeight();
					}
				} else if ($(el).hasClass('full')) {
					left_Col = 0;
					right_Col = 0;
				}
			});
			$('.dwtl').addClass('show');
		} else {
			dwtl.removeClass('two-col').addClass('one-col');
			dwlt_half.each(function(index, el) {
				$(el).removeClass('dwtl-left dwtl-right');
			});
		}
	}

	// 
	function wrap_height() {
		var wpadminbarHeight = $('#wpadminbar').outerHeight();
		$('.wrap').css({
			'min-height': (viewHeight - wpadminbarHeight)
		});
	}

	// 
	function sidebar_hieght() {
		var sidebarHieght = $('.sidebar-primary .inner').outerHeight();
		if (sidebarHieght > viewHeight) {
			$('.sidebar-primary').css({
				'overflow-y': 'scroll'
			});
		}
	}

	// document ready 
	// --------------------------------
	$(document).ready(function() {
		// Main sidebar
		$('.sidebar-toggle.active').click(function() {
			$('.sidebar-primary').css({
				'display': 'block',
				'position': 'fixed'
			});
			sidebar_hieght();
			$('html').addClass('main-sidebar-open');
			setTimeout(function(){
				$('.sidebar-toggle').addClass('x').removeClass('active');
			},400);
		});

		$(document).on('click','.wrap, .sidebar-toggle.x', function(){
			$('html').removeClass('main-sidebar-open');
			setTimeout(function() {
				$('.sidebar-primary').css({
					'display': 'none',
					'position': 'absolute'
				});
				$('.sidebar-toggle').addClass('active').removeClass('x');
			}, 400);
		});

		// Main nav
		$('.nav-main-toggle.active').click(function() {
			$('.nav-main').css({
				'display': 'block',
				'position': 'fixed'
			});
			
			$('html').addClass('main-nav-open');
			setTimeout(function(){
				$('.nav-main-toggle').addClass('x').removeClass('active');
			},400);
		});

		$(document).on('click','.wrap, .nav-main-toggle.x', function(){
			$('html').removeClass('main-nav-open');
			setTimeout(function() {
				$('.nav-main').css({
					'display': 'none',
					'position': 'absolute'
				});
				$('.nav-main-toggle').addClass('active').removeClass('x');
			}, 400);
		});

		$(document).on('click','.sub-nav-open', function(){
			$(this).toggleClass('active');
			sidebar_hieght();
		});

		sidebar_hieght();
		wrap_height();

		// Timeline 
		dwtl_layout();
		// $('html').scrollTop(1);

		// responsive Iframe
		responsiveIframe();

		// Pretty Print
		prettyPrint();

		// Nivo lightbox
		nivoLightbox();

		$('.widget .children').before('<i class="fa fa-caret-right sub-nav-open"></i>');

		// scroll to top button
		$(window).scroll(function() {
			if ($(this).scrollTop() > viewHeight / 2) {
				$('.scrollup').fadeIn();
			} else {
				$('.scrollup').fadeOut();
			}
		});

		$('.scrollup').click(function() {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});

	});

	// window resize
	// --------------------------------
	$(window).resize(function() {
		sidebar_hieght();
		wrap_height();

		// Timeline 
		dwtl_layout();

		// responsive Iframe
		responsiveIframe();
	});

	//Timeline scrubber
	// -------------------------------------
	if (typeof $('.timeline-scrubber').offset() !== 'undefined') {
		var scrubberOffset = $('.timeline-scrubber').offset().top - 30;
		if ($('body').hasClass('admin-bar')) {
			scrubberOffset -= 32;
		}
		$('.timeline-scrubber').affix({
			offset: {
				top: scrubberOffset
			}
		});
	}

	var nextPagesIndex = 1;
	var nextPages = $('.timeline-scrubber ul li a').map(function(index, el) {
		$el = $(el);
		year = $el.attr('href').split('/').join('');
		link = $el.attr('href');
		links = [{'url': link, 'year': year}];
		count = parseInt(($el.next().text() / perPage).toFixed(0));
		$el.attr('data-numPage', nextPagesIndex);
		if(count > 0) {
			for (i = 1; i < count; i++) { 
			  links.push({'url': link+'page/'+(i+1), 'year': undefined});
			}
			count--;
		};
		nextPagesIndex += count + 1;

		return links;
	});
	$('.timeline-scrubber').attr('data-count', nextPages.length);
	
	$('.timeline-scrubber ul li').on('click', function(event) {
		event.preventDefault();
		var timelineInfinitescroll = $('.timeline').data('infinitescroll');
		var t = $(this);
		var pageNum = parseInt($('a', t).data('numpage'));
		var scrollPoint = 0;
		if (loadedPage.indexOf(pageNum) > -1 && timeline.find('.timeline-pale[data-page="' + pageNum + '"]').length > 0) {
			if (moveByScrubber == pageNum) {
				return false;
			}
			moveByScrubber = pageNum;
			//Loaded
			scrollPoint = timeline.find('.timeline-pale[data-page="' + pageNum + '"]').offset().top;
			if ($('body').hasClass('admin-bar')) {
				scrollPoint -= 32;
			}

			$('html, body').animate({
					scrollTop: scrollPoint
				},
				1000, function() {
					timelineInfinitescroll._binding('bind');
					$('.timeline-scrubber ul li').removeClass('active');
					t.addClass('active');
					t.parent().prev().addClass('active par');
					moveByScrubber = false;
				});
		} else {
			// todo load everything before avec loadedPage.length pour connaitre le dernier el chargé
			if (!contentLoading && !moveByScrubber) {
				moveByScrubber = pageNum;
				timelineInfinitescroll._binding('unbind');
				timelineInfinitescroll.options.state.currPage = parseInt(pageNum) - 1;
				var currPage = timelineInfinitescroll.options.state.currPage;
				if (timelineInfinitescroll.options.state.isDone && loadedPage.length < parseInt($('.timeline-scrubber').data('count')) ) {
					timelineInfinitescroll.options.state.isDone = false;
				}
				timelineInfinitescroll.retrieve();
			}
		}

	});


	var msgText = '';
	if (infinitescroll.show_more_button == 'yes') {
		msgText = infinitescroll.more;
	};

	timeline.infinitescroll({
		navSelector: ".post-nav",
		nextSelector: ".post-nav .previous a",
		itemSelector: ".post",
		maxPage: nextPages.length,
		loading: {
			finished: function() {
				contentLoading = false;
				var $t = $('.timeline').data('infinitescroll');
				var opts = $t.options;
				if (!opts.state.isBeyondMaxPage) {
					opts.loading.msg.fadeOut(opts.loading.speed);
				}
				if (infinitescroll.show_more_button == 'yes') {
					$('#infscr-loading img').css({'display':'none'});
					$('#infscr-loading div').css({'display':'block'});
				}
				
				// Timeline 
				// dwtl_layout();
			},
			finishedMsg: infinitescroll.the_end,
			img: infinitescroll.loading_timline,
			msgText: msgText,
			start: function() {
				contentLoading = true;
				var $t = $('.timeline').data('infinitescroll');
				var opts = $t.options;
				$(opts.navSelector).hide();
				if (loadedPage.indexOf(opts.state.currPage + 1) > -1) {
					contentLoading = false;
					return false;
				}
				loadedPage.push(opts.state.currPage + 1);
				opts.loading.msg
					.appendTo(opts.loading.selector)
					.show(opts.loading.speed, $.proxy(function() {
						$t.beginAjax(opts);
					}, $t));

				if (infinitescroll.show_more_button == 'yes') {
					$('#infscr-loading div').addClass('show-more');
				}
			}
		},
		appendCallback: false,
		errorCallback: function() {
			var timelineInfinitescroll = $('.timeline').data('infinitescroll');
			timelineInfinitescroll._binding('bind');
			contentLoading = false;
			moveByScrubber = false;

			if (infinitescroll.show_more_button == 'yes') {
				$('#infscr-loading div').addClass('end').css({'display':'block'});
				setTimeout(function(){
					$('#infscr-loading').css({'cursor':'initial'});
				},2000);
			}
		},
		path: function(index) { 
			console.log(index-1);
			return nextPages[index-1].url;
		}
	}, function(elems) {
		if (elems.length > 0) {
			var isNewYear=false;
			var $t = $('.timeline').data('infinitescroll');
			var opts = $t.options;
			$t._debug('contentSelector', $(opts.contentSelector)[0]);
			var max = Math.max.apply(null, loadedPage);
			// var separate = $('<div data-page="' + opts.state.currPage + '" class="timeline-pale dwtl full remove-time-anchor"><span>' + pageText + ' </span></div>');
			var pageNum = opts.state.currPage;
			var pageText = nextPages[opts.state.currPage-1].year;
			isNewYear = pageText !== undefined;
			if (opts.state.currPage >= max) {
				var hiddenSeparate = pageText !== undefined ? ' full' : ' hidden';
				var separate = $('<div data-page="' + pageNum + '" class="timeline-pale dwtl remove-time-anchor'+hiddenSeparate+'"><span>' + pageText + '</span></div>');
				$(opts.contentSelector).append(separate);
				$(opts.contentSelector).append(elems);
			} else {
				var currPage = opts.state.currPage;
				while (currPage > 0) {
					currPage--;
					if (loadedPage.indexOf(currPage) > -1) {
						break;
					}
				}

				$(opts.contentSelector).find('.post[data-page="' + currPage + '"]:last').after(elems);
				$(opts.contentSelector).find('.post[data-page="' + currPage + '"]:last').after(separate);
				opts.state.currPage = max;
			}

			dwtl_layout(isNewYear);
			nivoLightbox();
			responsiveIframe();

			scrollPoint = timeline.find('.timeline-pale[data-page="' + pageNum + '"]').offset().top;

			if ($('body').hasClass('admin-bar')) {
				scrollPoint -= 32;
			}

			if (moveByScrubber) {
				$('html, body').animate({
					scrollTop: scrollPoint
				},
				1000, function() {
					moveByScrubber = false;
					$t._binding('bind');
					$('.timeline-scrubber ul li').removeClass('active');
					$('.timeline-scrubber ul li[data-page="' + pageNum + '"]').addClass('active');
					$('.timeline-scrubber ul li.active').parent().prev().addClass('active par');
				});
			}

		}
	});

	if (infinitescroll.show_more_button == 'yes') {
		$(window).unbind('.infscr');
		$(document).on('click','#infscr-loading',function() {
			timeline.infinitescroll('retrieve');
			if ( ! $('#infscr-loading div').hasClass('end')) {
				$('#infscr-loading div').css({'display':'none'});
				$('#infscr-loading img').css({'display':'inline-block'});
			};
			return false;
		});
	};

	// Window scroll 
	//------------------------
	$(window).on('scroll', function() {
		if (!contentLoading) {
			$('.timeline .post').each(function() {
				var t = $(this);
				var position = $(window).scrollTop() - t.offset().top;
				if (position <= 0 && position >= -500 && !moveByScrubber) {
					var page = t.data('page');
					$('.timeline-scrubber ul li.active').removeClass('active par');
					$('.timeline-scrubber ul li[data-page="' + page + '"]').addClass('active');
					$('.timeline-scrubber ul li.active').parent().prev().addClass('active par');
				}
			});
		}
	});

	// Get Started
	//------------------------
	$('.touch #get-started').click(function() {
		$(this).addClass('active');
		setTimeout(function(){
			$('#get-started').removeClass('active');
		},300);        
	});

	$('.no-touch #get-started').mouseover(function() {
		$(this).addClass('active');
	});

	$('.no-touch #get-started').mouseout(function() {
		$(this).removeClass('active');
	});

	$('#get-started').click(function() {
		var wrapPos = $('.wrap > .container').offset().top;
		wpadminbar_height = $('#wpadminbar').outerHeight(),
		$('html, body').animate({
			scrollTop: (wrapPos - wpadminbar_height)
		}, 500);
	});
});