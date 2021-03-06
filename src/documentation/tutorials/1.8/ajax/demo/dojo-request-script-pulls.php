<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: dojo/request/script</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	</head>
	<body>
		<h1>Demo: dojo/request/script</h1>
		<p>Click the button below to see dojo/request/script request recent pull requests for Dojo's GitHub repo.</p>
		<div>
			<button class="action" id="pullrequestsButton">dojo pull requests</button>
		</div>
		<br /><br />
		<ul id="pullrequests">
		</ul>
		<?php
    		include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
    		Utils::printDojoScript();
    	?>
		<script>
			require(["dojo/dom", "dojo/on", "dojo/request/script",
					"dojo/dom-construct", "dojo/_base/array",
					"dojo/domReady!"
			], function(dom, on, script, domConstruct, arrayUtil){
				var pullsNode = dom.byId("pullrequests");

				// Attach the onclick event handler to tweetButton
				on(dom.byId("pullrequestsButton"), "click", function(evt){
					// Request the open pull requests from Dojo's GitHub repo
					script.get("https://api.github.com/repos/dojo/dojo/pulls", {
						// Use the "callback" query parameter to tell
						// GitHub's services the name of the function
						// to wrap the data in
						jsonp: "callback"
					}).then(function(response){
						// Empty the tweets node
						domConstruct.empty(pullsNode);

						// Create a document fragment to keep from
						// doing live DOM manipulation
						var fragment = document.createDocumentFragment();

						// Loop through each pull request and create a list item
						// for it
						arrayUtil.forEach(response.data, function(pull){
							var li = domConstruct.create("li", {}, fragment);
							var link = domConstruct.create("a", {href: pull.url, innerHTML: pull.title}, li);
						});

						// Append the document fragment to the list
						domConstruct.place(fragment, pullsNode);
					});
				});
			});
		</script>
	</body>
</html>
