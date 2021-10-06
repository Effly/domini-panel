@extends('layouts.app')

@section('title','Edit')

@section('body')
{{--            {{dd(empty($data->image_name_ipad))}}--}}
    <form action="{{route('update')}}" class="card card-body" method="post" enctype="multipart/form-data">
        @csrf
        <div class="game_title row mb-3">
            <label class="col-sm-2 col-form-label" for="title">Game title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" value="{{$data->name}}" name="title">
            </div>

            <label class="col-sm-2 col-form-label" for="title">Game tech name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" value="{{$data->tech_name}}" name="tech_title">
            </div>
        </div>
        <fieldset class="platform row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Platform</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    @if($data->platform == 'ios')
                        <input type="radio" value="ios" id="ios" checked name="platform">
                    @else
                        <input type="radio" value="ios" id="ios" name="platform">
                    @endif
                    <label for="ios">iOS</label>
                </div>
                <div class="form-check">
                    @if($data->platform == 'android')
                        <input type="radio" value="android" checked id="android" name="platform">
                    @else
                        <input type="radio" value="android" id="android" name="platform">
                    @endif
                    <label for="android">Android</label>
                </div>
                <div class="form-check">
                    @if($data->platform == 'amazone')
                        <input type="radio" value="amazone" checked id="amazone" name="platform">
                    @else
                        <input type="radio" value="amazone" id="amazone" name="platform">
                    @endif
                    <label for="amazone">Amazone</label>
                </div>
            </div>
        </fieldset>
        <fieldset class="version row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Version</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    @if($data->version == 'free')
                        <input type="radio" value="free" checked id="free" name="version">
                    @else
                        <input type="radio" value="free" id="free" name="version">
                    @endif
                    <label for="free">free</label>
                </div>
                <div class="form-check">
                    @if($data->version == 'premium')
                        <input type="radio" value="premium" checked id="premium" name="version">
                    @else
                        <input type="radio" value="premium" id="premium" name="version">
                    @endif
                    <label for="premium">premium</label>
                </div>
            </div>
        </fieldset>
        <fieldset class="slider row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Slider</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    @if($data->slider == 'big')
                        <input type="radio" value="big" checked id="big" name="slider">
                    @else
                        <input type="radio" value="big" id="big" name="slider">
                    @endif
                    <label for="big">big</label>
                </div>
                <div class="form-check">
                    @if($data->slider == 'small')
                        <input type="radio" value="small" checked id="small" name="slider">
                    @else
                        <input type="radio" value="small" id="small" name="slider">
                    @endif
                    <label for="small">small</label>
                </div>
            </div>
        </fieldset>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Published</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    @if($data->published == 'yes')
                        <input type="radio" value="yes" checked id="yes" name="published">
                    @else
                        <input type="radio" value="yes" id="yes" name="published">
                    @endif
                    <label for="yes">yes</label>
                </div>
                <div class="form-check">
                    @if($data->published == 'no')
                        <input type="radio" value="no" checked id="no" name="published">
                    @else
                        <input type="radio" value="no" id="no" name="published">
                    @endif
                    <label for="no">no</label>
                </div>
            </div>
        </fieldset>
        <div class="image">
            @if(!empty($data->image_name) || $exist == true)
                <img class="rounded image mx-auto d-block img-fluid" src="{{asset('storage/'.$data->image_name)}}"
                     alt="tech_name_img">
            @endif
            <label for="formFile" class="form-label image">File input</label>
            <input class="form-control" name="image" type="file" id="image">
            <p class="validate">

            </p>
        </div>
        <div style="display: none" id="block_image_for_ipad" class="image">
            @if(!empty($data->image_name_ipad))
                <img class="rounded image mx-auto d-block img-fluid" src="{{asset('storage/'.$data->image_name_ipad)}}"
                     alt="tech_name_img" >
            @endif
            <label for="formFile" class="form-label image">File input for Ipad</label>
            <input class="form-control" name="image_for_ipad" type="file" id="image_for_ipad">
            <p class="validate_ipad">

            </p>
        </div>
        <div class="game_title row mb-3">
            <label class="col-sm-2 col-form-label" for="title">Adjust link</label>
            <div class="col-sm-10">
                @if(!empty($data->link))
                    <input type="text" class="form-control" id="link" value="{{$data->link}}" name="link">
                @else
                    <input type="text" class="form-control" id="link" value="" name="link">
                @endif
                <p class="validate_link">

                </p>
            </div>
        </div>


        <input type="hidden" value="{{$data->id}}" name="id">
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
            {{--        <input class="btn btn-primary" type="submit" id="submit">--}}
        </div>
    </form>
@endsection
@section('script')
    <script>

    let routeImageCheck = '{{route('image-check')}}'
    let routeLinkCheck = '{{route('link-check')}}'

    </script>
@endsection
