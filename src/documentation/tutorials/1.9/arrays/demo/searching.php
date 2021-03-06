<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: Array Searching</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	</head>
	<body>
		<h1>Demo: Array Searching</h1>
		<p>The following list represents an array; the element whose index is found by calling <code>dojo/_base/array.indexOf(array, 2);</code> is highlighted.</p>
		<ul id="list1">
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>3</li>
			<li>2</li>
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>3</li>
			<li>2</li>
			<li>1</li>
		</ul>
		<p>The following list represents an array; the element whose index is found by calling <code>dojo/_base/array.indexOf(array, 2, 2);</code> is highlighted.</p>
		<ul id="list2">
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>3</li>
			<li>2</li>
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>3</li>
			<li>2</li>
			<li>1</li>
		</ul>
		<p>The following list represents an array; the element whose index is found by calling <code>dojo/_base/array.lastIndexOf(array, 2);</code> is highlighted.</p>
		<ul id="list3">
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>3</li>
			<li>2</li>
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>3</li>
			<li>2</li>
			<li>1</li>
		</ul>
		<p>The following list represents an array; the element whose index is found by calling <code>dojo/_base/array.indexOf(array, object);</code> is highlighted.</p>
		<ul id="list4">
			<li>{ id: 0 }</li>
			<li>{ id: 1 }</li>
			<li>{ id: 2 }</li>
			<li>{ id: 3 }</li>
		</ul>
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript();
		?>
		<script>
			
			require(["dojo/_base/array", "dojo/dom-class", "dojo/query", "dojo/dom", "dojo/domReady!"]
			, function(arrayUtil, domClass, query, dom) {
				var arr1 = [1,2,3,4,3,2,1,2,3,4,3,2,1],
					obj1 = { id: 1 },
					arr2 = [{ id: 0 }, obj1, { id: 2 }, { id: 3 }],
					list1 = dom.byId("list1"),
					list2 = dom.byId("list2"),
					list3 = dom.byId("list3"),
					list4 = dom.byId("list4");

				// Adds the class "highlight" to the list item corresponding with the
				// indices as returned by baseArray.indexOf or baseArray.lastIndexOf.
				domClass.add(query("li", list1)[arrayUtil.indexOf(arr1, 2)], "highlight");
				domClass.add(query("li", list2)[arrayUtil.indexOf(arr1, 2, 2)], "highlight");
				domClass.add(query("li", list3)[arrayUtil.lastIndexOf(arr1, 2)], "highlight");
				domClass.add(query("li", list4)[arrayUtil.indexOf(arr2, obj1)], "highlight");
			});
			
		</script>
	</body>
</html>
