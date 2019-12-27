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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback) 
                <tr id="tr{{$feedback->id}}" >
                    <th style="width:5%">{{$feedback->id}}</th>
                    <th style="width:10%">{{$feedback->user->name}}</th>
                    <th style="width:10%">{{$feedback->user->email}}</th>
                    <td style="width:15%">{{$feedback->title}}</td>
                    <td style="width:40%">{{$feedback->description}}</td>
                    <td style="width:15%">{{$feedback->created_at}}</td>
                    <td><a href="#" class="delete" value="{{$feedback->id}}"><p class="text-red">Delete</p></a></td>
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
        $('.delete').click(function(){
            var val = $(this).attr('value');
            var url = window.location.origin+"/feedback/"+val;
            console.log(url);
                Notiflix.Confirm.Show( 'Delete Event', 'Are you sure to delete this event?', 'Yes', 'No', function(){ // Yes button callback 
                $.ajax({
                    type:'POST',
                    url: url,
                    data: {_method: 'delete',"_token": "{{ csrf_token() }}"},
                    success: function() {
                        Notiflix.Notify.Success("Event deleted success fully");
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
    </script>
@endsection