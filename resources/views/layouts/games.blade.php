@foreach($all_games as $game)
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/'.$game->image_name)}}" class="card-img-top" alt="{{$game->tech_name}}">
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
                <p class="card-text"><small class="text-muted">Last updated {{$game->updated_at}}</small></p>
            </div>
        </div>
    </div>
@endforeach
{{$all_games->links()}}
