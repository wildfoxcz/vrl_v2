@extends('multi')

@section('content')
    <!-- Section Title -->
    <div class="section-title single-result" style="background:url({{ asset('img/circuits') }}/{{-- @todo --}})">
        <div class="container">
            <div class="row">
                <!-- Result Location -->
                <div class="col-lg-12">
                    <div class="result-location">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Result Location -->

            <!-- Result -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="team">

                    </div>
                </div>



            </div>
            <!-- End Result -->

        </div>
    </div>
    <!-- End Section Title -->

    <!-- Section Area - Content Central -->
    <section class="content-info">

        <!-- Single Team Tabs -->
        <div class="single-team-tabs">
            <div class="container">
                <div class="row">
                    <!-- Left Content - Tabs and Carousel -->
                    <div class="col-xl-12 col-md-12">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#summary" data-toggle="tab">O Závodu</a></li>
                            <li><a href="#stats" data-toggle="tab">Výsledky</a></li>
                        </ul>
                        <!-- End Nav Tabs -->
                    </div>

                    <div class="col-lg-12">
                        <!-- Content Tabs -->
                        <div class="tab-content">
                            <!-- Tab One - Sumary -->
                            <div class="tab-pane active" id="summary">

                                <div class="panel-box padding-b">
                                    <div class="titles">
                                        <h4>O Závodu</h4>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>

                                <!--Items Club News -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="clear-title">Match News</h3>
                                    </div>

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">World football's dates.</a></h4>
                                            </div>
                                            <a href="#"><img src="img/blog/1.jpg" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Fans from all around the world can apply for 2018 FIFA World Cup™ tickets as the first window of sales.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Mbappe’s year to remember</a></h4>
                                            </div>
                                            <a href="#"><img src="img/blog/2.jpg" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Tickets may be purchased online by using Visa payment cards or Visa Checkout. Visa is the official.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Egypt are one family</a></h4>
                                            </div>
                                            <a href="#"><img src="img/blog/3.jpg" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Successful applicants who have applied for supporter tickets and conditional supporter tickets will.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Egypt are one family</a></h4>
                                            </div>
                                            <a href="#"><img src="img/blog/4.jpg" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Successful applicants who have applied for supporter tickets and conditional supporter tickets will.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                </div>
                                <!--End Items Club News -->

                            </div>
                            <!-- Tab One - Sumary -->

                            @auth
                                @if($championship->users->contains(auth()->user()))
                                    Jsi přihlášen v šampionátu
                                @else
                                    <a href="{{ route('championships.join', $championship) }}" class="btn btn-primary">Přihlásit se do šampionátu</a>
                                @endif
                            @endauth

                            <!-- Tab Two - stats -->
                            <div class="tab-pane" id="stats">
                                {{--dd($championship)--}}
                                <!-- Result -->
                                <div class="row match-stats">
                                    <table>
                                        <tr>
                                            <td>Tým</td>
                                        
                                            @for($i = 1; $championship->races && $i <= $championship->races->count(); $i++)
                                                <td>R{{ $i }}</td>
                                            @endfor
                                            <td>Záporné</td>
                                            <td>Celekem</td>
                                        </tr>

                                        @foreach($teams as $team)
                                            <tr>
                                                <td>{{ $team->name }}</td>
                                                @foreach($championship->races as $race)
                                                    <td>{{$race->sumTeamPoints($team)}}</td>
                                                @endforeach
                                                <td>{{$championship->sumTeamPenaltyPoints($team)}}</td>
                                                <td>{{$championship->sumTeamPoints($team)}}</td>
                                            </tr>
                                            @foreach($team->users as $user)
                                                <td>{{ $user->name }}</td>
                                                @foreach($championship->races as $race)
                                                <td>
                                                    @if($userRace = $race->users()->where('id', $user->id)->first())
                                                        {{ $userRace->pivot->points }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                @endforeach
                                            @endforeach
                                            <td>{{ $championship->sumUserPenaltyPoints($user) }}</td>
                                            <td>{{ $championship->sumUserPoints($user) }}</td>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- End Result -->
                            </div>
                            <!-- End Tab Two - stats -->
                        </div>
                        <!-- Content Tabs -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Single Team Tabs -->
    </section>
    <!-- End Section Area -  Content Central -->
@endsection
