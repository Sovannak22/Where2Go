@extends('layouts.master')

@section('content')
<!-- <h1 id="session">
    {{Session::get('----------')}}
</h1> -->


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Feedback Title</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback) 
                <tr id="tr{{$feedback->id}}" >
                    <th style="width:5%">{{$feedback->id}}</th>
                    <th>{{$feedback->user->name}}</th>
                    <th>{{$feedback->user->email}}</th>
                    <td style="width:15%">{{$feedback->title}}</td>
                    <td style="width:50%">{{$feedback->description}}</td>
                    <td style="width:15%">{{$feedback->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection

@section('script')
@endsection