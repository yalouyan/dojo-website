<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Demo: Dijit CheckBox Getter/Setters</title>
		<link rel="stylesheet" href="../../../resources/style/demo.css">
		<?php
    		include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
    		Utils::printClaroCss();
    	?>
		<link rel="stylesheet" href="demo.css">
	</head>
	<body class="claro">
		<h2>dijit/form/CheckBox value setters</h2>
		<div>
			<h3>Pizza Toppings</h3>

			<ul style="list-style-type: none">
				<li>
					<input id="topping1" type="checkbox" value="anchovies" checked
						data-dojo-type="dijit.form.CheckBox">
					<label for="topping1">Anchovies</label>
				</li>
				<li>
					<input id="topping2" type="checkbox" value="olives"
						data-dojo-type="dijit.form.CheckBox">
					<label for="topping2">Olives</label>
				</li>
			</ul>

			<p>
				<input id="deluxe" type="checkbox" value="deluxe"
					data-dojo-type="dijit.form.CheckBox">
				<label for="deluxe">Go Deluxe?</label>
			</p>

			<button id="summaryBtn">Which Toppings?</button>
		</div>

		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript();
		?>
		<script>
			
			require(["dijit/form/CheckBox", "dojo/on", "dijit/registry", "dojo/parser", "dojo/domReady!"], function(CheckBox, on, registry, parser) {
				
				parser.parse();
				
				on(document.getElementById("summaryBtn"), "click", function(evt){
					var toppings = [];
					if(registry.byId("topping1").get("checked")){
						toppings.push(registry.byId("topping1").get("value"));
					}

					if(registry.byId("topping2").get("value") !== false){
						toppings.push(registry.byId("topping2").get("value"));
					}

					alert("Toppings: " + toppings.join(", "));
				}, true);

				registry.byId("deluxe").on("change", function(isChecked){
					registry.byId("topping2").set("value", isChecked ? "kalamata olives" : "olives");
				}, true);
				
			});
			
		</script>
	</body>
</html>