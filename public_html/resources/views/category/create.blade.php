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

    <form action="{{url('category')}}" method="post" class="form-horizontal">
        <label for="cate_name">Category name:</label>
        <input class="input-sm" type="text" name="cate_name" id="" value="{{Request::old('cate_name')}}">
        <label for="cate_des">Category description</label>
        <input class="input-sm" type="text" name="cate_des" id="" value="{{Request::old('cate_des')}}">
        <label for="order">Order</label>
        <input class="input-sm" type="number" name="order" id="" value="{{Request::old('order')}}">
        <label for="active">Active</label>
        <input type="checkbox" name="active" id="" value="1" @if(Request::old('active') == 1) checked="true" @endif>
        <input type="submit" value="Submit" class="btn btn-default">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection
