<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/backoffice/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backoffice/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backoffice/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backoffice/font/opensans.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backoffice/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backoffice/preloader/preloader.css') }}">

</head>

<body class="hold-transition login-page">

    @include('layouts.preloader')

    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Technical Interview </b> Bridgenote</a>
        </div>

        <div class="card">

            @include('alerts.login')

            <div class="card-body login-card-body">
                <h4 class="login-box-msg">Login</h4>

                <form method="POST" autocomplete="off" id="loginForm">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <span class="fas fa-user"></span> -->
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye" style="display:none"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" id="prosesBtn">Log In</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>
    <br><br><br>
    <script type="text/javascript" src="{{ asset('assets/backoffice/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/backoffice/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/backoffice/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut();
            $("#password").on("keyup", function() {
                if ($(this).val())
                    $(".fa-eye").show();
                else
                    $(".fa-eye").hide();
            });

            $(".fa-eye").mousedown(function() {
                $("#password").attr('type', 'text');
            }).mouseup(function() {
                $("#password").attr('type', 'password');
            }).mouseout(function() {
                $("#password").attr('type', 'password');
            });

            $("#formLogin button[type=submit]").click(function() {
                if ($("input:invalid").length || $("select:invalid").length) {} else {
                    $('#prosesBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
                }
            });
        })
    </script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#categoryForm').serialize(),
                    url: "{{ route('categoryStore.backoffice') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {

                        if (data.response == 'success') {
                            $('#categoryForm').trigger("reset");
                            $('#categoryModel').modal('hide');
                            $('#saveBtn').html('Simpan');
                            table.draw();

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000
                            });
                            Toast.fire({
                                icon: 'success',
                                title: '&nbsp;&nbsp;Data Berhasil Di Simpan !'
                            });

                        } else if (data.response == 'successUpdate') {

                            $('#categoryForm').trigger("reset");
                            $('#categoryModel').modal('hide');
                            $('#saveBtn').html('Simpan');
                            table.draw();

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000
                            });
                            Toast.fire({
                                icon: 'success',
                                title: '&nbsp;&nbsp;Data Berhasil Diperbarui !'
                            });

                        } else if (data.response == 'failedUpdate') {

                            $('#saveBtn').html('Update');
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000
                            });
                            Toast.fire({
                                icon: 'warning',
                                title: '&nbsp;&nbsp;' + Object.values(data.messages)[0]
                            });

                        } else {

                            $('#saveBtn').html('Simpan');
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000
                            });
                            Toast.fire({
                                icon: 'warning',
                                title: '&nbsp;&nbsp;' + Object.values(data.messages)[0]
                            });
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Simpan');
                    }
                });
            });
        });
    </script>
</body>

</html>