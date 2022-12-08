@extends('admin.layout.master')

@section('title', 'chi tiết đơn hàng')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <h1 style="text-align:center">Chi Tiết Đơn Hàng</h1>
                <div class="table-responsive">
                    <h3>Thông Tin Khách Đặt</h3>
                    <table class="table">
                        <tr>
                            <td>Id</td>
                            <td>{{ $bill->user->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $bill->user->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $bill->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $bill->user->phone }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $bill->user->address }}</td>
                        </tr>
                    </table>
                    <h3>Thông Tin Khách Nhận</h3>
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>{{ $bill->name }}</td>
                        </tr>
                        <tr>
                            <td>Ngày Đặt</td>
                            <td>{{ $bill->data_order }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $bill->phone }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $bill->address }}</td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td>{{ $bill->note!=null?$bill->note:'' }}</td>
                        </tr>

                    </table>
                    <h3>Thông Tin Sản Phẩm</h3>
                    <table class="table">
                        <tr>
                            <td>Id Sản Phẩm</td>
                            <td>Tên Hãng</td>
                            <td>Tên Sản Phẩm</td>
                            <td>Hình Ảnh</td>
                            <td>Giá</td>
                            <td>Số Lượng</td>
                            <td>Tổng</td>
                        </tr>
                        <?php $tongtienallsanpham=0; ?>
                        @foreach($bill_details as $detail)
                        <tr>
                            <td>{{ $detail->id_product }}</td>
                            <td>{{ $detail->product->manufacture->name }}</td>
                            <td>{{ $detail->product->name }}</td>
                            <td>
                                <img src="/front_end/img/products/{{ $detail->product->image }}" alt="" style="width: 50px">
                            </td>
                            <td>{{ number_format($detail->price) }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ number_format($tongtiensanpham=$detail->quantity * $detail->price) }}</td>
                            <?php  $tongtienallsanpham+=$tongtiensanpham?>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="6">Tổng Tiền Hàng</td>
                            <td >{{ number_format($tongtienallsanpham) }}</td>
                        </tr>
                        <tr>
                            <td colspan="6">Tiền Ship</td>
                            <td >+30.000</td>
                        </tr>
                        <tr>
                            <td colspan="6">Phiếu Giảm Giá</td>
                            <td >-50,000</td>
                        </tr>
                        <tr>
                            <td colspan="6">Tổng Tiền</td>
                            <td >{{ number_format($bill->total) }}</td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
