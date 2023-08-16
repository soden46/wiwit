<x-laravel-ui-adminlte::adminlte-layout>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <div>
                    <img src="{{asset('assets/img/logo.png')}}" class="bg-dark text-white user-image img-circle elevation-2" alt="User Image" width="150" height="150">
                </div>
                <a href="{{ url('/home') }}"><b>Bintang Perdana Plast</b></a>
            </div>
            <!-- /.login-logo -->

            <!-- /.login-box-body -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Masuk Ke Akun Anda</p>

                    <form method="post" action="{{ url('/login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Ingat Saya</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                            </div>

                        </div>
                    </form>
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">Lupa Password</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Buat Akun Baru</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>

        </div>
        <!-- /.login-box -->
    </body>
</x-laravel-ui-adminlte::adminlte-layout>