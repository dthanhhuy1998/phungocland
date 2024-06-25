<div class="tab search-tab mb-3">
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-search-tab" data-bs-toggle="pill" data-bs-target="#pills-search" type="button" role="tab" aria-controls="pills-search" aria-selected="true">Tìm kiếm BĐS</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-search" role="tabpanel" aria-labelledby="pills-search-tab">
            <form id="filter_sale_form" action="{{ route('pages.filters') }}" method="GET" class="search-panel">
                <div class="form-group">
                    <input type="text" class="form-control xs-text xs-mb-2" name="keyword" placeholder="Nhập từ khóa cần tìm..">
                </div>
                <div class="form-group">
                    <select name="type" id="loai_bds" class="form-control xs-text xs-mb-2">
                        <option value="">-- Chọn loại nhà đất --</option>
                        <option value="sale">Nhà đất bán</option>
                        <option value="rent">Nhà đất cho thuê</option>
                        <option value="project">Dự án</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control xs-text xs-mb-2" name="category" id="danh_muc_bds">
                        <option value="">-- Danh mục nhà đất --</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control xs-text xs-mb-2" name="province" id="province">
                        <option value="">-- Tỉnh/TP --</option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->matp }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control xs-text xs-mb-2" name="district" id="district">
                        <option value="">-- Quận/Huyện --</option>
                    </select>
                </div>
                <button type="submit" class="btn-search blue"><i class="fa fa-search"></i> Tìm kiếm</button>
            </form>
        </div>
    </div>
</div>