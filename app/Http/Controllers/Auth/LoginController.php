<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('pages.login.index');
    }

    public function signin(Request $request)
    {
        $email    = strtolower($request->input('email'));
        $password = $request->input('password');
        $request->session()->forget('user_permission');

        if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            if (Auth::user()->role == 'super-admin') {
                // $token = Auth::user()->remember_token;
                // $request->session()->put('token', $token);
                return redirect("dashboard");
            } else {
                return redirect("login")
                    ->withErrors(['password' => 'Password yang anda masukkan salah'])
                    ->withInput();
            }
        }
        return redirect("login")
            ->withErrors(['password' => 'Password yang anda masukkan salah'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
