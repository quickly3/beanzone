// ;(function(window,$){
// 	var randomColor = function(elem){

// 	}
// })(window,$);
$(function(){
	$("#searchIcon").click(function(){
		$obj = $({})
			.queue('search',function(next){
				$(".search").animate({marginLeft:"10"});
				$("#searchIcon").animate({marginLeft:"10"});
				next();
			})
			.queue('search',function(next){
				$("#searchIcon").fadeOut();	
				next();
			})
			.queue('search',function(){
				$(".go").fadeIn();
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