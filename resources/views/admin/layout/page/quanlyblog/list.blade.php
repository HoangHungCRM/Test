@extends('admin.layout.master')
@section('title', 'Danh sách')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <h1 style="text-align:center">Danh Sách Blog</h1>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>

                                <th>Date</th>

                                <th>Action</th>


                            </tr>

                            @isset($blogs)
                            @foreach($blogs as $blog)
                            <form action="{{ route('blog.delete', $blog->id) }}" method="post">
                                @csrf
                                @method('delete')
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->date }}</td>

                                <td>
                                    <a href="{{ route('blog.chitiet', $blog->id) }}" class="label label-primary">Detail</a>||
                                    <button style="border:none" type="button" class="label label-success"  onclick="window.location='{{ route('blog.edit', $blog->id) }}'">Update </button>||
                                    <button type="submit" style="border:none" class="label label-danger" onclick="return confirm('Bạn chắc chắc chắn muốn xóa?')">Delete</button>
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

