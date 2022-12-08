@extends('admin.layout.master')

@section('title', 'chi tiết sản phẩm')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <h1 style="text-align:center">Chi Tiết Sản Phẩm</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @isset($products)
                            @foreach($products as $detail)
                            <tr>
                                <td>Tên Hãng</td>
                                <td>{{  $detail->manufacture->name }}</td>
                            </tr>
                            <tr>
                                <td>Tên Sản Phẩm</td>
                                <td>{{ $detail->name }}</td>
                            </tr>
                            <tr>
                                <td>Tỉ Lệ</td>
                                <td>{{ $detail->ratio }}</td>
                            </tr>

                            <tr>
                                <td>Giá Gốc</td>
                                <td>{{ number_format($detail->unit_price) }}</td>
                            </tr>
                            <tr>
                                <td>Giá Khuyến Mãi</td>
                                <td>{{ number_format($detail->promotion_price) }}</td>
                            </tr>


                            <!-- <tr>
                                <td>Số Lượng Nhập</td>
                                <td>{{ $detail->the_number_of_import }}</td>
                            </tr>
                            <tr>
                                <td>Số Lượng Bán</td>
                                <td>{{ $detail->sell }}</td>
                            </tr> -->
                            <tr>
                                <td>Tỉnh Trạng</td>
                                <td>Còn Hàng</td>
                            </tr>
                            <tr>
                                <td>Ảnh Sản Phẩm</td>
                                <td>
                                    <img src="/front_end/img/products/{{ $detail->image }}" alt="" style="width: 50px">
                                </td>
                            </tr>
                            @endforeach
                            @endisset
                            <tr>
                                <td>Ảnh Mô Tả Sản Phẩm</td>
                                <td>
                                    @foreach($products_image as $anh)
                                    <img src="/front_end/img/products/{{ $anh->image }}" alt="" style="width: 50px; height: 50px">

                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
