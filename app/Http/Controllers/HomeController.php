<?php

namespace App\Http\Controllers;

use App\Models\Khoahoc;
use App\Models\Chitietkhoahoc;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function index()
    {
        $khoahoc = Khoahoc::all();
        return view('index', compact('khoahoc'));
    }
    public function chitiet($id)
    {
        $chitietkhoahoc = DB::table('khoahocs')->rightJoin('chitietkhoahocs', 'khoahocs.ma_khoahoc', '=', 'chitietkhoahocs.ma_khoahoc')
            ->where('chitietkhoahocs.ma_khoahoc', $id)->get();
        return view('chitiet', compact('chitietkhoahoc'));
    }
    public function search(\Illuminate\Http\Request $request)
    {

    }
    public function lichhoc()
    {
        $chitietkhoahoc = Chitietkhoahoc::all();
        return view('lichhoc', compact('chitietkhoahoc'));
    }
    public function lichdayhoc()
    {
        $chitietkhoahoc = Chitietkhoahoc::all();
        return view('lichday', compact('chitietkhoahoc'));
    }
    public function tracuudiem()
    {
        return view('tracuudiem');
    }
}
