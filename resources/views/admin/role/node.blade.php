@extends('admin.layouts.main')

@section('css')
    <style>
        dd {
            padding-left: 20px;
        }
    </style>

@endsection

@section('cnt')
    <article class="page-container">
        @include('admin.layouts.msg')

        <form action="{{ route('admin.role.node',$role) }}" method="post" class="form form-horizontal"
              id="form-member-add">
            @csrf

            @foreach($data as $item)
                <dl>
                    <dt>
                        <input
                                @if(in_array($item['id'],$auths)) checked @endif
                        type="checkbox" name="node_id[]" value="{{ $item['id'] }}">
                        {{ $item['name'] }}
                    </dt>
                    @foreach($item['sub'] as $item1)
                        <dd>
                            <input
                                    @if(in_array($item1['id'],$auths)) checked @endif
                            type="checkbox" name="node_id[]" value="{{ $item1['id'] }}">
                            {{ $item1['name'] }}
                        </dd>
                    @endforeach
                </dl>
            @endforeach

            <hr>
            <input type="submit" class="btn btn-primary" value="指派权限">

        </form>
    </article>

@endsection


@section('js')
@endsection