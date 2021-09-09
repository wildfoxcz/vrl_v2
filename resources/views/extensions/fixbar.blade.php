<!-- content Sidebar Center -->
<aside class="col-sm-6 col-lg-3 col-xl-3">
    <!-- Video presentation -->
    <div class="panel-box">
        <div class="titles no-margin">
            <h4>Název panelu</h4>
        </div>
        @include('extensions.stream')
    </div>
    <!-- End Video presentation-->
</aside>
<!-- End content Sidebar Center -->

<!-- content Sidebar Right -->
<aside class="col-sm-6 col-lg-3 col-xl-2">
    <!-- Adds Sidebar -->
    <div class="panel-box">
        <div class="titles no-margin">
            <h4>Discord</h4>
        </div>
        <a href="{{ url('/register') }}">
            <img src="img/adds/discord.jpg" class="img-responsive" alt="">
        </a>
    </div>
    <!-- End Adds Sidebar -->

</aside>
<!-- End content Sidebar Right -->
