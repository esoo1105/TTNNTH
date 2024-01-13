@extends('.layoutadmin.main')
@section('title', 'Thêm người dùng')
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
    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Mật khẩu</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Tên</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Họ và tên" name="ten">
        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="inputZip">Chức vụ</label>
                <select id="inputState" class="form-control" name="chucvu">
                    <option selected value="admin">Admin</option>
                    <option selected value="giangvien">Giảng viên</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-facebook" style="height: 50px">Tạo tài khoản</button>
    </form>
@endsection
