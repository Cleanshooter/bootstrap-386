jQuery(function ($) {
	/*$("img").attr({
		asciify: "true",
		asciicolor: "true",
		asciiresolution: "hgih"
		});
	*/
	//asciify="true" asciicolor="true" asciiresolution="high"
	//check size function
	function check_size(){
		var width = $(window).width();
		if (width < 980){
			if ($('#left-sidebar').length){
				$('#right-sidebar').removeClass("span3 span8").addClass("span12");
				$('#content').removeClass("span6 span8 span9").addClass("span12");
				$('#left-sidebar').removeClass("span3 span4").addClass("span12");
			}
		}
		else if (width < 1350){
			//alert(width);
			if ($('#left-sidebar').length && $('#right-sidebar').length){
				$('#right-sidebar').removeClass("span3 span12").addClass("span8");
				$('#content').removeClass("span6 span12").addClass("span8");
				$('#left-sidebar').removeClass("span3 span12").addClass("span4");
			}else if($('#left-sidebar').length){
				$('#content').removeClass("span9 span12 span6").addClass("span8");
				$('#left-sidebar').removeClass("span3 span12").addClass("span4");
			}
		}else{
			if ($('#left-sidebar').length && $('#right-sidebar').length){
				$('#right-sidebar').removeClass("span4 span8").addClass("span3");
				$('#content').removeClass("span8 span12").addClass("span6");
				$('#left-sidebar').removeClass("span4 span12").addClass("span3");
			}else if($('#left-sidebar').length){
				$('#content').removeClass("span8 span12 span6").addClass("span9");
				$('#left-sidebar').removeClass("span4 span12").addClass("span3");
			}
		}	
	}
	check_size();
	$( window ).resize(function (){check_size()});
});