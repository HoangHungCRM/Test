@extends('admin.layout.master')

@section('title', 'Danh Sách')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <h1 style="text-align:center">Danh Sách Người dùng</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Adress</th>
                                <th>Action</th>


                            </tr>

                            @isset($users)
                            @foreach($users as $user)
                            <form action="{{ route('user.delete', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <button style="border:none" type="button" class="label label-success" onclick="window.location='{{ route('user.edit', $user->id) }}'">Update
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

