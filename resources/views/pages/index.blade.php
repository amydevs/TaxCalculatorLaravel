@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('css/pages/index.blade.css') }}" />
@stop

@section('content')
    @include('includes.index.form')
@stop
