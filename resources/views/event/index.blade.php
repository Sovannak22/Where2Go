@extends('layouts.master')


@section('content')


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Event</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</Title></th>
                <th>Duration</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Contact</th>
                <th>Limitation</th>
                <th>Description</th>
                <th>Transportation</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            
            @foreach ($event as $event)
                <tr id="tr{{$event->id}}" >
                    <th >{{$event->id}}</th>
                    <td >{{$event->title}}</td>
                    <td >{{$event->duration}}</td>
                    <td >{{$event->start_date}}</td>
                    <td >{{$event->end_date}}</td>
                    <td >{{$event->contact}}</td>
                    <td >{{$event->limitation}}</td>
                    <td >{{$event->description}}</td>
                    <td >{{$event->transpotation}}</td>
                    <td >{{$event->price}}</td>
                    <td >{{$event->categories->category}}</td>
                    <th style="text-align: center">
                        <div class="row">
                            <div class="col-md-6">
                                <a href='{{url("events/$event->id/edit")}}'><div class="btn btn-primary">Edit</div></a> 
                            </div>
                            <div class="col-md-6">
                                <a value="{{$event->id}}" class="delete"><div class="btn btn-danger">Delete</div></a>
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
                var url = window.location.origin+"/events/"+val;
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
    })

</script>
@endsection
