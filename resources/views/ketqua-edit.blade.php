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
    <form action="{{ route('ketqua.update', $ketqua->id) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">MSSV</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập MSSV" name="mssv"
                    value="{{ $ketqua->mssv }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Nhập email" name="email"
                    value="{{ $ketqua->email }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Số điện thoại</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập số điện thoại" name="phone"
                    value="{{ $ketqua->phone }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Điểm tin học</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập điểm tin học"
                    name="diem_tinhoc" value="{{ $ketqua->diem_tinhoc }}"required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Bằng tin học</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nhập bằng tin học"
                    name="bang_tinhoc" value="{{ $ketqua->bang_tinhoc }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Điểm anh văn</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập điểm tin học"
                    name="diem_ngoaingu" value="{{ $ketqua->diem_ngoaingu }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Bằng ngoại ngữ</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nhập bằng tin học"
                    name="bang_ngoaingu" value="{{ $ketqua->bang_ngoaingu }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="height: 50px;margin-top: 20px">Xác nhận</button>
    </form>
@endsection
