@extends('layout/template')
@section('content')
    <h1>List categories</h1>
    @if(!empty(session('message')))
        <div class="alert alert-success">
            <p>{{session('message')}}</p>
        </div>
    @endif
    <p><a href="{{url('category/create')}}" class="btn btn-default">Create new</a></p>
    <div>
    @foreach($categories as $cate)
        <div class="row">
            <div class="col-sm-8">
                <a href="{{url('category', ['id' => $cate->id])}}">{{$cate->id . ' - ' . $cate->cate_name}}</a>
                <a href="{{url('category/'.$cate->id.'/edit')}}" class="btn btn-info">Edit</a>
                <div class="pull-right">
                    {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $cate->id]]) !!}
                    {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection