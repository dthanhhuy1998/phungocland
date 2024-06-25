
@extends('catalog.common.layout')

@section('content')
    @if(count($slides) > 0)
        <div class="slide">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @php $slideCount1 = 0; @endphp
                    @foreach($slides as $slide)
                        @php $slideCount1++; @endphp
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $slideCount1 }}" @if($slideCount1 == 1) class="active" @endif aria-current="true" aria-label="Slide 1"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @php $slideCount2 = 0; @endphp
                    @foreach($slides as $slide)
                        @php $slideCount2++; @endphp
                        <div class="carousel-item @if($slideCount2 == 1) active @endif">
                            <img src="@if(empty($slide->image)) {{ asset('catalog/img/thumbail-default.jpg') }} @else {{ asset('storage/'. $slide->image) }} @endif" alt="{{ $slide->title }}" width="100%" />
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    @endif
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="form-search">
                        <h1 class="heading inline">
                            <span>Tìm kiếm bất động sản</span>
                        </h1>
						<div style="display: none;"><a href="https://babynamedetails.com" rel="dofollow">Daftar gacor maxwin</a> <a href="https://jaw6.com" rel="dofollow">cara gacor 2023</a> <a href="https://mrviau.com" rel="dofollow">Game online server thailand</a> <a href="https://palmalaguna.com" rel="dofollow">Agen situs game online</a> <a href="https://ridgewatercollege.com" rel="dofollow">Slot Gacor 2023</a> <a href="https://servergacorx500.com" rel="dofollow">Slots thailand</a> <a href="https://wgendo.com" rel="dofollow">Agen situ game online</a> <a href="https://jobpick.com" rel="dofollow">superwin500</a> <a href="https://king-services.com" rel="dofollow">superwin500</a> <a href="https://dunnellonmarine.com" rel="dofollow">superwin500</a> <a href="https://mcclanmuse.com" rel="dofollow">superwin500</a> <a href="https://theseths.com" rel="dofollow">sorbet666</a> <a href="https://daftarakunmaster.com" rel="dofollow">sorbet666</a> <a href="https://agenslotterbaru2023.com" rel="dofollow">sorbet666</a></div>
                        <form action="{{ route('pages.filters') }}" method="GET">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa liên quan đến dự án bạn cần tìm?">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <select class="form-control" name="type" id="loai_bds" required="required">
                                            <option value="">-- Chọn loại nhà đất --</option>
                                            <option value="sale">Nhà đất bán</option>
                                            <option value="rent">Nhà đất cho thuê</option>
                                            <option value="project">Dự án</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control xs-mb-2" name="category" id="danh_muc_bds">
                                            <option value="">-- Danh mục nhà đất --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control xs-mb-2" name="province" id="province">
                                            <option value="">-- Tỉnh/TP --</option>
                                            @foreach($provinces as $province)
                                                <option value="{{ $province->matp }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control xs-mb-2" name="district" id="district">
                                            <option value="">-- Quận/Huyện --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn-search blue"><i class="fa fa-search"></i> Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-md-12">
                    <div class="main-content">
                        <div class="content__left">
                            <div class="lasted-post">
                                <div class="lasted-post__main">
                                    <div class="main-post">
                                        @if(count($lastedArticle) > 0)
                                            <div class="owl-carousel owl-post">
                                                @foreach($lastedArticle as $article)
                                                    <div class="item">
                                                        <div class="post-card">
                                                            <div class="post-card__image">
                                                                <img data-src="@if(!empty($article->a_image)) {{ asset('storage/'. $article->a_image) }} @else {{ asset('catalog/img/thumbail-default.jpg') }} @endif" src="{{ asset('catalog/img/loading.gif') }}" class="lazy w-100" alt="{{ $article->title }}">
                                                            </div>
                                                            <a href="{{ route('pages.getPostDetail', [$article->c_slug, $article->a_slug]) }}" class="post-link">{{ $article->title }}</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="lasted-post__sub">
                                    <ul class="post-sub">
                                        @foreach($lastedArticle as $article)
                                            <li>
                                                <a href="{{ route('pages.getPostDetail', [$article->c_slug, $article->a_slug]) }}" title="{{ $article->title }}">
                                                    @if(strlen($article->title) > 55)
                                                        {{ mb_substr($article->title, 0, 55, 'utf-8') .'..' }}
                                                    @else
                                                        {{ $article->title }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <section class="featured">
                                @if(count($sales) > 0)
                                    <div class="bds-wrapper">
                                        <h2 class="heading">
                                            <span class="heading-icon"><i class="fa fa-th-list"></i></span>
                                            <span class="heading-title">Bất động sản bán</span>
                                        </h2>
                                        @foreach($sales as $sale)
                                            <div class="bds-item">
                                                <div class="bds-item-img">
                                                    <img data-src="@if(!empty($sale->image)) {{ asset('storage/'. $sale->image) }} @else {{ asset('catalog/img/thumbail-default.jpg') }} @endif" src="{{ asset('catalog/img/loading.gif') }}" class="lazy w-100">
                                                    <div class="bds-item-img-icon">
                                                        <i class="fa-solid fa-image"></i>
                                                    </div>
                                                </div>
                                                <div class="bds-item-content">
                                                    <h2 class="bds-item-content-title">
                                                        <a href="{{ route('pages.getReaLEstateSaleDetail', [$sale->category->slug, $sale->slug]) }}" title="{{ $sale->title }}">{{ $sale->title }}</a>
                                                    </h2>
                                                    <div class="add-ons">
                                                        @if($sale->area != 0)
                                                            <span class="area"><i class="fa-solid fa-chart-area"></i>Diện tích: {{ nice_number($sale->area) }}m<sup>2</sup></span>
                                                        @endif
                                                        @if($sale->room != 0)
                                                            <span class="area"><i class="fas fa-bed"></i>Số phòng: {{ $sale->room }}</span>
                                                        @endif
                                                        <span class="locate fw-normal">
                                                            <i class="fa-solid fa-location-dot"></i>Vị trí: 
                                                            @if($sale->commune_id != 0) {{ $sale->commune->name }}, @endif
                                                            @if($sale->district_id != 0) {{ $sale->district->name }}, @endif
                                                            @if($sale->province_id != 0) {{ $sale->province->name }} @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="date">Ngày đăng: {{ date_vi($sale->created_at) }}</div>
                                                @if($sale->price > 0)
                                                    <div class="price"><i class="fa-solid fa-coins"></i> Giá: {{ nice_number($sale->price) }}</div>
                                                @else
                                                    <div class="price"><i class="fa-solid fa-coins"></i> Giá: Thương lượng</div>
                                                @endif
                                            </div>
                                        @endforeach
                                        <a href="{{ route('pages.getAllReaLEstateSale') }}" class="btn-more" title="Xem thêm các tin BĐS tương tự">
                                            <span>
                                                Xem thêm các tin BĐS tương tự
                                                <i class="fa fa-angle-double-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                @endif
                            </section>
                            <section class="featured">
                                @if(count($rents) > 0)
                                    <div class="bds-wrapper">
                                        <h2 class="heading">
                                            <span class="heading-icon"><i class="fa fa-th-list"></i></span>
                                            <span class="heading-title">Bất động cho thuê</span>
                                        </h2>
                                        @foreach($rents as $rent)
                                            <div class="bds-item">
                                                <div class="bds-item-img">
                                                    <img class="lazy w-100" data-src="@if(!empty($rent->image)) {{ asset('storage/'. $rent->image) }} @else {{ asset('catalog/img/thumbail-default.jpg') }} @endif" src="{{ asset('catalog/img/loading.gif') }}">
                                                    <i class="fa fa-picture"></i>
                                                </div>
                                                <div class="bds-item-content">
                                                    <h2 class="bds-item-content-title">
                                                        <a href="{{ route('pages.rent', [$rent->category->slug, $rent->slug]) }}" title="{{ $rent->title }}">{{ $rent->title }}</a>
                                                    </h2>
                                                    <div class="add-ons">
                                                        @if($rent->area != 0)
                                                            <span class="area"><i class="fa-solid fa-chart-area"></i>Diện tích: {{ nice_number($rent->area) }}m<sup>2</sup></span>
                                                        @endif
                                                        @if($rent->room != 0)
                                                            <span class="area"><i class="fas fa-bed"></i>Số phòng: {{ $rent->room }}</span>
                                                        @endif
                                                        <span class="locate fw-normal"><i class="fa-solid fa-location-dot"></i> Vị trí:
                                                            @if($rent->commune_id != 0) {{ $rent->commune->name }}, @endif
                                                            @if($rent->district_id != 0) {{ $rent->district->name }}, @endif
                                                            @if($rent->province_id != 0) {{ $rent->province->name }} @endif
                                                        </span>
                                                    </div>
                                                    @if(!empty($rent->summary))
                                                        <div class="bds-item-content-desc">
                                                            @if(strlen($rent->summary) > 150)
                                                                {!! mb_substr($rent->summary, 0, 150, 'utf-8') !!} [..]
                                                            @else
                                                                {!! $rent->summary !!}
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="date">Đăng ngày: {{ date_vi($rent->created_at) }}</div>
                                                <span class="price"><i class="fa-solid fa-coins"></i>  {{ nice_number($rent->price) }}/tháng</span>
                                            </div>
                                        @endforeach
                                        <a href="{{ route('pages.rents') }}" class="btn-more" title="Xem thêm các tin BĐS tương tự">
                                            <span>
                                                Xem thêm các tin BĐS tương tự
                                                <i class="fa fa-angle-double-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                @endif
                            </section>
                            <div class="post-group">
                                <section class="featured">
                                    @if(count($horizontalCategories) > 0)
                                        @foreach($horizontalCategories as $category)
                                            @php 
                                                $lastedPost1 = DB::table('article as a')
                                                ->select('a.id as id', 'title', 'a.image as image', 'c.slug as c_slug', 'a.slug as a_slug')
                                                ->join('categories as c', 'a.category_id', '=', 'c.id')
                                                ->where('a.category_id', $category->id)
                                                ->orderBy('a.created_at', 'desc')
                                                ->first();
                                            @endphp
                                            @if(!empty($lastedPost1->title))
                                                @php
                                                    $posts1 = DB::table('article as a')
                                                    ->select('a.id as id', 'title', 'a.image as image', 'c.slug as c_slug', 'a.slug as a_slug')
                                                    ->join('categories as c', 'a.category_id', '=', 'c.id')
                                                    ->where('a.category_id', $category->id)
                                                    ->where('a.id','<>', $lastedPost1->id)
                                                    ->orderBy('a.created_at', 'desc')
                                                    ->take(5)
                                                    ->get();
                                                @endphp
                                                <div class="bds-wrapper">
                                                    <h2 class="heading">
                                                        <span class="heading-icon"><i class="fa fa-edit"></i></span>
                                                        <span class="heading-title">{{ $category->name }}</span>
                                                    </h2>
                                                    <div class="panel blog-container horizontal">
                                                        <a href="{{ route('pages.getPostDetail', [$lastedPost1->c_slug, $lastedPost1->a_slug]) }}" class="post__main">
                                                            <div class="post__main-image">
                                                                <img data-src="@if(!empty($lastedPost1->image)) {{ asset('storage/'. $lastedPost1->image) }} @else {{ asset('catalog/img/thumbail-default.jpg') }} @endif" src="{{ asset('catalog/img/loading.gif') }}" class="lazy w-100" alt="{{ $lastedPost1->title }}">
                                                            </div>
                                                            <h3 class="post__main-title">{{ $lastedPost1->title }}</h3>
                                                        </a>
                                                        @if(count($posts1) > 0)
                                                            <ul class="post__sub">
                                                                @foreach($posts1 as $post)
                                                                    <li><a href="{{ route('pages.getPostDetail', [$post->c_slug, $post->a_slug]) }}" title="{{ $post->title }}">{{ $post->title }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </section>
                                @if(count($verticalCategories) > 0)
                                    <div class="blog-wrap vertical">
                                        @foreach($verticalCategories as $category)
                                            @php 
                                                $lastedPost2 = DB::table('article as a')
                                                ->select('a.id as id', 'title', 'a.image as image', 'c.slug as c_slug', 'a.slug as a_slug')
                                                ->join('categories as c', 'a.category_id', '=', 'c.id')
                                                ->where('a.category_id', $category->id)
                                                ->orderBy('a.created_at', 'desc')
                                                ->first();
                                            @endphp
                                            @if(!empty($lastedPost2->title))
                                                @php
                                                    $posts2 = DB::table('article as a')
                                                    ->select('a.id as id', 'title', 'a.image as image', 'c.slug as c_slug', 'a.slug as a_slug')
                                                    ->join('categories as c', 'a.category_id', '=', 'c.id')
                                                    ->where('a.category_id', $category->id)
                                                    ->where('a.id','<>', $lastedPost2->id)
                                                    ->orderBy('a.created_at', 'desc')
                                                    ->take(5)
                                                    ->get();
                                                @endphp
                                                <div class="bds-wrapper">
                                                    <h2 class="heading">
                                                        <span class="heading-icon"><i class="fa fa-edit"></i></span>
                                                        <span class="heading-title">{{ $category->name }}</span>
                                                    </h2>
                                                    <div class="panel blog-container">
                                                        <a href="{{ route('pages.getPostDetail', [$lastedPost2->c_slug, $lastedPost2->a_slug]) }}" class="post__main">
                                                            <div class="post__main-image">
                                                                <img data-src="@if(!empty($lastedPost2->image)) {{ asset('storage/'. $lastedPost2->image) }} @else {{ asset('catalog/img/thumbail-default.jpg') }} @endif" src="{{ asset('catalog/img/loading.gif') }}" class="lazy w-100" alt="{{ $lastedPost2->title }}">
                                                            </div>
                                                            <h3 class="post__main-title">{{ $lastedPost2->title }}</h3>
                                                        </a>
                                                        @if(count($posts2) > 0)
                                                            <ul class="post__sub">
                                                                @foreach($posts2 as $post)
                                                                    <li><a href="{{ route('pages.getPostDetail', [$post->c_slug, $post->a_slug]) }}" title="{{ $post->title }}">{{ $post->title }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="content__right">
                            <div class="most-viewed">
                                <h2 class="heading">
                                    <span class="heading-icon"><i class="fa fa-star"></i></span>
                                    <span class="heading-title">TIN TỨC XEM NHIỀU</span>
                                </h2>
                                <ul class="post-sub">
                                    @foreach($lastedViewed as $article)
                                        <li>
                                            <a href="{{ route('pages.getPostDetail', [$article->c_slug, $article->a_slug]) }}" title="{{ $article->title }}">
                                                @if(strlen($article->title) > 55)
                                                    {{ mb_substr($article->title, 0, 55, 'utf-8') .'..' }}
                                                @else
                                                    {{ $article->title }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if(count($lastedProjectFeatureds) > 0)
                                <div class="featured-post mt-3">
                                    <h2 class="heading">
                                        <span class="heading-icon"><i class="fa fa-building"></i></span>
                                        <span class="heading-title">Dự án nổi bật</span>
                                    </h2>
                                    <div class="panel project">
                                        <div class="project__header">
                                            <div class="owl-carousel owl-project">
                                                @foreach($lastedProjectFeatureds as $project)
                                                    <div class="item">
                                                        <a href="{{ route('pages.getProjectDetail', [$project->category->slug, $project->slug]) }}" title="{{ $project->title }}" class="project__link">
                                                            <div class="project__box main">
                                                                <div class="project__img">
                                                                    <img data-src="@if(!empty($project->image)) {{ asset('storage/'. $project->image) }} @else {{ asset('catalog/img/thumbail-default.jpg') }} @endif" src="{{ asset('catalog/img/loading.gif') }}" class="lazy w-100" alt="{{ $project->title }}">
                                                                </div>
                                                                <div class="project__info">
                                                                    <p class="project__title">{{ $project->title }}</p>
                                                                    <span class="project__position">
                                                                        @if($project->commune_id != 0)
                                                                            {{ $project->commune->name }},
                                                                        @endif
                                                                        @if($project->district_id != 0)
                                                                            {{ $project->district->name }},
                                                                        @endif
                                                                        @if($project->commune_id != 0)
                                                                            {{ $project->province->name }}
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="project__body">
                                            @foreach($lastedProjectFeatureds as $project)
                                            <a href="{{ route('pages.getProjectDetail', [$project->category->slug, $project->slug]) }}" class="project__link">
                                                <div class="project__box sub">
                                                    <div class="project__img">
                                                        <img data-src="@if(!empty($project->image)) {{ asset('storage/'. $project->image) }} @else {{ asset('catalog/img/thumbail-default.jpg') }} @endif" src="{{ asset('catalog/img/loading.gif') }}" class="lazy w-100" alt="{{ $project->title }}">
                                                    </div>
                                                    <div class="project__info">
                                                        <p class="project__title">{{ $project->title }}</p>
                                                        <span class="project__position">
                                                            @if($project->commune_id != 0)
                                                                {{ $project->commune->name }},
                                                            @endif
                                                            @if($project->district_id != 0)
                                                                {{ $project->district->name }},
                                                            @endif
                                                            @if($project->commune_id != 0)
                                                                {{ $project->province->name }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @include('catalog.common.featured_link')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $('#loai_bds').on('change', function(e) {
        var category = $(this).val();
        $.ajax({
            url: '{{ route("ajax.get_danh_muc_bds") }}',
            method: 'POST',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                category: category
            },
            success: function(res) {
                if(res.status == 200) {
                    $('#danh_muc_bds').html(res.data);
                }
            }
        });
    });

    $('#province').on('change', function(e) {
        e.preventDefault();
        var provinceId = $(this).val();
        $.ajax({
            url: '{{ route("ajax.getDistrict") }}',
            method: 'POST',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                provinceId: provinceId
            },
            success: function(res) {
                if(res.status == 200) {
                    $('#district').html(res.data);
                }
            }
        });
    });
</script>
@endsection