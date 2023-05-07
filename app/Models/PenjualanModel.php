<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';

    protected $guarded = [];

    public function alldata()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->get();
    }

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])
    //         ->translatedFormat('l, d F Y');
    // }

    public function pegawaidata()
    {
        return DB::table('pegawai')->get();
    }

    public function detaildata($id_penjualan)
    {
        return DB::table('penjualan')
            ->where('id_penjualan', $id_penjualan)
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->first();
    }

    public function insertdata($data)
    {
        DB::table('penjualan')->insert($data);
    }

    public function updatedata($id_penjualan, $data)
    {
        DB::table('penjualan')->where('id_penjualan', $id_penjualan)->update($data);
    }

    public function inde($id_barang, $up)
    {
        DB::tabel('barang')->where('$id_barang', $id_barang)->update('jumlah_barang', $up);
    }

    public function deletedata($id_penjualan)
    {
        DB::table('penjualan')->where('id_penjualan', $id_penjualan)->delete();
    }
}
