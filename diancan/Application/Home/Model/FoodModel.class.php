<?php
namespace Home\Model;
use Think\Model;
class FoodModel extends Model
{
    //封装加入购物车的方法 这个方法是在控制器中去调用的
    //控制器调用模型的方法时，需要传递三个参数
    public function addCart($food_id, $is_food, $num)
    {
        //将购物数据添加到购物车，根据登录状态判断
        //判断session中有没有登录标识
        if (session('?user_info')) {
            //已登录，数据添加到数据表
            //取这个数组的id赋值给user_id
            $user_id = session('user_info.id');
            $where = array(
                'user_id' => $user_id,
                'food_id' => $food_id,
                'is_food' => $is_food
            );
            $data = D('Cart')->where($where)->find();
            //查询当前数据表的数据，判断数据表中是否已经存在相同的购物商品的记录，那么只用添加这个商品的数量
            if ($data) {
                //已经存在相同的购物记录，累加购买数量
                $data['num'] += $num;
                //重新保存，修改覆盖 //修改成功返回受影响的记录条数
                $res = $this->save($data);
                //对$res的返回值作判断，返回的是true或者false
                return $res !== false;
            } else {
                //不存在相同的购物记录，直接添加
                $data = array(
                    'user_id' => $user_id,
                    'food_id' => $food_id,
                    'is_food' => $is_food,
                    'num' => $num
                );
                //添加成功返回添加的主键id值
                $res = $this->add($data);
                return $res ? true : false;
            }
        } else {
            echo "<script>alert('请登录！');</script>";
        }
    }
}