<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PegawaiModel extends Model
{
    public function alldata()
    {
        return DB::table('pegawai')->get();
    }

    public function detaildata($nip)
    {
        return DB::table('pegawai')->where('nip', $nip)->first();
    }

    public function insertdata($data)
    {
        DB::table('pegawai')->insert($data);
    }

    public function updatedata($nip, $data)
    {
        DB::table('pegawai')->where('nip', $nip)->update($data);
    }

    public function deletedata($nip)
    {
        DB::table('pegawai')->where('nip', $nip)->delete();
    }
}
