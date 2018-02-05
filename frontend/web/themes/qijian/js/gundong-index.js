// JavaScript Document

$(document).ready(function() {
	$("#owl-demo,#owl-dem2").owlCarousel({
		items : 4,
		autoPlay : 3000,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [991, 3],
		itemsTablet : [767, 2],
		itemsMobile : [479, 2],
		lazyLoad : true,
		navigation : true,
		pagination : false,
		navigationText : ["", ""],/*左右箭头文字*/
	  });


	$("#owl-demo3").owlCarousel({
		items : 3,
		autoPlay : 3000,
		itemsDesktop : [1199, 3],
		itemsDesktopSmall : [991, 3],
		itemsTablet : [767, 2],
		itemsMobile : [479, 2],
		lazyLoad : true,
		navigation : true,
		pagination : false,
		navigationText : ["", ""],/*左右箭头文字*/
	  });

 });




