<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChartModel extends Model
{
    public function alldata()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->get();
    }

    public function jan()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','1')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function feb()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','2')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function mar()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','3')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function apr()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','4')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function mei()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','5')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function jun()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','6')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function jul()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','7')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function ags()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','8')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function sep()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','9')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function okt()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','10')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function nov()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','11')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }

    public function des()
    {
        return DB::table('penjualan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'penjualan.id_barang')
            ->leftJoin('pegawai', 'pegawai.nip', '=', 'penjualan.nip')
            ->whereMonth('tanggal_penjualan','12')
            ->select(DB::raw('jumlah_penjualan * harga_barang as penghasilan'))
            ->get('penghasilan');
    }
}
