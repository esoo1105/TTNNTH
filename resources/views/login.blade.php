<!DOCTYPE html>
<html lang="en">

@include('.layoutadmin.header')

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center my-5">
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-block">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
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
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                            </div>
                            <form class="user" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Nhập địa chỉ Email..."
                                        name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Đăng
                                    nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('.layoutadmin.script');
</body>

</html>
