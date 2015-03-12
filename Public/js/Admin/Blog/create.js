;(function(window, document) {
	var myUpload = function(option) {
		var file,
			fd = new FormData(),
			xhr = new XMLHttpRequest(),
			loaded, tot, per, uploadUrl, input;

		input = document.createElement("input");
		input.setAttribute('id', "myUpload-input");
		input.setAttribute('type', "file");
		input.setAttribute('name', "files");

		input.click();

		uploadUrl = option.uploadUrl;
		callback = option.callback;
		uploading = option.uploading;
		beforeSend = option.beforeSend;

		input.onchange = function() {
			file = input.files[0];
			if (beforeSend instanceof Function) {
				if (beforeSend(file) === false) {
					return false;
				}
			}

			fd.append("files", file);

			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					if (callback instanceof Function) {
						callback(xhr.response);
					}
				}
			}

			//侦查当前附件上传情况
			xhr.upload.onprogress = function(evt) {
				loaded = evt.loaded;
				tot = evt.total;
				per = Math.floor(100 * loaded / tot);
				if (uploading instanceof Function) {
					uploading(per);
				}
			};

			xhr.open("post", uploadUrl);
			xhr.send(fd);
		}
	};

	window.myUpload = myUpload;
})(window, document);

$(function(){
	$('#datetimepicker').datetimepicker({
		'startView':3,
		'minView':2,
		'autoclose':true,
	});	

			$('.shadow').click(function(){
				$(this).hide();
				$('.imgModal').hide();
				$('.imgZone').html('');
			});

			$('.imgZone').on('click','.postImg',function(){
				$(this).addClass('choicedImg').siblings().removeClass('choicedImg');
			});

			$('.imgZone').on('dblclick','.postImg',function(){
				console.log('dbc');
				$(this).addClass('choicedImg').siblings().removeClass('choicedImg');
				$("#chioceImg").click();
			});

			$("#uploadImg").click(function(){
				myUpload({
					uploadUrl: "/Home/Common/imgUpload",
					beforeSend: function(file) {
						var filetype, filesize, i,
							typeArr = ["png", "jpg", "jpeg"],
							success = false;

						filetype = file.name.split(".").pop().toLowerCase();
						filesize = file.size;


						for (i in typeArr) {
							if (typeArr[i] == filetype) {
								success = true;
							}
						}

						if (!success) {
							alert("图片只支持JPG、JPEG和PNG格式");
						}

						if (parseInt(filesize) > (1024 * 1024)) {
							alert("图片大小不能大1MB");
							success = false;
						}

						return success;
					},
					callback: function(res) {
						res = $.parseJSON(res);
						
						if(res.sta == 1){
							$('.imgZone').append(imgTpl({src:res.img}));
						}
					},
					uploading: function(res) {

					}
				});				
			})
			$("#chioceImg").click(function(){
				var chSrc = $('.choicedImg img').attr('src');
				$('.shadow').hide();
				$('.imgModal').hide();
				$('.pre_img>img').attr({src:chSrc})
			});



	var ue = UE.getEditor('ue_content');



	// Extend Model prototype with Validation mixin.
    _.extend(Backbone.Model.prototype, Backbone.Validation.mixin);

	var PostModel = Backbone.Model.extend({
		url:"/Admin/Blog/postHandle",
		initialize:function(){
			$('#submit_post').click(function(){
				var timeSta = postModel.get('timeSta');
				post_date = timeSta ? $('input[name=time]').val() : null;
				var post_cate ;
				if($('#cate_all input[type=checkbox][checked]').length !== 0){
					$('#cate_all input[type=checkbox]').each(function(){
						if(this.checked){
							post_cate += this.value + ':'
						}
					}); 					
				}

				
				var data = {
					post_title:$('#ue_title>input').val(),
					post_content:ue.getContent(),
					post_excerpt:ue.getPlainTxt().substring(0,255)+'...',
					post_preimg:$('.pre_img>img').attr('src'),
					post_date:post_date,
					post_cate:post_cate
				};

				postModel.set(data);
				
				if(postModel.isValid()){
					postModel.save(null,{
						error:function(){
							console.log('asd')
						},
						success:function(model,response,options){
							if(response.status ==1 ){
								location.href = location.href;
							}
						}
					});	
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

	var PostView = Backbone.View.extend({
		el:'.main',
		events:{
			'click .pre_img>img':'preImgLoader',
			'click input[name=timeset]':'timeSet',
			'click .cate_input>ul>li>a':'activeCate',
			'click #addCate':'addCate'
		},
		preImgLoader:function(){
			var shadowH = document.height,
				postImgs,imgTpl,
				attachHtml = ''

			imgTpl = _.template('<div class="postImg">\
						<img src="<%=src%>" alt="">\
						</div>');

			$('.shadow').css({'height':shadowH}).fadeIn();
			$.post('/Admin/Blog/getImgs',null,function(res){
				if(res&&res.sta == 1){
					postImgs = res.imgs,
					
					_.map(postImgs,function(d){
						
						attachHtml += imgTpl({src:d});
					})
					$('.imgModal').show();
					$('.imgModal .imgZone').html(attachHtml);
						
				}
			},'json');
		},
		timeSet:function(){
			var timeSta = $('input[name=timeset]').get(0).checked;
			if(timeSta === true){
				$('input[name=time]').removeAttr('disabled');
			}else{
				$('input[name=time]').attr({disabled:'disabled'});
			}
			postModel.set({timeSta:timeSta});
		},
		activeCate:function(e){
			var target = $(e.target).attr('href');
			
			$('.cate_active').removeClass('cate_active');
			$(e.target).parent('li').addClass('cate_active');

			$('.cate_all,.cate_usual').hide();
			$(target).show();


		},
		addCate:function(){
			var pid = $('#cate_paret').val(),
				url = '/Admin/Blog/addCate',
				meta_name = $('#cate_name').val(),
				data = {
					meta_pid:pid,
					meta_name:meta_name,
					meta_cate:1
				};
			var metaHtml;
			$.post(url,data,function(res){
				if(res&&res.sta == 1){
					metaHtml = '<p><input type="checkbox" class="choicedCate" data-cateId="'+pid+'" />'+meta_name+'</p>';
					$('#cate_all').append(metaHtml);
				}
			},'json');
		}
	});
	var postView = new PostView;

	if(phpRet){
		var category = phpRet.cate || null;
		var cateTpl = _.template('<p><input type="checkbox" value="<%=meta_id%>"><%=meta_name%></p>');
		var html = '';
		_.map(category,function(d){

			html+=cateTpl(d);
		})
		$('#cate_all').html(html); 
	}
});