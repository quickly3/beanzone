$(function(){
	$('.item .submit').click(function(){
		var url = '/Admin/Project/addItemHandle',
			data = {
				pj_content:$('input[name=content]').val(),
				pj_status:$('select.status').val()
			};
		$.post(url,data,function(res){
			if(res.sta == 1){
				location.href = location.href; 
			}
		},'json');
	});

	var ItemModel = Backbone.Model.extend({});

	var PjItemCollections = Backbone.Collection.extend({
		model:ItemModel
	});

	var pjItemCollection = new PjItemCollections(projectItem);

	var ItemView = Backbone.View.extend({
		el:'.projectItem .table tbody',
		initialize:function(){
			this.addAll();
		},
		addAll:function(){
			pjItemCollection.each(this.addOne,this);
		},
		addOne:function(item){
	    	var view = new ProjectItemView({model: item});
	    	this.$el.append(view.render().el);
		}
	});

	var ProjectItemView = Backbone.View.extend({
		tagName:'tr',
		template:_.template($('#pjItem').html()),
		events:{
			"click .doneItem":'doneItem',
			"click .delItem":'delItem',
		},
		render:function(){
			var html,
				pj_handle='<i class="delItem fa fa-close"></i>',
				pj_status = parseInt(this.model.get('pj_status'));

			
			switch(pj_status){
				case 2:
				this.model.set('pj_status','<i class="fa fa-check"></i>已完成');
				break;
				case 1:
				this.model.set('pj_status','<i class="fa fa-bookmark"></i>处理中');
				pj_handle +=' <i class="doneItem fa fa-check-square"></i>'
				break;
			}
			this.model.set('pj_handle',pj_handle);

			html = this.template(this.model.toJSON());
			this.$el.html(html);
			
			return this;
		},
		doneItem:function(){
			var pj_id = this.model.get('id'),
				url = '/Admin/Project/doneItem',
				data= {id:pj_id};

			$.post(url,data,function(res){
				if(res&&res.sta==1){
					location.href = location.href;
				}
			},'json')

		},
		delItem:function(){
			var pj_id = this.model.get('id'),
				url = '/Admin/Project/delItem',
				data= {id:pj_id};

			$.post(url,data,function(res){
				if(res&&res.sta==1){
					location.href = location.href;
				}
			},'json')

		}	


	});

	var item = new ItemView;
});