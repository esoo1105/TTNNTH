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
    <h2 style="margin-bottom: 20px">THÊM THÔNG TIN SINH VIÊN</h2>
    <form action="{{ route('sinhvien.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Mã khóa học</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập mã khóa học" name="ma_khoahoc"
                    required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">MSSV</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập MSSV" name="mssv" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Tên sinh viên</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập họ tên sinh viên"
                    name="hoten" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Lớp</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập tên lớp" name="lop"
                    required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Nơi sinh</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập nơi sinh" name="noisinh"
                    required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Ngày sinh</label>
                <input type="date" class="form-control" id="inputEmail4" name="ngaysinh" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Thời gian đăng ký học</label>
                <input type="date" class="form-control" id="inputEmail4" placeholder="Nhập thời gian đăng ký học"
                    name="thoigian_dangky" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Số tiền đã đóng</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập số tiền đã đóng"
                    name="sotien_dadong" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Số điện thoại</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập số điện thoại" name="sdt"
                    required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Email</label>
                <input type="Email" class="form-control" id="inputEmail4" placeholder="Nhập địa chỉ Email" name="email"
                    required>
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="height: 50px;margin-top: 20px">Tạo khóa học</button>
    </form>
@endsection
