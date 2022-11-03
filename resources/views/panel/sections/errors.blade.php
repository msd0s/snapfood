<div class="main-content-label mg-b-20 mt-3">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger py-3" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    @if(Session::has('successMassage'))
        <div class="alert alert-success py-3" role="alert">
            {{ Session::get('successMassage') }}
        </div>
    @endif
    @if(Session::has('errorMassage'))
        <div class="alert alert-danger py-3" role="alert">
            {{ Session::get('errorMassage') }}
        </div>
    @endif
</div>
