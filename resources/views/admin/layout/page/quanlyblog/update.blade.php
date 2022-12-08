@extends('admin.layout.master')

@section('title', 'cập nhật')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <h1>Cập Nhật Bài Viết</h1>
                    <div class="page-doby">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <form action="{{ route('blog.update', $blog->id) }}"  enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tiêu Đề Bài Viết</label>
                                                <div class="col-sm-10">
                                                    <input type="text"  name ="title" class="form-control"  value="{{ $blog->title }}" placeholder="Tiêu đề bài viết" required>
                                                </div>
                                            </div>
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hình Ảnh Hiện Tại</label>
                                                <div class="col-sm-10">
                                                    <img  class="img-thumnail" style="width: 150px;padding:5px" src="/front_end/img/blog/{{ $blog->image }}"><br>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hình Ảnh Cập Nhật</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name ="image_file" class="form-control" onchange="changeImage(event)">
                                                    <img id="image" class="img-thumnail" style="width: 150px;padding:5px"><br>

                                                    <script type="text/javascript">
                                                        const changeImage=(e)=>{
                                                            const img=document.getElementById('image');
                                                            const file=e.target.files[0]
                                                            img.src=URL.createObjectURL(file);
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            @error('image_file')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nội Dung</label>
                                                <div class="col-sm-10">
                                                <textarea name="content" class="form-control ckeditor" id="editor" cols="80" rows="5">{{ $blog->content }}</textarea>

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


