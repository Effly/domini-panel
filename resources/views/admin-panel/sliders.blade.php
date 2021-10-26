@extends('layouts.app')

@section('title','Sliders')

@section('body')
    <h1>Sliders speed</h1>
    <h2>
        <form action="{{route('update-speed')}}" method="post">
            @csrf
            <fieldset class="row mb-3 d-flex align-items-center">
                <legend class="col-form-label col-sm-2 pt-0">Big:</legend>
                <div class="col-sm-10 d-flex align-items-center">
                    <div class="input-group form-check">
                        <input type="text" name="speed" value="{{$speed_big}}" id="speed_big" class="text form-control">
                        <input class="btn d-flex btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </fieldset>
            <input type="hidden" name="slider" value="big">
        </form>
    </h2>

    <h2>
        <form action="{{route('update-speed')}}" method="post">
            @csrf
            <fieldset class="row mb-3 d-flex align-items-center">
                <legend class="col-form-label col-sm-2 pt-0">Small:</legend>
                <div class="col-sm-10 ">
                    <div class="form-check  input-group form-check">
                        <input type="text" name="speed" value="{{$speed_small}}" id="speed_big"
                               class="text form-control">
                        <input type="hidden" name="slider" value="small">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </fieldset>
        </form>
    </h2>

    <br>
    <h2>
        label settings
    </h2>
    <div class="sort row row-cols-1 row-cols-md-3 g-4" style="border-bottom: #1a202c 1px solid">
        @foreach($labels as $key => $value)
            <div class="col">
                <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <h5 class="card-header">{{$key}}</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <form action="{{route('update-label')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="label_name" value="{{$key}}">
                                @if($value)
                                    <img class="img-fluid" src="{{asset('storage/labels/'.$key.'.png')}}"
                                         alt="{{$key}}">
                                @endif
                                <input type="file" class="form-control" name="img">
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
