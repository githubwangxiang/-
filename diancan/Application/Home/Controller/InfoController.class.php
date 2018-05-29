<?php
namespace Home\Controller;
use Think\Controller;
class InfoController extends Controller
{
    //显示用户中心首页
    public function index()
    {
        //判断用户是否登录
        if(session('?user_info'))
        {
            //登录成功
            $id=session('user_info.id');
            //查询用户的信息
            $user=D('user')->where(['id'=>$id])->find();
            $this->assign('user',$user);
            //查找所有的订单状态
            $order=D('fdorder')->where(['user_id'=>$id])->select();
             $arr=['wf'=>0,'yf'=>0,'wfh'=>0,'yfh'=>0,'ysh'=>0];
            foreach($order as $k=>$v)
            {
                switch($v['order_status'])
                {
                    case 0: $arr['wf']++;break;
                    case 1: $arr['yf']++;break;
                    case 0: $arr['wfh']++;break;
                    case 0: $arr['yfh']++;break;
                    case 0: $arr['ysh']++;break;
                }
            }
            $this->assign('status',$arr);
            $this->display();
        }
        else
        {
            //没有登录
            $url=U('Home/User/login');
            echo "<script>alert('请登录');location.href='$url'</script>";
            die;

        }


    }
    //显示用户中心的订单
    public function userOrder()
    {
        //获得用户的id
        $id=session('user_info.id');
        //根据用户的id查用户的所有的订单
        $order=D('fdorder')->field('t1.*,t2.save_name')->alias('t1')->where(['t1.user_id'=>$id])->join('left join address t2 on  t1.address_id=t2.id')->select();
        $this->assign('order',$order);
        $this->display();
    }
    //显示积分
    public function grade()
    {
        $id=session('user_info.id');
        $num=D('user')->field('grade_num')->where(['id'=>$id])->find();
        $this->assign('num',$num);

        $this->display();
    }
    //账户管理
    public function manege()
    {

        $id=session('user_info.id');
        $user=D('user')->where(['id'=>$id])->find();
        $this->assign('user',$user);
        $this->display();
    }
    public function editPass()
    {
        $data=I('post.');
        //加密原密码
        $ypass=encrypt_password($data['ypass']);
        $xpass=$data['xpass'];
        $qpass=$data['qpass'];
        $id=session('user_info.id');
        $user=D('user')->where(['id'=>$id,'password'=>$ypass])->find();
        if($user)
        {
            //对密码加密
            $xpass=encrypt_password($xpass);
            $r=D('user')->where(['id'=>$id])->save(array('password'=>$xpass));
            if($r!=false)
            {
                    //修改成功
                $return=array('code'=>10000,'msg'=>'修改成功');
                $this->ajaxReturn($return);
            }
            else
            {
                $return=array('code'=>10002,'msg'=>'服务器异常');
                $this->ajaxReturn($return);
            }
        }
        else
        {
            $return=array('code'=>10001,'msg'=>'原密码不正确，请重新输入');
            $this->ajaxReturn($return);
        }



    }
    //修改个人资料
    public function userInfo()
    {

        $user_name=I('post.user_name');
        $data=$_FILES;
        if($data['error']!=0)
        {
            echo "<script>alert('上传头像失败');</script>";
            die;
        }
        //实例化文件上传类
        //设置配置文件
        $config=array(
            'maxSize' => 5 * 1024 * 1024,
            'exts' => array('jpeg', 'gif', 'jpg', 'png'),
            'rootPath'      =>  './Public/Uploads/head/', //保存根路径
        );
        $upload=new \Think\Upload($config);
        $upinfo=$upload->uploadOne($data['header']);
        if($upinfo)
        {
            //获得图片存储的路径
            $head=UPLOAD_PATH.'/head/'.$upinfo['savepath'].$upinfo["savename"];
            //修改数据库
            $id=session('user_info.id');
            $row=D('user')->where(['id'=>$id])->save(array('head'=>$head,'user_name'=>$user_name));
             if($row!==false)
             {
                 $url=U('Home/Info/index');
                 //修改session中的user_name
                 session('user_info.user_name', $user_name);
                 echo "<script>alert('修改成功');location.href='$url'</script>";
             }
             else
             {
                 echo "<script>alert('修改失败');history.back();</script>";
             }
        }




    }
    //收货地址
    public  function userAddre()
    {
        $id=session('user_info.id');
        $address=D('address')->where(['user_id'=>$id])->select();
        $this->assign('address',$address);
        $this->display();

    }
    //添加收货地址
    public function  addDress()
    {
        $data=I('post.');
        if($data['is_add']!=0)
        {
            //是修改
            $id=$data['is_add'];
            unset($data['is_add']);
           $r= D('address')->where(['id'=>$id])->save($data);
           if($r!==false)
           {
               $url = U('Home/Info/index');
               echo "<script>alert('修改成功');location.href='$url'</script>";
            }
            else
            {
                echo "<script>alert('修改失败');history.back();</script>";
                die;
            }
        }
        else
        {
            //是增加
            unset($data['is_add']);
            $data['user_id'] = session('user_info.id');
            //判断地址是否存在
            $row = D('address')->where($data)->find();
            if ($row) {
                echo "<script>alert('该地址已存在');history.back();</script>";
                die;
            }
            $r = D('address')->add($data);
            if ($r) {

                $url = U('Home/Info/index');
                echo "<script>alert('添加成功');location.href='$url'</script>";
            }
        }

    }
    //删除收货地址
    public function delAddre()
    {
        $id=I('get.id');
         $r=D('address')->where(['id'=>$id])->delete();
         if($r)
         {
             $url=U('Home/Info/index');
             echo "<script>alert('删除成功');location.href='$url'</script>";
         }
         else
         {
             echo "<script>alert('服务器异常');history.back();</script>";
             die;
         }
    }
    public function selectOne()
    {
        $id=I('post.id');
        $data= D('address')->where(['id'=>$id])->find();
        if($data)
        {
            $return=array(
                'code'=>10000,
                'data'=>$data
            );
            $this->ajaxReturn($return);
        }
        else
        {
            $return=array(
                'code'=>10001,
                'msg'=>'无该地址记录'
            );
            $this->ajaxReturn($return);
        }

    }
    //退出登录
    public function logOut()
    {
        session('user_info',null);
        $url = U('Home/Index/index');
        echo "<script>alert('退出成功');location.href='$url'</script>";
    }
    public function search()
    {
        $data=I('post.');
        //cat未1为餐厅,s为餐厅
        if($data['cat']==1)
        {
            //餐厅
            $k=$data['keyword'];
            $res=D('restaurant')->where("res_name like '%{$k}%' ")->select();
            $this->assign('res',$res);
            //查找推荐餐厅
            $tj=D('restaurant')->where("res_name like '%{$k}%' ")->order('res_num desc')->limit(3)->select();
           $this->assign('tj',$tj);
            $this->display('search_r');
        }
        else
        {
            //菜谱
            $k=$data['keyword'];

            $food=D('food')->alias('t1')->field('t1.*,t2.id rid ,t2.res_name,t2.res_city,t2.res_address,t2.res_area')->where("food_name like '%{$k}%' ")->join('left join restaurant t2 on t1.res_id=t2.id')->select();
            $this->assign('food',$food);

            //查找推荐餐厅
            $tjj=D('food')->alias('t1')->field('t1.*,t2.id rid ,t2.res_name,t2.res_city,t2.res_address,t2.res_area')->where("food_name like '%{$k}%' ")->join('left join restaurant t2 on t1.res_id=t2.id')->order('food_sale desc')->limit(3)->select();
            $this->assign('tjj',$tjj);
            $this->display('search_f');


        }

    }



}