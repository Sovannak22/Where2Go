@extends('layouts.master')

@section('content')

@if (Session::get('Event'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('Event')}}
</div>
@endif

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" >
        <div class="box box-info">
            <div class="box-header with-border" style="padding:30px">
                <h3 class="box-title">Create Event</h3>
            </div>
            <form id="event_upload" style="padding:30px" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" placeholder="write your event title here" class="form-control" id="title" required>
                </div>
                <div class="form-group">
                <label for="include">Include:</label>
                <input type="text" name="include" placeholder="i.e: ticket, Wifi..." class="form-control" id="include">
                </div>
                <div class="form-group">
                    <label for="duration">Duration:</label>
                    <input type="text"name="duration" placeholder="enter your duration here" class="form-control" id="Duration" required>
                </div>
                <div class="form-group">
                    <label for="categories">Categories:</label>
                    <select class="form-control" name="categories_id" id="sel1">
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->category}}</option>
                        @endforeach  
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" placeholder="enter your price here" class="form-control" id="price" required>
                </div>
                <div class="form-group">
                    <label for="limit">Limit:</label>
                    <input type="text" name="limitation" placeholder="enter your limit here" class="form-control" id="limitation" required>
                </div>     
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" class="form-control" id="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" class="form-control" id="end_date" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="phone" name="contact" placeholder="080 888 888" class="form-control" id="contact" required>
                </div>
                <div class="form-group">
                    <label for="transpotation">Transpotation:</label>
                    <input type="text" name="transpotation" placeholder="bus, moto..." class="form-control" id="transpotation" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" name="location" placeholder="https://goo.gl/maps/zFTSnk3ZunBYPerk8" class="form-control" id="location" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword3">Description:</label>
                    <textarea name="description" placeholder="write your event summery here" class="form-control" id="" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group">
                        <fieldset class="form-group">
                            <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                            <input type="file" id="pro-image" name="pro-image" style="display:none"  class="form-control" multiple >
                        </fieldset>
                        <div class="preview-images-zone">
                            
                        </div>
                    </div>
                <div class="form-group" style="text-align:end">
                        <div class="col-sm-2"></div>
                        <button type="submit" id="submit" value="/events" class="btn btn-success" >Submit</button>
                </div>
            </form>
        </div>
    <div class="col-md-3">

    </div>
</div>    
@endsection
