<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quesioner Teknologi Rekayasa Perangkat Lunak @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('theme/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('theme/dist/assets/images/favicon.svg" type="image/x-icon')}}">
</head>
<body>
    @section('body')
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="{{asset('theme/dist/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <span>Quesioner</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="quesioneredommhs">Quesioner EDOM</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="quesionerfasmhs">Quesioner Fasilitas</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
    </div>
    <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
        <div class="page-heading">
            @section('isi')@show
        </div>
        <div class="page-content">
        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Nuda</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"></span> by <a href="#">Nurul Huda</a></p>
                    </div>
            </div>
        </footer>
    </div>
</div>
    <script src="{{asset('theme/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('theme/dist/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('theme/dist/assets/js/extensions/sweetalert2.js')}}"></script>
    <script src="{{asset('theme/dist/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('theme/dist/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('theme/dist/assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('theme/dist/assets/js/mazer.js')}}"></script>
    <script>
        //Swal.fire('Saved!', '', 'success')
    </script>
</body>

</html>
