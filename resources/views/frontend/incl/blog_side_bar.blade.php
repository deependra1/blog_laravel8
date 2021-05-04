<div class="col-lg-4">

    <div class="sidebar">

        <h3 class="sidebar-title">Search</h3>
        <div class="sidebar-item search-form">
            <form action="">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End sidebar search formn-->

        <h3 class="sidebar-title">Categories</h3>
        <div class="sidebar-item categories">
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{ route('category', $category->slug) }}">{{ $category->title }} <span>({{ $category->posts->count() }})</span></a></li>
                @endforeach

            </ul>
        </div><!-- End sidebar categories-->

        <h3 class="sidebar-title">Recent Posts</h3>
        <div class="sidebar-item recent-posts">
            @foreach($recents as $recent)
                <div class="post-item clearfix">
                    <img src="{{ $recent->image }}" alt="">
                    <h4><a href="blog-single.html">{{ $recent->title }}</a></h4>
                    <time datetime="2020-01-01">{{ $recent->created_at->diffForHumans() }}</time>
                </div>
            @endforeach


        </div><!-- End sidebar recent posts-->

        <h3 class="sidebar-title">Tags</h3>
        <div class="sidebar-item tags">
            <ul>
                @foreach($tags as $tag)
                    <li><a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
        </div><!-- End sidebar tags-->

    </div><!-- End sidebar -->

</div><!-- End blog sidebar -->
