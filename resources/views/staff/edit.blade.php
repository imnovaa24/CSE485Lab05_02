@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Cán bộ, Giảng viên: {{ $staff->name }}</h1>

        <form action="{{ route('staff.update', $staff->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên Cán bộ:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}" required>
            </div>
            <div class="form-group">
                <label for="title">Chức danh:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $staff->title }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $staff->email }}">
            </div>
            <div class="form-group">
                <label for="phone">Điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $staff->phone }}">
            </div>
            <div class="form-group">
                <label for="department_id">Đơn vị:</label>
                <select class="form-control" id="department_id" name="department_id">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @if ($staff->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection
