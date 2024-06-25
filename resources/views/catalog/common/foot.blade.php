<!-- Jquery -->
<script src="{{ asset('catalog/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
<!-- Lightbox -->
<script src="{{ asset('catalog/plugins/lightbox/js/lightbox-plus-jquery.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('catalog/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
<!-- Bootstrap 5.1.3 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Scripts -->
<script src="{{ asset('catalog/script/lazy-load.js') }}"></script>
<script src="{{ asset('catalog/script/main.js') }}"></script>

<!-- Initialize Swiper -->
<script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 7,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
</script>