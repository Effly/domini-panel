@extends('layouts.app')

@section('title','Separators')

@section('body')
    <form action="{{route('separator-update')}}" method="get" enctype="multipart/form-data">
        <div id="summernote"></div>
        <button class="btn btn-primary" id="submit">Отправить</button>
    </form>
    <form action="{{route('separator-update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="image">
            @if($path_inst_img !="NULL")
                <img class="w-25 img-fluid" src="{{asset('storage/'.$path_inst_img)}}" alt="">
            @endif
            <label for="formFile" class="form-label image">logo Instagram</label>
            <input class="form-control" name="inst_image" type="file" id="image">
        </div>
        <button class="btn btn-primary">Отправить</button>
    </form>
    <form action="{{route('separator-update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="image">

            @if($path_facebook_img !="NULL")
                <img class="w-25 img-fluid" src="{{asset('storage/'.$path_facebook_img)}}" alt="">
            @endif
            <label for="formFile" class="form-label image">logo Facebook</label>
            <input class="form-control" name="facebook_image" type="file" id="image">
        </div>
        <button class="btn btn-primary">Отправить</button>
    </form>


@endsection
@section('script')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote('code', '{!! $separator !!}');
        });
        var els = $("#submit");
        els.on("click", function (e) {
            e.preventDefault();
            let data = $('#summernote').summernote('code')
            $.ajax({
                url: '{{route('separator-update')}}',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    data: data,
                },
                success: function (response) {
                    console.log(response)
                }
            })
            // console.log($('#summernote').summernote('code'))
            location.reload()
        })
    </script>
@endsection
