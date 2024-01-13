<?php

namespace App\Http\Controllers;

use App\Models\Danhsachlop;
use App\Models\Khoahoc;
use App\Models\User;
use Excel;
use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DanhsachlopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachlop = Danhsachlop::all();
        return view('danhsachlop', compact('danhsachlop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khoahoc = Khoahoc::all();
        return view('danhsachlop-add', compact('khoahoc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Danhsachlop::create([
            'mssv' => $request->mssv,
            'hoten' => $request->hoten,
            'lop' => $request->lop,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'ma_khoahoc' => $request->ma_khoahoc,
        ]);
        return redirect('danhsachlop')->with('message', 'Thêm thành viên vào danh sách lớp thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khoahoc = Khoahoc::all();
        $danhsachlop = Danhsachlop::all()->where('id', $id)->first();
        return view('danhsachlop-edit', compact('danhsachlop', 'khoahoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('danhsachlops')->where('id', $id)->update([
            'mssv' => $request->mssv,
            'hoten' => $request->hoten,
            'lop' => $request->lop,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'ma_khoahoc' => $request->ma_khoahoc,
        ]);
        return redirect('danhsachlop')->with('message', 'Cập nhật danh sách lớp thành công !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Danhsachlop::destroy($id);
        return redirect('danhsachlop')->with('message', 'Xóa thành công');
    }

    public function import_csv(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();
    }
}
