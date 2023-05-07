<?php

namespace App\Http\Controllers;
// use App\Models\apipenjualan;
use App\Models\PenjualanModel;

use Illuminate\Http\Request;

class penjualanapi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->PenjualanModel = new PenjualanModel;
    }
    public function index()
    {
        $data = $this->PenjualanModel->alldata();
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate([
            'id_barang' => 'required',
            'jumlah_penjualan' => 'numeric|required',
            'nip' => 'required'
        ], [
            'id_barang.required' => 'Mohon di pilih',
            'jumlah_penjualan.numeric' => 'Masukkan hanya angka',
            'jumlah_penjualan.required' => 'Mohon di isi',
            'nip.required' => 'Mohon di pilih'
        ]);

        $data = [
            'id_barang' => Request()->id_barang,
            'jumlah_penjualan' => Request()->jumlah_penjualan,
            'nip' => Request()->nip
        ];

        $this->PenjualanModel->insertdata($data);
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_penjualan)
    {
        if (!$this->PenjualanModel->detaildata($id_penjualan)) {
            return response()->json([
                'pesan' => 'Data tidak ada'
            ]);
        }
        $data = $this->PenjualanModel->detaildata($id_penjualan);
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_penjualan)
    {
        Request()->validate([
            'id_barang' => 'required',
            'jumlah_penjualan' => 'numeric|required',
            'nip' => 'required'
        ], [
            'id_barang.required' => 'Mohon di pilih',
            'jumlah_penjualan.numeric' => 'Masukkan hanya angka',
            'jumlah_penjualan.required' => 'Mohon di isi',
            'nip.required' => 'Mohon di pilih'
        ]);

        $data = [
            'id_barang' => Request()->id_barang,
            'jumlah_penjualan' => Request()->jumlah_penjualan,
            'nip' => Request()->nip
        ];

        $this->PenjualanModel->updatedata($id_penjualan, $data);
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_penjualan)
    {
        $this->PenjualanModel->deletedata($id_penjualan);
        return response()->json([
            'pesan' => 'Data Berhasil di hapus'
        ]);
    }
}
