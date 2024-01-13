<!DOCTYPE html>
<html lang="en">
@include('.layoutadmin.header')

<script></script>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('.layoutadmin.nav')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Lịch dạy học của giảng viên</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <table class="table" style="width: 100%;">
                        <thead style="color: #fff; background-color: #507CD1; font-weight: bold; " class="text-center">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Danh sách lớp</th>
                                <th scope="col">Ngày khai giảng</th>
                                <th scope="col">Thời gian học</th>
                                <th scope="col">Số tiết</th>
                                <th scope="col">Địa điểm</th>
                                <th scope="col">Thứ học</th>
                                <th scope="col">Giảng viên</th>
                                <th scope="col">Loại lớp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1; // Initialize counter variable
                            @endphp
                            @foreach ($chitietkhoahoc as $item)
                                <tr style="color: #006699; background-color: #EFF3FB; font-size: 18px; height: 40px;">
                                    <td align="center">{{ $stt++ }}</td>
                                    <td align="center">
                                        <a href="DanhsachlopNN.aspx?Malop=694" style="color: #1e99f6; font-size: 17px;">
                                            {{ $item->ma_khoahoc }}
                                        </a>
                                    </td>
                                    @php
                                        $khoahoc = \App\Models\Khoahoc::where('ma_khoahoc', $item->ma_khoahoc)->first();
                                    @endphp
                                    <?php
                                    $ngayKhaiGiang = $khoahoc->ngay_khaigiang;
                                    $ngayKhaiGiang = date('d-m-Y', strtotime($ngayKhaiGiang));
                                    echo '<td align="center">' . $ngayKhaiGiang . ' </td>';
                                    ?>
                                    <td align="center">
                                        {{ $item->thoigian_hoc }}</td>
                                    <td align="center">{{ $item->sotiet }}</td>
                                    <td align="center" style="font-size: 16px;">{{ $item->diadiemhoc }}</td>
                                    <td align="center">{{ $item->thu_hoc }}</td>
                                    <td align="center">{{ \App\Models\User::find($item->id_giangvien)->name }}</td>
                                    <td align="center">{{ $item->loai_lop }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('.layoutadmin.footer')
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    @include('.layoutadmin.logout')
    @include('.layoutadmin.script')
</body>

</html>
