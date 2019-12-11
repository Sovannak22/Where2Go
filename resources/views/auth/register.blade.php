@extends('layouts.blank_template')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center mt-5  ">
            <img src="{{ asset('sitephoto.jpg') }}" style="width:5%" alt="">
        </div>
        <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-sm-10 col-10 rounded border border-dark p-3">
                    <h3>Register</h3>
                    <form action="{{url('register')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <span class="text-danger mr-1"><i class="fas fa-star-of-life"></i></span><label for="name">Fullname</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Ex. Sok Sao">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <span class="text-danger mr-1"><i class="fas fa-star-of-life"></i></span><label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <span class="text-danger mr-1"><i class="fas fa-star-of-life"></i></span><label for="phone_number">Phone number</label>
                            <input name="phone_number" type="tel" class="form-control" id="phone_number" placeholder="Phone number">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <span class="text-danger mr-1"><i class="fas fa-star-of-life"></i></span><label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" data-toggle="password" placeholder="Minimum 5">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection