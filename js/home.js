$(document).ready(function() {
   var aActiveCategories = new Array();
   var base_url = "index.php/home/";
   
   /* REDESIGN IMAGES */ 
   function redesignImages() {
		$(".imgRedesign").each( function() {
			parent = $(this).parent();
			width = $(this).width();
			height = $(this).height();
			widthP = parent.width();
			
			if(width < height) {
				$(this).css('width',widthP+'px');
				ratio = width/widthP;
				newHeight = height/ratio;
				console.log(newHeight);
				parent.css('height',widthP+'px');
				$(this).css('margin-top','-' + (newHeigt-widthP)/2+'px');
			} else {
				$(this).css('height',widthP+'px');
				ratio = height/widthP;
				newWidth = width/ratio;
				console.log(newWidth);
				$(this).css('max-width','none');
				$(this).css('margin-left','-' + (newWidth-widthP)/2+'px');
			}
			console.log(width + " " + height);
		});
	}
   
   /* IMAGE CLICK EVENT */
   function clickImageEvent() {
	   $(".image_item").click(function() {
		   console.log($(this).attr('data-Id'));
		   getImageEdition($(this).attr('data-Id'));
		   
	   });
   }
   
   /* BACK BUTTON CLICK EVENT */
   function clickBackButtonEvent() {
	   $(".back_button").click(function() {
		   console.log();
		   getImageCatalog(aActiveCategories);
	   });
   }
    
    /* GET EDITION FORM */
    function getImageEdition(iIdImage) {
	   $.ajax({
		   url: base_url + "getImageEditionForm/" + iIdImage,
		   method: 'GET',
		   success: function(sHtmlResult) {
			   $(".containerImages").html(sHtmlResult);
			   clickImageEvent();
			   clickBackButtonEvent();
			   redesignImages();
		   }
	   });
   }
   
   /* GET COMPLETE CATALOG OR BY CATEGORY */
   function getImageCatalog(aIdCategory) {
	   console.log('load catalog');
	   
	   if(aIdCategory == null) {
		   console.log('no defined category');
		   $.ajax({
			   url: base_url + "getCatalog",
			   method: 'GET',
			   success: function(sHtmlResult) {
				   $(".containerImages").html(sHtmlResult);
				   clickImageEvent();
				   redesignImages();
			   }
		   });
	   } else {
		   aCategories = JSON.stringify(aIdCategory);
		   console.log(aCategories);
		   console.log('defined category');
		   $.ajax({
			   url: base_url + "getCatalog",
			   method: 'GET',
			   data: {aCategories: aCategories},
			   success: function(sHtmlResult) {
				   $(".containerImages").html(sHtmlResult);
				   clickImageEvent();
				   redesignImages();
			   }
		   });
	   }
   }
   
   /* LOAD CATALOG */
   getImageCatalog(null);
   
   /* CATEGORY CLICK EVENT */
   $(".category_item").click(function() {
	   
	   if ($(this).attr('data-Active') == "false") {
		   aActiveCategories.push($(this).attr('data-Id'));
		   $(this).attr('data-Active','true');
		   $(this).css('background-color','#f5f5f5');
		   $(this).css('color','#333333');
		   $(this).css('font-weight','bold');
		   
	   } else if ($(this).attr('data-Active') == "true") {
		   aActiveCategories.splice(aActiveCategories.indexOf($(this).attr('data-Id')),1);
		   $(this).attr('data-Active','false');
		   $(this).css('background-color','#FFFFFF');
		   $(this).css('color','#777777');
		   $(this).css('font-weight','normal');
	   }
	   
	   getImageCatalog(aActiveCategories);
	   console.log(aActiveCategories);
   });
 });