<?php

namespace App\Http\Controllers;

use App\Models\Sinhvien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sinhvien = Sinhvien::all();
        return view('sinhvien', compact('sinhvien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sinhvien-add');
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
        // dd($request);
        $check = Sinhvien::all()->where('mssv', $request->mssv)->first();
        if (is_null($check)) {
            // dd($request);
            Sinhvien::create([
                'mssv' => $request->mssv,
                'hoten' => $request->hoten,
                'ngaysinh' => $request->ngaysinh,
                'thoigian_dangky' => $request->thoigian_dangky,
                'sotien_dadong' => $request->sotien_dadong,
                'lop' => $request->lop,
                'noisinh' => $request->noisinh,
                'sdt' => $request->sdt,
                'email' => $request->email,
                'ma_khoahoc' => $request->ma_khoahoc,
            ]);
            return redirect('sinhvien')->with('message', 'Thêm sinh viên thành công !');
        } else {
            return redirect()->back()->with('error', 'Đã tồn tại sinh viên này, Không thể thêm !');
        }
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
        $sinhvien = Sinhvien::all()->where('mssv', $id)->first();
        return view('sinhvien-edit', compact('sinhvien'));
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
        $check = Sinhvien::all()->where('mssv', $request->mssv)->first();
        if (is_null($check)) {
            DB::table('sinhviens')->where('mssv', $id)->update([
                'hoten' => $request->hoten,
                'ngaysinh' => $request->ngaysinh,
                'thoigian_dangky' => $request->thoigian_dangky,
                'sotien_dadong' => $request->sotien_dadong,
                'lop' => $request->lop,
                'noisinh' => $request->noisinh,
                'sdt' => $request->sdt,
                'email' => $request->email,
                'ma_khoahoc' => $request->ma_khoahoc,
            ]);
            return redirect('sinhvien')->with('message', 'Cập nhật thông tin sinh viên thành công !');
        } else {
            return redirect()->back()->with('error', 'Đã tồn tại sinh viên này, Không thể thêm !');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Sinhvien::where('mssv', $id)->delete();
        return redirect('sinhvien')->with('message', 'Xóa thành công');
    }
}
