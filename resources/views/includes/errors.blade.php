<div class="placeForMessage" id="placeForMessage">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {!! session()->get('message') !!}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {!! session()->get('error') !!}
        </div>
    @endif
    @if (!is_string($errors) and $errors->any())
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @elseif(is_string($errors))
        <div class="alert alert-danger">
            {{ $errors }}
        </div>
    @endif
</div>
