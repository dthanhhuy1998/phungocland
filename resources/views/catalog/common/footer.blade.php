<div class="footer">
    <div class="footer__top sm-hidden">
        <div class="menu-footer">
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Hướng dẫn sử dụng</a></li>
            <li><a href="#">Quy định</a></li>
            <li><a href="#">Quy chế hoạt động</a></li>
            <li><a href="#">Bảo vệ thông tin cá nhân</a></li>
            <li><a href="#">Cơ chế giải quyết tranh chấp</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li><a href="#">Điều khoản thỏa thuận</a></li>
            <li><a href="#">Báo giá</a></li>
        </div>
    </div>
    <div class="footer__middle">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <a href="#" class="footer-logo">
                        <img src="{{ asset('catalog/img/logo.png') }}" alt="logo">
                    </a>
                    <p class="company-name">CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ PHÚ NGỌC LAND</p>
                    <div class="footer-info">
                        <p>MSDN: 1602158490 do Sở KH&ĐT Tỉnh An Giang cấp ngày 09/04/2022.</p>
                        <p>
                            <span class="text-green bold">[E] :</span>
                            <span>{{ $serviceGmail }}</span>
                            <span>Hotline: {{ $servicePhone }}</span>
                        </p>
                        <p>
                            <span class="text-green bold">[T] :</span>
                            <span>Thời gian làm việc: <strong>Thứ 2 đến Thứ 7, 07h30 - 17h30</strong></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="footer-info">
                       {!! $serviceContact !!}
                    </div>
                    <div class="qr-code">
                        <h4 class="">Quét mã QR tại đây</h4>
                        <a href="https://me-qr.com/l/phungocland" target="_blank" class="">
                            <img src="{{ asset('catalog/img/qr-code.jpg') }}" alt="qr-code.png">
                        </a>
                    </div>
                    <div class="sercurity mt-2 inline">
                        <a href="//www.dmca.com/Protection/Status.aspx?ID=bd866387-2a3b-4981-a9ed-e79ca8cd4213" title="DMCA.com Protection Status" class="dmca-badge">
                            <img src ="https://images.dmca.com/Badges/dmca_protected_sml_120n.png?ID=bd866387-2a3b-4981-a9ed-e79ca8cd4213" alt="DMCA.com Protection Status"/>
                        </a>  
                        <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
                        <div class="btn-liked">
                            <div class="fb-like" data-href="{{ route('pages.index') }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                        </div>
                        <a href="https://www.youtube.com/@phungocmedia846/about" target="_blank" class="btn btn-youtube">
                            <img src="{{ asset('catalog/img/icons/youtube.png') }}" alt="youtube.png">
                            <span>Youtube</span>
                        </a>
                    </div>
                    <div class="sercurity mt-2">
                        <a href="https://tinnhiemmang.vn/danh-ba-tin-nhiem/phungoclandcom-1658974427" title="Chung nhan Tin Nhiem Mang" target="_blank"><img src="https://tinnhiemmang.vn/handle_cert?id=phungocland.com" width="150px" height="auto" alt="Chung nhan Tin Nhiem Mang"></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="copy-right">
                        <span>Bản quyền thuộc về Phú Ngọc Land</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>