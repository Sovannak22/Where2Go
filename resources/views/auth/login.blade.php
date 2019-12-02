@extends('layouts.blank_template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-sm-10 col-10">
                <div class="py-3 rounded border border-dark" style="margin-top:25vh;">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('sitephoto.jpg') }}" style="width:15%" alt="">
                    </div>
                    <div class="d-flext justify-content-center">
                        <h3 class="text-muted text-center">Administrator</h3>
                    </div>
                    <div class="px-3">
                        <form action="{{url('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">SIGN IN</button>
                        </form>                 
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection