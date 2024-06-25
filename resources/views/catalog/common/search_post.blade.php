<form action="{{ route('pages.searchPost') }}" class="search-box" method="GET">
    <input type="text" placeholder="Nhập từ khóa tìm kiếm" name="tu-khoa" value="@if(isset($_GET['tu-khoa']) && !empty($_GET['tu-khoa'])){{$_GET['tu-khoa']}}@endif">
    <button type="submit"><i class="fa fa-search"></i></button>
</form>