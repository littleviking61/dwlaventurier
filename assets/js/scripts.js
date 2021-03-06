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

	// fotorama lightbox
	// -------------------------------------
	function fotoramaLightbox() {

		$('.gallery').not('.fotorama')
		 .on('fotorama:fullscreenenter', function (e, fotorama, extra) {
			 	fotorama.setOptions({
				  margin: 10,
				  thumbmargin: 10
				});
      })
		 .on('fotorama:fullscreenexit', function (e, fotorama, extra) {
			 	fotorama.setOptions({
				  margin: 2,
				  thumbmargin: 2
				});
      })
			.fotorama({
				width: '100%',
				maxwidth: '100%',
			  ratio: 3/2,
			  allowfullscreen: true,
			  nav: 'thumbs',
			  thumbborderwidth: 0,
			  fit: 'cover',
			}).children().addClass('fotorama__wrap--no-controls');

		// $('<style></style>').appendTo($(document.body)).remove();
		// 
		$('a[href="#view-gallery"]').magnificPopup({
			type: 'ajax',
			ajax: {
				settings: {
					url: '/wp-admin/admin-ajax.php',
					type: 'post'
				}
			},
			callbacks: {
				elementParse: function() {
					this.st.ajax.settings.data = {
						action: 'get_gallery',
						gallery: this.st.el.attr('data-ids'),
						index: '0'
					};
				},
				ajaxContentAdded: function() {
					// Ajax content is loaded and appended to DOM
					$modal = this.content;

					$('.fotorama-ajax', $modal).fotorama({
						height: this.container.height() - 140,
					  width: '100%',
						maxwidth: '100%',
					  ratio: 3/2,
					  nav: 'thumbs',
					  thumbborderwidth: 0,
					  fit: 'scaledown',
					  margin: 10,
			  		thumbmargin: 10
					});
				},
				open: function() {
    			ga('send', 'event', 'ajax', 'click', 'gallery', this.currItem.el[0].title);
				}
			}
		});

		$('a[href="#view-position"]').magnificPopup({
			type: 'ajax',
			ajax: {
				settings: {
					url: '/wp-admin/admin-ajax.php',
					type: 'post'
				}
			},
			callbacks: {
				elementParse: function() {
					this.st.ajax.settings.data = {
						action: 'get_position',
					};
				},
				ajaxContentAdded: function() {
					// Ajax content is loaded and appended to DOM
					$modal = this.content;
					console.log($modal);

				},
				open: function() {
    				ga('send', 'event', 'ajax', 'click', 'position', this.currItem.el[0].title);
				}
			}
		});
	} 

	// magnifying popup
	function popupInit() {
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: true,

      fixedContentPos: false,

      callbacks: {
    		open: function() {
    			ga('send', 'event', 'iframe', 'click', 'popup a', this.currItem.src);
				}
			}
    });

	  $('.simple-ajax-popup').magnificPopup({
	    type: 'ajax',
	    tError: '<a href="%url%">The content</a> could not be loaded.',
	    callbacks: {
	    	open: function() {
	  			ga('send', 'event', 'ajax', 'click', 'simple', this.currItem.el[0].title);
				}
			}
	  });
        
    
    
	}

	// Timeline layout
	// -------------------------------------
	var left_Col = 0, right_Col = 0;
	function dwtl_layout(initIt, elems) {
		var dwtl = $('.timeline');
		var dwtl_width = dwtl.outerWidth();
		var dwlt_half = dwtl.find('.dwtl');
		var elems = elems || dwtl.find('.post, .hidden-separate');
		if (dwtl_width >= 800) {
			dwtl.removeClass('one-col').addClass('two-col');

			if(initIt)	left_Col = 0, right_Col = 0;

			dwlt_half.each(function(index, el) {
				if ($(el).hasClass('normal') && !$(el).hasClass('citation')) {
					if (left_Col <= right_Col) {
						$(el).removeClass('dwtl-right').addClass('dwtl-left');
						left_Col += $(el).outerHeight();
					} else {
						$(el).removeClass('dwtl-left').addClass('dwtl-right');
						right_Col += $(el).outerHeight();
					}
				} else if ($(el).hasClass('full')) {
					/*if( !$(el).prev().hasClass('citation') && !$(el).hasClass('timeline-pale')) {
						heightCitation = left_Col-right_Col;
						if(heightCitation > 100) {
							$(el).before('<div class="dwtl hentry normal citation dwtl-right show"><div class="entry-inner" style="height:'+ (heightCitation < 0 ? -heightCitation-30 : heightCitation-30 )+'px">...</div></div>');
						}else if(heightCitation < -100){
							$(el).before('<div class="dwtl hentry normal citation dwtl-left show "><div class="entry-inner" style="height:'+ (heightCitation < 0 ? -heightCitation-30 : heightCitation-30 )+'px">...</div></div>');
						}
					}*/

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
		if(initIt !== 'resize') elems.velocity("transition.slideUpBigIn", {stagger: 300});
	}

	// 
	function wrap_height() {
		var wpadminbarHeight = $('#wpadminbar').outerHeight();
		$('.wrap').css({
			'min-height': (viewHeight - wpadminbarHeight)
		});
	}

	// 
	// function sidebar_hieght() {
	// 	var sidebarHieght = $('.sidebar-primary .inner').outerHeight();
	// 	if (sidebarHieght > viewHeight) {
	// 		$('.sidebar-primary').css({
	// 			'overflow-y': 'auto'
	// 		});
	// 	}
	// }

	// document ready 
	// --------------------------------
	$(document).ready(function() {
		// Main sidebar
		// $(document).on('click','.sidebar-toggle, .main-sidebar-open .wrap', function() {
		// 	var $b = $('body');
		// 	var $h = $('html');
		// 	$(this).toggleClass('active');
		// 	sidebar_hieght();
		// 	if($b.hasClass('main-sidebar-open')) {
		// 		$b
		// 			.removeClass('main-sidebar-open')
		// 			.css({'paddingRight': 0, backgroundColor:'black'});
		// 	}else{
		// 		$b
		// 			.addClass('main-sidebar-open')
		// 			.css({'paddingRight': 15, backgroundColor:'black'});
		// 	}
		// });

		// $(document).on('click','.sub-nav-open, .widget .menu a[href^="#"]', function(e){
		// 		e.preventDefault();
  //       $(this).toggleClass('active');
  //       sidebar_hieght();
  //   });

		// sidebar_hieght();
		// wrap_height();

		// Timeline 
		$('body').imagesLoaded( function() {
			dwtl_layout();
		});
		// $('html').scrollTop(1);

		// responsive Iframe
		responsiveIframe();

		// Pretty Print
		prettyPrint();

		// Nivo lightbox
		// fotoramaLightbox();

		// magnifying popup
		popupInit();

		$('.widget .children').before('<i class="fa fa-caret-right sub-nav-open"></i>');

		

		// Create a new instance of Headhesive.js and pass in some options
		// var header = new Headhesive('header.banner .header-nav');

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
		// sidebar_hieght();
		// wrap_height();

		// Timeline 
		dwtl_layout('resize');

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
		year = $el.text();
		link = $el.attr('href');
		param = link.split('?')[1]
		links = [{'url': link, 'year': year}];
		count = parseInt(($el.next().text() / perPage).toFixed(0));
		$el.attr('data-numPage', nextPagesIndex);
		if(count > 0) {
			for (i = 1; i < count; i++) { 
			  links.push({'url': '/'+year+'/page/'+(i+1)+(param !== undefined ? '?'+param : ''), 'year': undefined});
			}
			count--;
		};
		nextPagesIndex += count + 1;

		return links;
	});
	// console.log(nextPages);

	$('.timeline-scrubber').attr('data-count', nextPages.length);
	$('.timeline-scrubber ul li:first-child').addClass('loaded');

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

			$('html, body').stop(true, false).animate({
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
			t.add(t.prevAll().not('.loaded')).addClass('loading');
			// todo load everything before avec loadedPage.length pour connaitre le dernier el chargé
			if (!contentLoading && !moveByScrubber) {
				moveByScrubber = pageNum;
				timelineInfinitescroll._binding('unbind');
				// timelineInfinitescroll.options.state.currPage = parseInt(pageNum) - 1;
				// var currPage = timelineInfinitescroll.options.state.currPage;
				// if (timelineInfinitescroll.options.state.isDone && loadedPage.length < parseInt($('.timeline-scrubber').data('count')) ) {
				timelineInfinitescroll.options.state.isDone = false;
				// }
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
		bufferPx: 400,
		animate: false,
		loading: {
			finished: function() {
				// console.log('finished');
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
				if(nextPages[opts.state.currPage-1] !== undefined) {
					var yearsUrl = nextPages[opts.state.currPage-1].url.split('/')[1];
					$('.timeline-scrubber a[href^="/'+yearsUrl+'"]').parent().removeClass('loading').addClass('loaded');
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
				var yearsUrl = nextPages[opts.state.currPage];
				if(yearsUrl !== undefined) {
					$('.timeline-scrubber a[href^="/'+yearsUrl.url.split('/')[1]+'"]').parent().addClass('loading');
				}
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
			
			ga('send', 'pageview', nextPages[opts.state.currPage-1].url);
			isNewYear = pageText !== undefined;
			
			if (opts.state.currPage >= max) {
				var hiddenSeparate = pageText !== undefined ? ' full' : ' hidden-separate normal';
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

			timeline.imagesLoaded( function() {
				dwtl_layout(isNewYear, elems);
				// elems.velocity("transition.slideUpBigIn", {stagger: 300});
			});

			fotoramaLightbox();
			responsiveIframe();
			popupInit();

			// $("img.lazy").lazyload();

			scrollPoint = timeline.find('.timeline-pale[data-page="' + pageNum + '"]').offset().top;

			if ($('body').hasClass('admin-bar')) {
				scrollPoint -= 32;
			}

			// retrieve all content to scrubber when clicked
			if (moveByScrubber) {
				if(loadedPage.indexOf(moveByScrubber) === -1){
					$t._binding('bind');
					$t.options.state.isDone = false;
					$t.retrieve();

					// continue moving scroll
					$('html, body').stop(true,false).animate({
						scrollTop: scrollPoint
					},1000);
				}else{
					$('html, body').animate({
						scrollTop: scrollPoint
					},
					1000, function() {
						moveByScrubber = false;
						$t._binding('bind');
						// $t.options.state.isDone = true;
						$('.timeline-scrubber ul li').removeClass('active');
						$('.timeline-scrubber ul li[data-page="' + pageNum + '"]').addClass('active');
						$('.timeline-scrubber ul li.active').parent().prev().addClass('active par');
					});
				}
			}

		}
	});

	// if (infinitescroll.show_more_button == 'yes') {
	// 	$(window).unbind('.infscr');
	// 	$(document).on('click','#infscr-loading',function() {
	// 		timeline.infinitescroll('retrieve');
	// 		if ( ! $('#infscr-loading div').hasClass('end')) {
	// 			$('#infscr-loading div').css({'display':'none'});
	// 			$('#infscr-loading img').css({'display':'inline-block'});
	// 		};
	// 		return false;
	// 	});
	// };

	// Window scroll 
	//------------------------
	$(window).on('scroll', function() {
		if (!contentLoading) {
			var pales = $( $('.timeline .timeline-pale:not(.hidden-separate)').get().reverse() );
			pales.each(function() {
				var t = $(this);
				var position = t.offset().top - $(window).scrollTop();
				if (position <= $(window).height()/2 /*&& !moveByScrubber*/) {
					var page = t.data('page');
					$('.timeline-scrubber ul li.active').removeClass('active par');
					$('.timeline-scrubber ul li a[data-numpage="' + page + '"]').parent().addClass('active');
					$('.timeline-scrubber ul li.active').parent().prev().addClass('active par');
					return false;
				}
			});
		}
	});

	// Get Started
	//------------------------
	// $('.touch #get-started').click(function() {
	// 	$(this).addClass('active');
	// 	setTimeout(function(){
	// 		$('#get-started').removeClass('active');
	// 	},300);        
	// });

	// $('.no-touch #get-started').mouseover(function() {
	// 	$(this).addClass('active');
	// });

	// $('.no-touch #get-started').mouseout(function() {
	// 	$(this).removeClass('active');
	// });

	// $('#get-started').click(function() {
	// 	var wrapPos = $('.wrap > .container').offset().top;
	// 	wpadminbar_height = $('#wpadminbar').outerHeight(),
	// 	$('html, body').animate({
	// 		scrollTop: (wrapPos - wpadminbar_height)
	// 	}, 500);
	// });
});