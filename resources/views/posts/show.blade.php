@extends('single')

@section('content')
<div class="container paddings-mini">
    <div class="row">
        <div class="col-lg-9">
            <!-- Content Text-->
            <div class="panel-box">
                <div class="titles no-margin">
                    <h4>{{ $post->title }}</h4>
                </div>
                <img width="945" height="300" src="{{ asset('images/posts')}}/{{ $post->image }}" alt="">
                <div class="info-panel">
                   <p>{!! $post->short_desc !!}</p>
                    <p>{!! $post->long_desc !!}</p>
                </div>
            </div>
            <!-- End Content Text-->

<!--             Comments
            <div class="panel-box">
                 Title Post
                <div class="titles">
                    <h4>Comments</h4>
                </div>
                 Title Post
                <ul  class="testimonials">
                    <li>
                        <blockquote><p>Lionel Messi and Cristiano Ronaldo will come face to face for the first time in the World Cup only if their two nations finish in the same position in the group phase, either first or second.!.</p>
                            <img src="img/testimonials/1.jpg" alt="">
                            <strong>Federic Gordon</strong><a href="#">@iwthemes</a></blockquote>
                    </li>
                    <li>
                        <blockquote><p>After two previous meetings on the big stage, it is honours even: Brazil won the Final of Korea/Japan 2002 2-0, while Germany recorded that famous victory at Brazil 2014!.</p>
                            <img src="img/testimonials/2.jpg" alt="">
                            <strong>Federic Gordon</strong><a href="#">@iwthemes</a></blockquote>
                    </li>
                    <li>
                        <blockquote><p>To help fire your imagination and let you see if there is a potential knockout match you might be tempted to buy tickets for, FIFA.com has come up with a list of possible last-16 and quarter-final duels between some of the game???s biggest attractions.!.</p>
                            <img src="img/testimonials/3.jpg" alt="">
                            <strong>Federic Gordon</strong><a href="#">@iwthemes</a></blockquote>
                    </li>
                </ul>
            </div>
             End Comments -->

<!--             Comment Form
            <div class="panel-box padding-b">
                 Title Post
                <div class="titles">
                    <h4>Publish Commnet</h4>
                </div>

                <div class="info-panel">
                     Form coment
                    <form class="form-theme">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Your name *</label>
                                <input type="text"  required="required" value="" maxlength="100" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-6">
                                <label>Your email address *</label>
                                <input type="email"  required="required" value="" maxlength="100" class="form-control" name="email" id="email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Comment *</label>
                                <textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment" style="height: 138px;" required="required" ></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                     End Form coment
                </div>
            </div>
             End Comment Form -->

        </div>
        <!-- Sidebars -->
        <aside class="col-lg-3">

            <!-- Widget Categories-->
            <div class="panel-box">
                <div class="titles no-margin">
                    <h4>Kategorie</h4>
                </div>
                <div class="info-panel">
                    <ul class="list">
                        @foreach($postcategories as $postcategory)
                            <li><i class="fa fa-check"></i><a href="#">{{ $postcategory->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- End Widget Categories-->

            <!-- Widget Text-->
            <div class="panel-box">
                <div class="titles no-margin">
                    <h4>Widget Text</h4>
                </div>
                <div class="info-panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore.</p>
                </div>
            </div>
            <!-- End Widget Text-->

            <!-- Widget img-->
            <div class="panel-box">
                <div class="titles no-margin">
                    <h4>Widget Image</h4>
                </div>
                <img src="img/slide/1.jpg" alt="">
                <div class="row">
                    <div class="info-panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  ut sit amet, consectetur adipisicing elit, labore et dolore.</p>
                    </div>
                </div>
            </div>
            <!-- End Widget img-->
        </aside>
        <!-- End Sidebars -->
    </div>
</div>
@endsection
