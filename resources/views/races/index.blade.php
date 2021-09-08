@extends('multi')

@section('content')
    <!-- Section Title -->
    <div class="section-title" style="background:url(img/headers/zavody.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Závody</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section Title -->
    <!-- Section Area - Content Central -->
    <section class="content-info">

        <div class="container paddings-mini">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table-striped table-responsive table-hover">
                        <thead>
                        <tr>
                            <th>Název závodu</th>
                            <th>Okruh</th>
                            <th>Datum</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($races as $race)
                        <tr>
                            <td>
                                <a style="color: black" href="races/{{ $race->slug }}">
                                    {{ $race->name }}
                                </a>
                            </td>
                            <td>

                                <img width="20" src="{{ asset('img/flags') }}/{{ $race->circuits->country }}.png" alt="">{{ $race->circuits->name }}

                            </td>
                            <td>
                                {{

                                    \Carbon\Carbon::parse($race->started_at)->format('d.m.Y') }}
                            </td>
                            <td>
                                <div style="color:green;">Nadcházející</div>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
    <!-- End Section Area -  Content Central -->

@endsection
