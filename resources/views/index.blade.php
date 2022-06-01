@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                @include('partials.add_tag')
                @include('partials.add_task')
                @include('partials.table')
                <div class="d-flex justify-content-center">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin9.js') }}"></script>
@endpush
