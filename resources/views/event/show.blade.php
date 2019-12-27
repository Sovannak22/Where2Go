@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 style="margin-bottom:30px;"><b>{{$event->title}}</b></h1>
                <i class="fa fa-user fa-lg" style="margin-right:10px"></i>
                0/{{$event->limitation}}
            </div>
            <div class = "col-md-6">
                <h3><b> Description </b></h3>
                {{$event->description}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3><b> Include </b></h3>
                {{$event->include}}
            </div>
            <div class = "col-md-6">
                <h3><b> Duration </b></h3>
                <i class="fa fa-clock-o fa-lg" style="margin-right:10px"></i>
                {{$event->duration}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3><b> Start </b></h3>
                <i class="fa fa-flag-checkered" aria-hidden="true" style="margin-right:10px"></i>
                {{$event->start_date}}
            </div>
            <div class="col-md-6">
                <h3><b> End </b></h3>
                <i class="fa fa-home" aria-hidden="true" style="margin-right:10px"></i>
                {{$event->end_date}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3><b> Contact </b></h3>
                <i class="fa fa-phone" aria-hidden="true" style="margin-right:10px"></i>
                {{$event->contact}}
            </div>
            <div class="col-md-6">
                <h3><b> Transpotation </b></h3>
                <i class="fa fa-rocket" aria-hidden="true" style="margin-right:10px"></i>
                {{$event->transpotation}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3><b> Location </b></h3>
                <iframe src="https://www.google.com/maps/embed/v1/place?key=removed&q=Eiffel+Tower,Paris+France" frameborder="0"></iframe>
            </div>
        </div>
        <div class="row">
            <h3 class="col-md-12"><b> Image </b></h3>
            @foreach ($event->images as $image)
            <img class="col-md-3 col-sm-3" style="height:auto" src='{{url($image->url)}}'>
            @endforeach
        </div>
    </div>
@endsection