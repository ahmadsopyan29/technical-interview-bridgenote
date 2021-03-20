<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/font/opensans.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/preloader/preloader.css') }}">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    @include('layouts.preloader')

    <div class="wrapper">

        @include('layouts.navbar')

        @include('layouts.sidebar')

    <div class="content-wrapper">

        @yield('content')

    </div>

    <aside class="control-sidebar control-sidebar-dark"></aside>

    @include('layouts.footer')

    </div>

<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
$(document).ready(function(){
    $(".preloader").fadeOut();
})
</script>
<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".logoutUser").click(function() {
            Swal.fire({
                title: "Logout",
                icon: "warning",
                text: 'Are you sure you want to logout ?',
                showCancelButton: !0,
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
                reverseButtons: !0
            }).then(function (e) {
                console.log(e)
                if (e.value === true) {
                    $.ajax({
                        url: "api/logout",
                        type: "GET",
                        dataType: 'json',
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('Authorization', "Bearer {{ Session::get('userToken') }}");
                        },
                        success: function(data) {
                            $.ajax({
                                url: "deletesession",
                                type: "GET",
                                dataType: 'json',
                                success: function(data) {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                    Toast.fire({
                                        icon: 'success',
                                        title: '&nbsp;&nbsp;Logout successfully !'
                                    });
                                    setTimeout(function(){ location.replace('/'); }, 2000);
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                }
                            });
                            
                            
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            Toast.fire({
                                icon: 'error',
                                title: '&nbsp;&nbsp; Logout In Problem !'
                            });
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            });
            

            
        });
    });
</script>

@include('layouts.script')

</body>
</html>