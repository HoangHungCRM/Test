@extends('admin.layout.master')
@section('title', 'Update')

@section('content')
<div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <h1 style="text-align:center">Update Sản Phẩm</h1>
                    <div class="page-doby">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                    <form action="{{ route('product.update', $product->id) }}"  enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hãng Xe</label>
                                                <div class="col-sm-10">

                                                    <input type="text"  name ="id_manufacture"  value="{{  $product->manufacture->name  }}" class="form-control" placeholder="Nhập tên xe" required readonly = 'true'>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tên Xe</label>
                                                <div class="col-sm-10">
                                                    <input type="text"  name ="tenxe"  value="{{  $product->name  }}" class="form-control" placeholder="Nhập tên xe" required>
                                                </div>
                                            </div>
                                            @error('tenxe')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tỉ Lệ</label>
                                                <div class="col-sm-10">
                                                    <select name="ratio" class="form-control" id="">

                                                        <option value="1:18">1:18</option>
                                                        <option value="1:24">1:24</option>
                                                        <option value="1:32">1:32</option>
                                                        <option value="1:36">1:36</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Giá Gốc</label>
                                                <div class="col-sm-10">
                                                    <input type="number"  name ="unit_price" class="form-control" placeholder="Nhập giá gốc"  value="{{ $product->unit_price }}" required>
                                                </div>
                                            </div>
                                            @error('unit_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Giá Khuyến Mãi</label>
                                                <div class="col-sm-10">
                                                    <input type="number" value="{{ $product->promotion_price }}" name ="promotion_price" class="form-control" placeholder="Nhập giá khuyến mãi" required>
                                                </div>
                                            </div>
                                            @error('promotion_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hình Ảnh Cũ</label>
                                                <div class="col-sm-10">
                                                    <!-- <input type="file" name ="image_file[]" class="form-control" onchange="changeImage(event)" multiple> -->
                                                    <img src="/front_end/img/products/{{ $product->image }}" alt="" style="width: 100px">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hình Ảnh</label>
                                                <div class="col-sm-10">
                                                    <!-- <input type="file" name ="image_file[]" class="form-control" onchange="changeImage(event)" multiple> -->
                                                    <input class="form-control" type="file" name="image_file"> <br/>
                                                </div>
                                            </div>
                                            @error('image_file')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hình Ảnh Sản Phẩm Cũ</label>
                                                <div class="col-sm-10">
                                                    <!-- <input type="file" name ="image_file[]" class="form-control" onchange="changeImage(event)" multiple> -->
                                                    @foreach($image_file as $image)
                                                    <img src="/front_end/img/products/{{ $image->image }}" alt="" style="width: 100px">
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hình Ảnh Mô Tả</label>
                                                <div class="col-sm-10">
                                                    <!-- <input type="file" name ="image_file[]" class="form-control" onchange="changeImage(event)" multiple> -->
                                                    <!-- /<input class="form-control" type="file" name="files[]"  multiple> <br/> -->
                                                    <input class="form-control" type="file" name="image_files[]" multiple>
                                                </div>
                                            </div>
                                            @error('image_files')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Chi Tiết</label>
                                                <div class="col-sm-10">
                                                    <!-- <input type="file" name ="image_file[]" class="form-control" onchange="changeImage(event)" multiple> -->

                                                    <textarea name="detail" class="form-control" id="editor" cols="80" rows="5">{{ $product->detail }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Mô Tả</label>
                                                <div class="col-sm-10">
                                                <textarea name="description" class="form-control ckeditor" id="editor" cols="80" rows="5">{{ $product->description }}</textarea>

                                                </div>
                                            </div>
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
<script>
  var msg = '{{Session::get('errorgia')}}';
  var exist = '{{Session::has('errorgia')}}';
  if(exist){
    alert(msg);
  }
</script>
