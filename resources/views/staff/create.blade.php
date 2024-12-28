@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thêm mới Cán bộ, Giảng viên</h1>

        <form action="{{ route('staff.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên Cán bộ:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="title">Chức danh:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="department_id">Đơn vị:</label>
                <select class="form-control" id="department_id" name="department_id">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Thêm mới</button>
        </form>
    </div>
@endsection
