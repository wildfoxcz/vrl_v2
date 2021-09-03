@extends('multi')

@section('content')
<!-- Section Title -->
<div class="section-title" style="background:url(img/headers/reg_jezdci.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Registrovaní jezdci</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Section Title -->

<!-- Section Area - Content Central -->
<section class="content-info">

    <div class="container padding-top">
        <div class="row portfolioContainer">
            @foreach($users as $user)
            <!-- Item Player -->
            <div class="col-xl-3 col-lg-4 col-md-6 forward">
                <div class="item-player">
                    <div class="head-player">
                        <img src="img/avatars/{{ $user->user_detail->image }}" alt="location-team">
                        <div class="overlay"><a href="{{ url('users') }}/{{ $user->name }}">+</a></div>
                    </div>
                    <div class="info-player">
                    <!--                                    <span class="number-player">
                                        13
                                    </span>-->
                        <h4>
                            {{ $user->name }}
                        </h4>
                        <ul>
                            <li><strong>Jméno:</strong> <span>{{ $user->user_detail->name }}</span></li>
                            <li>
                                <strong>Město</strong> <span><img src="assets/flags/{{ $user->user_detail->country }}.jpg" alt="" /> {{ $user->user_detail->city }} </span>
                            </li>
                            <li><strong>Rok narození</strong> <span>{{ $user->user_detail->birthday }}</span></li>
                        </ul>
                    </div>
                    <a href="{{ url('users') }}/{{ $user->name }}" class="btn">Zobrazit jezdce<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- End Item Player -->
            @endforeach
        </div>
    </div>
    </section>
<!-- End Section Area -  Content Central -->
@endsection
