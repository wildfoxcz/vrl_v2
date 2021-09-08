@extends('master')

@section('content')
                <!-- content Column Left -->
                <div class="col-lg-6 col-xl-7">
                    <!-- Recent Post -->
                    <div class="panel-box">

                        <div class="titles">
                            <h4>Aktuality</h4>
                        </div>
                        @foreach ($posts as $post)
                        <!-- Post Item -->
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-hover">
                                        <img src="images/posts/{{ $post->image }}" alt="" class="img-responsive">
                                        <div class="overlay"><a href="}<a href="{{ url('post') }}/{{ $post->slug }}">">+</a></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5 style="font-family: Segoe UI;"><a href="<a href="{{ url('post') }}/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                    <span class="data-info">{{ $post->created_at->format('d. m Y') }}  / <i class="fa fa-comments"></i><a href="#">0</a></span>
                                    <p>{{ $post->short_desc }}<a href="{{ url('post') }}/{{ $post->slug }}">Číst více [+]</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Item -->
                        @endforeach
                    </div>
                    <!-- End Recent Post -->
                </div>
                <!-- End content Left -->
@endsection

@section('sidebar')
               @include('extensions.sidebar')
@endsection
