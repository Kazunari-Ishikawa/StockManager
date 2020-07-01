<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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

    /**
     * OAuth認証先にリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('qiita')->redirect();
    }

    /**
     * OAuth認証の結果受け取り
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $providerUser = Socialite::driver('qiita')->user();
        } catch (\Exception $e) {
            return redirect('/')->with('oauth_error', '予期せぬエラーが発生しました');
        }
        $getUser = User::where([
            'provider_id' => $providerUser->getId(),
            ])->first();

        if ($getUser) {
            Auth::login($getUser);
            return redirect()->route('home');
        }

        $user = new User;
        $user->provider_id = $providerUser->getId();
        $user->provider_name = 'qiita';
        $user->name = $providerUser->getName();
        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }
}
