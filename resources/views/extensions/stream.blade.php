<!-- Locations Video -->
@foreach($streams as $stream)
<div class="row">
    <iframe width="560" height="315" src="{{ $stream->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div class="info-panel">
        <h4>{{ $stream->name }}</h4>
        <p>{{ $stream->description }}</p>
        <a href="">Zobrazit předcházející</a>
    </div>
</div>
@endforeach
<!-- End Locations Video -->
