<div class="blog-wrap vertical">
    <div class="bds-wrapper fuild">
        <h2 class="heading">
            <span class="heading-icon"><i class="fa fa-th-list"></i></span>
            <span class="heading-title">TIN TỨC QUAN TÂM</span>
        </h2>
        <div class="panel blog-container">
            <a href="{{ route('pages.getPostDetail', [$lastedMostViewPost->category->slug, $lastedMostViewPost->slug]) }}" class="post__main">
                <div class="post__main-image">
                    <img data-src="@if(!empty($lastedMostViewPost->image)) {{ asset('storage/'. $lastedMostViewPost->image) }} @else {{ asset('catalog/img/thumbail-default.jpg') }} @endif" src="{{ asset('catalog/img/loading.gif') }}" alt="{{ $lastedMostViewPost->title }}" class="lazy w-100">
                </div>
                <h3 class="post__main-title">{{ $lastedMostViewPost->title }}</h3>
            </a>
            @if(count($mostViewPosts) > 0)
                <ul class="post__sub">
                    @foreach($mostViewPosts as $post)
                        <li><a href="{{ route('pages.getPostDetail', [$post->category->slug, $post->slug]) }}" title="{{ $post->title }}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>