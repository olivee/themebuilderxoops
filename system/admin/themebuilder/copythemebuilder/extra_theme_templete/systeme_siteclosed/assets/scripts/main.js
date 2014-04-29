// window.requestAnimFrame = Modernizr.prefixed('requestAnimationFrame', window) || function( callback ){
//     window.setTimeout(callback, 1000 / 60);
// };
// window.cancelAnimFrame = Modernizr.prefixed('cancelAnimationFrame', window) || function( callback ){
//     window.setTimeout(callback, 1000 / 60);
// };

// $(window).load(function() {
//   alert(window.devicePixelRatio);
// });

$ = jQuery.noConflict();

if (!Date.now)
    Date.now = function() { return new Date().getTime(); };

(function() {
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for (var i = 0; i < vendors.length && !window.requestAnimationFrame; ++i) {
        var vp = vendors[i];
        window.requestAnimationFrame = window[vp+'RequestAnimationFrame'];
        window.cancelAnimationFrame = (window[vp+'CancelAnimationFrame']
                                   || window[vp+'CancelRequestAnimationFrame']);
    }
    if (/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent) // iOS6 is buggy
        || !window.requestAnimationFrame || !window.cancelAnimationFrame) {
        var lastTime = 0;
        window.requestAnimationFrame = function(callback) {
            var now = Date.now();
            var nextTime = Math.max(lastTime + 16, now);
            return setTimeout(function() { callback(lastTime = nextTime); },
                              nextTime - now);
        };
        window.cancelAnimationFrame = clearTimeout;
    }
}());


// Converts strings of type WebkitTransform to -webkit-transform
var inflectProperty = function (str) {
    return str.replace(/([A-Z])/g, function(str,m1){ return '-' + m1.toLowerCase(); }).replace(/^ms-/,'-ms-');
};


// Tests for transform-style: preserve-3d which isn't available in IE10
(function(Modernizr, win){
    Modernizr.addTest('csstransformspreserve3d', function () {
        var prop = Modernizr.prefixed('transformStyle');
        var val = 'preserve-3d';
        var computedStyle;
        if(!prop) return false;

        prop = prop.replace(/([A-Z])/g, function(str,m1){ return '-' + m1.toLowerCase(); }).replace(/^ms-/,'-ms-');

        Modernizr.testStyles('#modernizr{' + prop + ':' + val + ';}', function (el, rule) {
            computedStyle = win.getComputedStyle ? getComputedStyle(el, null).getPropertyValue(prop) : '';
        });

        return (computedStyle === val);
    });

    Modernizr.addTest('lowbandwidth', function() {
        var perf, start, end;
        var connection = Modernizr.prefixed('connection', navigator) || {};

        //polyfill connection.bandwidth with connection.type
        //do not use in operator or ===/!=== here! some browsers have type/bandwidth declared as undefined/null
        if( connection.bandwidth == null && connection.type != null ){
            connection.bandwidth = (
                connection.type == 0 || // connection.UNKNOWN
                connection.type == 3 || // connection.CELL_2G
                connection.type == 4 || // connection.CELL_3G
                /(UNKNOWN)|([23]g)|^(CELL)/i.test(connection.type)) ?
                1 :
                7
            ;
        //polyfill connection.bandwith with performance object stolen from guardian not tested!!!
        } else if( connection.bandwidth == null && (perf = Modernizr.prefixed('performance', window)) && (perf = perf.timing) &&
            (start = perf.requestStart || perf.fetchStart || perf.navigationStart) &&
            (end = perf.responseEnd) ){
            connection.bandwidth = ((end - start) < 1500) ? 7 : 1;
        //assume no-lowbandwidth
        } else {
            connection.bandwidth = 7;
        }
        if(connection.metered){
            connection.bandwidth /= 3;
        }
        return connection.bandwidth < 2.5;
    });
}(Modernizr, window));



// +function ($) { "use strict";

//   // CSS TRANSITION SUPPORT (Shoutout: http://www.modernizr.com/)
//   // ============================================================

//   function transitionEnd() {
//     var el = document.createElement('bootstrap')

//     var transEndEventNames = {
//       'WebkitTransition' : 'webkitTransitionEnd'
//     , 'MozTransition'    : 'transitionend'
//     , 'OTransition'      : 'oTransitionEnd otransitionend'
//     , 'transition'       : 'transitionend'
//     }

//     for (var name in transEndEventNames) {
//       if (el.style[name] !== undefined) {
//         return { end: transEndEventNames[name] }
//       }
//     }
//   }

//   // http://blog.alexmaccaw.com/css-transitions
//   $.fn.emulateTransitionEnd = function (duration) {
//     var called = false, $el = this
//     $(this).one($.support.transition.end, function () { called = true })
//     var callback = function () { if (!called) $($el).trigger($.support.transition.end) }
//     setTimeout(callback, duration)
//     return this
//   }

//   $.support.transition = transitionEnd();

// }(jQuery);

var _endEvent = function(type) {

  // var $me = this;
  typeLower = type.toLowerCase();

  return typeLower+" webkit"+type+" o"+type+" o"+typeLower;

  // this.element.bind(binding, function() {

  //   $me.element.unbind(binding);

  //   if(typeof todo == "function") {

  //     todo();
  //   }

  //   if(typeof callback == "function") {

  //     callback($me);
  //   }
  // });

};


//var clock;

// function PrefixedEvent(element, type, callback) {
//  var pfx = ["webkit", "moz", "MS", "o", ""];

//  for (var p = 0; p < pfx.length; p++) {
//      if (!pfx[p]) type = type.toLowerCase();
//      element.addEventListener(pfx[p]+type, callback, false);
//  }
// }
// Delayed image load

+$(window).load(function() {
	$('img[data-src]').each(function() {
		var img = $(this);

		img.attr('src', img.data('src'));
	});
});
+(function(){
	'use strict';

	window.miniGo = {};

	window.miniGo.clockReady = false;
	window.miniGo.videoReady = false;
	window.miniGo.ready = false;
	if(Modernizr.touch || miniGoOptions.background.type !== 'video') {
		window.miniGo.videoReady = true;
	}

	$('body').on('miniGo.ready', function() {
		window.miniGo.ready = true;
	});

	if (miniGoOptions.theme.contentBackground) {
		$('.site-page').addClass('site-page-padded');
	}

	if (miniGoOptions.background.color) {
		$('body').css({backgroundColor: miniGoOptions.background.color});
	}

	if(miniGoOptions.countdown.type == 'piechart' && Modernizr.canvas) {
		$('.clock').addClass('clock-alt');
	}

	var patternOverlay = miniGoOptions.background.patternOverlay || false;
	if(patternOverlay) {
		$('<div class="pattern-wrapper"></div>').css({backgroundImage: 'url(' + patternOverlay + ')', opacity: miniGoOptions.background.patternOverlayOpacity}).appendTo('body');
	}

}());
+(function() {
	var loader = $('.loader');
	var body = $('body');

	body.addClass('loader--loading');

	var hideLoader = function() {
		loader.on(_endEvent('TransitionEnd'), function(e) {
			if(e.eventPhase > 2)
				return;

			body.trigger('miniGo.ready');
            loader.css({
                display: 'none'
            });
        });

        if(!Modernizr.csstransitions) {
        	loader.trigger('transitionend');
        }

		setTimeout(function() {
			requestAnimationFrame(function(){
				// loader.css({
				// 	opacity: 0
				// });
			});
		}, 10);
	};

	var interval;
	var totalTime = 0;
	var loadEventTriggered = false;

	var loaded = function() {
		hideLoader();

		requestAnimationFrame(function(){
			body.addClass('loader--loaded');
		});

		$('.site-wrapper').one(_endEvent('TransitionEnd'), function(e) {
			if(e.eventPhase > 2)
				return;

			setTimeout(function() {
				body.removeClass('loader--loaded loader--loading');
			}, 600);
		});
	};

	setTimeout(function() {
		if(!loadEventTriggered) {
			loaded();
		}
	}, 4000);

	$(window).one('load', function() {
		loadEventTriggered = true;

		interval = setInterval(function() {
			totalTime += 50;
			if(totalTime < 4000 && (!window.miniGo.videoReady || !window.miniGo.clockReady))
				return;

			clearInterval(interval);

			loaded();

		}, 50);
	});

}());
+function ($) {
    "use strict";

    if(miniGoOptions.background.type !== 'slideshow') {
        $('.bg-wrapper').remove();
        return;
    }

    function randomizer(min,max) {
        var randomresult = Math.random() * (max - min) + min;
        return randomresult;
    }

    var resizeImages = function(imageSet) {
        var wW = window.innerWidth,
        wH = window.innerHeight,
        wAspect = wW/wH;

        if(typeof imageSet === "undefined" || !imageSet.length) {
            var imageSet = $('.bg-wrapper img[src]');
        }

        if(typeof imageSet === "undefined" || !imageSet.length) {
            return;
        }

        imageSet.each(function() {
            var el = $(this),
            w,
            h;

            if(typeof this.naturalWidth !== "undefined") {
                w = this.naturalWidth;
                h = this.naturalHeight;
            } else if (el.attr("width") && el.attr("height")) {
                w = el.attr("width");
                h = el.attr("height");
            } else if(typeof this.complete !== "undefined" && this.complete) {
                w = el.width();
                h = el.height();

                el.attr("width", w);
                el.attr("height", h);
            } else {
                return;
            }

            w = parseInt(w);
            h = parseInt(h);

            var aspect = w/h,
            newW,
            newH;

            if(wH * aspect < wW) {
                newW = wW;
                newH = wW * (1 / aspect);
            } else {
                newW = wH * aspect;
                newH = wH;
            }

            if(newW == w && newH == h)
                return;

            el.css({
                left: '50%',
                top: '50%',
                width: newW,
                height: newH,
                //"margin-top": -1 * newH / 2,
                //"margin-left": -1 * newW / 2
            })
        });
    };

    var timeout;
    $(window).on('resize.bgImages', function() {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            clearTimeout(timeout);

            resizeImages();
        }, 100);
    }).load(resizeImages);

    resizeImages();

    var options = miniGoOptions.background.slideshow || {},
    wrapper = $('.bg-wrapper'),
    maxscale = miniGoOptions.background.slideshow.kenburns.maxScale,
    minscale = miniGoOptions.background.slideshow.kenburns.minScale,
    minMov = miniGoOptions.background.slideshow.kenburns.minMove,
    maxMov = miniGoOptions.background.slideshow.kenburns.maxMove,
    duration = options.duration || 15,
    animationType = options.type || 'kenburns',

    animateFrame = function(el) {
        switch(animationType) {
            case "fade":
                fadeFrame(el);
                break;

            case "continuousFade":
                continuousFadeFrame(el);
                break;

            default:
                kenBurnsFrame(el);
        }
    },

    kenBurnsFrame = function(el) {
        var el = $(el);
        resizeImages(el);

        var scalarStart = randomizer(minscale,maxscale).toFixed(2);
        scalarStart = 1;
        var scalarEnd = randomizer(minscale,maxscale).toFixed(2);

        maxMov = ((scalarEnd - 1) * 100 / 3).toFixed(2);

        var moveX = randomizer(minMov,maxMov).toFixed(2);
        moveX = Math.random() < 0.5 ? -Math.abs(moveX) : Math.abs(moveX);

        var moveY = randomizer(minMov,maxMov).toFixed(2);
        moveY = Math.random() < 0.5 ? -Math.abs(moveY) : Math.abs(moveY);


        if (Modernizr.csstransitions){
            var transform = inflectProperty(Modernizr.prefixed('transform'));
            var transition = inflectProperty(Modernizr.prefixed('transition'));

            var transformStart = 'translate(-50%, -50%) scale(' + scalarStart + ')';
            var transformEnd = 'translate(' + -1 * (50 - moveX) + '%,' + -1 * (50 - moveY) + '%) scale(' + scalarEnd + ')';

            if(Math.floor((Math.random()*2)+1) == 2) {
                var tmp = transformStart;
                transformStart = transformEnd;
                transformEnd = tmp;
            }

            el.css({
                opacity: 1,
                transform: transformStart,
                visibility: 'visible',
                //zIndex: 1
            });

            window.requestAnimationFrame(function() {
                el.addClass('animated').css({
                    transition: transform + ' ' + duration + 's linear, opacity ' + (Math.round((duration/5) * 1000) / 1000) + 's ease',
                    transform: transformEnd
                });
            });

            setTimeout(function() {
                kenBurnsEnd(el);
            }, duration/5*4*1000);
        } else {
            el.css({visibility: 'visible'});
        }
    },

    kenBurnsEnd = function(el) {
        var transform = inflectProperty(Modernizr.prefixed('transform'));
        var transition = inflectProperty(Modernizr.prefixed('transition'));

        requestAnimationFrame(function() {
            el.css({
                opacity: 0
            });

            var next = el.next();
            if (!next.length) {
                next = el.siblings(':first-child');
            }

            next.css('z-index', 0);

            animateFrame(next);

            el.one(_endEvent('TransitionEnd'), function() {
                next.css('z-index', 1);
                el.removeClass('animated').css({
                    transition: '',
                    transform: '',
                    opacity: '',
                    zIndex: 0,
                    visibility: 'hidden'
                });
            });
        });
    },

    continuousFadeFrame = function(el) {
        var next = el.next();
        if (!next.length) {
            next = el.siblings(':first-child');
        }

        if(typeof next[0].complete !== "undefined" && !next[0].complete) {
            next.load(function() {
                continuousFadeFrame(el);
            });
            return;
        }

        resizeImages(next);


        if (Modernizr.csstransitions){
            var transition = inflectProperty(Modernizr.prefixed('transition'));

            el.css({
                zIndex: 1,
                opacity: 1,
                visibility: 'visible'
            });

            next.css({
                zIndex: 0,
                opacity: 1,
                visibility: 'visible'
            });


            setTimeout(function() {
                requestAnimationFrame(function() {
                    el.css({
                        transition: 'opacity ' + duration + 's linear',
                        opacity: 0
                    });
                });

                el.one(_endEvent('TransitionEnd'), function() {
                    el.css({
                        zIndex: -1,
                        transition: '',
                        visibility: ''
                    });
                    next.css({
                        zIndex: 1
                    });
                    continuousFadeFrame(next);
                });
            }, 10);

        } else {
            el.css({visibility: 'visible', opacity: 1});
        }
    },

    fadeFrame = function(el) {
        var next = el.next();
        if (!next.length) {
            next = el.siblings(':first-child');
        }

        if(typeof next[0].complete !== "undefined" && !next[0].complete) {
            next.load(function() {
                fadeFrame(el);
            });
            return;
        }

        resizeImages(next);


        if (Modernizr.csstransitions){
            var transition = inflectProperty(Modernizr.prefixed('transition'));
            next.css({
                zIndex: 0,
                opacity: 1,
                visibility: 'visible'
            });

            el.css({
                zIndex: 1,
                opacity: 1,
                visibility: 'visible'
            });

            setTimeout(function() {
                el.css({
                    opacity: 0,
                    transition: 'opacity 1s linear ' + duration + 's'
                });

                el.one(_endEvent('TransitionEnd'), function() {
                    el.css({
                        zIndex: -1,
                        transition: '',
                        visibility: ''
                    });
                    next.css({
                        zIndex: 1
                    });
                    fadeFrame(next);
                });
            }, 10);
        } else {
            next.css({
                zIndex: 0,
                opacity: 1,
                visibility: 'visible'
            });

            el.css({
                zIndex: 1,
                opacity: 1,
                visibility: 'visible',
            });

            setTimeout(function() {
                el.animate({opacity: 0}, 1000, function() {
                    el.css({
                        zIndex: -1,
                        visibility: ''
                    });
                    next.css({
                        zIndex: 1
                    });
                    fadeFrame(next);
                });
            }, duration * 1000);
        }
    };


    $(window).load(function() {
        var el = $('.bg-wrapper img:first-child') || false;

        if(!el)
            return;

        if(!el.siblings().length) {
            el.css({
                visibility: 'visible',
                display: 'block',
                opacity: 1
            });
            return;
        }
        animateFrame(el);
    });
}(jQuery);
var clock;
+function ($) {
    'use strict';

    // Grab the current date
    var currentDate = new Date();

    var targetDate = miniGoOptions.countdown.targetDate;
    var startDate = miniGoOptions.countdown.startDate;

    // Calculate the difference in seconds between the future and current date
    var diff = targetDate.getTime() / 1000 - currentDate.getTime() / 1000;

    if(diff < 0) {
        diff = 0;
    }
    var days = diff / 60 / 60 / 24;

    if(Math.floor(days) > 99) {
        $('body').addClass('over-99-days');
    }

    var charts = false,
    lastHours,
    lastMinutes;

    clock = $('.clock');
    if(clock.hasClass('clock-alt')) {
        charts = true;

        clock.append('<div class="chart chart-days" data-percent="100"></div>'+
                    '<div class="chart chart-hours" data-percent="100"></div>'+
                    '<div class="chart chart-minutes" data-percent="100"></div>'+
                    '<div class="chart chart-seconds" data-percent="100"></div>');

        var chartHours = $('.chart-hours'),
        chartMinutes = $('.chart-minutes'),
        chartSeconds = $('.chart-seconds');

        $('.chart').easyPieChart({
            scaleColor: false,
            trackColor: false,
            barColor: '#ffffff',
            lineWidth: 6,
            lineCap: 'butt',
            size: 125,
            animate: 800
        });

    } else {
        clock.append('<div class="clock-progress"></div>');
    }


    var getPercentage = function() {
	   var percentage = 100 - (diff / ((targetDate.getTime() / 1000 - startDate.getTime() / 1000) / 100));
	   return percentage;
    };

    var updateProgress = function() {
        requestAnimationFrame(function() {
            if(charts) {
                $('.chart-days').data('easyPieChart').update(getPercentage());
            } else {
                $('.clock-progress').css('padding-right', 100 - getPercentage() + '%');
            }
        });
    };

    $('body').on('miniGo.ready', function() {
        setTimeout(updateProgress, 1000);
        setInterval(updateProgress, 30000);
    });

    // Instantiate a coutdown FlipClock
    FlipClock.Timer.prototype._setInterval = function(callback) {
    	var t = this;

        var flipclockTimer = function() {
            t._interval(callback);
        };

		t.timer = setInterval(function() {
            cancelAnimationFrame(flipclockTimer);
			requestAnimationFrame(flipclockTimer);
		}, this.interval);
    };

    clock = clock.FlipClock(diff, {
        clockFace: 'DailyCounter',
        countdown: true,
        callbacks: {
            start: function() {
                window.miniGo.clockReady = true;

                var labels = clock.data('labels');

                if(typeof labels !== 'undefined' && labels.length) {
                    labels = labels.split(',');
                    var labelElements = $('.flip-clock-label');

                    if(labels.length && labelElements.length) {
                        for (var i=0;i<labels.length;i++) {
                            $(labelElements[i]).text($.trim(labels[i]));
                        }
                    }
                }

                clock.addClass('flip-clock-started');

                 $('.clock ul').on(_endEvent('AnimationEnd'), function(e) {
                     e.stopPropagation();
                     e.stopImmediatePropagation();
                     e.preventDefault();
                 });
            },
            interval: function() {
                if (!charts || !window.miniGo.ready) {
                    return;
                }

                var toUpdate = clock.time.getHours(true);

                if(toUpdate !== lastHours) {
                    lastHours = toUpdate;
                    chartHours.data('easyPieChart').update(Math.round(lastHours/(23/100)));
                }

                toUpdate = clock.time.getMinutes(true);
                if(toUpdate !== lastMinutes) {
                    lastMinutes = toUpdate;
                    chartMinutes.data('easyPieChart').update(Math.round(lastMinutes/(59/100)));
                }

                chartSeconds.data('easyPieChart').update(Math.round(clock.time.getSeconds(true)/(59/100)));
            }
        }
    });
}(jQuery);
+(function(){
	"use strict";

	var currentPage,
	currentPageOffset,
	currentPageSize = {},

	nextPage,
	nextPageSize = {},

	wrapper = $('.site-wrapper'),

	classesToClear = 'site-page--' + ['go-right', 'come-right', 'go-left', 'come-left', 'reset'].join(' site-page--');

	var ie10 = false;
	if (navigator.appVersion.indexOf('MSIE 10') !== -1) {
		ie10 = true;
	}

	var centerPages = function() {
		var pages = [currentPage, nextPage];
		var h;
		var wH = window.innerHeight;
		var padding = parseInt(wrapper.css('padding-top').replace('px'));

		for (var i=0; i<pages.length; i++) {
			h = pages[i].outerHeight();

			if((h / 2) - (wH / 2) + padding < 0) {
				if(ie10) {
					pages[i].css({
						marginTop: (wH/2) - padding
					});
				}
			} else {
				if (ie10) {
					pages[i].css({
						marginTop: h/2
					});
				} else {
					pages[i].css({
						marginTop: (h / 2) - (wH / 2) + padding
					});
				}
			}
		}
	};
	//centerPages();

	var accountForScroll = function() {
		if(currentPage.hasClass('site-front')) {
			var pages = [nextPage];
		} else {
			var pages = [currentPage, nextPage];
		}
		var h;
		var wH = window.innerHeight;
		var padding = parseInt(wrapper.css('padding-top').replace('px'));

		for (var i=0; i<pages.length; i++) {
			h = pages[i].outerHeight();

			if((h / 2) - (wH / 2) + padding < 0) {
				if(ie10) {
					pages[i].css({
						marginTop: (wH/2) - padding
					});
				}
			} else {
				if (ie10) {
					pages[i].css({
						marginTop: h/2
					});
				} else {
					pages[i].css({
						marginTop: (h / 2) - (wH / 2) + padding
					});
				}
			}
		}
	},

	showPage = function() {
		currentPage = $('.site-page--active');
		var animationEndExecuted = false;

		if(!Modernizr.cssanimations) {
			onAnimationStart();
			nextPage.addClass('site-page--active');
			currentPage.removeClass('site-page--active');
			onAnimationEnd();
			return;
		}

		nextPage.add(currentPage).css({
			'animation-play-state': 'paused',
			'-webkit-animation-play-state': 'paused',
		});

		requestAnimationFrame(function() {
			onAnimationStart();
		});


		currentPage.on(_endEvent('AnimationEnd'), function(e) {
			e.stopPropagation();
			e.preventDefault();

			if(e.eventPhase > 2)
				return;

			currentPage.removeClass(classesToClear + ' site-page--active').css('margin-top', '');


			if(!animationEndExecuted) {
				animationEndExecuted = true;
			} else {
				onAnimationEnd();
			}
		});
		nextPage.on(_endEvent('AnimationEnd'), function(e) {
			e.stopPropagation();
			e.preventDefault();

			if(e.eventPhase > 2)
				return;

			nextPage.addClass('site-page--active').css('margin-top', '').removeClass(classesToClear);

			if(nextPage.hasClass('site-front')) {
				nextPage.removeClass('site-page--went-right site-page--went-left');
			}

			if(!animationEndExecuted) {
				animationEndExecuted = true;
			} else {
				onAnimationEnd();
			}
		});



		accountForScroll();

		var centerFrontPageRAF;
		var centerFrontPage = function() {
			var h = currentPage.outerHeight();
			var wH = window.innerHeight;
			var scroll = $(window).scrollTop();
			var offset = ((wH - h) / 2) + h/2 + scroll;
			var padding = parseInt(wrapper.css('padding-top').replace('px'));

			if(offset < (h/2) + padding) {
				offset = (h/2) + padding;
			}

			cancelAnimationFrame(centerFrontPageRAF);

			centerFrontPageRAF = requestAnimationFrame(function() {
				currentPage.css({ top: offset + 'px' });

				wrapper.css({ 'perspective-origin': '50%' + offset + 'px', '-webkit-perspective-origin': '50%' + offset + 'px' });
			});

		};

		$(window).on('resize.centerFrontPage, scroll.centerFrontPage', centerFrontPage);

		requestAnimationFrame(function() {
			if(nextPage.hasClass('site-front')) {
				currentPage.addClass('site-page--reset');
				nextPage.addClass('site-page--reset');

				$(window).off('resize.centerFrontPage, scroll.centerFrontPage');
				nextPage.css('top', '');
				wrapper.css({ 'perspective-origin': '', '-webkit-perspective-origin': '' })
			} else if(nextPage.hasClass('site-page--from-left')) {
				currentPage.addClass('site-page--go-right site-page--went-right');
				centerFrontPage();
				nextPage.addClass('site-page--come-right');
			} else if(nextPage.hasClass('site-page--from-right')) {
				currentPage.addClass('site-page--go-left site-page--went-left');
				centerFrontPage();
				nextPage.addClass('site-page--come-left');
			}
		});


		requestAnimationFrame(function() {
			nextPage.add(currentPage).css({
				'animation-play-state': '',
				'-webkit-animation-play-state': '',
			});
		});
	},

	onAnimationStart = function() {
			wrapper.css({
				'webkit-transform': '',
				'transform': '',
				'-webkit-perspective': '1500px',
				'perspective': '1500px',
			}).data('disableNav', 1);

			var navClose = $('.nav-close');

			$('body, html').css("overflow", "hidden");

			$('.nav-hidden').off(_endEvent('TransitionEnd'));
			$('.nav-left:not(.nav-hidden), .nav-right:not(.nav-hidden)').one(_endEvent('TransitionEnd'), function(e) {
				e.stopPropagation();
				e.preventDefault();

				$(this).css('visibility', 'hidden');
			});


			if(currentPage.hasClass('site-front')) {
				requestAnimationFrame(function() {
					navClose.hide().css('-webkit-transition', 'none').removeClass('nav-left nav-right').addClass('nav-hidden');

					if(nextPage.hasClass('site-page--from-left')) {
						navClose.addClass('nav-left');
					} else {
						navClose.addClass('nav-right');
					}
				});

				requestAnimationFrame(function() {
					navClose.show().css('visibility', 'visible');
				});

				setTimeout(function() {
					requestAnimationFrame(function() {
						$('.nav-left:not(.nav-close), .nav-right:not(.nav-close)').addClass('nav-hidden');

						setTimeout(function() {
							requestAnimationFrame(function() {
								navClose.one(_endEvent('TransitionEnd'), function(e) {
									e.stopPropagation();
									e.preventDefault();

									if(e.eventPhase > 2)
										return;

									navClose.data('disableNav', 0);
								}).css('-webkit-transition', '').removeClass('nav-hidden');

								if(!Modernizr.csstransitions) {
									navClose.data('disableNav', 0);
								}
							});
						}, 300);
					});
				}, 10);
			} else {
				$('.nav-left, .nav-right').show().css('visibility', 'visible');

				setTimeout(function() {
					requestAnimationFrame(function() {
						var navs = $('.nav-hidden');
						navClose.addClass('nav-hidden');

						setTimeout(function() {
							requestAnimationFrame(function() {

								navs.one(_endEvent('TransitionEnd'), function(e) {
									e.stopPropagation();
									e.preventDefault();

									if(e.eventPhase > 2)
										return;

									navs.data('disableNav', 0);
								}).removeClass('nav-hidden');

								if(!Modernizr.csstransitions) {
									navs.data('disableNav', 0);
								}
							});
						}, 300);
					});
				}, 10);
			}
	},

	onAnimationEnd = function() {
		$('body, html').css("overflow", "");

		var frontPageScroller;
		$(window).on('scroll', function() {
			var page = $('site-page--went-left, .site-page--went-right');
			if(!page.length) {
				return;
			}


		});

		wrapper.data('disableNav', 0);

		if(nextPage.hasClass('site-front')) {
			wrapper.css({
				'webkit-transform': 'translate(0,0)',
				'transform': 'translate(0,0)',
				'-webkit-perspective': 'none',
				'perspective': 'none',
			});
		}

		// if(Modernizr.csstransformspreserve3d) {
		// 	wrapper.css({
		// 		'-webkit-perspective': 'none',
		// 		'perspective': 'none',
		// 	});
		// }

		nextPage.add(currentPage).off(_endEvent('AnimationEnd'));

		setTimeout(function() {
			fitIcons();
		}, 100);
	};


	$('.nav-left, .nav-right').css('visibility', 'visible');


	$('.site-page__trigger').on('click', function(e) {
		e.preventDefault();
		e.stopPropagation();
		var el = $(this);

		if(wrapper.data('disableNav') || el.data('disableNav'))
			return false;

		$('.site-page__trigger .site-page__close').data('disableNav', 1);

		nextPage = $(el.attr('href'));

		if(nextPage.length == 0)
			return;

		if($(document).scrollTop() > 1) {
			$('body').animate({
				scrollTop: 0
			}, 'fast', function() {
				setTimeout(function() {
					showPage();
				}, 10);
			});
		} else {
			showPage();
		}


		$('.site-front').on('click.backToFrontPage', function(e) {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();

			if(wrapper.data('disableNav'))
				return false;

			$('.site-page__close').trigger('click');
		});
	});

	$('.site-page__close').on('click', function(e) {
		e.preventDefault();
		e.stopPropagation();

		if(wrapper.data('disableNav') || $(this).data('disableNav'))
			return false;

		$('.site-page__trigger .site-page__close').data('disableNav', 1);

		$('.site-front').off('click.backToFrontPage');

		//$('.site-page__trigger').removeClass('disableNav');

		nextPage = $('.site-front');

		if(nextPage.length == 0)
			return;

		if($(document).scrollTop() > 1) {
			$('body').animate({
				scrollTop: 0
			}, 'fast', function() {
				setTimeout(function() {
					showPage();
				}, 10);
			});
		} else {
			showPage();
		}
	});

}())
+(function () { "use strict";

	$("form.form-ajax").each(function() {
		$(this).validate({
			submitHandler: function(form, e) {
				e.preventDefault();

				form = $(form);

				form.removeClass('form--failed form--success').addClass('form--submitted');

				form.find('[type="submit"]').attr('disabled', 'disabled');

				$.post(form.prop('action'), form.serialize(), function(data, e) {
					form.removeClass('form--submitted');

					if(data.toString().indexOf(form.data('success-response')) === -1) {
						form.addClass('form--failed');

						form.trigger('submitFailed');

						return false;
					}

					form.find('[type="submit"]').removeAttr('disabled');
					form.addClass('form--success');
					form.trigger('submitSucceeded');
					form[0].reset();
				}, 'text');

				return false;
			}
		});
	});
}());
+(function () { "use strict";

	$('.form-flip').each(function() {
		var container = $(this);
		container.addClass('disableTransforms');

		container.children().on(_endEvent('AnimationEnd'), function(e) {
			e.preventDefault();
			e.stopPropagation();

			window.requestAnimationFrame(function() {
				container.removeClass('disableTransforms')//.addClass('disableTransforms');
			});
		});

		container.children('.form-flip__enabler').click(function(e) {
			e.preventDefault();
			e.stopPropagation();

			container.removeClass('disableTransforms');
			container.addClass('form-flip--enabled');
		});

		container.children('.form-flip__close').click(function(e) {
			e.preventDefault();
			e.stopPropagation();

			container.removeClass('disableTransforms');

			container.one(_endEvent('AnimationEnd'), function(e) {
				e.stopPropagation();
				container.hide();
			});

			container.addClass('form-flip--closed');

		});

		container.find('form').on('submitSucceeded', function() {
			container.removeClass('disableTransforms');
			container.addClass('form-flip--success');
		});
	});

}());
var fitIcons;

+(function () {
	"use strict";

    var timer;

	fitIcons = function() {
		var page = $('.site-page--active');

        if(typeof page === "undefined" || !page.length ) {
            timer = setTimeout(fitIcons, 100);
            return;
        }

		var nav = $('.nav-social');
        var mainNav = $('.nav-left, .nav-right, .nav-close');

        requestAnimationFrame(function() {
			if(window.innerHeight - page.outerHeight() <= 108 * 2) {
				nav.addClass('nav--small');

	            if(window.innerWidth < 1220) {
	                mainNav.addClass('nav--small');
	            } else {
	                mainNav.removeClass('nav--small');
	            }
			} else {
				nav.removeClass('nav--small');
	            mainNav.removeClass('nav--small');
			}
		});
	}


	$(window).resize(function() {
		clearTimeout(timer);
		timer = setTimeout(fitIcons, 100);
	}).one('ready load miniGo.ready', fitIcons);

}())
var onYouTubeIframeAPIReady;

+(function() {
    'use strict';

    if(miniGoOptions.background.type !== 'video') {
        return;
    }

    var videoOptions = miniGoOptions.background.video,
    wrapper = $('<div id="video-container"></div>'),
    poster = videoOptions.imageFallback,
    volume = videoOptions.volume;

    if(poster.length) {
        wrapper.css({backgroundImage: 'url(' + poster + ')'});
    }

    var init = function() {

        if(Modernizr.touch && Modernizr.lowbandwidth) {
            wrapper.appendTo('body');
            window.miniGo.videoReady = true;
            return;
        }

        switch(videoOptions.source)
        {
        case 'local':
            loadLocal();
            break;

        case 'youtube':
            loadYoutube();
            break;
        }
    };

    var loadLocal = function() {
        var video = $('<video autoplay loop class="fillWidth" poster="' + poster + '">').appendTo(wrapper);

        var sourceTemplate = '<source src="{file}" type="video/{type}">';


        for(var file in videoOptions.localFiles) {
            video.append(sourceTemplate.replace('{file}', videoOptions.localFiles[file]).replace('{type}', file));
        }

        video.children().last().add(video).on('error', function(e) {
            e.stopPropagation();
            video.children().unwrap();
            window.miniGo.videoReady = true;
        });

        if(typeof video[0].volume !== 'undefined') {
            video[0].volume = volume / 100;
        } else {
            window.miniGo.videoReady = true;
        }

        if(Modernizr.touch) {
            $('body').on('miniGo.ready touchstart.video', function() {
                if(video.length) {
                    video[0].play();
                    video[0].muted = true;
                }

                $(this).off('touchstart.video')
            });
        }

        video.on('ended durationchange', function(e) {
            video[0].play();
        });

        video.on('canplaythrough', function() {
            video[0].play();
            window.miniGo.videoReady = true;
        });

        if(videoOptions.localFiles.mp4.length) {
            var videoPath = videoOptions.localFiles.mp4;

            if(typeof window.minigoSwfURLPrefix === 'undefined') {
                var minigoSwfURLPrefix = '';
            } else {
                var minigoSwfURLPrefix = window.minigoSwfURLPrefix;
            }

            var flashTemplate = '<object class="fillWidth">' +
                                    '<param name="movie" value="' + minigoSwfURLPrefix + 'inc/StrobeMediaPlayback.swf"></param>' +
                                    '<param name="flashvars" value="src={file}&loop=true&autoPlay=true&playButtonOverlay=false&scaleMode=zoom&controlBarMode=none&volume={volume}&bufferingOverlay=false&poster={poster}"></param>' +
                                    '<param name="allowFullScreen" value="true"></param>' +
                                    '<param name="allowscriptaccess" value="always"></param>' +
                                    '<param name="wmode" value="direct"></param>' +
                                    '<embed class="fillWidth" src="' + minigoSwfURLPrefix + 'inc/StrobeMediaPlayback.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" flashvars="src={file}&loop=true&autoPlay=true&playButtonOverlay=false&scaleMode=zoom&controlBarMode=none&volume={volume}&bufferingOverlay=false&poster={poster}"></embed>' +
                                '</object>';

            if(videoPath.indexOf('://') == -1) {
                videoPath = encodeURIComponent(getFileUrl(videoPath));
            }


            video.append(
                flashTemplate
                    .replace(/\{file\}/g, videoPath)
                    .replace(/\{poster\}/g, encodeURIComponent(getFileUrl(poster)))
                    .replace(/\{volume\}/g, volume / 100)
            );
        }

        wrapper.appendTo('body');
        video = $('#video-container video');
    };

    var loadYoutube = function () {
        var youtubeWrap = $('<div id="youtubeWrap" class="fillWidth"></div>').appendTo(wrapper);
        wrapper.appendTo('body');

        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = $('<script></script>');

        $('body').append(tag.attr('src', 'https://www.youtube.com/iframe_api'));

        var params = getUrlParams(videoOptions.youtube.url);

        var videoSize = getFillSize();

        youtubeWrap.css({
            width: videoSize.width,
            height: videoSize.height
        });

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        onYouTubeIframeAPIReady = function() {
            player = new YT.Player('youtubeWrap', {
                width: videoSize.width,
                height: videoSize.height,
                videoId: params.v ? params.v : '',
                playerVars: {
                    autoplay: 1,
                    controls: 0,
                    enablejsapi: 1,
                    loop: 1,
                    modestbranding: 1,
                    iv_load_policy: 3,
                    start: videoOptions.youtube.startAt,
                    end: videoOptions.youtube.endAt,
                    listType: 'playlist',
                    list: params.list ? params.list : '',
                    wmode: "opaque",
                    origin: window.location.origin
                },

                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        };

        // 4. The API will call this function when the video player is ready.
        var onPlayerReady = function() {
            youtubeWrap = $('#youtubeWrap');

            player.playVideo();
            player.setVolume(volume);
        };

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        // var done = false;
        var onPlayerStateChange = function(event) {
            if (!params.list && event.data === YT.PlayerState.ENDED) {
                player.playVideo();
            }
            if(event.data === YT.PlayerState.PLAYING) {
                window.miniGo.videoReady = true;
            }
        };

        var timeoutYoutube;
        $(window).on('resize.youtube', function() {
            clearTimeout(timeoutYoutube);
            timeoutYoutube = setTimeout(function() {
                var videoSize = getFillSize();
                youtubeWrap.css({
                    width: videoSize.width,
                    height: videoSize.height
                });
            }, 100);
        });
    };

    var getFileUrl = function(path) {
        var url = window.location;

        if(path[0] === '/') {
            return url.protocol + '//' + url.host + path;
        }

        var urlPath = url.pathname;
        if(urlPath[urlPath.length - 1] !== '/') {
            urlPath = urlPath.slice(0, urlPath.lastIndexOf('/'));
        }

        return url.protocol + '//' + url.host + urlPath + path;
    };

    var getFillSize = function() {
        var wW = window.innerWidth,
        wH = window.innerHeight,
        wAspect = wW/wH,
        newSize = {};

        if(wAspect < 1.777777) {
            newSize.width = Math.round(16 * (wH / 9));
            newSize.height = wH;
        } else {
            newSize.width = wW;
            newSize.height = Math.round(9 * (wW / 16));
        }

        return newSize;
    };


    var getUrlParams = function(url) {
        var hashPosition = url.indexOf('#');
        var params = url.slice(url.indexOf('?'), hashPosition === -1 ? url.length : hashPosition).substr(1).split('&');

        if (params === "") return {};

        var b = {};
        for (var i = 0; i < params.length; ++i)
        {
            var p=params[i].split('=');
            if (p.length !== 2) {
                continue;
            }
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, ' '));
        }
        return b;
    };

    init();
}());