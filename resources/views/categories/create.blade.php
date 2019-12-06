@extends('layouts.master')
@section('content')
    @if (Session::get('add_category'))
    <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{Session::get('add_category')}}
    </div>
    @endif
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Category</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{url('categories')}}" class="form-horizontal" method="POST">
              {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
                <label for="category" class="col-sm-2 control-label">Category</label>
        
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="category" placeholder="Category">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
        
                <div class="col-sm-10">
                  <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2"></div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
    </div>
    <div class="col-md-3"></div>
  </div>    
@endsection