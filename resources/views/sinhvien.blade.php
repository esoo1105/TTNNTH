<!DOCTYPE html>
<html lang="en">

@include('.layoutadmin.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('.layoutadmin.nav')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @if ($message = \Illuminate\Support\Facades\Session::get('message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ SINH VIÊN</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <p class="m-0 font-weight-bold text-primary" style="float: right"><a
                            href="{{ \Illuminate\Support\Facades\URL::to('themsinhvien') }}">Thêm sinh viên</a></p>
                    <p class="m-0 font-weight-bold text-primary">Thông tin sinh viên</p>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>MSSV</th>
                                    <th>Tên sinh viên</th>
                                    <th>Lớp</th>
                                    <th>Ngày sinh</th>
                                    <th>Nơi sinh</th>
                                    <th>Mã khóa học</th>
                                    <th>Thời gian đăng ký học</th>
                                    <th>Số tiền đã đóng</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Xóa</th>
                                    <th>Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sinhvien as $item)
                                    <tr>
                                        <td>{{ $item->mssv }}</td>
                                        <td>{{ $item->hoten }}</td>
                                        <td>{{ $item->lop }}</td>
                                        <?php
                                        $ngaySinh = $item->ngaysinh;
                                        $ngaySinh = date('d-m-Y', strtotime($ngaySinh));
                                        echo '<td> ' . $ngaySinh . '</td>';
                                        ?>
                                        <td>{{ $item->noisinh }} </td>
                                        <td>{{ $item->ma_khoahoc }}</td>
                                        <?php
                                        $ngayDangKy = $item->thoigian_dangky;
                                        $ngayDangKy = date('d-m-Y', strtotime($ngayDangKy));
                                        echo '<td> ' . $ngayDangKy . '</td>';
                                        ?>
                                        <td>{{ $item->sotien_dadong }} VNĐ</td>
                                        <td>{{ $item->sdt }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a><button data-toggle="modal"
                                                    data-target="#exampleModal"data-whatever="{{ $item->mssv }}"
                                                    class="btn btn-danger">Xóa</button></a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('capnhatsinhvien', $item->mssv) }}"class="btn btn-warning">
                                                Cập nhật
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    @include('.layoutadmin.footer')
    <!-- End of Footer -->
    {{-- MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('.layoutadmin.logout')
    @include('.layoutadmin.script')
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Bạn muốn xóa sinh viên có mã là ' + recipient)
            modal.find('.modal-body form').attr('action', '/sinhvien/' + recipient)
        })
    </script>
</body>

</html>
