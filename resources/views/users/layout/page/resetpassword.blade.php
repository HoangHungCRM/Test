@extends('users.layout.master2')

@section('title', 'quên mật khẩu')

@section('content')
<div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Reset Password</h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('postResetPassword') }}" method="post">
                @csrf
                @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <input type="text" placeholder="nhập email" name ="email" required>
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">Chấp nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

