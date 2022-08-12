<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DoctorController extends Controller
{
    public function loginAdmin()
    {
        return view("doctor/loginAdmin");
    }

    public function serverLoginFormDoctor(Request $request)
    {
        if ($request->isMethod("post") && $request->has(['email_phone', "password"])) {

            if (is_numeric($request->email_phone)) {

                $request->validate([
                    "email_phone" => "required|max:11|min:11|regex:/^[0-9]+$/",
                    "password" => "required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}/|min:5"
                ]);
            } else {

                $request->validate([
                    "email_phone" => "required|email",
                    "password" => "required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}/|min:5"
                ]);
            }

            $user = $request->only("email_phone", "password");


            if (Auth::attempt($user)) {
                if (Auth::user()->role_id === 3) {

                    return redirect()->intended("dashboard");
                } else {

                    return back()->with("errRole", "شما دکتر نیستید");
                }
                //   dd(Auth::user());
            } else {

                return back()->with("noAccount", "شما یافت نشدید");
            }


        }

    }

    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role_id === 3) {

            return view("doctor.dashboard");

        } else {
            return redirect()->route("LoginAdmin");
        }

    }

    public function logout(Request $request)
    {

        $request->session()->flush();
        Auth::logout();
        return redirect()->route("loginAdmin");
    }















    // $e =  $request->validate([
    //         "email_username"=>["required","string","unique:doctor"],
    //         "password"=>["required","regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}/"]
    //     ]);
    // return response()->json(['success'=>'Record is successfully added']);
    // if($request->ajax()){


    //     // return response()->json([ 'success'=> 'Form is successfully submitted!']);
    // }


    //     $request->only("email","password");


    // add field in $request
    // $request->merge(["hi"=>"12345"]);


}
