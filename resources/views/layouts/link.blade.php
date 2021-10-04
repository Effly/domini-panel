
@if ($error != 'no error')
    <div class="alert alert-danger">
        <p>Link has code {{$error}}</p>
    </div>
@else
    <div class="alert alert-success">
        <p>ALL RIGHT</p>
    </div>
@endif
