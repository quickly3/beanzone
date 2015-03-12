<?php
namespace Home\Controller;
use Think\Controller;


class CommonController extends Controller {
    public function imgUpload(){
        import('Org.Bean.CImage');
        
        $type =  array_pop(split('\.',$_FILES['files']['name']));

        $dest = C('IMAGE_HUB').'/tmp'.time().'.'.$type;
        $newImg = C('SERVER_PATH').$dest;
        move_uploaded_file($_FILES['files']['tmp_name'],$newImg);
        $image = new \CImage();
        $image->CreateThumbnail($newImg,170,120,$newImg);
        $res= array('sta'=>1,'mes'=>'success','img'=>$dest);

        $this->ajaxReturn($res);
    }
}