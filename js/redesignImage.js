/*$(document).load(function() {
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
});*/