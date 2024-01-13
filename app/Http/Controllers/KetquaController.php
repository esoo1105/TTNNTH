<?php

namespace App\Http\Controllers;

use App\Models\Ketqua;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KetquaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ketqua = Ketqua::all();
        return view('ketqua', compact('ketqua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ketqua-add');
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
        Ketqua::create([
            'mssv' => $request->mssv,
            'diem_tinhoc' => $request->diem_tinhoc,
            'bang_tinhoc' => $request->bang_tinhoc,
            'diem_ngoaingu' => $request->diem_ngoaingu,
            'bang_ngoaingu' => $request->bang_ngoaingu,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect('ketqua')->with('message', 'Thêm kết quả thành công !');
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

        $ketqua = Ketqua::all()->where('id', $id)->first();
        return view('ketqua-edit', compact('ketqua'));
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
        DB::table('ketquas')->where('id', $id)->update([
            'mssv' => $request->mssv,
            'diem_tinhoc' => $request->diem_tinhoc,
            'bang_tinhoc' => $request->bang_tinhoc,
            'diem_ngoaingu' => $request->diem_ngoaingu,
            'bang_ngoaingu' => $request->bang_ngoaingu,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect('ketqua')->with('message', 'Cập nhật kết quả thành công !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ketqua::destroy($id);
        return redirect('ketqua')->with('message', 'Xóa thành công');
    }
}
