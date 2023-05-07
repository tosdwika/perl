<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangModel extends Model
{
    protected $table = 'barang';

    protected $guarded = [];
    
    public function alldata()
    {
        return DB::table('barang')->get();
    }

    public function detaildata($id_barang)
    {
        return DB::table('barang')->where('id_barang', $id_barang)->first();
    }

    public function insertdata($data)
    {
        DB::table('barang')->insert($data);
    }

    public function updatedata($id_barang, $data)
    {
        DB::table('barang')->where('id_barang', $id_barang)->update($data);
    }

    public function deletedata($id_barang)
    {
        DB::table('barang')->where('id_barang', $id_barang)->delete();
    }
}
