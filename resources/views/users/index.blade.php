@extends('layouts.master')


@section('content')


<div class="box">
    <div class="box-header">
        <h3 class="box-title">User</h3>
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
                            {{-- <div class="col-md-6">
                                <a href='{{url("users/$user->id/edit")}}'><div class="btn btn-primary">Edit</div></a> 
                            </div> --}}
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
    <!-- /.box-body -->
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
            
            // console.log(session);
            $('#example1').DataTable()
            $('.delete').click(function(){
                var val = $(this).attr('value');
                var url = window.location.origin+"/users/"+val;
                console.log(url);
                 Notiflix.Confirm.Show( 'Delete User', 'Are you sure to delete this user?', 'Yes', 'No', function(){ // Yes button callback 
                    $.ajax({
                        type:'POST',
                        url: url,
                        data: {_method: 'delete',"_token": "{{ csrf_token() }}"},
                        success: function() {
                            Notiflix.Notify.Success("User deleted success fully");
                            $('#tr'+val).remove();
                        },error:function(){
                            // You can type your text in String format.
                            Notiflix.Notify.Failure('Oops something went wrong!');
                        }
                    })
                 }, 
                 function(){ // No button callback 
                    alert('If you say so...'); 
                 }); 
            });
    })

</script>
@endsection
