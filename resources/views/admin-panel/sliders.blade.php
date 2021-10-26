@extends('layouts.app')

@section('title','Sliders')

@section('body')
    <h1>Sliders</h1>
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


    <div class="sort row row-cols-1 row-cols-md-3 g-4" style="border-bottom: #1a202c 1px solid">
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-header">First slide big</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="for_slide" class="form-label">Choose game:</label>
                            <select class="form-select" name="for_slide" id="">
                                @foreach($games_for_big as $game)
                                    @if($game->id == $first_big->game_id)
                                        <option selected value="{{$game->id}}">{{$game->name}}</option>
                                    @else
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="label" class="form-label">Choose label:</label>
                            <select class="form-select" name="label" id="label">
                                @if($first_big->label == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif

                                @if($first_big->label=='free')
                                    <option selected value="free">free</option>
                                @else
                                    <option value="free">free</option>
                                @endif
                            </select>
                            @if($first_big->label_img_path != NULL)
                                <img class="img-fluid" src="{{asset('storage/'.$first_big->label_img_path)}}" alt="">
                            @endif
                        </div>
                        <input type="hidden" value="first_big" name="slide">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-header">Second slide big</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="for_slide" class="form-label">Choose game:</label>
                            <select class="form-select" name="for_slide" id="">
                                @foreach($games_for_big as $game)
                                    @if($game->id == $second_big->game_id)
                                        <option selected value="{{$game->id}}">{{$game->name}}</option>
                                    @else
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="label" class="form-label">Choose label:</label>
                            <select class="form-select" name="label" id="label">
                                @if($second_big->label == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif

                                @if($second_big->label=='free')
                                    <option selected value="free">free</option>
                                @else
                                    <option value="free">free</option>
                                @endif
                            </select>
                            @if($second_big->label_img_path != NULL)
                                <img class="img-fluid" src="{{asset('storage/'.$second_big->label_img_path)}}" alt="">
                            @endif
                        </div>
                        <input type="hidden" value="second_big" name="slide">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h5 class="card-header">Third slide big</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="for_slide" class="form-label">Choose game:</label>
                            <select class="form-select" name="for_slide" id="">
                                @foreach($games_for_big as $game)
                                    @if($game->id == $third_big->game_id)
                                        <option selected value="{{$game->id}}">{{$game->name}}</option>
                                    @else
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="label" class="form-label">Choose label:</label>
                            <select class="form-select" name="label" id="label">
                                @if($third_big->label == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif

                                @if($third_big->label=='free')
                                    <option selected value="free">free</option>
                                @else
                                    <option value="free">free</option>
                                @endif
                            </select>
                            @if($third_big->label_img_path != NULL)
                                <img class="img-fluid" src="{{asset('storage/'.$third_big->label_img_path)}}" alt="">
                            @endif
                        </div>
                        <input type="hidden" value="third_big" name="slide">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <h2>
        <form action="{{route('update-speed')}}" method="post">
            @csrf
            <fieldset class="row mb-3 d-flex align-items-center">
                <legend class="col-form-label col-sm-2 pt-0">Small:</legend>
                <div class="col-sm-10 ">
                    <div class="form-check  input-group form-check">
                        <input type="text" name="speed" value="{{$speed_small}}" id="speed_big"
                               class="text form-control">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </fieldset>
        </form>
    </h2>
    <div class="sort row row-cols-1 row-cols-md-3 g-4" style="border-bottom: #1a202c 1px solid">
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">First slide small</h5>
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{--    {{dd($first_small)}}--}}
                    <div class="first card-body">
                        <div class="mb-3">
                            <label for="for_slide" class="form-label">Choose game:</label>
                            <select class="form-select" name="for_slide" id="for_slide">
                                @foreach($games_for_small as $game)
                                    @if($game->id == $first_small->game_id)
                                        <option selected value="{{$game->id}}">{{$game->name}}</option>
                                    @else
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="label" class="form-label">Choose label:</label>
                            <select class="form-select" name="label" id="label">
                                @if($first_small->label == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($first_small->label == 'top_rated')
                                    <option selected value="top_rated">top rated</option>
                                @else
                                    <option value="top_rated">top rated</option>
                                @endif
                                @if($first_small->label == 'hot_realese'))
                                <option selected value="hot_realese">hot realese</option>
                                @else
                                    <option value="hot_realese">hot realese</option>
                                @endif
                                @if($first_small->label == 'friends_favorite')
                                    <option selected value="friends_favorite">friends' favorite</option>
                                @else
                                    <option value="friends_favorite">friends' favorite</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rate" class="form-label">Choose label:</label>
                            <select class="form-select" name="rate" id="rate">
                                @if($first_small->rate == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($first_small->rate == 'free_small')
                                    <option selected value="free_small">free</option>
                                @else
                                    <option value="free_small">free</option>
                                @endif
                                @if($first_small->rate == 15)
                                    <option selected value="15">-15%</option>
                                @else
                                    <option value="15">-15%</option>
                                @endif
                                @if($first_small->rate == 25)
                                    <option selected value="25">-25%</option>
                                @else
                                    <option value="25">-25%</option>
                                @endif
                                @if($first_small->rate == 30)
                                    <option selected value="30">-30%</option>
                                @else
                                    <option value="30">-30%</option>
                                @endif
                                @if($first_small->rate == 40)
                                    <option selected value="40">-40%</option>
                                @else
                                    <option value="40">-40%</option>
                                @endif
                            </select>
                        </div>
                        @if($first_small->label_img_path != NULL)
                            <img class="img-fluid" src="{{asset('storage/'.$first_small->label_img_path)}}" alt="">
                        @endif
                        <input type="hidden" value="first_small" name="slide">
                        <input class="btn btn-primary" type="submit" value="Submit">
                        {{--        Submit slide--}}
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">Second slide small</h5>
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{--    {{dd($first_small)}}--}}
                    <div class="first card-body">
                        <div class="mb-3">
                            <label for="for_slide" class="form-label">Choose game:</label>
                            <select class="form-select" name="for_slide" id="for_slide">
                                @foreach($games_for_small as $game)
                                    @if($game->id == $second_small->game_id)
                                        <option selected value="{{$game->id}}">{{$game->name}}</option>
                                    @else
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="label" class="form-label">Choose label:</label>
                            <select class="form-select" name="label" id="label">
                                @if($second_small->label == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($second_small->label == 'top_rated')
                                    <option selected value="top_rated">top rated</option>
                                @else
                                    <option value="top_rated">top rated</option>
                                @endif
                                @if($second_small->label == 'hot_realese'))
                                <option selected value="hot_realese">hot realese</option>
                                @else
                                    <option value="hot_realese">hot realese</option>
                                @endif
                                @if($second_small->label == 'friends_favorite')
                                    <option selected value="friends_favorite">friends' favorite</option>
                                @else
                                    <option value="friends_favorite">friends' favorite</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rate" class="form-label">Choose rate:</label>
                            <select class="form-select" name="rate" id="rate">
                                @if($second_small->rate == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($second_small->rate == 'free_small')
                                    <option selected value="free_small">free</option>
                                @else
                                    <option value="free_small">free</option>
                                @endif
                                @if($second_small->rate == 15)
                                    <option selected value="15">-15%</option>
                                @else
                                    <option value="15">-15%</option>
                                @endif
                                @if($second_small->rate == 25)
                                    <option selected value="25">-25%</option>
                                @else
                                    <option value="25">-25%</option>
                                @endif
                                @if($second_small->rate == 30)
                                    <option selected value="30">-30%</option>
                                @else
                                    <option value="30">-30%</option>
                                @endif
                                @if($second_small->rate == 40)
                                    <option selected value="40">-40%</option>
                                @else
                                    <option value="40">-40%</option>
                                @endif
                            </select>
                        </div>
                        @if($second_small->label_img_path != NULL)
                            <img class="img-fluid" src="{{asset('storage/'.$second_small->label_img_path)}}" alt="">
                        @endif
                        <input type="hidden" value="second_small" name="slide">
                        <input class="btn btn-primary" type="submit" value="Submit">
                        {{--        Submit slide--}}
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">Third slide big</h5>
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{--    {{dd($first_small)}}--}}
                    <div class="first card-body">
                        <div class="mb-3">
                            <label for="for_slide" class="form-label">Choose label:</label>
                            <select class="form-select" name="for_slide" id="for_slide">
                                @foreach($games_for_small as $game)
                                    @if($game->id == $third_small->game_id)
                                        <option selected value="{{$game->id}}">{{$game->name}}</option>
                                    @else
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="label" class="form-label">Choose label:</label>
                            <select class="form-select" name="label" id="label">
                                @if($third_small->label == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($third_small->label == 'top_rated')
                                    <option selected value="top_rated">top rated</option>
                                @else
                                    <option value="top_rated">top rated</option>
                                @endif
                                @if($third_small->label == 'hot_realese'))
                                <option selected value="hot_realese">hot realese</option>
                                @else
                                    <option value="hot_realese">hot realese</option>
                                @endif
                                @if($third_small->label == 'friends_favorite')
                                    <option selected value="friends_favorite">friends' favorite</option>
                                @else
                                    <option value="friends_favorite">friends' favorite</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rate" class="form-label">Choose rate:</label>
                            <select class="form-select" name="rate" id="rate">
                                @if($third_small->rate == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($third_small->rate == 'free_small')
                                    <option selected value="free_small">free</option>
                                @else
                                    <option value="free_small">free</option>
                                @endif
                                @if($third_small->rate == 15)
                                    <option selected value="15">-15%</option>
                                @else
                                    <option value="15">-15%</option>
                                @endif
                                @if($third_small->rate == 25)
                                    <option selected value="25">-25%</option>
                                @else
                                    <option value="25">-25%</option>
                                @endif
                                @if($third_small->rate == 30)
                                    <option selected value="30">-30%</option>
                                @else
                                    <option value="30">-30%</option>
                                @endif
                                @if($third_small->rate == 40)
                                    <option selected value="40">-40%</option>
                                @else
                                    <option value="40">-40%</option>
                                @endif
                            </select>
                        </div>
                        @if($third_small->label_img_path != NULL)
                            <img class="img-fluid" src="{{asset('storage/'.$third_small->label_img_path)}}" alt="">
                        @endif
                        <input type="hidden" value="third_small" name="slide">
                        <input class="btn btn-primary" type="submit" value="Submit">
                        {{--        Submit slide--}}
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">Fourth slide small</h5>
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="first card-body">
                        <div class="mb-3">
                            <label for="for_slide" class="form-label">Choose game:</label>
                            <select class="form-select" name="for_slide" id="for_slide">
                                @foreach($games_for_small as $game)
                                    @if($game->id == $fourth_small->game_id)
                                        <option selected value="{{$game->id}}">{{$game->name}}</option>
                                    @else
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="label" class="form-label">Choose label:</label>
                            <select class="form-select" name="label" id="label">

                                @if($fourth_small->label == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($fourth_small->label == 'top_rated')
                                    <option selected value="top_rated">top rated</option>
                                @else
                                    <option value="top_rated">top rated</option>
                                @endif
                                @if($fourth_small->label == 'hot_realese'))
                                <option selected value="hot_realese">hot realese</option>
                                @else
                                    <option value="hot_realese">hot realese</option>
                                @endif
                                @if($fourth_small->label == 'friends_favorite')
                                    <option selected value="friends_favorite">friends' favorite</option>
                                @else
                                    <option value="friends_favorite">friends' favorite</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rate" class="form-label">Choose rate:</label>
                            <select class="form-select" name="rate" id="rate">
                                @if($fourth_small->rate == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($fourth_small->rate == 'free_small')
                                    <option selected value="free_small">free</option>
                                @else
                                    <option value="free_small">free</option>
                                @endif
                                @if($fourth_small->rate == 15)
                                    <option selected value="15">-15%</option>
                                @else
                                    <option value="15">-15%</option>
                                @endif
                                @if($fourth_small->rate == 25)
                                    <option selected value="25">-25%</option>
                                @else
                                    <option value="25">-25%</option>
                                @endif
                                @if($fourth_small->rate == 30)
                                    <option selected value="30">-30%</option>
                                @else
                                    <option value="30">-30%</option>
                                @endif
                                @if($fourth_small->rate == 40)
                                    <option selected value="40">-40%</option>
                                @else
                                    <option value="40">-40%</option>
                                @endif
                            </select>
                        </div>
                        @if($fourth_small->label_img_path != NULL)
                            <img class="img-fluid" src="{{asset('storage/'.$fourth_small->label_img_path)}}" alt="">
                        @endif
                        <input type="hidden" value="fourth_small" name="slide">
                        <input class="btn btn-primary" type="submit" value="Submit">
                        {{--        Submit slide--}}
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">Fifth slide small</h5>
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{--    {{dd($first_small)}}--}}
                    <div class="first card-body">
                        <div class="mb-3">
                            <label for="for_slide" class="form-label">Choose game:</label>
                            <select class="form-select" name="for_slide" id="for_slide">
                                @foreach($games_for_small as $game)
                                    @if($game->id == $fifth_small->game_id)
                                        <option selected value="{{$game->id}}">{{$game->name}}</option>
                                    @else
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="label" class="form-label">Choose label:</label>
                            <select class="form-select" name="label" id="label">
                                @if($fifth_small->label == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($fifth_small->label == 'top_rated')
                                    <option selected value="top_rated">top rated</option>
                                @else
                                    <option value="top_rated">top rated</option>
                                @endif
                                @if($fifth_small->label == 'hot_realese'))
                                <option selected value="hot_realese">hot realese</option>
                                @else
                                    <option value="hot_realese">hot realese</option>
                                @endif
                                @if($fifth_small->label == 'friends_favorite')
                                    <option selected value="friends_favorite">friends' favorite</option>
                                @else
                                    <option value="friends_favorite">friends' favorite</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rate" class="form-label">Choose rate:</label>
                            <select class="form-select" name="rate" id="rate">
                                @if($fifth_small->rate == NULL)
                                    <option selected value="NULL">not selected</option>
                                @else
                                    <option value="NULL">not selected</option>
                                @endif
                                @if($fifth_small->rate == 'free_small')
                                    <option selected value="free_small">free</option>
                                @else
                                    <option value="free_small">free</option>
                                @endif
                                @if($fifth_small->rate == 15)
                                    <option selected value="15">-15%</option>
                                @else
                                    <option value="15">-15%</option>
                                @endif
                                @if($fifth_small->rate == 25)
                                    <option selected value="25">-25%</option>
                                @else
                                    <option value="25">-25%</option>
                                @endif
                                @if($fifth_small->rate == 30)
                                    <option selected value="30">-30%</option>
                                @else
                                    <option value="30">-30%</option>
                                @endif
                                @if($fifth_small->rate == 40)
                                    <option selected value="40">-40%</option>
                                @else
                                    <option value="40">-40%</option>
                                @endif
                            </select>
                        </div>
                        @if($fifth_small->label_img_path != NULL)
                            <img class="img-fluid" src="{{asset('storage/'.$fifth_small->label_img_path)}}" alt="">
                        @endif
                        <input type="hidden" value="fifth_small" name="slide">
                        <input class="btn btn-primary" type="submit" value="Submit">
                        {{--        Submit slide--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
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
