@extends('catalog.common.layout')

@section('title', $title)

@section('content')
    <div class="breabcrum sm-hidden">
        <div class="container">
            <ul class="breabcrum-tag">
                @if($article->category->parent_id == 0)
                    <li><a href="{{ route('pages.getPostsByCategory', [$article->category->slug]) }}" class="active">{{ $article->category->name }}</a></li>
                @else
                    @php
                        $parent = App\Models\Category::where('id', $article->category->parent_id)->first();
                        $categories = App\Models\Category::where('parent_id', $article->category->parent_id)
                        ->get();
                    @endphp
                    @if(count($categories) > 0)
                        <li><a href="{{ route('pages.getPostsByCategory', [$parent->slug]) }}">{{ $parent->name }}</a></li>
                        @foreach($categories as $category)
                            <li>
                                <a 
                                    href="{{ route('pages.getPostsByCategory', [$category->slug]) }}" 
                                    @if($article->category_id == $category->id)
                                        class="active"
                                    @endif
                                >{{ $category->name }}</a>
                            </li>
                        @endforeach
                    @endif
                @endif
            </ul>
            @include('catalog.common.search_post')
        </div>
    </div>
    <div class="article-box">
        <div class="container">
            <div class="main-content">
                <div class="content__left">
                    <div class="panel panel-post pd-1">
                        <h1 class="heading-title">{{ $article->title }}</h1>
                        <span class="heading-date">{{ date_format(date_create($article->created_at), 'd/m/Y') }}</span> | 
                        <span class="heading-date">{{ number_format($article->view) }} lượt xem</span>
                        <div class="post-summary">
                            {!! $article->summary !!}
                        </div>
                        <div class="post-content">
                            {!! $article->content !!}
                        </div>
                    </div>
                    @if(count($relatedPosts) > 0)
                        <div class="related-news mt-3">
                            <h2 class="heading">
                                <span class="heading-icon"><i class="fa fa-th-list"></i></span>
                                <span class="heading-title">TIN TỨC MỚI NHẤT</span>
                            </h2>
                            <div class="related-container">
                                @foreach($relatedPosts as $post)
                                    <div class="related__item">
                                        <div class="related__item-image">
                                            <img data-src="@if(!empty($post->image)) {{ asset('storage/'. $post->image) }} @else {{ asset('catalog/img/thumbail-default.jpg') }} @endif" src="{{ asset('catalog/img/loading.gif') }}" alt="{{ $post->title }}" class="lazy w-100">
                                        </div>
                                        <a href="{{ route('pages.getPostDetail', [$post->category->slug, $post->slug]) }}" title="{{ $post->title }}" class="related__item-title">{{ $post->title }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="comment-container mt-3">
                        <h2 class="heading">
                            <span class="heading-icon"><i class="fa fa-comment"></i></span>
                            <span class="heading-title">Bình luận</span>
                        </h2>
                        <div class="comment-embed mb-3">
                            <div class="fb-comments" data-href="{{ route('pages.getPostDetail', [$article->category->slug, $article->slug]) }}" data-width="" data-numposts="5"></div>
                        </div>
                    </div>
                </div>
                <div class="content__right">
                    @include('catalog.common.register_mail')
                    @include('catalog.common.search-form')
                    @include('catalog.common.featured_post')
                    @include('catalog.common.most_view_post')
                    @include('catalog.common.featured_link')
                </div>
            </div>   
        </div>
    </div>
@endsection