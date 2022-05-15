@extends('layouts.layout')
@section('content')
@foreach($names as $name)
    <ul>{{$name}}</ul>
@endforeach()
@endsection
