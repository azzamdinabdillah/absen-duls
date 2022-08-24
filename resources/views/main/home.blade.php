@extends('template/layout')

@section('content')
    
    @auth


    <section class="main-absen">
        <div class="judul">
            <h1>Selamat Datang, {{ auth()->user()->name }}</h1>
            
        </div>

        <div class="sub-main-absen">
            <form action="/absen" method="POST" class="form-absen">
                @csrf
                <p class="judul-catatan">Catatan (opsional)</p>
                <input type="text" name="note" class="input-note">
        
                <button type="submit" name="btnmasuk" class="btn-absen-masuk">
                    Absen Masuk
                </button>
            </form>

            <form action="/absenkeluar" method="POST">
                @csrf
        
                @if ($dataAbsenSatuan == "")
                    <input type="hidden" name="">
        
                @else
                    <input type="hidden" name="userid" value="{{ $dataAbsenSatuan->userid }}">
                @endif
        
                <button type="submit" name="btnkeluar" class="btn-absen-keluar">
                    Absen Keluar
                </button>
            </form>
        </div>

        <hr class="divider">

        <div class="data-absen">

            <ul>
                @foreach ($dataAbsen as $absen)
                <div>
                    <li>Notifikasi</li>
                    <li>:</li>
                    <li>
                        @if (session('berhasilabsen'))
                            {{ session('berhasilabsen') }}
                        @endif
                        @if (session('gagalabsen'))
                            {{ session('gagalabsen') }}
                        @endif

                        @if (session('berhasilabsenkeluar'))
                            {{ session('berhasilabsenkeluar') }}
                        @endif
                        @if (session('gagalabsenkeluar'))
                            {{ session('gagalabsenkeluar') }}
                        @endif
                    </li>
                </div>
                <div>
                    <li>Nama</li>
                    <li>:</li>
                    <li>{{ auth()->user()->name }}</li>
                </div>
                <div>
                    <li>Notes</li>
                    <li>:</li>
                    <li>{{ $absen->note }}</li>
                </div>
                <div>
                    <li>Absen Masuk</li>
                    <li>:</li>
                    <li>{{ $absen->absenMasuk }}</li>
                </div>
                <div>
                    <li>Jam</li>
                    <li>:</li>
                    <li>{{ $absen->jamMasuk }}</li>
                </div>
                <div>
                    <li>Absen Keluar</li>
                    <li>:</li>
                    <li>{{ $absen->absenKeluar }}</li>
                </div>
                <div>
                    <li>Jam Keluar</li>
                    <li>:</li>
                    <li>{{ $absen->jamKeluar }}</li>
                </div>
                {{-- <div>
                    <li>Status</li>
                    <li>:</li>
                    <li>Belum Absen</li>
                </div> --}}
                @endforeach
            </ul>

            {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: --}}

            {{-- <table>
                <tr class="nama-table">
                    <td>Nama</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>Absen Masuk</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>Jam Masuk</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>Absen Keluar</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>Jam Keluar</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>:</td>
                </tr>
            </table> --}}
        </div>

        <hr class="divider-2">

        <form action="/logout" method="post" style="padding: 0 20px 0 20px;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </section>

    {{-- <h1>Selamat datang {{ auth()->user()->name }}</h1>

    @if (session('berhasilabsen'))
        <h3>{{ session('berhasilabsen') }}</h3>
    @endif
    @if (session('gagalabsen'))
        <h3>{{ session('gagalabsen') }}</h3>
    @endif

    @if (session('berhasilabsenkeluar'))
        <h3>{{ session('berhasilabsenkeluar') }}</h3>
    @endif
    @if (session('gagalabsenkeluar'))
        <h3>{{ session('gagalabsenkeluar') }}</h3>
    @endif

    
    <form action="/absen" method="POST">
        @csrf
        <input type="text" name="note" placeholder="notes">

        <button type="submit" name="btnmasuk">
            absen masuk
        </button>
    </form>
    <form action="/absenkeluar" method="POST">
        @csrf

        @if ($dataAbsenSatuan == "")
            <input type="hidden" name="">

        @else
            <input type="hidden" name="userid" value="{{ $dataAbsenSatuan->userid }}">
        @endif

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
        </form> --}}

        {{-- <a href="/logout">Logout</a> --}}













        @else

<section class="main-home">
    <div class="sub-main-home">
        <h1>Selamat Datang Di Website Absensi Sederhana Sekali Click</h1>
        <a href="/login">Get Started</a>
    </div>
</section>


    @endauth
@endsection