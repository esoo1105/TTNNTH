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
            <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ KHÓA HỌC</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <p class="m-0 font-weight-bold text-primary" style="float: right"><a
                            href="{{ \Illuminate\Support\Facades\URL::to('themkhoahoc') }}">Tạo khóa học</a></p>
                    <p class="m-0 font-weight-bold text-primary">Thông tin khóa học</p>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã khóa học</th>
                                    <th>Tên khóa học</th>
                                    <th>Hình ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th>Địa điểm đăng ký</th>
                                    <th>Ngày khai giảng</th>
                                    <th>Xóa</th>
                                    <th>Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($khoahoc as $item)
                                    <tr>
                                        <td>{{ $item->ma_khoahoc }}</td>
                                        <td>{{ $item->ten_khoahoc }}</td>
                                        <td><img src="{{ $item->hinhanh }}" style="max-width: 100px;max-height:100px">
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->diadiem_dangky }}</td>
                                        <?php
                                        $ngayKhaiGiang = $item->ngay_khaigiang;
                                        $ngayKhaiGiang = date('d-m-Y', strtotime($ngayKhaiGiang));
                                        echo '<td> ' . $ngayKhaiGiang . '</td>';
                                        ?>
                                        <td><a><button data-toggle="modal" data-target="#exampleModal"
                                                    data-whatever="{{ $item->ma_khoahoc }}"
                                                    class="btn btn-danger">Xóa</button></a></td>
                                        <td>
                                            <a href="{{ route('capnhatkhoahoc', $item->ma_khoahoc) }}"
                                                class="btn btn-warning">Cập
                                                nhật</a>
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
            modal.find('.modal-title').text('Bạn muốn xóa khóa học có mã là ' + recipient)
            modal.find('.modal-body form').attr('action', '/khoahoc/' + recipient)
        })
    </script>
</body>

</html>
