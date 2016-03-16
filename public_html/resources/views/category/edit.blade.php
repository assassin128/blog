@extends('layout/template')
@section('content')
    <h1>Form create a category</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{--{!! Form::open(array('url' => 'category', 'method' => 'PATCH')) !!}--}}
    <form action="{{url('category', ['id' => $category->id])}}" method="POST">
        <input name="_method" type="hidden" value="PUT">
        <label for="cate_name">Category name:</label>
        <input type="text" name="cate_name" id="" value="{{$category->cate_name}}">
        <label for="cate_des">Category description</label>
        <input type="text" name="cate_des" id="" value="{{$category->cate_des}}">
        <label for="order">Order</label>
        <input type="number" name="order" id="" value="{{$category->order}}">
        <label for="active">Active</label>
        <input type="checkbox" name="active" id="" value="1" @if($category->active == 1) checked="true" @endif>
        <input type="submit" value="Submit">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection
