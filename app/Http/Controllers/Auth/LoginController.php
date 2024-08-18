<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // ØªØ£ÙÂØ¯ ÙÂÙÂ Ø£ÙÂ Ø¨ÙÂØ§ÙÂØ§Øª Ø§ÙÂØ¬ÙÂØ³Ø© ÙÂØ±ÙÂØ¯Ø© ÙÂÙÂÙÂ ÙÂØ³ØªØ®Ø¯ÙÂ
        session(['admin_data' => $user->admin_data]);

        // ÙÂÙÂÙÂÙÂÙÂ Ø¥Ø¶Ø§ÙÂØ© Ø¨ÙÂØ§ÙÂØ§Øª Ø¥Ø¶Ø§ÙÂÙÂØ© ÙÂÙÂØ¬ÙÂØ³Ø© ÙÂÙÂØ§ Ø¥Ø°Ø§ ÙÂØ²ÙÂ Ø§ÙÂØ£ÙÂØ±
    }
}