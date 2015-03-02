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



	var PostsModel = Backbone.Model.extend({});

	var PostsCollections = Backbone.Collection.extend({
		model:PostsModel
	});

	var postCollection = new PostsCollections(posts);

	var AppView = Backbone.View.extend({
		el:'.leftPan',
		initialize:function(){
			this.addAll();
		},
		addAll:function(){	
			
			postCollection.each(this.addOne,this);
		},
		addOne:function(post){
	    	var view = new PostView({model: post});
	    	this.$el.append(view.render().el);
		}
	});

	var PostView = Backbone.View.extend({
		tagName:'div',
		template:_.template($('#postsTemp').html()),
		events:{
			"click .b-img>img":"toPost",
			"click .b-title>a":"toPost"
		},
		render:function(){
			var date,dateArr,id = this.model.get("id");
			
			this.model.set("toPost","/Home/Index/post/id/"+id);
			
			date = this.model.get("post_date");
			dateArr = date.split(" ").shift().split("-");
			date = dateArr[0].substring(2,4)+"年"+dateArr[1]+"月"+dateArr[2]+"日";
			this.model.set("post_date",date);
	    	
	    	this.$el.html(this.template(this.model.toJSON()));
	    	return this;
		},
		toPost:function(){
			
		}

	});

	var App = new AppView;



});