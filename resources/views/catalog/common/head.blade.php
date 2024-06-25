<meta charset="UTF-8">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-language" content="vi"/>
<meta name="revisit-after" content="1 days"/>
<meta name="author" content="Cty TNHH Thương mại và Dịch vụ Phú Ngọc Land">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
{!! JsonLd::generate(); !!}

<!-- Bootstrap 5.1.3 -->
<link rel="stylesheet" href="{{ asset('catalog/plugins/bootstrap/css/bootstrap.min.css') }}">
<!-- Font Awesome 6 (Beta) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{ asset('catalog/plugins/owlcarousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('catalog/plugins/owlcarousel/assets/owl.theme.default.min.css') }}">
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<!-- Lightbox -->
<link rel="stylesheet" href="{{ asset('catalog/plugins/lightbox/css/lightbox.min.css') }}" />
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('catalog/style/base.css') }}">
<link rel="stylesheet" href="{{ asset('catalog/style/style.css') }}">
<link rel="stylesheet" href="{{ asset('catalog/style/responsive.css') }}">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-H82PQK2D1K"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-H82PQK2D1K');
</script>