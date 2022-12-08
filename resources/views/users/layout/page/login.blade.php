@extends("users.layout.master2")

@section('title', 'đăng nhập')

@section('content')
<div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Đăng nhập</h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('postlogin') }}" method="post">
            @csrf
                <div class="row">
                    <!-- <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your Email">
                    </div> -->
                    <div class="col-lg-12 text-center">
                        <input type="email" placeholder="email" name ="email" required>
                        <input type="password" placeholder="password" name="password" required>

                        <button type="submit" class="site-btn">Đăng nhập</button>
                    </div>
                    <a href="{{ route('getResetPassword') }}" style="margin-left:20px; color:black; font-weight:bold">Quên mật khẩu</a>
                </div>
            </form>
        </div>
    </div>
@endsection


