<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\facade\Request;
use app\common\utils\CFunc;
use app\admin\model\User;
use app\common\utils\AesSecurity;
class Site extends Controller
{
    public function login(){
        header('Access-Control-Allow-Origin:*');
       if(Request::instance()->isPost()) {
            $params = CFunc::params();
            $user = trim($params['username']);
            $passwd = trim($params['passwd']);
//            echo $user; die();
//            $res = User::where(['user_name'=>['=',$user],'password'=>['eq',$passwd]])->select()->toArray();
            $res = User::where(['user_name'=>['=',$user],'password'=>['eq',$passwd]])->count();
           if ($res){
                CFunc::returnjson("0",'登陆成功');
                die();
//               $this->redirect('blog/index');
           }
           else{
               CFunc::returnjson("1",'账户不存在或密码错误');
               die();
           }
       }
        return $this->fetch();
    }
    public function test(){
//        echo 'abc<br>';
//        $c = AesSecurity::_encrypt('abc','123456');
//        echo $c;
//        echo '<br>';
//        echo AesSecurity::_decrypt($c,'123456');
//            var_dump(AesSecurity::getAllMethod());
        return $this->fetch();
    }
}