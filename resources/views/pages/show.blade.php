@extends('single')

@section('content')
    <div class="col-lg-6 col-xl-7">
    <div class="panel-box">

        <div class="titles">
            <h4>{{ $page->title }}</h4>
        </div>
        <div class="info-panel">
            {{ $page->content }}
        </div>
    </div>
    </div>
@endsection

@section('sidebar')
    @include('extensions.sidebar')
@endsection


