@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <h4 class="text-center">All tags</h4>
                @foreach($tags as $tag)
                    {{ $tag->name }}@if(!$loop->last){{ ', ' }}@endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
