<?php
namespace Home\Controller;
use Think\Controller;


class CommonController extends Controller {
    public function imgUpload(){
        import('Org.Bean.image');
        $image = new \image("2.png", 1, "300", "500", "5.png");
        $type =  array_pop(split('\.',$_FILES['files']['name']));

        $dest = C('IMAGE_HUB').'/tmp'.time().'.'.$type;

        move_uploaded_file($_FILES['files']['tmp_name'],C('SERVER_PATH').$dest);

        $res= array('sta'=>1,'mes'=>'success','img'=>$dest);

        $this->ajaxReturn($res);
    }
}