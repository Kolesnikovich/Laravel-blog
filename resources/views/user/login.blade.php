<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Login Page</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/assets/admin/css/all.min.css">

    <link rel="stylesheet" href="/assets/admin/css/alt/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <b>Laravel</b>Blog
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Login</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password')) is-invalid @enderror" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                </div>
            </form>

            <a href="{{ route('register.create') }}" class="text-center">Don't have an account?</a><br>
            <a href="{{ route('home') }}" style="color: #a3a5a8">Continue as a guest</a>
        </div>
    </div>
    <div class="col-12 mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            @if(session()->has('mes'))
                <div class="alert alert-danger">
                    {{ session('mes') }}
                </div>
            @endif
    </div>
</div>


<script src="/assets/admin/jquery/jquery.min.js"></script>

<script src="/assets/admin/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/assets/admin/js/adminlte.min.js?v=3.2.0"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>
</body>
</html>
