@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" >
        <div class="box box-info">
            <div class="box-header with-border" style="padding:30px">
                <h3 class="box-title">Create Event</h3>
            </div>
            <form action="" style="padding:30px" method="POST">
                <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" placeholder="write your event title here" class="form-control" id="title" required>
                </div>
                <div class="form-group">
                <label for="include">Include:</label>
                <input type="text" placeholder="i.e: ticket, Wifi..." class="form-control" id="include">
                </div>
                <div class="form-group">
                    <label for="duration">Duration:</label>
                    <input type="text" placeholder="enter your duration here" class="form-control" id="Duration" required>
                </div>
                <div class="form-group">
                    <label for="categories">Categories:</label>
                    <select class="form-control" id="sel1" required>
                        <option>Adventure</option>
                        <option>Sea</option>
                        <option>Camping</option>
                        <option>Festival</option>
                        <option>Event</option>
                        <option>Festival</option>
                        <option>City</option>   
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" placeholder="enter your price here" class="form-control" id="price" required>
                </div>     
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" class="form-control" id="end_date" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="tel" placeholder="080 888 888" class="form-control" id="contact" required>
                </div>
                <div class="form-group">
                    <label for="transpotation">Transpotation:</label>
                    <input type="text" placeholder="bus, moto..." class="form-control" id="transpotation" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="url" placeholder="https://goo.gl/maps/zFTSnk3ZunBYPerk8" class="form-control" id="location">
                </div>
                <div class="form-group">
                    <label for="inputPassword3">Description:</label>
                    <textarea name="description" placeholder="write your event summery here" class="form-control" id="" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group">
                        <fieldset class="form-group">
                            <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                            <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" multiple required>
                        </fieldset>
                        <div class="preview-images-zone">
                            
                        </div>
                    </div>
                <div class="form-group" style="text-align:end">
                        <div class="col-sm-2"></div>
                        <button type="submit" class="btn btn-success" >Submit</button>
                </div>
            </form>
        </div>
    <div class="col-md-3">

    </div>
</div>    
@endsection
