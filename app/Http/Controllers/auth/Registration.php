<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginValidation;
use App\Http\Requests\Auth\SignupValidation;
use App\Models\User;
use Exception;
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
}
