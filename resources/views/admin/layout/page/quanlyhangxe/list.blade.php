@extends('admin.layout.master')

@section('title', 'Danh Sách ')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <h1 style="text-align:center">Danh Sách Hãng Xe</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>


                            </tr>

                            @isset($manufacture )
                            @foreach($manufacture as $hangxe)
                            <form action=" {{ route('manufacture.delete', $hangxe->id) }} " method="post">
                                @csrf
                                @method('delete')
                            <tr>
                                <td>{{ $hangxe->id }}</td>
                                <td><img src="/front_end/img/hang_xe_remove/{{ $hangxe->image }}" alt="prod img" class="img-fluid" width="100px"></td>
                                <td>{{ $hangxe->name }}</td>
                                <td>
                                    <button style="border:none" type="button" class="label label-success" onclick="window.location='{{route('manufacture.getedit',$hangxe->id)}}'">Update
                                    </button>
                                    ||
                                    <button type="submit" style="border:none" class="label label-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</button>
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
