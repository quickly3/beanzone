$(function(){
	var ue = UE.getEditor('ue_content');


	// Extend Model prototype with Validation mixin.
    _.extend(Backbone.Model.prototype, Backbone.Validation.mixin);

	var PostModel = Backbone.Model.extend({
		url:"/Beanzone/index.php/Blog/Index/postHandle",
		initialize:function(){
			$('#submit_post').click(function(){

				var data = {
					post_title:$('#ue_title>input').val(),
					post_content:ue.getContent(),
					post_excerpt:ue.getPlainTxt().substring(0,255)+'...',
				};

				postModel.set(data);
				
				if(postModel.isValid()){
					postModel.save();	
				}
			});			
		},
		validation:{
			post_title:{
				required:true
			},
			post_content:{
				required:true
			}
		}
	});
	var postModel = new PostModel();



});