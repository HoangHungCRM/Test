<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacture;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class ManufactureController extends Controller
{
    //
    public function index(){
        $manufacture = Manufacture::all();
        return view('admin.layout.page.quanlyhangxe.list', compact('manufacture'));
    }

    public function GetAdd(){
        return view('admin.layout.page.quanlyhangxe.add');
    }

    public function PostAdd(Request $request){
        $this->validate($request, [
            'name' => 'unique:manufacture,name',
            'image_file' => 'mimes:jpg,jpeg,png'
        ],
        [
            'name.unique' => 'Hãng xe này đã tồn tại trước đó',
            'image_file.mimes' => 'File ảnh chỉ chấp nhận file có đuôi .jpg, .png, .jpeg'
        ]
        );

        $file = $request->file('image_file');
        $name=time().'_'.$file->getClientOriginalName();
        $destinationPath=public_path('front_end/img/hang_xe_remove'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
        $file->move($destinationPath, $name);

        $data = array();
        $data['name'] = $request->name;
        $data['image'] = $name;

        $insert = DB::table('manufacture')->insert($data);

        return redirect()->back()->with('alert', 'Thêm mới thành côngg');
    }

    public function delete($id){
        $product = Products::where('id_manufacture', $id)->get();
        if($product->count() != 0){
            return redirect()->back()->with('error', 'Hãng này đã tồn tại sản phẩm không thể xóa');
        }
        else{
            $delete = Manufacture::destroy($id);
            return redirect()->back()->with('alert', 'Đã xóa thành công');
        }

    }

    public function GetEdit($id){
        $manufacture = Manufacture::find($id);
        return view('admin.layout.page.quanlyhangxe.update', compact('manufacture'));
    }

    public function Update($id, Request $request){
        $manufacture = Manufacture::where('id', $id)->first();
       // $image = $manufacture->image;
        $image_manu = $manufacture->image;
       if($request->image_file == ''){
            $name = $manufacture->image;
            // return redirect()->back()->with('alert', 'image rổng');
       }
       else{
            $file = $request->file('image_file');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('front_end/img/hang_xe_remove'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name);
       }

       $data = array();
       $data['name'] = $request->name;
       $data['image'] = $name;

       $update = DB::table('manufacture')
                ->where('id', $id)
                ->update($data);
       return redirect()->back()->with('alert', 'Update thành công');

    }

}
