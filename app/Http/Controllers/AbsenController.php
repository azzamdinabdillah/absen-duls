<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AbsenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index()
    {
        // return DB::table('absentable')->select('note')->get();\
        // dd(DB::table('absentable')->where('userid', auth()->user()->id)->orderBy('absenMasuk', 'desc')->first());

        if (auth()->check() == false) {
            $data = [
                'title' => 'Home',
            ];

            return view('main/home', $data);
        }else{

            $dataAbsenSatuan = DB::table('absentable')->where('userid', auth()->user()->id)->orderBy('absenMasuk', 'desc')->first();

            if ($dataAbsenSatuan == null) {
                $dataAbsenSatuan = "";
            }else{
                $dataAbsenSatuan = DB::table('absentable')->where('userid', auth()->user()->id)->orderBy('absenMasuk', 'desc')->first();
            }

            $data = [
                'title' => 'Halaman Absen',
                'dataAbsen' => DB::table('absentable')->where('userid', auth()->user()->id)->orderBy('id', 'desc')->limit(1)->get(),
                'dataAbsenSatuan' => $dataAbsenSatuan,
            ];

            // dd($data['dataAbsenSatuan']);
    
            return view('main/home', $data);
        }
    }

    // public function home()
    // {
    //     $data = [
    //         'title' => 'Home',
    //     ];

    //     return view('main/home', $data);
    // }

    public function absen(Request $request)
    {
        $absenMasuk = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $jam = Carbon::now()->format('H:i');

        if($request->btnmasuk == null){
            AbsenModel::create([
                'userid' => auth()->user()->id,
                'note' => $request->note,
                'absenMasuk' => date("Y-m-d"),
                'jamMasuk' => $jam,
            ]);

            return redirect()->to('/')->with('berhasilabsen', 'Absen Berhasil');
        }else{
            return redirect()->back()->with('gagalabsen', 'Absen Gagal');
        }

    }


    public function absenKeluar(Request $request)
    {
        // dd($request->userid);
        $absenKeluar = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $jam = Carbon::now()->format('H:i');

        if($request->btnkeluar == null){
            DB::table('absentable')->where('userid', $request->userid)->update([
                'absenKeluar' => date("Y-m-d"),
                'jamKeluar' => $jam,
            ]);

            return redirect()->to('/')->with('berhasilabsenkeluar', 'Absen Keluar Berhasil');
        }else{
            return redirect()->back()->with('gagalabsenkeluar', 'Absen Gagal');
        }
    }

}
