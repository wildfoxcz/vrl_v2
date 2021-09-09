<!-- content Sidebar Center -->
<aside class="col-sm-6 col-lg-3 col-xl-3">
    <!-- Video presentation -->
    <div class="panel-box">
        <div class="titles no-margin">
            <h4>Nadcházející vysílání</h4>
        </div>
        @include('extensions.stream')
    </div>
    <!-- End Video presentation-->

    <!-- Locations -->
    <div class="panel-box">
        <div class="titles no-margin">
            <h4>Okruhy</h4>
        </div>
        <!-- Locations Carousel -->
        <ul class="single-carousel">
            <li>
                <img src="{{ asset('img/locations/1.jpg') }}" alt="" class="img-responsive">
                <div class="info-single-carousel">
                    <h4>Saint Petersburg</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cillum dolore eu fugiat nulla  sit amet, consectetur adipisicing elit, pariatur.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cillum dolore eu fugiat nulla  sit amet, consectetur adipisicing elit, pariatur.</p>
                </div>
            </li>
        </ul>
        <!-- Locations Carousel -->
    </div>
    <!-- End Locations -->
</aside>
<!-- End content Sidebar Center -->

<!-- content Sidebar Right -->
<aside class="col-sm-6 col-lg-3 col-xl-2">
    <!-- Adds Sidebar -->
    <div class="panel-box">
        <div class="titles no-margin">
            <h4>Registrace</h4>
        </div>
        <a href="{{ url('/register') }}" >
            <img src="{{ asset('img/adds/registrace.jpg') }}" class="img-responsive" alt="">
        </a>
    </div>
    <!-- End Adds Sidebar -->

    <!-- Adds Sidebar -->
    <div class="panel-box">
        <div class="titles no-margin">
            <h4>Discord</h4>
        </div>
        <a href="https://discord.gg/aJGU4PE4YC" target="_blank">
            <img src="{{ asset('img/adds/discord.jpg') }}" class="img-responsive" alt="">
        </a>
    </div>
    <!-- End Adds Sidebar -->

</aside>
<!-- End content Sidebar Right -->
