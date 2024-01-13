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
    <h2 style="margin-bottom: 20px">CẬP NHẬT THÔNG TIN CHI TIẾT KHÓA HỌC</h2>
    <form action="{{ route('chitietkhoahoc.update', $chitietkhoahoc->id) }}" method="POST" enctype="multipart/form-data">
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
                <label for="inputEmail4">Thời gian học</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập thời gian học"
                    name="thoigian_hoc" value="{{ $chitietkhoahoc->thoigian_hoc }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Số tiết</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nhập số tiết học" name="sotiet"
                    value="{{ $chitietkhoahoc->sotiet }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputAddress">Địa điểm học</label>
                <input type="text" class="form-control" id="inputAddress" name="diadiemhoc"
                    placeholder="Nhập địa điểm học" value="{{ $chitietkhoahoc->diadiemhoc }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Thứ</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nhập thứ" name="thu_hoc"
                    value="{{ $chitietkhoahoc->thu_hoc }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputGiangVien">Tên giảng viên</label>
                <select id="inputGiangVien" class="form-control" name="id_giangvien">
                    @foreach ($giangvien as $item1)
                        <option value="{{ $item1->id }}">{{ $item1->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputAddress">Loại lớp</label>
                <input type="text" class="form-control" id="inputAddress" name="loai_lop" placeholder="Nhập loại lớp học"
                    value="{{ $chitietkhoahoc->loai_lop }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Học phí</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nhập thứ" name="hocphi"
                    value="{{ $chitietkhoahoc->hocphi }}" required>
            </div>
        </div>
        <div class="form-row">
            <label for="inputState">Thông tin khóa học</label>
            <div class="form-group" style="width: 100%">

                <textarea style="height: 150px;width: 100%" required name="mota" class="form-group"
                    placeholder="Nhập mô tả về khóa học">{{ $chitietkhoahoc->mota }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="height: 50px;margin-top: 20px">Tạo thông tin chi tiết khóa
            học</button>
    </form>
@endsection
