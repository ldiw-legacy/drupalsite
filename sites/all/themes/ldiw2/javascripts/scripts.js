if(typeof(LetsDoIt) == 'undefined' || !LetsDoIt) {
    var LetsDoIt = {};
}

/* frontpage tabs */
(function($) {
    LetsDoIt.frontPageTabs = function() {
        var oldHash;
        
        var showTab = function(i) {
            $('.slider-cont').hide();
            $('.slider-cont').eq(i).show();
            
            $('.slider-menu-holder li').removeClass('active');
            $('.slider-menu-holder li').eq(i).addClass('active');
        };
        
        var checkHash = function() {
            var newHash = location.hash.replace('#', '');
            if(newHash.length > 0 && oldHash != newHash)
            {
                var index = $('#tab-'+newHash).index('.slider-cont');
                showTab(index);

                oldHash = newHash;
            }
        };
        
        return {
            init: function() {
                setInterval(checkHash, 100);
            },
            goto: function(index) {
                showTab(index);
            }
        };
    }();
})(jQuery);

(function($) {
    LetsDoIt.fader = function() {
        var currentIndex = 0;
        var interval;
        
        var buildMenu = function() {
            var count = $('.fader-slide').length;
            for(var i = 0; i < count; i++) {
                $('<li>').appendTo('.fader-legend ul');
            }
        };
        
        var goToSlide = function(index) {
            $('.fader-legend li').removeClass('active');
            $('.fader-legend li').eq(index).addClass('active');
            
            $('.fader-slide:visible').stop(true, true).fadeOut('fast');
            $('.fader-slide').eq(index).stop(true, true).fadeIn('fast');
            
            $('.fader-legend span').html($('.fader-slide').eq(index).attr('title'));
            currentIndex = index;
        };
        
        var stopFader = function() {
            clearInterval(interval);
        };
        
        var startFader = function() {
            interval = setInterval(fadeNext, 3000);
        };
        
        var fadeNext = function() {
            if(currentIndex == $('.fader-slide').length -1) {
                goToSlide(0);
            }
            else {
                goToSlide(currentIndex+1);
            }
        }
        
        return {
            init: function() {
                buildMenu();
                $('.fader-legend li').click(function() {
                    goToSlide($(this).index('.fader-legend li'));
                });
                goToSlide(0);
                $('.fader-holder').hover(stopFader, startFader);
                startFader();
            },
            goto: goToSlide
        };
    }();
})(jQuery);