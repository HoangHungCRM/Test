@extends('admin.layout.master')
@section('title', 'Phân loại sản phẩm')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <h1 style="text-align:center">Danh Sách Sản Phẩm {{ $name_manu }}</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Tên Hàng</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Tỉ Lệ</th>
                                <th>Giá</th>
                                <th>Ảnh</th>

                                <th>Action</th>


                            </tr>

                            @isset($products)
                            @foreach($products as $product)
                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                            <tr>
                                <td>{{ $product->manufacture->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->ratio }}</td>
                                <td>{{ $product->promotion_price > 0?number_format($product->promotion_price):number_format($product->unit_price) }} <sup style="color:red">{{ $product->promotion_price > 0?'sale':'' }}</sup></td>
                                <td>
                                    <img src="/front_end/img/products/{{ $product->image }}" alt="" style="width: 50px">
                                </td>

                                <td>
                                <a href="{{ route('product.chitiet', $product->id) }}" class="label label-primary">Detail</a>||
                                    <button style="border:none" type="button" class="label label-success" onclick="window.location='{{ route('product.edit', $product->id) }}'">Update </button>||
                                    <button type="submit" style="border:none" class="label label-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</button>
                                </td>
                            </tr>
                            </form>
                            @endforeach
                            @endisset

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
  var msg = '{{Session::get('errorxoa')}}';
  var exist = '{{Session::has('errorxoa')}}';
  if(exist){
    alert(msg);
  }
</script>

