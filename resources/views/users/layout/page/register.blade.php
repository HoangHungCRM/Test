@extends('users.layout.master2')

@section('title', 'đăng ký')

@section('content')
<div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Tạo Mới Tạo Tài Khoản</h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('postRegister') }}" method="post">
                @csrf
                @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="họ tên đầy đủ" name="full_name" required>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="nhập email" name ="email" required>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <input type="password" placeholder="nhập password" name ="password" required>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <input type="number" placeholder="nhập số điện thoại" name ="phone" required>
                    </div>

                    <div class="col-lg-12 text-center">
                        <textarea placeholder="nhập địa chỉ" name ="address" required></textarea>
                        <button type="submit" class="site-btn">Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

