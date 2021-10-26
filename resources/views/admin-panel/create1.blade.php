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
        <fieldset class="platform row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Platform</legend>
            <div class="col-sm-10">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#ios"
                                type="button" role="tab" aria-controls="ios" aria-selected="true">iOS
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#android"
                                type="button" role="tab" aria-controls="Android" aria-selected="false">Android
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#amazon"
                                type="button" role="tab" aria-controls="Amazon" aria-selected="false">Amazon
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane form-check fade show active" id="ios" role="tabpanel"
                         aria-labelledby="ios-tab">

                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <label for="ios">iOS Link Pay</label>
                                        </h5>
                                        <input class="form-control" type="text" required value="" id="ios_link_pay"
                                               name="platform">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <label for="ios">iOS Link Free</label>
                                        </h5>
                                        <input class="form-control" type="text" required value="" id="ios_link_free"
                                               name="platform">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Slot in select slider Pay</h5>
                                        <div style="display: none" id="select_slot_big_ios_slider_pay">
                                            <select class="form-control" id="slot_big_ios_slider_pay">
                                                @for($i=1;$i<=3;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div style="display: none" id="select_slot_small_ios_slider_pay">
                                            <select class="form-control" id="slot_small_ios_slider_pay">
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div id="warn_text_pay" class="alert alert-danger warn_text_pay">
                                            <p>Если вы видите этот текст то выберите тип слайдера</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Slot in select slider Free</h5>
                                        <div style="display: none" id="select_slot_big_ios_slider_free">
                                            <select class="form-control" id="slot_big_ios_slider_free">
                                                @for($i=1;$i<=3;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div style="display: none" id="select_slot_small_ios_slider_free">
                                            <select class="form-control" id="slot_small_ios_slider_free">
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div style id="warn_text_free" class="alert alert-danger warn_text_free">
                                            <p>Если вы видите этот текст то выберите тип слайдера</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane form-check fade" id="android" role="tabpanel" aria-labelledby="android-tab">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <label for="android">Android Link Pay</label>
                                        </h5>
                                        <input class="form-control" type="text" required value="" id="android_link_pay"
                                               name="platform">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <label for="android">android Link Free</label>
                                        </h5>
                                        <input class="form-control" type="text" required value="" id="android_link_free"
                                               name="platform">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Slot in select slider Pay</h5>
                                        <div style="display: none" id="select_slot_big_android_slider_pay">
                                            <select class="form-control" id="slot_big_android_slider_pay">
                                                @for($i=1;$i<=3;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div style="display: none" id="select_slot_small_android_slider_pay">
                                            <select class="form-control" id="slot_small_android_slider_pay">
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div id="warn_text_pay" class="alert alert-danger warn_text_pay">
                                            <p>Если вы видите этот текст то выберите тип слайдера</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Slot in select slider Free</h5>
                                        <div style="display: none" id="select_slot_big_android_slider_free">
                                            <select class="form-control" id="slot_big_ios_slider_free">
                                                @for($i=1;$i<=3;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div style="display: none" id="select_slot_small_android_slider_free">
                                            <select class="form-control" id="slot_small_ios_slider_free">
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div style id="warn_text_free" class="alert alert-danger warn_text_free">
                                            <p>Если вы видите этот текст то выберите тип слайдера</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane form-check fade" id="amazon" role="tabpanel" aria-labelledby="amazon-tab">
                        <label for="ios">Amazon Link Pay</label>
                        <input class="form-control" type="text" required value="" id="amazon_link_pay" name="platform">
                        <div class="card">
                            <div class="card-header">123</div>
                            <div class="card-body">321</div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        {{--        <fieldset class="version row mb-3">--}}
        {{--            <legend class="col-form-label col-sm-2 pt-0">Version</legend>--}}
        {{--            <div class="col-sm-10">--}}
        {{--                <div class="form-check">--}}

        {{--                    <input type="radio" required value="free" id="free" name="version">--}}
        {{--                    <label for="free">free</label>--}}
        {{--                </div>--}}
        {{--                <div class="form-check">--}}

        {{--                    <input type="radio" required value="premium" id="premium" name="version">--}}
        {{--                    <label for="premium">premium</label>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </fieldset>--}}

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
            <label for="formFile" class="form-label image">File input</label>
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
        let routeLinkCheck = '{{route('link-check')}}'
        let routeImageCheck = '{{route('image-check')}}'



    </script>
@endsection
