@extends('template/layout')

@section('content')

    <section class="main">
        <div class="foto">
            <img src="/img/login-4.jpg" alt="" class="login-image">
        </div>

        <div class="login-form">
            <div>
                <h1 class="welcome">Selamat Datang</h1>
                <p class="pembukaan">Sebelum Masuk Ke Aplikasi Silahkan Login</p>

                <div class="login-gagal">
                    @if (session('gagal'))
                        <p>{{ session('gagal') }}</p>
                    @endif
                </div>


            <form method="post" action="/login" class="form-action">
                    @csrf
                    
                <div class="email-form-parent">
                    {{-- <p class="email-form-judul">Email</p> --}}
                    <input type="text" name="email" placeholder="Masukkan Email Kamu" class="form-email">
                    {{-- <i class="fa-solid fa-envelope email-icon"></i> --}}
                    <div class="pesan-error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                
                <div class="password-form-parent">
                    {{-- <p class="password-form-judul">Password</p> --}}
                    <input type="password" name="password" placeholder="Password" class="form-password">
                    <div class="pesan-error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            
                    <button type="submit" class="btn-login">Login</button>
            
                    <p class="link-registrasi">
                        Tidak Punya Akun? Silahkan 
                        <a href="/register">Registrasi</a>
                    </p>
                </form> 
            </div>
        </div>
    </section>

    {{-- <h1>Login Terlebih Dahulu</h1>
    @if (session('gagal'))
        <h2>{{ session('gagal') }}</h2>
    @endif --}}



    {{-- <form method="post" action="/login">
        @csrf

        <input type="text" name="email" placeholder="email">
        @error('email')
            {{ $message }}
        @enderror

        <input type="passsword" name="password" placeholder="Password">
        @error('password')
            {{ $message }}
        @enderror

        <button type="submit">Lomgin</button>

        <a href="/register">Registrasi</a>
    </form> --}}


@endsection

