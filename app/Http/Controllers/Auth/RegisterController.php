<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use DB;

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
    protected $redirectTo = '/';

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|min:10|max:11',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'schoolof' => 'string|max:255',
            'course' => 'nullable|string|max:255',
            'intake' => 'nullable|string|max:255',
            'interest' => 'nullable|string|max 255',
            'project_id' => 'nullable|int'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'schoolof' => $data['schoolof'],
            'course' => $data['course'],
            'intake' => $data['intake'],
        ]);

        $role_user = Role::where('name', 'User')->first();
        $user->roles()->save($role_user);
        return $user;

    }
}
