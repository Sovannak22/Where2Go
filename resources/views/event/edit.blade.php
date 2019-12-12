@extends('layouts.master')
@section('content')
    @if (Session::get('edit_event'))
    <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{Session::get('update_event')}}
    </div>
    @endif
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Event</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{url('events/'.$event->id)}}" style="padding:30px" method="POST">
            {{ csrf_field() }}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" placeholder="" class="form-control" id="title" value="{{@$event->title}}" required>
                @if ($errors->has('title'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('title') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="include">Include:</label>
                <input type="text" name="include" placeholder="i.e: ticket, Wifi..." class="form-control" id="include" value="{{@$event->include}}" required>
                @if ($errors->has('include'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('include') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="text"name="duration" placeholder="enter your duration here" class="form-control" id="Duration" value="{{@$event->duration}}" required>
                @if ($errors->has('duration'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('duration') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="categories">Categories:</label>
                <select class="form-control" name="categories_id" id="sel1" required>
                    @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->category}}</option>
                    @endforeach  
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" placeholder="enter your price here" class="form-control" id="price" value="{{@$event->price}}" required>
                @if ($errors->has('price'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('price') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="limit">Limit:</label>
                <input type="text" name="limitation" placeholder="enter your limit here" class="form-control" id="limitation" value="{{@$event->limitation}}" required>
                @if ($errors->has('limitation'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('limitation') }}</strong>
                </span>
                @endif
            </div>     
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control" id="start_date" value="{{@$event->start_date}}" required>
                @if ($errors->has('start_date'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('start_date') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" class="form-control" id="end_date" value="{{@$event->end_date}}" required>
                @if ($errors->has('end_date'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('end_date') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="phone" name="contact" placeholder="080 888 888" class="form-control" id="contact" value="{{@$event->contact}}" required>
                @if ($errors->has('contact'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('contact') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="transpotation">Transpotation:</label>
                <input type="text" name="transpotation" placeholder="bus, moto..." class="form-control" id="transpotation" value="{{@$event->transpotation}}" required>
                @if ($errors->has('transpotation'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('transpotation') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" placeholder="https://goo.gl/maps/zFTSnk3ZunBYPerk8" class="form-control" id="location" value="{{@$event->location}}">
                @if ($errors->has('location'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('location') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputPassword3">Description:</label>
                <textarea name="description" placeholder="write your event summery here" class="form-control" id="" cols="30" rows="10" required>{{@$event->description}}</textarea>
                @if ($errors->has('description'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('description') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                    <fieldset class="form-group">
                        <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                        <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control"  multiple >
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
    </div>
    <div class="col-md-3"></div>
  </div>    
@endsection