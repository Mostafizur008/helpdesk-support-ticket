<!doctype html>
<html lang="en">

    <head>
        @include('backend/dashboard/user/code/css/css')
    </head>

    <body data-sidebar="dark">
        <div id="layout-wrapper">

            @include('backend/dashboard/user/layouts/header')
            <div class="vertical-menu">

                <div data-simplebar class="h-100">
                    @include('backend/dashboard/user/layouts/sidebar')
                </div>
            </div>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                       @yield('main')
                    </div>
                </div>

            </div>
            @include('backend/dashboard/user/layouts/footer')
        </div>
        @include('backend/dashboard/user/code/js/js')
    </body>

</html>

