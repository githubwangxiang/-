<?php
namespace Admin\Controller;
use Think\Controller;
class RestaurantController extends CommonController
{
    //餐馆列表
    public function index(){
        $count =D('Restaurant') -> count();
        //实例化模型
//        $data = M('Restaurant')->select();
        $data = D('Restaurant') -> alias('t1') -> field('t1.*,t2.seller_name') -> join('left join seller t2 on t1.seller_id = t2.id') -> select();
//        dump($data);die;
        $this->assign('data',$data);
        $this->assign('count',$count);
        $this->display();
    }

    //餐馆添加
    public function add(){
        if(IS_POST){
            //接收数据
            $data = I("post.");
            $model = D('Restaurant');
            //调用模型中我们自己封装的upload_logo
            $data = $model -> upload_logo($_FILES['res_logo'], $data);
            if (!$data) {
                $error = $model->getError();
                $this->error($error);
            }
            $res = $model->add($data);
            if($res){
                echo "<script>
                     //获取当前frame索引
                     var index=parent.layer.getFrameIndex(window.name);
                     //刷新父级页面
                     window.parent.location.reload();
                     //弹出提示信息
                     parent.parent.layer.msg('添加成功',{icon:1,time:1500}); 
                     //关闭修改页面
                     parent.layer.close(index);
                     </script>";
            }else{
                echo "<script>
                     //获取当前frame索引
                     var index=parent.layer.getFrameIndex(window.name);
                     //刷新父级页面
                     window.parent.location.reload();
                     //弹出提示信息
                     parent.parent.layer.msg('添加失败',{icon:1,time:1500}); 
                     //关闭修改页面
                     parent.layer.close(index);
                     </script>";
            }
        }else{
            $seller = D('Seller') -> select();
            $this->assign('seller',$seller);
            $cate = D('cate')-> where('pid != 0') ->select();
            $this->assign('cate',$cate);
            $this->display();
        }
    }

    //餐馆修改
    public function edit(){
        if(IS_POST){
            $data = I('post.');
            $model = D('Restaurant');
            //调用模型中我们自己封装的upload_logo
            $data = $model->upload_logo($_FILES['res_logo'],$data);
            if(!$data){
                //上传过程中出错
                $error = $model->getError();
                $this->error($error);
            }
            //如果上传了新图片,$data中会有res_log字段
            if($data['res_log']){
                //在保存新图片路径之前,先将旧图片路径查询到,用于后续删除
                $goods = $model->where(['id'=>$data['id']])->find();
            }
            if(!$model->create($data)){   //不要忘记取反
                //create方法执行失败
                $error = $model->getError();
                $this->error($error);
            }
            $res = $model->save(); 
            if($res !== false){
                //修改成功,如果上传了新图片,删除旧logo图片
                if($data['res_log']){
                    //删除旧图片,使用PHP自带的unlink函数
                    unlink(ROOT_PATH . $goods['res_log']);
                }
                //继续上传新的相册图片
                $files = $_FILES;
                unset($files['res_logo']);
                $model->upload_logo($files,$data['id']);
                echo "<script>
                     //获取当前frame索引
                     var index=parent.layer.getFrameIndex(window.name);
                     //刷新父级页面
                     window.parent.location.reload();
                     //弹出提示信息
                     parent.parent.layer.msg('修改成功',{icon:1,time:1500}); 
                     //关闭修改页面
                     parent.layer.close(index);
                     </script>";
            }else{
                echo "<script>
                     //获取当前frame索引
                     var index=parent.layer.getFrameIndex(window.name);
                     //刷新父级页面
                     window.parent.location.reload();
                     //弹出提示信息
                     parent.parent.layer.msg('修改成功',{icon:1,time:1500}); 
                     //关闭修改页面
                     parent.layer.close(index);
                     </script>";
            }

        }else{
            //接收id参数
            $id = I('get.id');
            $rest = D('Restaurant')-> where("id = $id") -> find();
            $seller = D('Seller') -> select();
            //得到所有的二级分类
            $cate = D('cate')-> where('pid != 0') ->select();
            $this->assign('cate',$cate);
            $this->assign('seller',$seller);
            $this->assign('rest',$rest);
            $this->display();
        }
    }

    //餐馆删除
    public function del(){
        $id = I('get.id');
        $res = D('Restaurant')->where(['id'=>$id])->delete();
        if($res !== false){
            $this->success("删除成功",U("Admin/Restaurant/index"));
        }else{
            $this->error("删除失败");
        }
    }
}
?>