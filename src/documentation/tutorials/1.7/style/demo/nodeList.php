<?php include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/',dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php') ?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Tutorial: In Style with Dojo</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	</head>
	<body>
		<h1>Tutorial: In Style with Dojo</h1>
		
		<h3>Bread</h3>
		<div class="bread"></div>
		<div class="bread"></div>

		<h3>NodeList</h3>
		
		<button id="toastBread">Toast Bread</button>

		<button id="butterBread">Butter Bread</button>

		<button id="lickOffButter">Lick Off Butter</button>

		<?php Utils::printDojoScript("isDebug: true,parseOnLoad: true") ?>
		<script>
			dojo.require("dojo.behavior");
			
			// Wait for the DOM to be ready before working with it
			dojo.ready(function(){
				// we are defining these functions in dojo.ready so they are not in the global scope
				
				var toastBread = function(evt){
					var bread = dojo.query(".bread");
					bread.addClass("toasted");
				};

				var butterBread = function(evt){
					var bread = dojo.query(".bread");
					bread.addClass("buttered");
				};
				
				var lickOffButter = function(evt){
					var bread = dojo.query(".bread");
					bread.removeClass("buttered");				
				};
				
				var buttonBehaviors = {
					"#toastBread" : {
						"onclick" : toastBread
					},
					"#butterBread" : {
						"onclick" : butterBread
					},
					"#lickOffButter" : {
						"onclick" : lickOffButter
					}				
				};
				
				dojo.behavior.add(buttonBehaviors);
				dojo.behavior.apply();

			});
		</script>
	</body>
</html>
