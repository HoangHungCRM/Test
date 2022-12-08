<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Manufacture;
use App\Models\Products_image;
use Illuminate\Support\Facades\DB;
use App\Models\Bill_detail;


class ProductController extends Controller
{
    //
    public function ListProduct(){
        $products = Products::all();

        return view('admin.layout.page.quanlysanpham.list', compact('products'));
    }

    public function ListProductLoai($id){
        $id_manu =  $id;
        $manu = Manufacture::where('id', $id_manu)->first();
        $name_manu = $manu->name;

        $products = Products::where('id_manufacture', $id_manu)->get();
        return view('admin.layout.page.quanlysanpham.loai', compact('products', 'name_manu'));
    }

    public function getDetail($id){
        $products = Products::where('id', $id)->get();
        $products_image = Products_image::where('id_product', $id)->get();
        return view('admin.layout.page.quanlysanpham.detail', compact('products', 'products_image'));
    }

    public function getAdd(){
        $manufacture = Manufacture::all();
       return view('admin.layout.page.quanlysanpham.add', compact('manufacture'));
    }

    public function postAdd(Request $request){
        // $files = $request->file('files');
        // foreach($files as $file){
        //     $name=$file->getClientOriginalName();
        //     $destinationPath=public_path('front_end/img/upload_thu');
        //     $file->move($destinationPath, $name);


        //     $data = array();
        //     $data['id_product'] = 7;
        //     $data['image'] = $name;

        //     $insert = DB::table('products_image')->insert($data);
        // }
        // return redirect()->back()->with('alert', 'Đã thêm thành công');

       $this->validate($request, [
            'tenxe' => 'unique:products,name',
            'image_file' => 'mimes:jpg,jpeg,png',
            //'image_files' => 'mimes:jpg,jpeg,png',
       ],
       [
            'tenxe.unique' => 'Xe này đã tồn tại',
            'image_file.mimes' => 'File ảnh chỉ chấp nhận đuôi .jpg .jpeg .png',
           // 'image_files.mimes' => 'Files ảnh chỉ chấp nhận đuôi .jpg .jpeg .png',
       ]
       );
       $giagoc = $request->unit_price;
       $giakhuyenmai = $request->promotion_price;
       if($giakhuyenmai > $giagoc){
            return redirect()->back()->with('errorgia', 'Vui lòng nhập giá khuyến mãi bé hơn');
       }
       else{
            //ảnh--------
            $file = $request->file('image_file');
            $name_file = $file->getClientOriginalName();
            $destinationPath = public_path('front_end/img/products');
            $file->move($destinationPath, $name_file);
            //-----------------


            $products = new Products;

            $products->id_manufacture = $request->id_manufacture;
            $products->name = $request->tenxe;
            $products->ratio = $request->ratio;
            $products->unit_price = $giagoc;
            $products->promotion_price = $giakhuyenmai;
            $products->image = $name_file;
            $products->detail = $request->detail;
            $products->description = $request->description;

            $products->save();

            $files = $request->file('image_files');
            foreach($files as $anh){
                $name_files = $anh->getClientOriginalName();
                $destinationPaths = public_path('front_end/img/products');
                $anh->move($destinationPaths, $name_files);

                $data_img = array();

                $data_img['id_product'] = $products->id;
                $data_img['image'] = $name_files;

                $insert_img = DB::table('products_image')->insert($data_img);

            }


            return redirect()->back()->with('alert', 'Bạn đã thêm sản phẩm thành công');
       }


    }

    public function getEdit($id){
        $product = Products::find($id);
        $image_file = Products_image::where('id_product', $id)->get();
        return view('admin.layout.page.quanlysanpham.update', compact('product', 'image_file'));
    }

    public function update($id, Request $request){
        $id_product = $id;
        $image_files = Products_image::where('id_product', $id)->get();
        $product = Products::where('id', $id)->first();

        $id_manu = $product->id_manufacture;


        $image = $product->image;

        $giagoc = $request->unit_price;
        $giakhuyenmai = $request->promotion_price;
        if($giakhuyenmai > $giagoc){
            return redirect()->back()->with('errorgia', 'Vui lòng nhập giá khuyến mãi bé hơn');
        }
        else{
            if($request->image_file == ''){
                $name_file = $image;
            }
            else{
                $file = $request->file('image_file');
                $name_file = $file->getClientOriginalName();
                $destinationPath = public_path('front_end/img/products');
                $file->move($destinationPath, $name_file);

            }
            if($request->image_files == ''){
                // foreach($image_files as $ten_anh_nhieu){
                //     $name_files = $ten_anh_nhieu->image;
                //     $arr[] = $name_files;
                // }
                $data = array();
                $data['id_manufacture'] = $id_manu;
                $data['name'] = $request->tenxe;
                $data['ratio'] = $request->ratio;
                $data['unit_price'] = $request->unit_price;
                $data['promotion_price'] = $request->promotion_price;
                $data['image'] = $name_file;
                $data['detail'] = $request->detail;
                $data['description'] = $request->description;

                $update = DB::table('products')->where('id', $id)->update($data);
            }
            else{
                $data = array();
                $data['id_manufacture'] = $id_manu;
                $data['name'] = $request->tenxe;
                $data['ratio'] = $request->ratio;
                $data['unit_price'] = $request->unit_price;
                $data['promotion_price'] = $request->promotion_price;
                $data['image'] = $name_file;
                $data['detail'] = $request->detail;
                $data['description'] = $request->description;

                $update_product = DB::table('products')->where('id', $id)->update($data);

                $delete = DB::table('products_image')->where('id_product', $id_product)->delete();

                $files = $request->file('image_files');
                foreach($files as $anh){
                    $name_files = $anh->getClientOriginalName();
                    $destinationPaths = public_path('front_end/img/products');
                    $anh->move($destinationPaths, $name_files);

                    // $arr[] = $name_files;

                    $data_img = array();

                    $data_img['id_product'] = $id;
                    $data_img['image'] = $name_files;

                    $insert_img = DB::table('products_image')->where('id_product', $id_product)->insert($data_img);

                }


            }
            return redirect()->back()->with('alert', 'Bạn đã cập nhật thành công');


        }
    }
    public function delete($id){
        $bill_detail = Bill_detail::where('id_product', $id)->get();
        // $id_product = $bill_detail->id_product;
        // dd($id_product);
        if($bill_detail->count() == ''){
            $delete_product_image = Products_image::where('id_product', $id)->delete();
            $delete_product = Products::where('id', $id)->delete();
            return redirect()->back()->with('alert', 'Bạn đã xóa thành công');
        }
        else{
            return redirect()->back()->with('errorxoa', 'Sản phẩm này đã tồn tại trong giỏ hàng không thể xóa');
        }
    }
}

