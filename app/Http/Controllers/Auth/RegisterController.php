<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Jenssegers\Agent\Agent;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getUserData($result)
    {
        $agent = new Agent();

        $result['ip'] = \Request::ip();
        $result['cookie_session'] = \Cookie::get('laravel_session');
        $result['location'] = 'Not find';
        $location = \Location::get($result['ip']);
        if ($location !== false) {
            $result['location'] =\Location::get($result['ip'])->countryName; 
        }
        $result['browser'] = $agent->browser();
        return $result;
    }
    protected function validator(array $data)
    {
        $data = $this->getUserData($data);
        return Validator::make(
            $data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'ip' => ['required', 'string'],
            'location' => ['required', 'string'],
            'browser' => ['required', 'string'],
            'cookie_session' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data = $this->getUserData($data);
        return User::create(
            [
            'name' => $data['name'],
            'email' => $data['email'],
            'ip' => $data['ip'],
            'location' => $data['location'],
            'browser' => $data['browser'],
            'cookie_session' => $data['cookie_session'],
            'password' => Hash::make($data['password']),
            ]
        );
    }
}
