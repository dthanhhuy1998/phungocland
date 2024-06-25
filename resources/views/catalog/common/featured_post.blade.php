@if(count($featuredPosts) > 0)
    <div class="featured-link mt-3">
        <h2 class="heading">
            <span class="heading-icon"><i class="fa fa-th-list"></i></span>
            <span class="heading-title">Tin tức nổi bật</span>
        </h2>
        <ul class="post-sub">
            @foreach($featuredPosts as $post)
                <li>
                    <a href="{{ route('pages.getPostDetail', [$post->category->slug, $post->slug]) }}" title="{{ $post->title }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif