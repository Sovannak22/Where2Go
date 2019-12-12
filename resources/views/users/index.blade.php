@extends('layouts.master')


@section('content')


<div class="box">
    <div class="box-header">
        <h3 class="box-title">User</h3>
        <form class="form-inline" action="{{url('/users')}}">
            <div class="form-group">
                <input name="name" type="name" class="form-control" id="name" placeholder="Fullname" value="{{@$_GET['name']}}">
            </div>
            <div class="form-group">
                <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{@$_GET['email']}}">
            </div>
            <div class="form-group">
                <input name="phone_number" type="tel" class="form-control" id="phone_number" placeholder="Phone number" value="{{@$_GET['phone_number']}}">
            </div>
            <div class="form-group">
                <select name="user_type" id="" class="form-control">
                    <option value="">--User Type--</option>
                    @foreach ($user_types as $ut)
                        <option value="{{$ut->id}}" {{(@$_GET['user_type']== $ut->id)?'selected':''}} >{{$ut->user_type}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>User Type</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            
            @foreach ($users as $user)
                <tr id="tr{{$user->id}}" >
                    <th style="width:5%">{{$user->id}}</th>
                    <td style="width:15%">{{$user->name}}</td>
                    <td style="width:50%">{{$user->email}}</td>
                    <td style="width:15%">{{$user->phone_number}}</td>
                    <td style="width:15%">{{$user->usertype->user_type}}</td>
                    <th style="width:15%;text-align: center">
                        <div class="row">
                            <div class="col-md-6">
                                <a value="{{$user->id}}" class="delete"><div class="btn btn-danger">Delete</div></a>
                            </div>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
        </table>
    </div>
    <div class="box-footer">
        {{$users->links()}}
    </div>
    <!-- /.box-body -->
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
            $('.delete').click(function(){
                var val = $(this).attr('value');
                var url = window.location.origin+"/users/"+val;
                 Notiflix.Confirm.Show( 'Delete User', 'Are you sure to delete this user?', 'Yes', 'No', function(){
                    $.ajax({
                        type:'POST',
                        url: url,
                        data: {_method: 'delete',"_token": "{{ csrf_token() }}"},
                        success: function() {
                            Notiflix.Notify.Success("User deleted success fully");
                            $('#tr'+val).remove();
                        },error:function(){
                            Notiflix.Notify.Failure('Oops something went wrong!');
                        }
                    })
                 }, 
                 function(){
                    
                 }); 
            });
    })

</script>
@endsection
