<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class apipenjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $guarded = [];

    // protected function alldata($id_penjualan)
    // {
    //    return DB::table('penjualan')
    //     ->where('id_penjualan', $id_penjualan)
    //     ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
    //     ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
    //     ->get();
    // }
}
