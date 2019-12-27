@extends('layouts.master')

@section('content')
@if (Session::get('Feedback'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('Feedback')}}
</div>
@endif
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" >
        <div class="box box-info">
            <div class="box-header with-border" style="padding:30px">
                <h3 class="box-title">Feedback</h3>
            </div>
            <form action="{{url('feedback')}}" style="padding:30px" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="Name">Title:</label>
                    <input type="text" placeholder="Slow etc." name="title" class="form-control" id="title" required>
                </div>
                <div class="form-group">
                    <label for="feedback">Feedback:</label>
                    <textarea name="description" placeholder="write your feedback here" class="form-control" id="" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group" style="text-align:end">
                        <div class="col-sm-2"></div>
                        <button type="submit" class="btn btn-success" >Submit</button>
                </div>
            </form>
        </div>
    <div class="col-md-3">

    </div>
</div>    
@endsection
