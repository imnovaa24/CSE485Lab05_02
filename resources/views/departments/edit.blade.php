@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Đơn vị: {{ $department->name }}</h1>

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên Đơn vị:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}" required>
            </div>
            <div class="form-group">
                <label for="code">Mã Đơn vị:</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $department->code }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $department->phone }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $department->email }}">
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" id="website" name="website" value="{{ $department->website }}">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $department->address }}">
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection
