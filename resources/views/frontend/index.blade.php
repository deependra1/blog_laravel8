@extends('frontend.layouts')

@section('hero')
    @isset($heros)
        @include('frontend.incl.hero')
    @endisset
@endsection

@section('content')
    @isset($title)
        @include('frontend.incl.breadcrumbs')
    @endisset
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    @foreach($posts as $post)
                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{ $post->image }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{ route('posts.display', $post->slug) }}">{{ $post->title }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">
                                    {{ $post->created_at->diffForHumans() }}</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {{ $post->excerpt }}
                            </p>
                            <div class="read-more">
                                <a href="{{ route('posts.display', $post->slug) }}">Read More</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                    @endforeach


                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            {{ $posts->links() }}
                        </ul>
                    </div>

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>

                </div><!-- End blog entries list -->

                @include('frontend.incl.blog_side_bar')

            </div>

        </div>
    </section><!-- End Blog Section -->
@endsection
