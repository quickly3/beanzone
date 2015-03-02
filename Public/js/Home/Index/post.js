
$(function(){

	var PostsModel = Backbone.Model.extend({});

	var postsModel = new PostsModel(posts);

	var PostsView = Backbone.View.extend({
		el:'.leftPan',
		model:postsModel,
		template:_.template($('#postsTemp').html()),
		initialize:function(){
			this.render();
		},
		render:function(){	
			var data,html ='';
			html = this;
			data = this.model.toJSON()[0];

			if(data){
				this.$el.html(this.template(data));	
			}
		}
	});

	var postsView = new PostsView();
});