@extends('users.layout.master2')

@section('title', 'giỏ hàng')

@section('content')

        <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2 style="color:red">Giỏ Hàng</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="shoping-cart spad">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="shoping__product">Products</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php $totalPrice=0 ?>
                                    @isset($cart_detail)
                                    @foreach($cart_detail as $xe)
                                    <tbody>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="front_end/img/products/{{ $xe->product->image }}" style="width:100px" alt="">
                                                <h5>{{ $xe->product->name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ $xe->product->promotion_price > 0?number_format($xe->product->promotion_price):number_format($xe->product->unit_price) }}<sup style="font-size:10px; color:red">{{$xe->product->promotion_price > 0?'sale':''  }}</sup>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $xe->quantity }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{ $xe->product->promotion_price > 0?number_format($tong=$xe->product->promotion_price * $xe->quantity):number_format($tong=$xe->product->unit_price * $xe->quantity) }}
                                            </td>
                                            <?php $totalPrice+=$tong ?>
                                            <td class="shoping__cart__item__close">
                                                <a href="{{ route('delete-product', $xe->id_product) }}" style="color: black" class="icon_close"></a>
                                            </td>
                                        </tr>

                                    </tbody>


                                        @endforeach
                                        @endisset

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__btns">
                                <a href="/" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                                <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                    Cập nhập giỏ hàng</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shoping__continue">
                                <div class="shoping__discount">
                                    <!-- <h5>Mã giảm giá(nếu có)</h5>
                                    <form action="#">
                                        <input type="text" placeholder="nhập mã giảm giá của bạn">
                                        <button type="submit" class="site-btn">Áp dụng</button>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="shoping__checkout">
                                <h5>Tổng tiền sản phẩm</h5>
                                <ul>
                                    @isset($total)
                                    <li>Tổng Tiền Sản Phẩm <span>{{ number_format($totalPrice) }}</span></li>
                                    @endisset

                                </ul>
                                <a href="{{ route('getdathang') }}" class="primary-btn">Thanh Toán</a>
                            </div>

                        </div>
                    </div>
                </div>

        </section>


@endsection
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
