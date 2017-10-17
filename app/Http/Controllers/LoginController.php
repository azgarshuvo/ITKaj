<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 07-Oct-17
 * Time: 6:11 PM
 */

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;

class LoginController extends Controller{
    protected $auth;
    protected $registrar;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin(){
        return view('front.login');
    }


    public function postLogin(Request $request){
        $this->validate($request,
            ['username'=>'required|string|max:255|min:6','password'=>'required|string|max:255|min:6']
        );

        #check is it mail or username
        $login = $request->input('username');
        $login_type = filter_var( $login, FILTER_VALIDATE_EMAIL ) ? 'email' : 'username';

        // let's set credentials with email/username
        if ( $login_type == 'email' ) {
            $credentials = ['email'=>$request->input('username'),'password'=>$request->input('password'),'admin_user_type'=>-1];
        } else {
            $credentials = ['username'=>$request->input('username'),'password'=>$request->input('password'),'admin_user_type'=>-1];
        }

        //dd($credentials);
        if ($this->auth->attempt($credentials))
        {
            return redirect()->intended($this->redirectPath());
        }
        return redirect($this->loginPath())
            ->withInput($request->only('login', 'remember'))
            ->withErrors([
                'login' => $this->getFailedLoginMessage(),
            ]);
    }

    #redirect when login success
    public function redirectPath(){

        return route('myProfile');

    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/login';
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return "Username or Password doesn't match";
    }

}