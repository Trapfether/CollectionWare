 // document ready function to perform set-up operations after page has loaded.
 $(document).ready(function(){

	/**
	 * window resize function to adjust component on resize
	 */
	 $(window).resize(function(){

		 // if the page has defined a resize function, call it here.
		 if (typeof resizeFunction == 'function') { 
		 	resizeFunction(); 
		 }
		});

	 /**
	  * navToggle.click open or close the sidebar navaigation based on a few rules
	  */
	$('#navToggle').click(function(){

		// the left coordinate of the sidebar-navigation
		var navLeft = $('#sidebar-wrapper').offset().left;

		//the width of the screen in pixels
		var screenWidth = $(window).width();

		// if the navigation bar is set inside the screen currently
		if(navLeft > -10)
		{
			// hide the navigation bar
			$('#sidebar-wrapper').offset({ top: 50, left: -210 });

			// expand the content wrapper to fill the space now available
			$('#page-content-wrapper').css('left',0);
		}
		else //if the navigation bar is already hidden
		{
			// show the navigation bar
			$('#sidebar-wrapper').offset({ top: 50, left: 0 });

			//if the screen is wider than 600px, pull the content over to be coixistant with the navigation bar.
			if(screenWidth > 700)
			{
				$('#page-content-wrapper').css('left',210);
			}

			/**
			 * if the screen width is less than 600 px, the navigation bar will expand to sit over the content.
			 */

		}

	});

	//if the page has defined a ready function, call it now.
	if (typeof readyFunction == 'function') { 
		readyFunction(); 
	}
});