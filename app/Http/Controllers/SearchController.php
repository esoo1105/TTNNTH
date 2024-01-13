<?php

namespace App\Http\Controllers;

use App\Models\Khoahoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = Khoahoc::where('ten_khoahoc', 'LIKE', $request->khoahoc . '%')
                ->orWhere('ma_khoahoc', 'LIKE', '%' . $request->khoahoc . '%')
                ->get();
            $output = '';

            if (count($data) > 0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {
                    // ' . route('chitiet', $row->id) . '
                    $output .= '<li class="list-group-item"><a href="' . route('chitiet', $row->ma_khoahoc) . '">' . $row->ma_khoahoc . ' - ' . $row->ten_khoahoc . '<a/></li>';
                }

                $output .= '</ul>';
            } else {

                $output .= '<li class="list-group-item">' . 'Không có kết quả' . '</li>';
            }
            return $output;
        }
    }

}
