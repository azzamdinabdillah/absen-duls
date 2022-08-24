@extends('template/layout')

@section('content')

<section class="main-register">
    <div class="foto-register">
        <img src="/img/login-4.jpg" alt="image" class="login-image-register">
    </div>

    <div class="login-form-register">
        <div>
            <h1 class="welcome-register">Registrasi</h1>
            <p class="pembukaan-register">Sebelum Login Silahkan Registrasi</p>

            <div class="registrasi-berhasil">
                @if (session('berhasil'))
                    <p>{{ session('berhasil') }}</p>
                @endif
            </div>


            <form method="post" action="/registerSystem" class="form-action-register">
                @csrf
            
                <div class="username-form-parent-register">
                    <input type="text" name="username" placeholder="Nama" class="form-username-register">
                    <div class="pesan-error">
                        @error('username')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            
            <div class="email-form-parent-register">
                <input type="text" name="email" placeholder="Email" class="form-email-register">
                <div class="pesan-error">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="password-form-parent">
                <input type="password" name="password" placeholder="Password" class="form-password-register">
                <div class="pesan-error">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
                <button type="submit" name="btnRegist" class="btn-login-register">register</button>
            
            <p class="link-login">
                Sudah Punya Akun? Silahkan Ke
                <a href="/login">halaman login</a>
            </p>
            </form>


        </div>



    </div>
</section>
    
{{-- <h1>Regsitrasi</h1>

@if (session('berhasil'))
    <h3>{{ session('berhasil') }}</h3>
@endif

<form method="post" action="/registerSystem">
    @csrf

    <input type="text" name="username" placeholder="Username/name">
    @error('username')
        <p>{{ $message }}</p>
    @enderror

    <input type="text" name="email" placeholder="email">
    @error('email')
        <p>{{ $message }}</p>
    @enderror

    <input type="passsword" name="password" placeholder="Password">
    @error('password')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit" name="btnRegist">register</button>

    <a href="/login">halaman login</a>
</form> --}}


@endsection