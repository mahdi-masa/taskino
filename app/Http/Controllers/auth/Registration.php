<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginValidation;
use App\Http\Requests\Auth\SignupValidation;
use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Registration extends Controller
{
    public function simple_signup(SignupValidation $request){
        $data = $request->validated();
    
        $user_email = $data['email'];
        

        try 
        {
            if(User::where('email', $user_email)->exists()){
                
                return redirect()->route('auth.login.view')->with('warning', 'شما قبلا در تسکینو ثبت نام کرده‌اید');
            }else {
                
                User::create([
                    'email'=>$user_email,
                    'password' => $data['password'],
                    'fname'=> $data['fname'],
                    'lname' => $data['lname'],
                    'phone' => $data['phone'],
                ]);
                
                return redirect()->route('auth.login.view')->with('warning', 'شما با موفقیت در تسکینو ثبت نام کردید');
            }
            
        }
        catch(Exception $e)
        {
            return back()->with('warning', 'در ثبت نام مشکلی پیش آمده است');

        }
        
        
    }

    public function simple_login(LoginValidation $request)
    {
        $data = $request->validated();

        $credential = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if(Auth::attempt($credential)){

            $request->session()->regenerate();


            //TODO: rdirect to control pannel after user login 

            return 'true';
        }else{
            return back()->with('warning', 'رمز و ایمیل به درستی وارد نشده است');
            
        }

    }

    public function google_redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function google_callback(){
        $user = Socialite::driver('google')->user();
        

        if(User::where('email', $user->email)->exists()){
            $user_id= User::where('email', $user->email)->first()->id;
            Auth::loginUsingId($user_id);

            //TODO: redirect to proper place after user login
            return 'user alreay exists and login automattically';
        }else{
            User::create([
                'email'=>$user->email,
            ]);

            $user_id= User::where('email', $user->email)->first()->id;

            Auth::loginUsingId($user_id);

            //TODO: redirect to proper place after user login
            return 'user created and login automatically';
        }
    }
}
