$(function() {
	// hide all the sub-menus
	$("span.toggle").next().hide();
	
	// set the cursor of the toggling span elements
	$("span.toggle").css("cursor", "pointer");
	
	// add a click function that toggles the sub-menu when the corresponding
	// span element is clicked
	$("span.toggle").click(function() {
		$(this).next().toggle(1000);
	});
});