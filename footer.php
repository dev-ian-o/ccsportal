		</div>
	</body>
</html>
		<script type="text/javascript" src="js/jquery.js"></script>		
		<script type="text/javascript" src="js/hammer.min.js"></script>
		<script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>
		<script type="text/javascript">
			$(function() {

				var $menu = $('nav#menu-right');

				$menu.mmenu({
					position	: 'right',
					classes		: 'mm-light',
					dragOpen	: true,
					counters	: true,
					searchfield	: true,
					labels		: {
						fixed		: !$.mmenu.support.touch
					},
					header		: {
						add			: true,
						update		: true,
						title		: 'College'
					}
				});
			});
			$(function() {
				$('nav#menu').mmenu({
					position	: 'left',
					classes		: 'mm-light',
					dragOpen	: true					
				});

				$('div#aboutme').mmenu({
					classes		: 'mm-fullscreen mm-light',
					position	: 'right',
					zposition	: 'front',
					header		: true
				});
				$('div#third').mmenu({
					classes		: 'mm-fullscreen mm-light',
					position	: 'right',
					zposition	: 'front',
					counters	: false,
					header		: true
				});
				$('div#second').mmenu({
					classes		: 'mm-fullscreen mm-light',
					position	: 'right',
					zposition	: 'front',
					counters	: false,
					header		: true
				});
				$('div#first').mmenu({
					classes		: 'mm-fullscreen mm-light',
					position	: 'right',
					zposition	: 'front',
					counters	: false,
					header		: true
				});
				$('div#fourth').mmenu({
					classes		: 'mm-fullscreen mm-light',
					position	: 'right',
					zposition	: 'front',
					counters	: false,
					header		: true
				});
				$('div#myschedule').mmenu({
					classes		: 'mm-fullscreen mm-light',
					position	: 'right',
					zposition	: 'front',
					header		: true
				});

			});
		</script>
		<script>
        $(document).bind( "mobileinit", function(){
            $.mobile.ajaxEnabled = false;

            $('.hidden').fadeIn(1000).removeClass('hidden');
        });            
        </script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.2.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/ajax_script.js"></script>
