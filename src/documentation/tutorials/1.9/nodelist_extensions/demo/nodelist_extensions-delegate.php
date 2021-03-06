<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: NodeList Extensions: Delegate</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
		?>
		<style>
		.fruitList li {
			padding: 2px 6px;
		}
		.yum {
		    background: url('<?php echo Utils::$cdn; ?>dojox/editor/plugins/resources/emoticons/emoticonHappy.gif') no-repeat;
		    background-position: top right;
		}
		</style>
	</head>
	<body>
		<h1>Demo: NodeList Extensions: Delegate</h1>
		<ul>
			<li>Alkaline Fruits
				<ul class="fruitList">
					<li class="alkaline yum"><span>Apples</span></li>
					<li class="alkaline"><span>Persimmons</span></li>
					<li class="alkaline">Thompson Grapes <span class="note">(Seedless)</span></li>
					<li class="alkaline">Muscat Grapes</li>
					<li class="alkaline">Fresh Figs</li>
					<li class="alkaline"><span>Dates</span></li>
					<li class="alkaline"><span>Figs</span></li>
					<li class="alkaline yum"><span>Raisins</span></li>
					<li class="alkaline yuck"><span>Prunes</span></li>
					<li class="alkaline"><span>Apricots</span></li>
					<li class="alkaline"><span>Peaches</span></li>
					<li class="alkaline yum"><span>Bananas</span></li>
					<li class="alkaline"><span>Cherries</span></li>
					<li class="alkaline"><span>Bananas</span></li>
					<li class="alkaline">Litchi "Nuts"</li>
					<li class="alkaline"><span>Carob</span></li>
				</ul>
			</li>
			<li>Subacidic Fruits
				<ul class="fruitList">
					<li class="subacidic">Sweet Apples <span class="note">(Delicious)</span></li>
					<li class="subacidic">Sweet Peaches</li>
					<li class="subacidic">Sweet Nectarines</li>
					<li class="subacidic">Pears</li>
					<li class="subacidic">Sweet Cherries</li>
					<li class="subacidic">Papayas</li>
					<li class="subacidic">Mangos</li>
					<li class="subacidic">Apricots</li>
					<li class="subacidic">Fresh Litchi "Nuts"</li>
					<li class="subacidic">Sweet Plums</li>
					<li class="subacidic">Blueberries</li>
					<li class="subacidic">Raspberries</li>
					<li class="subacidic">Blackberries</li>
					<li class="subacidic">Mulberries</li>
					<li class="subacidic">Huckleberries</li>
					<li class="subacidic">Cherimoyas</li>		
				</ul>
			</li>
			<li>Acid Fruits
				<ul class="fruitList">
					<li class="acid">Oranges</li>
					<li class="acid">Grapefruit</li>
					<li class="acid">Pineapples</li>
					<li class="acid">Strawberries</li>
					<li class="acid">Pomegranates</li>
					<li class="acid yuck">Lemons</li>
					<li class="acid">Kiwi Fruit</li>
					<li class="acid">Kumquats</li>
					<li class="acid">Loquats</li>
					<li class="acid">Carambolas</li>
					<li class="acid yuck">Loganberries</li>
					<li class="acid">Gooseberries</li>
					<li class="acid">Cranberries </li>
					<li class="acid">Limes</li>
					<li class="acid">Sour Apples</li>
					<li class="acid">Sour Grapes</li>
					<li class="acid">Sour Peaches</li>
					<li class="acid">Sour Nectarines</li>
					<li class="acid">Sour Plums</li>
					<li class="acid yuck">Sour Cherries</li>		
				</ul>
			</li>
			<li>Melons
				<ul class="fruitList">
					<li class="melon">Watermelon</li>
					<li class="melon yum">Honeydew Melon</li>
					<li class="melon">Honey Balls</li>
					<li class="melon yum">Cantaloupe</li>
					<li class="melon yuck">Muskmelon</li>
					<li class="melon">Casaba Melon</li>
					<li class="melon">Crenshaw Melon</li>
					<li class="melon">Pie Melon</li>
					<li class="melon">Banana Melon</li>
					<li class="melon">Persian Melon</li>
					<li class="melon">Christmas Melon</li>
					<li class="melon">Nutmeg Melon</li>		
				</ul>
			</li>
		</ul>
		<?php
			Utils::printDojoScript("async: true");
		?>
		<script>
			require(["dojo/query", "dojo/dom-class", "dojo/on", "dojox/NodeList/delegate", "dojo/domReady!"], function(query, domClass, on){
				
				query(".fruitList")		// set up event handlers on all elements with class 'fruitList'
					.on("li:click", function(evt){
						// click handler function fired for each 
						// ancestor-or-self 'li' element of the click target
						console.log("clicked: ", evt.target, " target element: ", this, " bound element: ", evt.currentTarget);
						// note use of 'this' vs. evt.target as the element reference
						domClass.toggle(this, "yum");
					});
				
			});
		</script>		
	</body>
</html>
