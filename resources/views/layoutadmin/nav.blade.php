<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Quản trị viên<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ \Illuminate\Support\Facades\URL::to('trangchu') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>THỐNG KÊ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>DANH MỤC QUẢN LÝ</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ \Illuminate\Support\Facades\URL::to('danhsachlop') }}">QUẢN LÝ DANH
                    SÁCH
                    LỚP</a>
                <a class="collapse-item" href="{{ \Illuminate\Support\Facades\URL::to('chitietkhoahoc') }}">QUẢN LÝ CHI
                    TIẾT KHÓA HỌC</a>
                <a class="collapse-item" href="{{ \Illuminate\Support\Facades\URL::to('user') }}">QUẢN LÝ NGƯỜI DÙNG</a>
                <a class="collapse-item" href="{{ \Illuminate\Support\Facades\URL::to('ketqua') }}">QUẢN LÝ ĐIỂM</a>
                <a class="collapse-item" href="{{ \Illuminate\Support\Facades\URL::to('sinhvien') }}">QUẢN LÝ SINH
                    VIÊN</a>
                <a class="collapse-item" href="{{ \Illuminate\Support\Facades\URL::to('khoahoc') }}">QUẢN LÝ KHÓA
                    HỌC</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>
                @php
                    $user = \Illuminate\Support\Facades\Auth::user()->id;
                    $data = \App\Models\User::all()->where('id', $user);
                @endphp
                <!-- Nav Item - User Information -->
                @foreach ($data as $item)
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $item->ten }}</span>
                            <img class="img-profile rounded-circle" src="{{ $item->hinhanh }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" data-toggle="modal" data-target="#userInfoModal">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Thông tin
                            </a>
                            <a class=dropdown-item data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Đăng xuất
                            </a>
                        </div>
                    </li>
                @endforeach


            </ul>
            <div class="modal fade" id="userInfoModal" tabindex="-1" role="dialog"
                aria-labelledby="userInfoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userInfoModalLabel">Thông tin người dùng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @php$id = \Illuminate\Support\Facades\Auth::user()->id;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                $user = \App\Models\User::all()->where('id', $id);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @endphp ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?>
                            ?>
                            ?>
                            ?>
                            ?>
                            ?>
                            ?>
                            ?>
                            ?>
                            ?>
                            ?>
                            ?>
                            ?>
                            @foreach ($user as $item)
                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if ($item->hinhanh != null)
                                                <img src="{{ $item->hinhanh }}" alt="Profile Picture"
                                                    class="img-fluid rounded-circle">
                                            @else
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <input type="file" class="form-control" required=""
                                                        name="image">
                                                    <button style="margin-top: 20px"
                                                        class="btn btn-primary text-center"><i
                                                            class="icon icon-upload-cloud">
                                                        </i>Upload avatar
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <p class="card-title" style="margin-top: 10px">Tên Tài Khoản
                                                : {{ $item->ten }}</p>
                                            <p class="card-text" style="margin-top: 20px">Email
                                                : {{ $item->email }}</p>
                                            <p class="card-text" style="margin-top: 20px">Sđt
                                                : {{ $item->sdt }}</p>
                                            <p class="card-text" style="margin-top: 20px">Địa chỉ
                                                : {{ $item->diachi1 }}</p>
                                            {{-- <p class="card-text">Role : @if ($item->role == 0) Client @else Admin @endif</p> --}}
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Đăng xuất tài khoản</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Bạn chắc chắn đăng xuất</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a type="button" href="{{ \Illuminate\Support\Facades\URL::to('logout') }}"
                                class="btn btn-primary">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
