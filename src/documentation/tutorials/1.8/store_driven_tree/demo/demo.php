<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: Tree Drag & Drop, and Dynamic Changes</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<?php
			Utils::printClaroCss();
		?>

	</head>
	<body class="claro">
		<h1>Demo: Tree Drag & Drop, and Dynamic Changes</h1>
		<p>Double-click on an item to edit it</p>
		<div id="tree"></div>
		<p><button id="add-new-child">Add new child to selected item</button></p>
		<p><button id="remove">Remove selected item</button></p>

		<?php
			Utils::printDojoScript("async: true");
		?>
		<script>
			require([
				"dojo/aspect",
				"dojo/json",
				"dojo/query",
				"dojo/store/Memory",
				"dojo/store/Observable",
				"dijit/Tree",
				"dijit/tree/ObjectStoreModel",
				"dijit/tree/dndSource",
				"dojo/text!./data/all.json",
				"dojo/domReady!"
			], function(aspect, json, query, Memory, Observable,
				Tree, ObjectStoreModel, dndSource, data){

				// set up the store to get the tree data, plus define the method
				// to query the children of a node
				var governmentStore = new Memory({
					data: json.parse(data),
					getChildren: function(object){
						return this.query({parent: object.id});
					}
				});

				// To support dynamic data changes, including DnD,
				// the store must support put(child, {parent: parent}).
				// But dojo/store/Memory doesn't, so we have to implement it.
				// Since our store is relational, that just amounts to setting child.parent
				// to the parent's id.
				aspect.around(governmentStore, "put", function(originalPut){
					return function(obj, options){
						if(options && options.parent){
							obj.parent = options.parent.id;
						}
						return originalPut.call(governmentStore, obj, options);
					}
				});

				// give store Observable interface so Tree can track updates
				governmentStore = new Observable(governmentStore);

				// create model to interface Tree to store
				var model = new ObjectStoreModel({
					store: governmentStore,

					// query to get root node
					query: {id: "root"}
				});

				var tree = new Tree({
					model: model,
					dndController: dndSource,
					persist: false
				}, "tree"); // make sure you have a target HTML element with this id
				tree.startup();

				query("#add-new-child").on("click", function(){
					// get the selected object from the tree
					var selectedObject = tree.get("selectedItems")[0];
					if(!selectedObject){
						return alert("No object selected");
					}

					// add a new child item
					var childItem = {
						name: "New child",
						id: Math.random()
					};
					governmentStore.put(childItem, {
						overwrite: true,
						parent: selectedObject
					});
				});

				query("#remove").on("click", function(){
					var selectedObject = tree.get("selectedItems")[0];
					if(!selectedObject){
						return alert("No object selected");
					}
					governmentStore.remove(selectedObject.id);
				});

				tree.on("dblclick", function(object){
					object.name = prompt("Enter a new name for the object");
					governmentStore.put(object);
				}, true);
			});
		</script>
	</body>
</html>
