		<div class="navbar navbar-static-bottom">
		<a href="http://www.refinedDesigns.net">
			Refined Designs	&copy; <? echo date("Y"); ?> <!-- Yay php auto updates my year-->
		</a>
		</div>
	</div><!--End of container-->

	
		</
		<!---- JS ------->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>	
		<script type="text/javascript" src="../js/jquery.prettyPhoto.js"></script>

			
		<script type="text/javascript" src="../js/jquery.center.js"></script>	
		<script>
		// Controller for jquery.center.js 
			$(function () {
				

				$(".navbar h1").center({
					vertical: false // only hoz
				});
				
				$("a[rel^='prettyPhoto']").prettyPhoto({
					show_title: true,
					allow_resize: false,
					theme: 'dark_rounded' /* light_rounded / dark_rounded / light_square / dark_square / facebook */
				});				
			

	   		});//end script	
	   		
		</script>
		
		<script>
			$(function () {
			//lets make some tabs
				$(function () {
					$('#tabs').tabs();
				});
					
				//if there is no picture hide the invisble box outline	
				$('a').has('img[src=""]').addClass('hide');
			});//end script		
		</script>
	
		
	</body>
</html>