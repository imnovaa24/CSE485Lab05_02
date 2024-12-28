@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết Cán bộ: {{ $staff->name }}</h1>

        <ul>
            <li><strong>Tên:</strong> {{ $staff->name }}</li>
            <li><strong>Chức danh:</strong> {{ $staff->title }}</li>
            <li><strong>Email:</strong> {{ $staff->email }}</li>
            <li><strong>Điện thoại:</strong> {{ $staff->phone }}</li>
            <li><strong>Đơn vị:</strong> {{ $staff->department->name }}</li>
        </ul>

        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection
