@extends('users.layout.master2')
@section('title', 'Thanh toán')

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2 style="color:red">Checkout</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thông tin nhận hàng</h4>
            <form action="{{ route('postcounpon') }}" method="post">
                @csrf
                <div class="row">
                   <div class="col-lg-7 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nhập mã giảm giá<span></span></p>
                                    <input name ="name_coupon" type="text" placeholder ="chỉ áp dụng được một lần duy nhất">
                                    @error('name_coupon')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>  &nbsp<span> </span></p>

                                    <button type="submit" class="site-btn" style="width: 100%">Áp dụng</button>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="col-lg-5 col-md-6"></div>

                </div>
            </form>
            <form action="{{ route('postdathang') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7 col-md-6">

                        <div class="checkout__input">
                            <p>Full Name<span>*</span></p>
                            <input name ="name" type="text" placeholder="Vui Lòng Nhập Tên Người Nhận" value="{{ Auth::user()->full_name }}" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input name="phone" type="number" placeholder ="Nhập Số Điện Thoại" value="{{ Auth::user()->phone }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input name ="email" type="email" placeholder="VUi Lòng Nhập Email" value="{{ Auth::user()->email }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <textarea  required style="width: 100%" class="checkout__input__add" name="address" id="" rows="3" laceholder="Vui Lòng Nhập Địa Chỉ" >{{ Auth::user()->address }}</textarea>


                        </div>
                        <div class="checkout__input">
                            <p>Note<span></span></p>
                            <textarea  style="width: 100%" class="checkout__input__add" name="note" id="" rows="3" laceholder="Vui Lòng Nhập Địa Chỉ" ></textarea>


                        </div>
                        <input type="hidden" name="magiamgiatrue" @if (Session::has('magiamgiatrue')) value="true" @else  value="false"    @endif>


                        <input type="hidden" name="valuegiamgia" @if (Session::has('valuegiamgia')) value="{{Session::get('valuegiamgia')}}" @else value="0"   @endif>

                        <input type="hidden" name="idcoupon" @if (Session::has('idcoupon')) value="{{Session::get('idcoupon')}}" @else value=" "   @endif>

                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn Hàng Của Bạn</h4>

                            <div class="checkout__order__products">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>SL</th>
                                            <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <?php $tongtienthanhtoan = 0; ?>
                                    @isset($cart_detail)
                                    @foreach($cart_detail as $xe)
                                    <tbody>
                                        <tr>
                                            <td >{{ $xe->product->name }}</td>
                                            <td>{{ $quantity = $xe->quantity }}</td>
                                            <td>{{ number_format($gia = $xe->price) }}</td>
                                        </tr>
                                    </tbody>
                                    <?php $tongtiensanpham = $gia * $quantity ?>
                                    <?php $tongtienthanhtoan+=$tongtiensanpham ?>
                                    @endforeach
                                    @endisset
                                </table>
                            </div>

                            <div class="checkout__order__subtotal">Tổng tiền <span>@isset($total){{ number_format($tongtienthanhtoan) }}@endisset</span></div>
                            <div class="checkout__order__total">Phí Ship <span>+30.000</span></div>
                            @if (Session::has('valuegiamgia'))
                            <div class="checkout__order__total">Phiếu giảm giá <span>{{ - Session::get('valuegiamgia') }}</span></div>
                            @endif
                            @if (Session::has('valuegiamgia'))
                            <div class="checkout__order__total">Tổng Tiền <span>@isset($total){{ number_format($tongtienthanhtoan + 30000 - Session::get('valuegiamgia')) }}@endisset</span></div>
                            @else
                            <div class="checkout__order__total">Tổng Tiền <span>@isset($total){{ number_format($tongtienthanhtoan + 30000) }}@endisset</span></div>
                            @endif
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
<script>
  var msg = '{{Session::get('alertmagiamgia')}}';
  var exist = '{{Session::has('alertmagiamgia')}}';
  if(exist){
    alert(msg);
  }
</script>

