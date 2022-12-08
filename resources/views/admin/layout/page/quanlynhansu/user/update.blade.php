@extends('admin.layout.master')

@section('title', 'update')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <h1>Update User</h1>
                    <div class="page-doby">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <form action="{{ route('user.update', $user->id) }}"  enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tên </label>
                                                <div class="col-sm-10">
                                                    <input type="text"  name ="full_name" class="form-control"  value="{{ $user ->full_name }}" placeholder="Nhập tên hãng xe muốn thêm" required>
                                                </div>
                                            </div>
                                            @error('full_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email </label>
                                                <div class="col-sm-10">
                                                    <input type="email"  name ="email" class="form-control"  value="{{ $user ->email }}" placeholder="Nhập tên hãng xe muốn thêm" required>
                                                </div>
                                            </div>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Phone </label>
                                                <div class="col-sm-10">
                                                    <input type="number"  name ="phone" class="form-control"  value="{{ $user ->phone }}" placeholder="Nhập số điện thoại" required>
                                                </div>
                                            </div>
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">address </label>
                                                <div class="col-sm-10">
                                                    <textarea name="address" id="" cols="30" rows="10"class="form-control" required>{{ $user->address }}</textarea>
                                                </div>
                                            </div>
                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror


                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="form-control form-bg-primary">Cập Nhật</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


