/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

// ( function( $ ) {
// 	// Site title and description.
// 	wp.customize( 'blogname', function( value ) {
// 		value.bind( function( to ) {
// 			$( '.site-title a' ).text( to );
// 		} );
// 	} );
// 	wp.customize( 'blogdescription', function( value ) {
// 		value.bind( function( to ) {
// 			$( '.site-description' ).text( to );
// 		} );
// 	} );

// 	// Header text color.
// 	wp.customize( 'header_textcolor', function( value ) {
// 		value.bind( function( to ) {
// 			if ( 'blank' === to ) {
// 				$( '.site-title, .site-description' ).css( {
// 					clip: 'rect(1px, 1px, 1px, 1px)',
// 					position: 'absolute',
// 				} );
// 			} else {
// 				$( '.site-title, .site-description' ).css( {
// 					clip: 'auto',
// 					position: 'relative',
// 				} );
// 				$( '.site-title a, .site-description' ).css( {
// 					color: to,
// 				} );
// 			}
// 		} );
// 	} );
// }( jQuery ) );

( function( $ ) {

    $('.hamburger').click(function(event) {
        $('#main-menu').slideToggle();
    });

    var menus = document.querySelectorAll('.slide-menu .menu');

    menus.forEach((menu, index) => {
          menu.addEventListener('click', function() {
            console.log('test');
              menus.forEach(item => item.classList.remove('active'));
              menu.classList.add('active');
          });
    });
    
    if(matchMedia('(max-width: 1023px)').matches){
      var commercialSlider = new Flickity( '.commercial .slides', {
        pageDots: true,
        initialIndex: 1
      });
      var residentialSlider = new Flickity( '.residential .slides', {
        pageDots: true,
        initialIndex: 1
      });
    } else {
      $('.commercial .slides').flickity({
        pageDots: false,
        initialIndex: 1
      });

      $('.residential .slides').flickity({
        pageDots: false,
        initialIndex: 1
      });
    }
   

    $('.slide-menu .com').on( 'click', function( event ) {
      window.dispatchEvent(new Event('resize'));
      $('#residential').hide();
      $('#commercial').show();
    });

    $('.slide-menu .res').on( 'click', function( event ) {
      window.dispatchEvent(new Event('resize'));
      $('#commercial').hide();
      $('#residential').show();
    });
    

}(jQuery));

(function($) {

  /**
   * Copyright 2012, Digital Fusion
   * Licensed under the MIT license.
   * http://teamdf.com/jquery-plugins/license/
   *
   * @author Sam Sehnert
   * @desc A small plugin that checks whether elements are within
   *     the user visible viewport of a web browser.
   *     only accounts for vertical position, not horizontal.
   */

  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };
    
})(jQuery);

var win = $(window);

var allMods = $(".reveal");

allMods.each(function(i, el) {
  var el = $(el);
  if (el.visible(true)) {
    el.addClass("on"); 
  } 
});

win.scroll(function(event) {
  
  allMods.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("on"); 
    } 
  });
  
});
