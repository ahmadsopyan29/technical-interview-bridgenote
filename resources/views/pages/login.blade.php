<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font/opensans.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/preloader/preloader.css') }}">

</head>

<body class="hold-transition login-page">

    @include('layouts.preloader')

    <div class="login-box">
        <div class="login-logo">
            <a href="javascript:void(0);"><b>Technical Interview </b> Bridgenote</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <h4 class="login-box-msg">Login</h4>

                <form method="POST" autocomplete="" id="loginForm">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
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
    <br>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
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
        });
    </script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#loginForm button[type=submit]").click(function(e) {
                if ($("input:invalid").length || $("select:invalid").length) {} else {
                    e.preventDefault();
                    $('#prosesBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
                    $('#prosesBtn').prop('disabled', true);
                    $.ajax({
                        data: $('#loginForm').serialize(),
                        url: "api/login",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            $.ajax({
                                data: { 
                                    token: data.success.token ,
                                    name: data.success.name ,
                                    email: data.success.email
                                },
                                url: "setsession",
                                type: "POST",
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
                                        title: '&nbsp;&nbsp;Login successfully !'
                                    });
                                    setTimeout(function(){ location.replace('/dashboard'); }, 2000);
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                }
                            });
                            
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            $('#prosesBtn').html('Log In');
                            $('#prosesBtn').prop('disabled', false);
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                Toast.fire({
                                    icon: 'error',
                                    title: '&nbsp;&nbsp; Incorrect email or password !'
                                });
                        }
                    });

                }
            });
        });
    </script>
    @if(\Session::has('alert-access'))
    <script>
        window.onload = function () {
        const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 10000});
        Toast.fire({
        icon: 'error',
        title: '&nbsp;&nbsp;<?php echo Session::get('alert-access'); ?>'
        })
        }
    </script>
    @endif
</body>

</html>