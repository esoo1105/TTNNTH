<!DOCTYPE html>
<html lang="en">
@include('.layout.header')

<body>
    @include('.layout.nav')
    <div class="hero-wrap" style="background-image: url('images/bg_ctump.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            @foreach ($chitietkhoahoc as $item)
                <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                    <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                        <h1 class="mb-3 bread">{{ $item->ma_khoahoc }} - {{ $item->ten_khoahoc }}</h1>
                        <p class="breadcrumbs"><span class="mr-2">
                                <a href="{{ \Illuminate\Support\Facades\URL::to('/') }}">Trang chủ
                                    <i class="ion-ios-arrow-forward"></i></a></span> <span>Chi tiết khóa học<i
                                    class="ion-ios-arrow-forward"></i></span></p>
                    </div>
                </div>
        </div>
    </div>
    <section class="ftco-section ftco-property-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="property-details">
                        @php
                            $khoahoc = \App\Models\Khoahoc::where('ma_khoahoc', $item->ma_khoahoc)->first();
                            $files = explode(',', $khoahoc->hinhanh);
                        @endphp
                        @foreach ($files as $img => $val)
                            <div class="img rounded" style="background-image: url({{ $val }});"></div>
                        @endforeach
                        <div class="text">
                            <h2>{{ $item->ma_khoahoc }}</h2>
                            <span class="subheading">{{ $item->ten_khoahoc }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex">
                            <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                        href="#pills-description" role="tab" aria-controls="pills-description"
                                        aria-expanded="true">Tổng quan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill"
                                        href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer"
                                        aria-expanded="true">Mô tả</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                                aria-labelledby="pills-description-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Tên
                                                khóa học : {{ $item->ten_khoahoc }}</li>
                                            <?php
                                            $ngayKhaiGiang = $item->ngay_khaigiang;
                                            $ngayKhaiGiang = date('d-m-Y', strtotime($ngayKhaiGiang));
                                            echo '<li class="check"><span class="ion-ios-checkmark-circle"></span>Ngày khai giảng : ' . $ngayKhaiGiang . ' </li>';
                                            ?>
                                            {{-- <li class="check"><span class="ion-ios-checkmark-circle"></span>Thời
                                                    gian kết thúc : {{ $item->nhavesinh }}</li> --}}
                                            {{-- <li class="check"><span class="ion-ios-checkmark-circle"></span>Số
                                                    lượng sinh viên : {{ $item->sotang }}</li> --}}
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Địa
                                                điểm học : {{ $item->diadiemhoc }}</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Lịch
                                                học : {{ $item->thu_hoc }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Giảng viên:
                                                {{ \App\Models\User::find($item->id_giangvien)->name }}</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Học
                                                phí
                                                :
                                                {{ $item->hocphi }} VND</li>
                                            {{-- <li class="check"><span class="ion-ios-checkmark-circle"></span>Ưu đãi
                                                    : {{ $item->gia_dukien }} VND</li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel"
                                aria-labelledby="pills-manufacturer-tab">
                                <p> {{ $item->mota }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach

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
