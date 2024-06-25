<!DOCTYPE html>
<html lang="vi">
<head>
    @include('catalog.common.head')

    {!! $serviceCodeHeader !!}
</head>
<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="F4US5QXr"></script>

    <div id="wrapper">
        @include('catalog.common.header')
        <div class="content">
            @yield('content')
        </div>
        @include('catalog.common.footer')
    </div>

    <div class="overlay"></div>
    <div class="sidebar lg-hidden">
        <div class="sidebar__top">
            <div class="logo">
                <a href="{{ route('pages.index') }}">
                    <img src="{{ asset('storage/' . $logo) }}" class="w-100" alt="Logo Ngọc Anh Minh">
                </a>
            </div>
            <div class="header-company-name">
                <span class="title">Công ty TNHH Thương mại Dịch vụ</span>
                <span class="name">PHÚ NGỌC LAND</span>
            </div>
            <div class="close-sidebar">
                <img src="{{ asset('catalog/img/icons/close.png') }}" class="w-100" alt="Close Tab">
            </div>
        </div>
        <div class="sidebar__bottom">
            <div class="scroll-wrap">
                <ul class="sm-navigate">
                    <li><a href="{{ route('pages.index') }}">Trang chủ</a></li>
                    <li><a href="{{ route('pages.getPostDetail', ['gioi-thieu', 've-chung-toi']) }}">Về chúng tôi</a></li>
                    <li class="has-dropdown">
                        <a href="#" onclick="return false;">
                            <span>Nhà đất bán</span>
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="dropdown">
                            @foreach($saleCategories as $category)
                                <li><a href="{{ route('pages.getReaLEstateSaleByCategory', [$category->slug]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="#" onclick="return false;">
                            <span>Nhà đất cho thuê</span>
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="dropdown">
                            @foreach($rentCategories as $category)
                                <li><a href="{{ route('pages.getReaLEstateRentsByCategory', [$category->slug]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="#" onclick="return false;">
                            <span>Dự án</span>
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="dropdown">
                            @foreach($projectCategories as $project)
                                <li><a href="{{ route('pages.getProjectsByCategory', [$category->slug]) }}">{{ $project->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            @if(count($category->child) > 0)
                                <li class="has-dropdown">
                                    <a href="#" onclick="return false;">
                                        <span>{{ $category->name }}</span>
                                        <i class="fa-solid fa-angle-down"></i>
                                    </a>
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
                    <li class="has-dropdown">
                        <a href="#" onclick="return false;">
                            <span>Sản phẩm</span>
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
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

    <div class="btn-fixed-group">
        <a href="tel:{{ $servicePhone }}" class="contact-link phone">
            <span class="text">{{ $servicePhone }}</span>
            <span class="image">
                <img src="{{ asset('catalog/img/icons/phone.png') }}" alt="logo">
            </span>
        </a>
        <a href="mailto:{{ $serviceGmail }}" class="contact-link gmail">
            <span class="text">Liên hệ qua mail</span>
            <span class="image">
                <img src="{{ asset('catalog/img/icons/gmail.png') }}" alt="logo">
            </span>
        </a>
        <a href="https://zalo.me/0938508777" target="_blank" class="contact-link zalo">
            <span class="text">Liên hệ qua Zalo</span>
            <span class="image">
                <img src="{{ asset('catalog/img/icons/zalo.png') }}" alt="logo">
            </span>
        </a>
        <a href="https://www.facebook.com/phungocland" target="_blank" class="contact-link facebook">
            <span class="text">Chat trực tiếp qua Fanpage</span>
            <span class="image">
                <img src="{{ asset('catalog/img/icons/facebook.png') }}" alt="logo">
            </span>
        </a>
    </div>
    <div class="btn-to-top" id="btn_back_top">
        <img src="{{ asset('catalog/img/icons/double-up.png') }}" alt="double-up.png">
    </div>
    
    {!! $serviceCodeFooter !!}

    @include('catalog.common.foot')
	@yield('script')
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
</body>
</html>