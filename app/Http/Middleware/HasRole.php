<?php

namespace App\Http\Middleware;

use Closure;

use App\Http\Models\Admin\User;
class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //session()->flush();
        //1.获取当前用户访问的路由对应的控制器的方法名
        // $route = \Route::current() -> uri();
        // $route =   \Route::current()->getActionName();
        $route =   \Route::currentRouteAction();
        // dd($route);
        // dd(session('user'));
        //2.获取当前用户拥有的权限  用户跟角色有关系   角色跟权限有关系
        $user = User::find(session('user')->id);
        // dd($user);

        //通过当前用户找到当前用户拥有的角色
        $roles = $user->roles;
        // dd($roles);

        //通过角色找权限
        //定义一个变量存放当前用户拥有的所有权限(当用户登录时就应该把当前用户拥有的权限保存到缓存中)
        $arr = [];
        // 每次获取一个权限
        foreach($roles as $v){
            //获取当前角色的权限列表
            $per = $v->permission()->get();
            //遍历当前权限列表,获取某条权限的description字段
            foreach($per as $m){
                $arr[] = $m->description;
            }
        }
        // dd($arr);
        //去掉当前用户拥有的权限的重复项
        $own_pers = array_unique($arr);
        // dd($own_pers);


        //3.判断当前访问的路由对应的控制器和方法名是否在用户拥有的权限中,如果在,中间跳过,执行路由对应的方法;如果不在,不能执行对应的控制器的方法
        // 判断当前访问的路由是否在拥有拥有的权限路由中
        if(in_array(trim($route),$own_pers)){
            return $next($request);
        }else{
            return redirect('admin/auth');
        }
        
    }
}
