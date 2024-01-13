<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ \Illuminate\Support\Facades\URL::to('/') }}">
            <img src="http://127.0.0.1:8000/images/logo.jpg" alt="Logo" height="100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ \Illuminate\Support\Facades\URL::to('/') }}"
                        class="nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="{{ \Illuminate\Support\Facades\URL::to('/tracuudiem') }}"
                        class="nav-link">Tra cứu điểm</a></li>
                <li class="nav-item"><a href="{{ \Illuminate\Support\Facades\URL::to('/lichhoc') }}"
                        class="nav-link">Lịch học</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
