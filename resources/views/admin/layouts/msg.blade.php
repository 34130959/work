@if(session()->has('success'))
    <div class="row">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('success') }}
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="row">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('error') }}
        </div>
    </div>
@endif

{{--验证错误--}}
@if($errors->any())
    <div class="Huialert Huialert-error"><i class="Hui-iconfont">&#xe6a6;</i>
        <ul>
            {{-- 循环出所有的错误信息 --}}
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif