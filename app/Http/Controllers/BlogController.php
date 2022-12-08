<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function List(){
        $blogs = Blog::all();
        return view('admin.layout.page.quanlyblog.list', compact('blogs'));
    }
    public function Detail($id){
        $blog = Blog::find($id);
        return view('admin.layout.page.quanlyblog.detail', compact('blog'));
    }
    public function getAdd(){
        return view('admin.layout.page.quanlyblog.add');
    }
    public function postAdd(Request $request){
        $this->validate($request, [
            'image_file' => 'mimes:jpg,jpeg,png,webp'
        ],
        [
            'image_file.mimes' => 'Hình ảnh chỉ chấp nhận đuôi .jpg .jpeg .png .webp'
        ]);
        $file = $request->file('image_file');
        $name = $file->getClientOriginalName();
        $luu_tru = public_path('front_end/img/blog');
        $file->move($luu_tru, $name);

        $data = array();
        $data['title'] = $request->title;
        $data['image'] = $name;
        $data['date'] = $request->date;
        $data['content'] = $request->content;

        $insert = DB::table('blog')->insert($data);
        return redirect()->back()->with('alert', 'Bạn đã thêm thành công');

        // $content = $request->date;

        // dd($content);

    }

    public function Edit($id){
        $blog = Blog::find($id);
        return view('admin.layout.page.quanlyblog.update', compact('blog'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'image_file' => 'mimes:jpg,png,jpeg,webp'
        ],
        [
            'image_file.mimes' => 'Hình ảnh chỉ chấp nhận đuôi .jpg .png .jpeg .webp'
        ]
        );
        $blog = Blog::where('id', $id)->first();
        $name_image = $blog->image;
        //dd($name_image);
        if($request->image_file == ''){
            $name = $name_image;
        }
        else{
            $file = $request->file('image_file');
            $name = $file->getClientOriginalName();
            $luu_tru = public_path('front_end/img/blog');
            $file->move($luu_tru, $name);
        }
        $data = array();
        $data['title'] = $request->title;
        $data['image'] = $name;
        $data['date'] = date('Y-m-d');
        $data['content'] = $request->content;
        $update =  DB::table('blog')->where('id', $id)->update($data);
        return redirect()->back()->with('alert', 'Bạn đã cập nhật thành công');

    }

    public function delete($id){
        $delete = DB::table('blog')->where('id', $id)->delete();
        return redirect()->back()->with('alert', 'Bạn đã xóa thành công');
    }
}
