<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacture;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.layout.page.home');
    }
    public function Getlogin(){
        return view('admin.layout.page.login');
    }
    public function Postlogin(Request $request){
        $this->validate($request, [
            'password' => 'min: 6',
        ],
        [
            'password.min' => 'Password tối thiếu 6 ký tự'
        ]
        );
        $credentials = array('email'=>$request->email,
        'password'=>$request->password
        );

        $credentials=['email'=>$request->email,'password'=>$request->password];
        if(Auth::attempt($credentials)){//The attempt method will return true if authentication was successful. Otherwise, false will be returned.

            return redirect("/admin/home")->with('alert',"Đăng nhập thành công");
        }
        else{
            return redirect()->back()->with('alert', 'Đăng nhập không thành công');;
        }

    }

    public function Getlogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getlogin');
    }


}
