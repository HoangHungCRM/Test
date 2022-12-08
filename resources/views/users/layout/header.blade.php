    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> truongngo.050902@gmail.com</li>
                                <li>Free Ship cho đơn hàng từ 1.000.000VNĐ</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <!-- <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div> -->
                            <!-- <div class="header__top__right__language">
                                <img src="/front_end/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
                            <div class="header__top__right__language">
                                <i class="fa fa-user"></i>
                                <div>Thông tin tài khoản</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    @if(Auth::check())
                                    <li><a href="{{ route('logout') }}">Hồ Sơ Của Tôi</a></li>
                                    <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                    @else
                                    <li><a href="{{ route('getlogin') }}">Đăng nhập</a></li>
                                    <li><a href="{{ route('getRegister') }}">Tạo mới tài khoản</a></li>
                                    @endif
                                </ul>
                            </div>
                            <!-- <div class="header__top__right__auth">
                                @if(Auth::check())

                                <a href="/logout"><i class="fa fa-user"></i> Logout</a>

                                @else
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-user"></i> login</a>


                                @endif
                                <form action="{{ route('postlogin') }}" method = "post">
                                    @csrf
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                                        <input type="text" class="form-control" id="recipient-name" name = "email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Password:</label>
                                                        <input type="password" class="form-control" id="recipient-name" name ="password">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div> -->

                            <!-- <div class="header__top__right__auth">

                                @if(Auth::check())
                                <a href="{{ route('logout') }}"><i class="fa fa-user"></i> Logout</a>

                                @else
                                <a href="{{ route('getlogin') }}"><i class="fa fa-user"></i> Login</a>
                                @endif
                            </div> -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="/front_end/img/logo1.png"  width="150px" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/">Trang chủ</a></li>
                            <li>
                                <a href="">Hãng xe</a>
                                <ul class="header__menu__dropdown">
                                    @isset($manufacture)
                                    @foreach($manufacture as $hang_xe)
                                    <li><a href="{{ route('loai-san-pham', $hang_xe->id) }}"><img src="/front_end/img/hang_xe_remove/{{ $hang_xe->image }}" width="30px"> &nbsp &nbsp{{ $hang_xe->name }}</a></li>
                                    @endforeach
                                    @endisset
                                </ul>
                            </li>
                            <li><a href="">Tỉ lệ</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route('ti_le','1:18') }}">Tỉ lệ 1:18</a></li>
                                    <li><a href="{{ route('ti_le','1:24') }}">Tỉ lệ 1:24</a></li>
                                    <li><a href="{{ route('ti_le','1:32') }}">Tỉ lệ 1:32</a></li>
                                    <li><a href="{{ route('ti_le','1:36') }}">Tỉ lệ 1:36</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('blog') }}">Bài viết</a></li>
                            <li><a href="./contact.html">Contact</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route('ti_le','1:18') }}">Chương Trình Khuyến Mãi</a></li>
                                    <li><a href="{{ route('ti_le','1:24') }}">Tình Trạng Đơn Hàng</a></li>
                                    <li><a href="{{ route('ti_le','1:32') }}">Tỉ lệ 1:32</a></li>
                                    <li><a href="{{ route('ti_le','1:36') }}">Tỉ lệ 1:36</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- lấy từ Appprovider -->
                            <li><a href="{{ route('getProductLike') }}"><i class="fa fa-heart"></i> <span>@isset($count){{ $count != 0?$count:0}}@endisset</span></a></li>
                            <!-- kiểm tra có giỏ hàng hay k -->


                            <li><a href="{{ route('show-cart') }}"><i class="fa fa-shopping-bag"></i><span>@isset($tong){{ $tong }}@endisset</span></a></li>

                        </ul>
                        <div class="header__cart__price">Tổng tiền: @isset($tongtiengiohang)<span>{{ number_format($tongtiengiohang) }}</span>@endisset</div>
                    </div>

                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
