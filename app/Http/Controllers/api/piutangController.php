<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\getAntrian;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class piutangController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        try {
            $listPiutang = DB::select(" SELECT fs_kd_piutang,fs_kd_jurnal_buat,fn_piutang,fn_sisa,fd_tgl_piutang,fs_kd_iii,fd_tgl_void,fs_kd_mr
                                from t_bp_piutang_hdr where fs_kd_III='JAMINAN000' and fn_sisa !='0' and FD_TGL_PIUTANG > '2023-05'
                                and FD_TGL_VOID='3000-01-01' ");
            return response()->json($listPiutang, Response::HTTP_OK);
        } catch (QueryException $err) {
            $error = [
                'error' => $err->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
