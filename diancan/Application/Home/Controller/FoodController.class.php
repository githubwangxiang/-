<?php
namespace Home\Controller;
use Think\Controller;
class FoodController extends Controller{
    public function detail(){
        $id = I('get.id');
        $food = D('Food') -> find($id);
        $this -> assign('food',$food);
        $goods = D('Goods')  -> limit(0,2) -> select();
        $this -> assign('goods',$goods);
        $this -> display();
    }

    //加入购物车
    public function addcart(){
        //处理表单提交
        if(IS_POST){
            //post方式提交表单
            $data = I('post.');
            if(!$data['food_id'] || !$data['is_food'] || !$data['num']){
                echo  "<script>alert('参数异常');</script>";die;
            }
            $res = D('Cart') ->addCart($data['food_id'],$data['is_food'],$data['num']);
            if($res){
                $this->redirect('Home/Cart/index');
            }else{
                echo  "<script>alert('服务器异常');</script>";die;
            }
        }else{
            $this->redirect('Home/Index/index');
        }
    }








}