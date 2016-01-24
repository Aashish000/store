<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterForm;
use App\Http\Requests\LoginForm;
use App\User;
use \Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('registration.login');
    }

     public function postLogin( LoginForm $request)
    {
           $email = $request->get('email');
           $password = $request->get('password');

           $credentials = ['email' => $email,'password' => $password ];

             if ( Auth::attempt( $credentials ) ) {

                return \Redirect::intended('product/index');
             }

             else{
                return Redirect( route('userLogin'));
            }
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('registration.register');
    }


    public function postRegister(RegisterForm $request)
    {
        User::create($request->all());
        return redirect( route('userLogin') );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
}
