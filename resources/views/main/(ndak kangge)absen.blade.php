@extends('template/layout')

@section('content')
    
    @auth
    <h1>Selamat datang {{ auth()->user()->name }}</h1>

    @if (session('berhasilabsen'))
        <h3>{{ session('berhasilabsen') }}</h3>
    @endif
    @if (session('gagalabsen'))
        <h3>{{ session('gagalabsen') }}</h3>
    @endif

    {{-- absen --}}
    <form action="/absen" method="POST">
        @csrf
        <input type="text" name="note" placeholder="notes">

        <button type="submit" name="btnmasuk">
            absen masuk
        </button>
    </form>
    <form action="/absenkeluar" method="POST">
        @csrf

        <button type="submit" name="btnkeluar">
            absen keluar
        </button>
    </form>

    <br><br><hr>

    <table border="1" cellpadding="10">
        @foreach ($dataAbsen as $absen)    
        <tr>
            <th>Nama</th>
            <th>Notes</th>
            <th>Tgl absen masuk</th>
            <th>Tgl absen keluar</th>
            <th>jam absen masuk</th>
            <th>jam absen keluar</th>
        </tr>
        <tr>
            <td>{{ auth()->user()->name }}</td>
            <td>{{ $absen->note }}</td>
            <td>{{ $absen->absenMasuk }}</td>
            <td>{{ $absen->absenKeluar }}</td>
            <td>{{ $absen->jamMasuk }}</td>
            <td>{{ $absen->jamKeluar }}</td>
        </tr>
        @endforeach
    </table>

    <br><br>



        <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>

        {{-- <a href="/logout">Logout</a> --}}

        @else
        <h1>Halo gaessss</h1>
        <a href="/login">Login</a>
    @endauth
@endsection