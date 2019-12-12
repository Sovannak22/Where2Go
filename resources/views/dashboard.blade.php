@extends('layouts.master')

@section('content')


    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                <h3>{{$user}}</h3>

                <p>User</p>
                </div>
                <div class="icon">
                <i class="fa fa-user"></i>
                </div>
                <a href="{{url('admin/users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                <h3>{{$category}}</h3>

                <p>Category</p>
                </div>
                <div class="icon">
                <i class="fa fa-cubes"></i>
                </div>
                <a href="{{url('admin/users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

@endsection

