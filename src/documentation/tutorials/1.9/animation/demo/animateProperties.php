<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: animateProperty with multiple style properties</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	</head>
	<body>
		<h3>Demo: animateProperty with multiple style properties</h3>
		<button id="dropButton">Drop out block</button>
		<button id="ariseSirButton">Return block</button>

		<div id="anim8target" class="box" style="top: 100px; left: 300px; background-color: #fc9">
			<div class="innerBox">A box</div>
		</div>
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript();
		?>
		<script>
			
			require(["dojo/_base/fx", "dojo/on", "dojo/dom", "dojo/domReady!"], function(baseFx, on, dom) {
				var dropButton = dom.byId("dropButton"),
					ariseSirButton = dom.byId("ariseSirButton"),
					anim8target = dom.byId("anim8target");

				// Set up a couple of click handlers to run our animations
				on(dropButton, "click", function(evt){
					baseFx.animateProperty({
						node: anim8target,
						properties: {
							top: { start: 100, end: 150 },
							left: 0,
							opacity: { start: 1, end: 0 }
						},
						duration: 800
					}).play();
				});
				on(ariseSirButton, "click", function(evt){
					baseFx.animateProperty({
						node: anim8target,
						properties: { top: 100, left: 300, opacity: 1 }
					}).play();
				});
			});
			
		</script>
	</body>
</html>
