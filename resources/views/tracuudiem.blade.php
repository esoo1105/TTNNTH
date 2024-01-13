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
    <section class="ftco-section goto-here">
        <div class="container">
            <div class="container mt-5">
                <h2 class="mb-4">Tra cứu điểm thi</h2>
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="inputIdentifier">Số điện thoại hoặc Email</label>
                        <input type="text" class="form-control" id="inputIdentifier" name="identifier" required>
                    </div>
                    <div class="form-group">
                        <label for="selectSubject">Chọn môn</label>
                        <select class="form-control" id="selectSubject" name="subject">
                            <option value="tin_hoc">Tin học</option>
                            <option value="ngoai_ngu">Ngoại ngữ</option>
                            <option value="all">Tất cả</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tra cứu</button>
                </form>
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
