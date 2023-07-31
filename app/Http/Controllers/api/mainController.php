<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\getAntrian;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class mainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $listAll = DB::select(" SELECT d.fs_nm_pasien, d.fs_mr, h.fs_no_sep, h.fd_tgl_trs, h.fs_nm_diagnosa, h.fs_no_peserta, g.fs_nm_layanan, f.fs_nm_bed, e.fs_nm_kelas, b.fd_tgl_in , sum(a.fn_total) fn_count_all, b.fs_kd_reg 
                                from TA_TRS_BILLING a
                                left join ta_trs_bed b on a.fs_kd_reg = b.fs_kd_reg
                                left join ta_registrasi c on a.fs_kd_reg = c.fs_kd_reg
                                left join tc_mr d on c.fs_mr = d.fs_mr
                                left join ta_kelas e on b.fs_kd_kelas = e.fs_kd_kelas
                                left join ta_bed f on b.fs_kd_bed = f.fs_kd_bed
                                left join ta_layanan g on b.fs_kd_layanan = g.fs_kd_layanan
                                left join VCLAIM_SEP h on c.fs_kd_reg = h.fs_kd_reg
                                where b.fd_tgl_out='3000-01-01' and b.fd_tgl_void='3000-01-01' and c.fs_kd_tipe_jaminan in ('NPB01','PBI01') group by d.fs_nm_pasien, d.fs_mr, h.fs_no_sep,
                                h.fd_tgl_trs, h.fs_nm_diagnosa, h.fs_no_peserta, g.fs_nm_layanan,
                                f.fs_nm_bed, e.fs_nm_kelas, b.fd_tgl_in, b.fs_kd_reg ");
            return response()->json($listAll, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
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
