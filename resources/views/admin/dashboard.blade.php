@extends('admin.layout.base')
@section('content')
    <div class="col-12">
        Hello {{$title}}

        @if (Session::has('success'))

        {{ Session::get('success') }}

        @endif
    </div>
@endsection
