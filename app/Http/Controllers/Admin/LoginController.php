<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\TestDemoInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Fire;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['loginPage','login','logout']);
    }

    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if(Auth::guard('admin')->attempt([
            $this->username() => $request->input('username'),
            'password' => $request->input('password')
        ])){
            return redirect($this->redirectTo);  //登录成功后跳转
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        return redirect(route('adminLogin'));
    }

    public function testMsg(TestDemoInterface $service){
        $service->echoText();
    }

    public function DemoMsg(TestDemoInterface $service){
        $service->echoText();
    }

    public function fireService(Request $request){
        $method = $request->get('name');
        (new Fire())->{$method}();
    }

    public function execAlgo(Request $request){
        $class = '\App\Http\Algorithm\\'.$request->get('name');
        (new $class())->main();
    }

    /**
     * 重新定义登录帐号名称字段
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}
