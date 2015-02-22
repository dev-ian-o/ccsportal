		</div>
	</body>
</html>
		<script type="text/javascript" src="../js/jquery.js"></script>		
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/hammer.js/1.0.5/jquery.hammer.min.js"></script>
		<script type="text/javascript" src="../js/jquery.mmenu.min.all.js"></script>
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
					header		: true
				});
				$('div#myschedule').mmenu({
					classes		: 'mm-fullscreen mm-light',
					position	: 'right',
					zposition	: 'front',
					header		: true
				});
				$('div#addsched').mmenu({
					classes		: 'mm-fullscreen mm-light',
					position	: 'right',
					zposition	: 'front',
					header		: true
				});
				$('div#section').mmenu({
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
        });            
        </script>
		<script type="text/javascript" src="../js/jquery.mobile-1.3.2.min.js"></script>
		<script src="../js/jquery.validate.min.js"></script>
		<script src="../js/ajax_script.js"></script>
