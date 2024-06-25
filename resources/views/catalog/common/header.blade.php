<div class="header">
    <div class="header__top">
        <div class="container">
            <div class="col-left sm-hidden">
                <ul class="list-sm">
                    <li><a href="#" class="has-border"><i class="fas fa-home text-green"></i> CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ PHÚ NGỌC LAND</a></li>
                    <li><a href="tel:0938508777" class="has-border"><i class="fas fa-phone text-green"></i> {{ $servicePhone }}</a></li>
                    <li><a href="maito:phungocland68@gmail.com"><i class="fa-solid fa-envelope text-green"></i> {{ $serviceGmail }}</a></li>
                </ul>
            </div>
            <div class="col-right">
                <ul class="list-sm">
                    <li><a href="{{ route('login') }}" target="_blank"><i class="fa fa-user text-green"></i> Đăng nhập</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <div class="col-left">
                <a href="{{ route('pages.index') }}" class="logo-header">
                    <img src="{{ asset('storage/' . $logo) }}" class="w-100" alt="Logo Phú Ngọc Land">
                </a>
                <div class="header-company-name">
                    <span class="title">Công ty TNHH Thương mại Dịch vụ</span>
                    <span class="name">PHÚ NGỌC LAND</span>
                </div>
                <div class="toggle lg-hidden">
                    <img alt="svgImg" class="w-100" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iOTYiIGhlaWdodD0iOTYiCnZpZXdCb3g9IjAgMCAxNzIgMTcyIgpzdHlsZT0iIGZpbGw6IzAwMDAwMDsiPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0ibm9uemVybyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxwYXRoIGQ9Ik0wLDE3MnYtMTcyaDE3MnYxNzJ6IiBmaWxsPSJub25lIj48L3BhdGg+PGcgZmlsbD0iIzQ1NDU0NSI+PHBhdGggZD0iTTE0LjMzMzMzLDM1LjgzMzMzdjE0LjMzMzMzaDE0My4zMzMzM3YtMTQuMzMzMzN6TTE0LjMzMzMzLDc4LjgzMzMzdjE0LjMzMzMzaDE0My4zMzMzM3YtMTQuMzMzMzN6TTE0LjMzMzMzLDEyMS44MzMzM3YxNC4zMzMzM2gxNDMuMzMzMzN2LTE0LjMzMzMzeiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+"/>
                </div>
            </div>
            <div class="col-right sm-hidden"></div>
        </div>
        <div class="navigate-wrapper sm-hidden">
            <div class="container">
                <ul class="navigate">
                    <li><a href="{{ route('pages.index') }}">Trang chủ</a></li>
                    <li><a href="{{ route('pages.getPostDetail', ['gioi-thieu', 've-chung-toi']) }}">Về chúng tôi</a></li>
                    <li>
                        <a href="{{ route('pages.getAllProject') }}">BĐS Bán</a>
                        <ul class="dropdown">
                            @foreach($saleCategories as $category)
                                <li><a href="{{ route('pages.getReaLEstateSaleByCategory', [$category->slug]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('pages.getAllReaLEstateRents') }}">BĐS Cho thuê</a>
                        <ul class="dropdown">
                            @foreach($rentCategories as $category)
                                <li><a href="{{ route('pages.getReaLEstateRentsByCategory', [$category->slug]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('pages.getAllProject') }}">Dự án</a>
                        <ul class="dropdown">
                            @foreach($projectCategories as $category)
                                <li><a href="{{ route('pages.getProjectsByCategory', [$category->slug]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            @if(count($category->child) > 0)
                                <li>
                                    <a href="{{ route('pages.getPostsByCategory', [$category->slug]) }}">{{ $category->name }}</a>
                                    <ul class="dropdown">
                                        @foreach($category->child as $child)
                                            <li><a href="{{ route('pages.getPostsByCategory', [$child->slug]) }}">{{ $child->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{ route('pages.getPostsByCategory', [$category->slug]) }}">{{ $category->name }}</a></li>
                            @endif
                        @endforeach
                    @endif
                    <li>
                        <a href="#" onclick="return false;">Sản phẩm</a>
                        <ul class="dropdown">
                            @foreach($pCategories as $category)
                                <li><a href="{{ route('pages.productCategory', [$category->slug]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('pages.getPostDetail', ['lien-he', 'lien-he']) }}">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>