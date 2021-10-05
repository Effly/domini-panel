@extends('layouts.app')

@section('title','Separators')

@section('body')
    <div class="container">

        <div class="col">
            <div class="card text-dark bg-light mb-12">
                <form action="{{route('separator-update')}}" method="get" enctype="multipart/form-data">
                    <div id="summernote"></div>
                    <button class="btn btn-primary" id="submit">Отправить</button>
                </form>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-sm-center row row-cols-1 row-cols-md-3 g-2"
             style="border-bottom: #1a202c 1px solid">
            <div class="col">
                <div class="card" style="width: 20rem;">
                    @if($separator->path_inst_img !="NULL")
                        <img src="{{asset('storage/'.$separator->path_inst_img)}}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <form action="{{route('separator-update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title"><strong>logo Instagram</strong></h5>
                            <label for="label" class="form-label card-text">Enter link:</label>
                            @if(!empty($separator->inst_link))
                                <input class="form-control" value="{{$separator->inst_link}}" name="inst_link"
                                       id="label" type="text">
                            @else
                                <input class="form-control" value="" name="inst_link" id="label" type="text">
                            @endif
                            <label for="image" class="form-label card-text">Choose img:</label>
                            <input class="form-control" name="inst_image" type="file" id="image">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 20rem;">
                    @if($separator->path_facebook_img !="NULL")
                        <img src="{{asset('storage/'.$separator->path_facebook_img)}}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <form action="{{route('separator-update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title"><strong>logo Facebook</strong></h5>
                            <label for="label" class="form-label card-text">Enter link:</label>
                            @if(!empty($separator->facebook_link))
                                <input class="form-control" value="{{$separator->facebook_link}}" name="facebook_link"
                                       id="label" type="text">
                            @else
                                <input class="form-control" value="" name="facebook_link" id="label" type="text">
                            @endif
                            <label for="image" class="form-label card-text">Choose img:</label>
                            <input class="form-control" name="facebook_image" type="file" id="image">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote('code', "{!! $separator->html_text !!}");
        });
        let routeSubmit = '{{route('separator-update')}}'
    </script>
@endsection
