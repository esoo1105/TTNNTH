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
    <h2 style="margin-bottom: 20px">THÊM KẾT QUẢ</h2>
    <form action="{{ route('danhsachlop.update', $danhsachlop->id) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputKhoaHoc">Mã khóa học </label>
                <select id="inputState" class="form-control" name="ma_khoahoc">
                    @foreach ($khoahoc as $item)
                        <option selected value="{{ $item->ma_khoahoc }}">{{ $item->ma_khoahoc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">MSSV</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập MSSV" name="mssv"
                    value="{{ $danhsachlop->mssv }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Họ tên sinh viên</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập họ tên sinh viên"
                    name="hoten" value="{{ $danhsachlop->hoten }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Lớp</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập tên lớp" name="lop"
                    value="{{ $danhsachlop->lop }}" required>
            </div>
            <div class="form-group
                    col-md-3">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Nhập Email" name="email"
                    value="{{ $danhsachlop->email }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Số điện thoại</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập số điện thoại" name="sdt"
                    value="{{ $danhsachlop->sdt }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="height: 50px;margin-top: 20px">Cập nhật</button>
    </form>
@endsection
