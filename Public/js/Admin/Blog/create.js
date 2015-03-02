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
	var ue = UE.getEditor('ue_content');


	// Extend Model prototype with Validation mixin.
    _.extend(Backbone.Model.prototype, Backbone.Validation.mixin);

	var PostModel = Backbone.Model.extend({
		url:"/Admin/Blog/postHandle",
		initialize:function(){
			$('#submit_post').click(function(){

				var data = {
					post_title:$('#ue_title>input').val(),
					post_content:ue.getContent(),
					post_excerpt:ue.getPlainTxt().substring(0,255)+'...',
					post_preimg:$('.pre_img>img').attr('src')
				};

				postModel.set(data);
				
				if(postModel.isValid()){
					postModel.save(null,{
						error:function(){
							console.log('asd')
						},
						success:function(model,response,options){
							if(response.status ==1 ){
								location.href ='/Home/Index';
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
		},
		preImgLoader:function(){
		// if (upload_flag == 1) {
		// 	return false;
		// }

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
					$('.pre_img>img').attr({src:res.img});
				}
			},
			uploading: function(res) {

			}
		});
		}
	});
	var postView = new PostView;


});