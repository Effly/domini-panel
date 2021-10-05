@extends('layouts.app')

@section('title','Create')

@section('body')

<form action="{{route('store_new')}}" class="card card-body" method="post" enctype="multipart/form-data">
    @csrf
    <div class="game_title row mb-3">
        <label class="col-sm-2 col-form-label" for="title">Game title</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" id="title" value="" name="title">
        </div>

        <label class="col-sm-2 col-form-label" for="title">Game tech name</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" id="title" value="" name="tech_title">
        </div>
    </div>
    <fieldset class="platform row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Platform</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input type="radio" required value="ios" id="ios" name="platform">

                <label for="ios">iOS</label>
            </div>
            <div class="form-check">

                <input type="radio" required value="android" id="android" name="platform">

                <label for="android">Android</label>
            </div>
            <div class="form-check">

                <input type="radio" required value="amazone" id="amazone" name="platform">

                <label for="amazone">Amazone</label>
            </div>
        </div>
    </fieldset>
    <fieldset class="version row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Version</legend>
        <div class="col-sm-10">
            <div class="form-check">

                <input type="radio" required value="free" id="free" name="version">
                <label for="free">free</label>
            </div>
            <div class="form-check">

                <input type="radio" required value="premium" id="premium" name="version">
                <label for="premium">premium</label>
            </div>
        </div>
    </fieldset>
    <fieldset class="slider row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Slider</legend>
        <div class="col-sm-10">
            <div class="form-check">

                <input type="radio" required value="big" id="big" name="slider">
                <label for="big">big</label>
            </div>
            <div class="form-check">
                <input type="radio" required value="small" id="small" name="slider">
                <label for="small">small</label>
            </div>
        </div>
    </fieldset>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Published</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input type="radio" required value="yes" id="yes" name="published">
                <label for="yes">yes</label>
            </div>
            <div class="form-check">
                <input type="radio" required value="no" id="no" name="published">
                <label for="no">no</label>
            </div>
        </div>
    </fieldset>
    <div class="image">
        <label for="formFile"  class="form-label image">File input</label>
        <input class="form-control" required name="image" type="file" id="image">
        <p class="validate">

        </p>
    </div>
    <div style="display: none" id="block_image_for_ipad" class="image">
        <label for="formFile" class="form-label image">File input for Ipad</label>
        <input class="form-control" name="image_for_ipad" type="file" id="image_for_ipad">
        <p class="validate_ipad">

        </p>
    </div>
    <div class="game_title row mb-3">
        <label class="col-sm-2 col-form-label" for="title">Adjust link</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" id="link" value="" name="link">
            <p class="validate_link">

            </p>
        </div>
    </div>


    <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
</form>
@endsection

@section('script')
<script>
    let els = $("input[name=image]");
    els.on("change", function () {
        var fd = new FormData();
        var files = els[0].files;

        // Check file selected or not
        if (files.length > 0) {
            fd.append('image', files[0]);

            $.ajax({
                url: '{{route('image-check')}}',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('.validate').html(response)
                }
            })
        }
    })
    let link = $("input[name=link]");
    link.on("change", function () {
        console.log(link)
        $.ajax({
            url: '{{route('link-check')}}',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                link: link.val(),
            },
            success: function (response) {
                $('.validate_link').html(response)
                // console.log(response)
            }
        })
    })

</script>
@endsection
