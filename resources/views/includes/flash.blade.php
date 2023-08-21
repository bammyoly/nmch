@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li style="list-style-type: none;">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert"
        aria-hidden="true">
        &times;
        </button>
        {{ session('status') }}
    </div>
@endif