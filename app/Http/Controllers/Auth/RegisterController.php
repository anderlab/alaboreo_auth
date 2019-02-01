<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'password.required' => 'Es necesario introducir una contraseña',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres',
            'password.confirmed' => 'Confirme la contraseña por favor',
            'email.unique' => 'El email introducido ya ha sido registrado, por favor incie sesion',
            'email.required' => 'Es necesario introducir un email',
            'email.email' => 'El email introducido no es valido',
            'email.max' => 'El email introducido es demasiado largo',
            'name.required' => 'Es necesairo introducir un nombre',
            'name.min' => 'El nombre debe de tener minimo 4 caracteres',
            'name.max' => 'El nombre no puede ser tan largo', 
            'name.regex' => 'No se aceptan caracteres especiales',
            
            
        ];
        
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:40', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'name' => ['required', 
                      'string',
                      'max:10',
                      'min:4', 
                      'regex:/^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.\s]+$/'],
            
            
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    
        $user
            ->roles()
            ->attach(Role::where('name', 'user')->first());
    
        return $user;
    }
}
