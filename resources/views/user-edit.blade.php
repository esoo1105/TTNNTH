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
    <h2 style="margin-bottom: 40px">CẬP NHẬT THÔNG TIN NGƯỜI DÙNG</h2>
    @foreach ($user as $item)
        <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" value="{{ $item->username }}" id="inputEmail4"
                        name="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Mật khẩu</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Tên</label>
                <input type="text" class="form-control" value="{{ $item->name }}" id="inputAddress" name="ten">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputZip">Chức vụ</label>
                    <select id="inputState" class="form-control" name="chucvu">
                        <option value="admin" {{ $item->chucvu == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="teacher" {{ $item->chucvu == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-facebook" style="height: 50px">Cập nhật tài khoản</button>
        </form>
    @endforeach
@endsection
