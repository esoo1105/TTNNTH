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
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Khóa mới</span>
                    <h2 class="mb-2"></h2>
                </div>
            </div>
            <div class="row">
                @foreach ($khoahoc as $item)
                    <div class="col-md-4">
                        <div class="property-wrap ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center"
                                style="background-image: url({{ $item->hinhanh }});">
                                <a href="{{ route('chitiet', $item->ma_khoahoc) }}"
                                    class="icon d-flex align-items-center justify-content-center btn-custom">
                                    <span class="ion-ios-link"></span>
                                </a>
                                <div class="list-agent d-flex align-items-center">
                                    <a class="agent-info d-flex align-items-center">
                                        <div class="img-2 rounded-circle"
                                            style="background-image: url(images/person_1.jpg);"></div>
                                        <h3 class="mb-0 ml-2">{{ $item->nguoi_dangbai }}</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a
                                        href="{{ route('chitiet', $item->ma_khoahoc) }}">{{ $item->ma_khoahoc }} -
                                        {{ $item->ten_khoahoc }} </a>
                                </h3>
                                <?php
                                $ngayKhaiGiang = $item->ngay_khaigiang;
                                $ngayKhaiGiang = date('m-d-Y', strtotime($ngayKhaiGiang));
                                echo '<p class="price mb-3"><span>Ngày khai giảng: ' . $ngayKhaiGiang . '</span></p>';
                                ?>
                                <span class="location
                                        d-inline-block mb-3"> <i
                                        class="ion-ios-pin mr-2"></i>Địa điểm
                                    đăng ký:
                                    {{ $item->diadiem_dangky }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-section img" id="section-counter">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="305">0</strong>
                            <span>Khóa học</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="1090">0</strong>
                            <span>Tổng <br> số Khóa đã đang mở</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="209">0</strong>
                            <span>Khóa học <br>đẫ hoàn thành!</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="67">0</strong>
                            <span>Tổng <br>chi nhánh</span>
                        </div>
                    </div>
                </div>
            </div>
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
