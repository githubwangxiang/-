<?php
//声明命名空间
namespace Admin\Controller;
//引入控制器父类
use Think\Controller;
class GoodsController extends CommonController{
	//积分商品列表
    public function index(){
        //获取积分商品数据
        $data = D('Goods') -> select();
        //计算积分商品总记录数
        $count = D('Goods') -> count();
        $this -> assign('count',$count);
        $this -> assign('data',$data);
        $this -> display();
    }
    //添加积分商品
    public function add(){
        echo "<script>layer.msg('hello');</script>";
        $model = D('Goods');
        if (IS_POST) {
            $data = I('post.');
            //调用模型中的upload_logo方法完成文件上传功能
            $data = $model->upload_logo($_FILES['logo'], $data);
            if (!$data) {
                $error = $model->getError();
                $this->error($error);
            }
            if (!$model->create($data)) {
                $error = $model->getError();
                $this->error($error);
            }
            if($_FILES['logo']['error'] == 4){
                $this->error('商品积分图片必须有');
            }
            $res = $model->add();
            //layer插件实现页面跳转
            if ($res) {
                echo "<script>
                     var index=parent.layer.getFrameIndex(window.name);
                     window.parent.location.reload();
                     parent.parent.layer.msg('修改成功',{icon:1,time:1500});
                     parent.layer.close(index);
                     </script>";
            } else {
                echo "<script>
                     var index=parent.layer.getFrameIndex(window.name);
                     window.parent.location.reload();
                     parent.parent.layer.msg('修改失败',{icon:2,time:1500});
                     parent.layer.close(index);
                     </script>";
            }
        } else {
            $this->display();
        }
    }
    //修改积分商品
    public function edit(){
        $model = D('Goods');
        if(IS_POST){
            $data = I('post.');
            $data = $model -> upload_logo($_FILES['logo'],$data);
            if(!$data){
                //上传过程中出错
                $error = $model -> getError();
                $this->error($error);
            }
            if($data['goods_logo']){
                //在保存新图片路径之前，先将旧图片路径查询到，用于后续删除
                $goods = $model -> where(['id' => $data['id']]) ->find();
            }
            //自动验证
            if(!$model -> create($data)){
                $error = $model -> getError();
                $this -> error($error);
            }
            //积分商品上传必须正确
            if($_FILES['logo']['error'] == 4){
                $this->error('商品积分图片必须有');
            }
            $res = $model -> save();
            if($res !== false){
                //如果上传了新图片，删除旧logo图片
                if($data['goods_logo']){
                    //删除旧图片，使用PHP自带的unlink函数
                    unlink( ROOT_PATH . $goods['goods_logo']);
                }
                echo "<script>
                     var index=parent.layer.getFrameIndex(window.name);
                     window.parent.location.reload();
                     parent.parent.layer.msg('修改成功',{icon:1,time:1500});
                     parent.layer.close(index);
                     </script>";
            }else{
                echo "<script>
                     var index=parent.layer.getFrameIndex(window.name);
                     window.parent.location.reload();
                     parent.parent.layer.msg('修改失败',{icon:2,time:1500});
                     parent.layer.close(index);
                     </script>";
            }
        }else{
            $id = I('get.id');
            $goods = $model-> where(['id' => $id]) -> find();
            $this->assign('goods',$goods);
            $this->display();
        }
    }
    //删除积分商品
    public function del(){
        $model = D('Goods');
        $id = I('Post.id');
        $res = $model->delete($id);
        if($res !== false){
            $return = array(
                'code'=>10000,
                'msg'=>'删除成功'
            );
            $this->ajaxReturn($return);
        }else{
            $return = array(
                'code'=>10001,
                'msg'=>'删除失败'
            );
            $this->ajaxReturn($return);
        }
    }
    //用户积分列表
    public function userIndex(){
        //获取用户积分数据
        $data = D('User') -> select();
        //计算用户积分总记录数
        $count = D('User') -> count();
        $this -> assign('count',$count);
        $this -> assign('data',$data);
        $this -> display('userIndex');
    }
    //用户积分修改
    public function userEdit(){
        $model = D('User');
        $data = I('Post.');
        $res = $model->save($data);
        if($res !== false){
            $return = array(
                'code'=>10000,
                'msg'=>'修改成功'
            );
            $this->ajaxReturn($return);
        }else{
            $return = array(
                'code'=>10001,
                'msg'=>'修改失败'
            );
            $this->ajaxReturn($return);
        }
    }
    //批量删除
    public function delData(){
        $model = D('Goods');
        $data = I('Post.data');
        $res = $model->delete($data);
        if($res !== false){
            $return = array(
                'code'=>10000,
                'msg'=>'删除成功'
            );
            $this->ajaxReturn($return);
        }else{
            $return = array(
                'code'=>10001,
                'msg'=>'删除失败'
            );
            $this->ajaxReturn($return);
        }
    }
}