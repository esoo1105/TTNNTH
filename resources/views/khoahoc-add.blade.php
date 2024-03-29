@extends('.layoutadmin.main')
@section('title', 'Them Nguoi Dung')
@section('content')
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if ($message = \Illuminate\Support\Facades\Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = \Illuminate\Support\Facades\Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h2 style="margin-bottom: 20px">THÊM THÔNG TIN KHÓA HỌC</h2>
    <form action="{{ route('khoahoc.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Mã khóa học</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Mã khóa học" name="ma_khoahoc"
                    required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Tên khóa học</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Tên khóa học" name="ten_khoahoc"
                    required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="inputAddress">Địa điểm đăng ký</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nhập địa điểm đăng ký học"
                    name="diadiem_dangky" required>
            </div>
            <div class="form-group col-md-5">
                <label for="inputAddress">Ngày khai giảng</label>
                <input type="date" class="form-control" id="inputAddress" name="ngay_khaigiang" required>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputZip">Chọn hình ảnh</label>
                <input type="file" class="form-control" accept="image/*" name="file">
            </div>
            {{-- <div class="form-group col-md-3">
                <label for="inputZip">Chọn ảnh chi tiết</label>
                <input type="file" class="form-control" accept="image/*" name="files[]" multiple="multiple">
            </div> --}}
        </div>
        <button type="submit" class="btn btn-success" style="height: 50px;margin-top: 20px">Tạo khóa học</button>
    </form>
@endsection
