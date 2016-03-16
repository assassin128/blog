@extends('layout/template')
@section('content')
    <h1>Detail category</h1>
    {{$category->id . " - ". $category->cate_name}}
@endsection