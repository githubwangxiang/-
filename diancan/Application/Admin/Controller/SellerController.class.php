<?php
namespace Admin\Controller;
use Think\Controller;
class SellerController extends CommonController
{
    //增加入驻商家
    public function  addSeller()
    {
        if (IS_POST)
        {
            $data=I('post.');
            $model=D('seller');
            $res=$model->create($data);
            if($res)
            {
                $id=$model->add();
                if($id)
                {
                   $url=U('Admin/Seller/showSeller');
                    echo "<script>alert('添加成功');location.href='$url'</script>";
                    die;

                }
                else
                {
                    echo "<script>alert('添加失败1');history.back();</script>";
                }
            }
            else
            {
               $error=$model->getError();
                echo "<script>alert('$error');history.back();</script>";
            }
        }
        else
        {
            $this->display();
        }

    }
    //显示入驻商家
    public function showSeller()
    {
        $seller=D('seller')->select();
        $count=D('seller')->count();
        $this->assign('count',$count);
        $this->assign('seller',$seller);
        $this->display();
    }
    //修改商家的信息
    public function editSeller()
    {
        if(IS_POST)
        {
            $data = I('post.');
            $model = D('seller');
            $row = $model->create($data);
            if ($row)
            {
                $res=$model->save();
                if($res!==false)
                {
                    $url=U("Admin/Seller/showSeller");
                    echo "<script>
                         parent.alyer.alert('修改成功'); 
                        var index=parent.layer.getFrameIndex(window.name);
                        window.parent.location.reload();
                        parent.layer.close(index);

                      </script>";
                }
                else
                {

                      echo "<script>parent.alyer.alert('修改失败')</script>";
                }
            }
            else
            {

                $error=$model->getError();
                echo "<script>parent.alyer.alert('$error');history.back();</script>";
            }
        }

        else
        {
            $id = I('get.id');
            $seller = D('seller')->where(['id' => $id])->find();
            if ($seller) {
                $this->assign('seller', $seller);
                $this->display();
            } else
                echo "<script>parent.alyer.alert('该商家不存在');</script>";
        }

    }
    //删除商家信息
    public function delSeller()
    {
        $id=I('post.id');

        //查找满足条件的商店
        $food=D('restaurant')->where(['seller_id'=>$id])->select();
        //删除满足条件的食品
        $res_id='';
        foreach($food as $v)
        {
            $res_id.=$v['id'].',';
        }
        $res_id=trim($res_id,',');
        $fd=D('food')->where("res_id in('$res_id')")->delete();
        //删除这个商家的所有的餐厅
        $rd=D('restaurant')->where(['seller_id'=>$id])->delete();
        //删除商家
        $res=D('seller')->where(['id'=>$id])->delete();
        if($res!==false &&$food!=false)
            $return=array(
                'code'=>10000,
                'msg'=>'删除成功'
            );
        else
            $return=array(
                'code'=>10001,
                'msg'=>'删除失败'
            );

        $this->ajaxReturn($return);
    }
    public function delData()
    {
         //获得所有的商家id
         $id=I('post.dat');
         //找到该商家的餐厅
         $rest=D('restaurant')->where("seller_id in($id)")->select();
         //找到符合餐厅的食品
          if($rest)
          {
              $res_id='';
              foreach($rest as $v)
              {
                  $res_id.=$v['id'].',';
              }
              //得到了要删除的餐厅的id
              $res_id=trim($res_id,',');
              //删除所有符合条件的食物
              D('food')->where("res_id in($res_id)")->delete();
              //删除所有符合条件的餐厅
              D('restaurant')->where("seller_id in('$id')")->delete();
          }

        //删除所有符合条件的商家
        $r=D('seller')->where("id in($id)")->delete();
        if($r)
        {
           //删除成功
            $return=array(
                'code'=>10000,
                'msg'=>'删除成功'
            );
        }
        else
            $return=array(
                'code'=>10001,
                'msg'=>'删除失败'
            );
        $this->ajaxReturn($return);

    }


}