@extends('layouts.blank_template')


@section('content')

    <div class="container mt-5">
        @if (Session::get('update_profile_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('update_profile_success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <h1 class="font-weight-bold"> <i class="fas fa-pencil-alt"></i> Edit User Profile</h1>
    
        <hr>    
        <div class="row">
            <div class="mt-3 col-md-4 col-sm-12">
                <div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('sitephoto.jpg') }}" alt="Profile image" height="100px" class="rounded-circle">

                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <h4 class="font-weight-bold">{{$user->name}}</h4>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{url('/profile/posts/qa')}}">View Profile</a>
                    </div>

                    <div class="list-group my-3 shadow-sm">
                        <a data-toggle="tab" class="list-group-item list-group-item-action active" href="#password" role="tab" aria-controls="password"><i class="fas fa-unlock-alt"></i> Password</a>
                        <a data-toggle="tab"  class="list-group-item list-group-item-action" href="#user-info" role="tab" aria-controls="user-info"><i class="	fas fa-user"></i> User Info</a>
                    </div>
                    <a href="#" class="btn btn-danger w-100"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 bg-light p-5 shadow-sm">
                <div class="tab-content py-5">
                    <div class="tab-pane active" id="password" role="tabpanel">
                        <div>
                            <div>
                                <h3> <i class="fas fa-unlock-alt"></i> Change Password</h3>
                            </div>
                            <hr>
                            <form action="{{url('changepassword')}}" method="POST">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="form-group">
                                    <label class="col-form-label" for="current_password"><span class="text-danger"><i class="fas fa-star-of-life"></i></span> <strong>Current Password:</strong></label>
                                    <input class="form-control" type="password" name="current_password" id="current_password" placeholder="Current Password">
                                    @if ($errors->has('current_password'))
                                        
                                        <span class="text-danger">{{ $errors->first('current_password') }}</span>

                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="new_password"><span class="text-danger"><i class="fas fa-star-of-life"></i></span> <strong>New Password:</strong></label>
                                    <input class="form-control" type="password" name="new_password" id="new_password" placeholder="New Password">
                                    @if ($errors->has('new_password'))
                                        
                                        <span class="text-danger">{{ $errors->first('new_password') }}</span>

                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="confirm_password"><span class="text-danger"><i class="fas fa-star-of-life"></i></span> <strong>Confirm Password:</strong></label>
                                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                    @if ($errors->has('confirm_password'))
                                        
                                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>

                                    @endif
                                </div>
                                <div class="">
                                    <input type="submit" value="Save" class="btn btn-success w-25 ml-0">
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Update profile infomation --}}
                    <div class="tab-pane" id="user-info" role="tabpanel">
                        <div>
                            <div>
                                <h3> <i class="	fas fa-user"></i> Edit User Profile info</h3>
                            </div>
                            <hr>
                            <form action="{{url('update_profile')}}" method="post">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PUT">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label" for="name"><strong>Fullname: </strong></label>
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Fullname" value="{{@$user->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label" for="phone_number"><strong>Phone number:</strong></label>
                                            <input class="form-control" type="phone_number" name="phone_number" id="phone_number" placeholder="Phone number" value="{{@$user->phone_number}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label" for="email"><strong>Email:</strong></label>
                                            <input class="form-control" type="email" name="email" id="email" value="{{@$user->email}}" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <input type="submit" value="Save" class="btn btn-success w-25 ml-0">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection