<?php

namespace App\Http\Controllers;

use App\Models\Khoahoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KhoahocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $khoahoc = Khoahoc::all();
        return view('khoahoc', compact('khoahoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('khoahoc-add');
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
        $id = Auth::user()->id;
        $get_admin = User::all()->where('id', $id)->value('name');
        $check = Khoahoc::all()->where('ma_khoahoc', $request->ma_khoahoc)->first();
        if (is_null($check)) {
            if ($image = $request->file('file')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $data = "http://127.0.0.1:8000/images/$profileImage";
            } else {
                $data = "hinhanh.jpg";
            }
            // dd($request);
            Khoahoc::create([
                'ma_khoahoc' => $request->ma_khoahoc,
                'ten_khoahoc' => $request->ten_khoahoc,
                'diadiem_dangky' => $request->diadiem_dangky,
                'ngay_khaigiang' => $request->ngay_khaigiang,
                'hinhanh' => $data,
                'nguoi_dangbai' => $get_admin,
            ]);
            return redirect('khoahoc')->with('message', 'Thêm khóa học thành công !');
        } else {
            return redirect('khoahoc-add')->with('error', 'Đã tồn tại khóa học này, Không thể thêm !');
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

        $khoahoc = Khoahoc::all()->where('ma_khoahoc', $id)->first();
        return view('khoahoc-edit', compact('khoahoc'));
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

        $id_ad = Auth::user()->id;
        $get_admin = User::all()->where('id', $id_ad)->value('name');
        $check = Khoahoc::all()->where('ma_khoahoc', $request->ma_khoahoc)->first();
        if (is_null($check)) {
            if ($image = $request->file('file')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $data = "http://127.0.0.1:8000/images/$profileImage";
            } else {
                $data = "hinhanh.jpg";
            }

            DB::table('khoahocs')->where('ma_khoahoc', $id)->update([
                'ten_khoahoc' => $request->ten_khoahoc,
                'diadiem_dangky' => $request->diadiem_dangky,
                'ngay_khaigiang' => $request->ngay_khaigiang,
                'hinhanh' => $data,
                'nguoi_dangbai' => $get_admin,
            ]);
            return redirect('khoahoc')->with('message', 'Thêm khóa học thành công !');
        } else {
            return redirect()->back()->with('error', 'Đã tồn tại khóa học này, Không thể thêm !');
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

        Khoahoc::where('ma_khoahoc', $id)->delete();
        return redirect('khoahoc')->with('message', 'Xóa thành công');
    }
}
