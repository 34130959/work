@extends('admin.layouts.main')

@section('cnt')

    <div class="page-container">
        <p class="f-20 text-success">欢迎使用</p>
        <p>登录次数：{{auth()->guard('admin')->user()->click}}</p>
        <p>上次登录ip：{{ request()->ip() }}</p>
    </div>

@endsection