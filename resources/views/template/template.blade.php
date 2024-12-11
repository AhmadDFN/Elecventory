<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>@yield('page-title') | Elecventory</title>

    @include('template.sc_head')

</head>

<body>

    <!-- Sidebar -->
    @include('template.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        @include('template.navbar')

        <div class="content py-3 mt-3 mx-3" style="min-height: 75vh">
            @yield('content')
        </div>
        <footer
            class="main-footer bg-primary bg-opacity-10 border border-primary border-start-0 border-end-0 px-2 py-3 rounded-start rounded-end border-2">
            <div class="float-end d-none d-sm-inline sticky-bottom">
                <strong>Elecventory Store</strong>
            </div>

            <strong>Copyright © 2024 Elecventory</strong>
        </footer>
    </div>
    {{--  <div class="container-xxxl">

        <!-- Sidebar -->
        @include('template.sidebar')

        @if (session('mess'))
            <div class="col-sm-4">
                <div class="d-flex align-items-center justify-content-between p-4">
                    !!!Notif
                    <div class="alert alert-{{ session('type') }} text-center" style="width: 300px;" role="alert">
                        {{ session('mess') }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Content -->
        <div class="content" id="content">
            @include('template.navbar')

            <div class="container-fluid pt-4 px-4" style="min-height: 75vh;">
                <div class="row g-4">
                    @yield('content')
                </div>
            </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4" style="padding-right: 50px !important;">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Elecventory</a>, inc.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end" style="padding-right: 50px !important;">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="#">Elecventory</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
    </div>  --}}

    @include('template.sc_footer')
</body>

</html>
