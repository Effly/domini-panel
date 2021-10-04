@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@else
    <div class="alert alert-success">
        <p>ALL RIGHT</p>
    </div>
@endif
