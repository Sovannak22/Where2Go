@extends('layouts.master')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Categories</h3>
        <div class="pull-right">
            <a href="{{url('categories/create')}}">
                <div class="btn btn-success">
                    Add categories
                </div>
            </a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr id="tr{{$category->id}}" >
                    <th style="width:5%">{{$category->id}}</th>
                    <td style="width:15%">{{$category->category}}</td>
                    <td style="width:50%">{{$category->description}}</td>
                    <td style="width:15%">{{$category->created_at}}</td>
                    <th style="width:15%;text-align: center">
                        <div class="row">
                            <div class="col-md-6">
                                <a href='{{url("categories/$category->id/edit")}}'><div class="btn btn-primary">Edit</div></a> 
                            </div>
                            <div class="col-md-6">
                                <a value="{{$category->id}}" class="delete"><div class="btn btn-danger">Delete</div></a>
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
            // $('#session').ready(function(){
            //     Notiflix.Notify.Success("Category updated success fully");
            // });
            // var session = $('#session').length();
            console.log(session);
            $('#example1').DataTable()
            $('.delete').click(function(){
                var val = $(this).attr('value');
                var url = window.location.origin+"/categories/"+val;
                console.log(url);
                 Notiflix.Confirm.Show( 'Delete Category', 'Are you sure to delete this category?', 'Yes', 'No', function(){ // Yes button callback 
                    $.ajax({
                        type:'POST',
                        url: url,
                        data: {_method: 'delete',"_token": "{{ csrf_token() }}"},
                        success: function() {
                            Notiflix.Notify.Success("Category deleted success fully");
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

