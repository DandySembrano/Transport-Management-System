@extends('layout.default')

@section('content')

<p>Hello {{ Auth::user()->username }}</p> 

@stop