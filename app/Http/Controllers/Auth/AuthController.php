<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\LoginRequest;
use App\Http\Request\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function loginView()
    {
        if (Auth::user()) {
            return redirect()->route('welcome', app()->getLocale());
        } else {
            return view('auth.login');
        }
    }

    public function loginFrontend()
    {
        if (Auth::user()) {
            return redirect(route('welcome', app()->getLocale()));
        } else {
            if (Auth::user()) {
                return redirect()->route('welcome', app()->getLocale());
            } else {
                return view('auth.login');
            }
        }
    }

    public function registerFrontend()
    {
        if (Auth::user()) {
            return redirect()->route('welcome', app()->getLocale());
        } else {
            return view('auth.signup');
        }

    }

    /**
     * Authenticate login user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'auth' => [__('Wrong email or password')],
            ]);
            throw $error;
        }

        return redirect()->route('welcome');
    }


    public function register(RegisterRequest $request)
    {
        $model = User::create([
            'name' => $request['first_name'] . ' ' . $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $model->profile()->create([
            'user_id' => $model->id,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'country' => $request['country'],
            'phone' => ''
        ]);

        return redirect(route('welcome', app()->getLocale()));

    }

    /**
     * Logout user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if (Auth::user()) {
            Auth::logout();
        }
        return redirect()->route('welcome', app()->getLocale());
    }

    public function verify($locale, $token)
    {
        $data = explode('|', $token);
        $user = User::findOrFail($data[0]);
        if ($user->status == 1 || Auth::user()) {
            return redirect()->route('welcome', app()->getLocale());
        }
        $tokens = $user->tokens()->where('validate_till', '>=', Carbon::now())->get();
        if (count($tokens) > 0) {
            foreach ($tokens as $item) {
                if (Hash::check($data[1], $item->token)) {
                    $user->status = 1;
                    $user->save();
                    break;
                }
            }
        } else {
            $user->delete();
        }
        return redirect()->route('welcome', app()->getLocale());
    }
}
