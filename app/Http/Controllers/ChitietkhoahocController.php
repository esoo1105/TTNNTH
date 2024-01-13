<?php

namespace App\Http\Controllers;

use App\Models\Chitietkhoahoc;
use App\Models\Khoahoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Enums\ChucVu;

class ChitietkhoahocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chitietkhoahoc = Chitietkhoahoc::all();
        return view('chitietkhoahoc', compact('chitietkhoahoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khoahoc = Khoahoc::all();
        $giangvien = User::where('chucvu', ChucVu::Teacher)->get();
        return view('chitietkhoahoc-add', compact('khoahoc', 'giangvien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Chitietkhoahoc::create([
            'ma_khoahoc' => $request->ma_khoahoc,
            'thoigian_hoc' => $request->thoigian_hoc,
            'sotiet' => $request->sotiet,
            'diadiemhoc' => $request->diadiemhoc,
            'thu_hoc' => $request->thu_hoc,
            'id_giangvien' => $request->id_giangvien,
            'loai_lop' => $request->loai_lop,
            'hocphi' => $request->hocphi,
            'mota' => $request->mota,
        ]);
        return redirect('chitietkhoahoc')->with('message', 'Thêm thông tin chi tiết khóa học thành công !');

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
        $giangvien = User::where('chucvu', ChucVu::Teacher)->get();
        $chitietkhoahoc = Chitietkhoahoc::all()->where('id', $id)->first();
        // dd(compact('chitietkhoahoc', 'khoahoc', 'giangvien'));
        return view('chitietkhoahoc-edit', compact('chitietkhoahoc', 'khoahoc', 'giangvien'));
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

        DB::table('chitietkhoahocs')->where('id', $id)->update([
            'ma_khoahoc' => $request->ma_khoahoc,
            'thoigian_hoc' => $request->thoigian_hoc,
            'sotiet' => $request->sotiet,
            'diadiemhoc' => $request->diadiemhoc,
            'thu_hoc' => $request->thu_hoc,
            'id_giangvien' => $request->id_giangvien,
            'loai_lop' => $request->loai_lop,
            'hocphi' => $request->hocphi,
            'mota' => $request->mota,
        ]);
        return redirect('chitietkhoahoc')->with('message', 'Thêm thông tin chi tiết khóa học thành công !');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chitietkhoahoc::destroy($id);
        return redirect('chitietkhoahoc')->with('message', 'Xóa thành công');
    }
}
