@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách Cán bộ, Giảng viên</h1>
        <a href="{{ route('staff.create') }}" class="btn btn-primary">Thêm mới Cán bộ, Giảng viên</a>

        <table class="table mt-4">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên Cán bộ</th>
                <th>Chức danh</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Đơn vị</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($staffMembers as $staff)
                <tr>
                    <td>{{ $staff->id }}</td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->title }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>{{ $staff->department->name }}</td>
                    <td>
                        <a href="{{ route('staff.show', $staff->id) }}" class="btn btn-info">Xem</a>
                        <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
