<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Bill_detail;

class OrderController extends Controller
{
    //
    public function List(){
        $bills = Bill::all();
        return view('admin.layout.page.quanlydonhang.list', compact('bills'));
    }
    public function ListLoai($id){
        $bill_id = Bill::where('status', $id)->get();
        $status = $id;
        return view('admin.layout.page.quanlydonhang.listloai', compact('bill_id', 'status'));
    }

    public function Detail($id){
        $bill = Bill::find($id);
        $bill_details = Bill_detail::where('id_bill', $id)->get();
        return view('admin.layout.page.quanlydonhang.detail', compact('bill', 'bill_details'));
    }
}
