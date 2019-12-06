@extends('layouts.blank_template')

@section('content')
    
    <div class="container">
        <h1 class="mt-5"> Oops sorry you don't have permission to access this page.</h1>
        <a href="{{url('/')}}" class="text-center"><h2>back to home page</h2></a>
    </div>

@endsection