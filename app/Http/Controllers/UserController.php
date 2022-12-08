<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function ListUser(){
        $users = User::where('level', 1)->get();
        return view('admin.layout.page.quanlynhansu.user.list', compact('users'));
    }

    public function DeleteUser($id){
        $bill = Bill::where('id_users', $id)->get();
        if($bill->count() != 0){
            return redirect()->back()->with('error', 'Người dùng này đã tồn tại đơn hàng không thể xóa');
        }
        else{
            $delete = DB::table('users')->where('id', $id)->delete();
            return redirect()->back()->with('alert', 'Bạn đã xóa thành công');
        }

    }

    public function EditUser($id){
        $user = User::find($id);
        return view('admin.layout.page.quanlynhansu.user.update', compact('user'));
    }

    public function UpdateUser($id, Request $request){
        $this->validate($request, [
            'phone' => 'min: 10|max: 11',

        ],
        [
            'phone.min' => 'số điện thoại tối thiểu phải 10 số',
            'phone.max' => 'số điện thoại tối thiểu đa 11 số'
        ]
        );
        $data = array();
        $data['full_name'] = $request->full_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $update = DB::table('users')->where('id', $id)->update($data);
        return redirect()->back()->with('alert', 'Bạn đã cập nhật thành công');
    }
}
