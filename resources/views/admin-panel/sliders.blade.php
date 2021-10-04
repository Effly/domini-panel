@extends('layouts.app')

@section('title','Sliders')

@section('body')
    <h1>Sliders</h1>
    @if (session()->has('update'))
        <div class="alert alert-success">
            <ul>
                <li>{!! session()->get('update') !!}</li>
            </ul>
        </div>
    @endif
    <h2>
        <form action="{{route('update-speed')}}" method="post">
            @csrf
            big
            <input type="text" name="speed" value="{{$speed_big}}" class="text">
            <input type="hidden" name="slider" value="big">
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </h2>

    <div class="sort row row-cols-1 row-cols-md-3 g-4" style="border-bottom: #1a202c 1px solid">
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-header">First slide big</h5>
                    <select name="for_slide" id="">
                        @foreach($games_for_big as $game)
                            @if($game->id == $first_big->game_id)
                                <option selected value="{{$game->id}}">{{$game->name}}</option>
                            @else
                                <option value="{{$game->id}}">{{$game->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    {{--                    <select name="label" id="">--}}
                    {{--                            <option>not selected</option>--}}
                    {{--                            <option value="top_rated">top rated</option>--}}
                    {{--                            <option value="hot_realese">hot realese</option>--}}
                    {{--                            <option value=" friends_favorite">friends' favorite</option>--}}
                    {{--                        </select>--}}
                    @if($first_big->label_img_path != NULL)
                        <img class="img-fluid" src="{{asset('storage/'.$first_small->label_img_path)}}" alt="">
                    @endif
                    <input type="hidden" value="first_big" name="slide">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-header">Second slide big</h5>
                    <select name="for_slide" id="">
                        @foreach($games_for_big as $game)
                            @if($game->id == $second_big->game_id)
                                <option selected value="{{$game->id}}">{{$game->name}}</option>
                            @else
                                <option value="{{$game->id}}">{{$game->name}}</option>
                            @endif

                        @endforeach
                    </select>
                    {{--                    <select name="label" id="">--}}
                    {{--                            <option>not selected</option>--}}
                    {{--                            <option value="top_rated">top rated</option>--}}
                    {{--                            <option value="hot_realese">hot realese</option>--}}
                    {{--                            <option value=" friends_favorite">friends' favorite</option>--}}
                    {{--                        </select>--}}
                    @if($second_big->label_img_path != NULL)
                        <img class="img-fluid" src="{{asset('storage/'.$second_big->label_img_path)}}" alt="">
                    @endif
                    <input type="hidden" value="second_big" name="slide">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-header">Third slide big</h5>
                    <select name="for_slide" id="">
                        @foreach($games_for_big as $game)
                            @if($game->id == $third_big->game_id)
                                <option selected value="{{$game->id}}">{{$game->name}}</option>
                            @else
                                <option value="{{$game->id}}">{{$game->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    {{--                    <select name="label" id="">--}}
                    {{--                            <option>not selected</option>--}}
                    {{--                            <option value="top_rated">top rated</option>--}}
                    {{--                            <option value="hot_realese">hot realese</option>--}}
                    {{--                            <option value=" friends_favorite">friends' favorite</option>--}}
                    {{--                        </select>--}}
                    @if($third_big->label_img_path != NULL)
                        <img class="img-fluid" src="{{asset('storage/'.$third_big->label_img_path)}}" alt="">
                    @endif
                    <input type="hidden" value="third_big" name="slide">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <h2>
        <form action="{{route('update-speed')}}" method="post">
            @csrf
            small
            <input type="text" name="speed" value="{{$speed_small}}" class="text">
            <input type="hidden" name="slider" value="small">
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </h2>
    <div class="sort row row-cols-1 row-cols-md-3 g-4" style="border-bottom: #1a202c 1px solid">
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">First slide small</h5>
                <form action="{{route('update-slide')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{--    {{dd($first_small)}}--}}
                    <div class="first">
                        <select name="for_slide" id="">
                            @foreach($games_for_small as $game)
                                @if($game->id == $first_small->game_id)
                                    <option selected value="{{$game->id}}">{{$game->name}}</option>
                                @else
                                    <option value="{{$game->id}}">{{$game->name}}</option>
                                @endif

                            @endforeach
                        </select>
                        <select name="label" id="">
                            <option>not selected</option>
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
                        <select name="rate" id="">
                            @if($first_small->rate == NULL)
                                <option selected value="NULL">not selected</option>
                            @else
                                <option value="NULL">not selected</option>
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
                    <div class="first">
                        <select name="for_slide" id="">
                            @foreach($games_for_small as $game)
                                @if($game->id == $second_small->game_id)
                                    <option selected value="{{$game->id}}">{{$game->name}}</option>
                                @else
                                    <option value="{{$game->id}}">{{$game->name}}</option>
                                @endif

                            @endforeach
                        </select>
                        <select name="label" id="">
                            <option>not selected</option>
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
                        <select name="rate" id="">
                            @if($second_small->rate == NULL)
                                <option selected value="NULL">not selected</option>
                            @else
                                <option value="NULL">not selected</option>
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
                    <div class="first">
                        <select name="for_slide" id="">
                            @foreach($games_for_small as $game)
                                @if($game->id == $third_small->game_id)
                                    <option selected value="{{$game->id}}">{{$game->name}}</option>
                                @else
                                    <option value="{{$game->id}}">{{$game->name}}</option>
                                @endif

                            @endforeach
                        </select>

                        <select name="label" id="">
                            <option>not selected</option>
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
                        <select name="rate" id="">
                            @if($third_small->rate == NULL)
                                <option selected value="NULL">not selected</option>
                            @else
                                <option value="NULL">not selected</option>
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
                    {{--    {{dd($first_small)}}--}}
                    <div class="first">
                        <select name="for_slide" id="">
                            @foreach($games_for_small as $game)
                                @if($game->id == $fourth_small->game_id)
                                    <option selected value="{{$game->id}}">{{$game->name}}</option>
                                @else
                                    <option value="{{$game->id}}">{{$game->name}}</option>
                                @endif
                            @endforeach
                        </select>

                        <select name="label" id="">
                            <option>not selected</option>
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
                        <select name="rate" id="">
                            @if($fourth_small->rate == NULL)
                                <option selected value="NULL">not selected</option>
                            @else
                                <option value="NULL">not selected</option>
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
                    <div class="first">
                        <select name="for_slide" id="">
                            @foreach($games_for_small as $game)
                                @if($game->id == $fifth_small->game_id)
                                    <option selected value="{{$game->id}}">{{$game->name}}</option>
                                @else
                                    <option value="{{$game->id}}">{{$game->name}}</option>
                                @endif

                            @endforeach
                        </select>
                        <select name="label" id="">
                            <option selected value="NULL">not selected</option>
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
                        <select name="rate" id="">
                            @if($fifth_small->rate == NULL)
                                <option selected value="NULL">not selected</option>
                            @else
                                <option value="NULL">not selected</option>
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
    <h2>
        label settings
    </h2>
    <div class="sort row row-cols-1 row-cols-md-3 g-4" style="border-bottom: #1a202c 1px solid">
        @foreach($labels as $key => $value)
            <div class="col">
                <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <h5 class="card-header">{{$key}}</h5>
                    <form action="{{route('update-label')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="label_name" value="{{$key}}">
                        @if($value)
                            <img class="img-fluid" src="{{asset('storage/labels/'.$key.'/'.$key.'.png')}}"
                                 alt="{{$key}}">
                        @endif
                        <input type="file" class="form-control" name="img">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
