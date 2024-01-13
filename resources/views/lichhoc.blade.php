<!DOCTYPE html>
<html lang="en">
@include('.layout.header')

<body>
    @include('.layout.nav')
    <div class="hero-wrap" style="background-image: url('images/bg_ctump.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-center align-items-center">
                <div class="col-lg-9 col-md-5 ftco-animate d-flex align-items-end">
                    <div class="text text-center w-101">
                    </div>
                </div>
            </div>
        </div>
        <div class="mouse">
            <a href="#" class="mouse-icon">
                <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
            </a>
        </div>
    </div>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <h2>Nhập từ khóa để tìm kiếm</h2>
                        <input type="text" name="khoahoc" id="khoahoc"
                            placeholder="Nhập khóa học bạn muốn tìm kiếm" class="form-control">
                    </div>
                    <div id="danhsach_khoahoc"></div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#khoahoc').on('keyup', function() {
                var query = $(this).val();
                $.ajax({

                    url: "{{ route('search') }}",

                    type: "GET",

                    data: {
                        'khoahoc': query
                    },

                    success: function(data) {

                        $('#danhsach_khoahoc').html(data);
                    }
                })
                // end of ajax call
            });


            $(document).on('click', 'li', function() {

                var value = $(this).text();
                $('#khoahoc').val(value);
                $('#danhsach_khoahoc').html("");
            });
        });
    </script>
    <section class="ftco-section goto-here">
        <div class="container">
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
    </section>


    @include('.layout.footer')
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>
    @include('.layout.script')
</body>

</html>
