@extends('layouts.app')

@section('title','Main')

@section('body')

    <a href="https://moregamesdmg.com/public/index.php/test/moregames?platform=ios&version=premium">ios premium</a>
    <br>
    <a href="https://moregamesdmg.com/public/index.php/test/moregames?platform=ios&version=free">ios free</a><br>
    <a href="https://moregamesdmg.com/public/index.php/test/moregames?platform=android&version=premium"> android premium</a>
    <br>
    <a href="https://moregamesdmg.com/public/index.php/test/moregames?platform=android&version=free"> android free</a>
    <br>
    <a href="https://moregamesdmg.com/public/index.php/test/moregames?platform=amazone&version=free"> amazon free</a>
    <br>
    <a href="https://moregamesdmg.com/public/index.php/test/moregames?platform=amazone&version=premium"> amazon premium</a>
    <br>

    <div class="sort row row-cols-1 row-cols-md-3 g-4" style="border-bottom: #1a202c 1px solid">
        <div class="container-fluid d-flex align-items-center">
            <form class="d-flex">
                <input class="form-control  me-2" data="sort" type="search" name="search_text" placeholder="Search"
                       aria-label="Search">

            </form>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">Platform</h5>
                <div class="card-body">
                    <p class="card-text">
                        <input type="checkbox" data="sort" value="ios" id="ios" name="platform">
                        <label for="ios">iOS</label>
                        <input type="checkbox" data="sort" value="android" id="android" name="platform">
                        <label for="android">Android</label>
                        <input type="checkbox" data="sort" value="amazone" id="amazone" name="platform">
                        <label for="amazone">Amazone</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">Version</h5>
                <div class="card-body">
                    <p class="card-text">
                        <input type="radio" data="sort" value="free" id="free" name="version">
                        <label for="free">free</label>
                        <input type="radio" data="sort" value="premium" id="premium" name="version">
                        <label for="premium">premium</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">Slider</h5>
                <div class="card-body">
                    <p class="card-text">
                        <input type="radio" data="sort" value="big" id="big" name="slider">
                        <label for="big">big</label>
                        <input type="radio" data="sort" value="small" id="small" name="slider">
                        <label for="small">small</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">Published</h5>
                <div class="card-body">
                    <p class="card-text">
                        <input type="radio" data="sort" value="yes" id="yes" name="published">
                        <label for="yes">yes</label>
                        <input type="radio" data="sort" value="no" id="no" name="published">
                        <label for="no">no</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class=" card text-dark bg-light mb-3" style="max-width: 18rem;">
                <h5 class="card-header">Sort by date</h5>
                <div class="card-body">
                    <p class="card-text">
                        <input type="radio" data="sort" value="desc" id="desc" name="sort_date">
                        <label for="DESC">nearest date</label>
                        <input type="radio" data="sort" value="asc" id="asc" name="sort_date">
                        <label for="DESC">distant date</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="col justify-content-end">
            <button type="button" onclick="removeCheck()" class="btn btn-primary">Clear</button>
            <br>
            <br>
            <br>
        </div>

    </div>
    <br>

    <div class="row row-cols-1 row-cols-md-3 g-4" id="games">
{{--        <div id="games">--}}
            @foreach($all_games as $game)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/'.$game->image_name)}}" class="card-img-top"
                             alt="{{$game->tech_name}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$game->tech_name}}</h5>
                            <p class="card-text">{{$game->name}}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$game->slider}} slider</li>
                                <li class="list-group-item">{{$game->published}} published</li>
                                <li class="list-group-item">{{$game->version}} version</li>
                                <li class="list-group-item">{{$game->platform}} platform</li>
                            </ul>
                            <div class="card-body">
                                <a href="{{route('show',['id'=>$game->id])}}" class="card-link">edit</a>
                                <a href="{{route('delete',['id'=>$game->id])}}" class="card-link">delete</a>
                            </div>
                            <p class="card-text"><small class="text-muted">Last updated {{$game->updated_at}}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$all_games->links()}}
{{--        </div>--}}
    </div>

@endsection

@section('script')
    <script>
        {{--let routeSearch = "{{route('search')}}"--}}
        let route = "{{route('root')}}"
    </script>
@endsection
