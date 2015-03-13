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

	var colorSet = ['#e8443a','#aa5096','#1CA1E2','#FFD302','#FFD302','#9B4C13','#8DC027','#FF0198','#4837cd','#33ac5b','#20c8a6'];
	var cateTpl = _.template('<a href="/Home/Index/index/cate/<%=meta_id%>" style="background-color:<%=bg_color%>;"><%=meta_name%></a>');
	var cLen,ranNum,cateHtml = '';
	
	_.map(phpRet.category,function(d){
		
		cLen = colorSet.length;
		ranNum = Math.ceil(Math.random()*cLen) - 1;
		d.bg_color = colorSet[ranNum];
		cateHtml += cateTpl(d);
	});
	$(".category ul>li").html(cateHtml);


	if(typeof phpRet.lastPosts !== 'undefined'){
		var template = _.template($('#newlyTemp').html());
		var html = '';
		_.each(phpRet.lastPosts,function(d){
			html += template(d); 
		})
		$('.newly ul').html(html);
	}

	if(typeof phpRet.pigeonhole !== 'undefined'){
		var template = _.template($('#pigeonholeTemp').html());
		var html = '';
		_.each(phpRet.pigeonhole,function(d){
			html += template(d); 
		})
		$('.pigeonhole ul').html(html);
	}
	
});