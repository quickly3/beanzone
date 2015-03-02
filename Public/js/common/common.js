$(function(){
	$("#searchIcon").click(function(){
		$(".search").animate({
			marginLeft:"10"
		},function(){
			$("#searchIcon").fadeOut(function(){
				$(".go").fadeIn();	
			});
		}).focus();
		$("#searchIcon").animate({
			marginLeft:"10"
		});
	});
	$(".search").dblclick(function(){
		$(".search").animate({
			marginLeft:"-210"
		},function(){
			$(".go").hide();	
			$("#searchIcon").fadeIn();
		}).focus();
		$("#searchIcon").animate({
			marginLeft:"20"
		});		
	});
	$('.category ul li a').each(function(){
		var colorSet = ['#e8443a','#aa5096','#1CA1E2','#FFD302','#FFD302','#9B4C13','#8DC027','#FF0198','#4837cd','#33ac5b','#20c8a6'],
			cLen,ranNum;

		cLen = colorSet.length;
		ranNum = Math.ceil(Math.random()*cLen) - 1;
		
		$(this).css({backgroundColor:colorSet[ranNum]});
	});
	
});