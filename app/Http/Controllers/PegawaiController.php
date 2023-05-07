<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PegawaiModel;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->PegawaiModel = new PegawaiModel();
        $this->middleware('auth');
    }

    public function pegawai()
    {
        $data = [
            'pegawai' => $this->PegawaiModel->alldata()
        ];

        return view('pegawai.v_pegawai', $data);
    }

    public function detail($nip)
    {
        if (!$this->PegawaiModel->detaildata($nip)) {
            abort(404);
        }
        $data = [
            'pegawai' => $this->PegawaiModel->detaildata($nip)
        ];

        return view('pegawai.v_detail_pegawai', $data);
    }

    public function tambah()
    {
        return view('pegawai.v_tambah_pegawai');
    }

    public function insert()
    {
        Request()->validate([
            'nip' => 'required|numeric|unique:pegawai,nip|min:1|max:999999',
            'nama_pegawai' => 'required',
            'no_wa' => 'required',
            'foto_pegawai' => 'required|mimes:jpg,jpeg,png,bmp,img|max:1024'
        ], [
            'nip.required' => 'Mohon di isi',
            'nip.numeric' => 'Mohon di isi hanya angka',
            'nip.unique' => 'ID pegawai sudah ada',
            'nip.min' => 'Maksimal 1 Karakter',
            'nip.max' => 'Maksimal 6 Karakter',
            'nama_pegawai.required' => 'Mohon di isi',
            'no_wa.required' => 'Mohon di isi',
            'foto_pegawai.required' => 'Mohon di isi',
            'foto_pegawai.mimes' => 'Format yang di dukung adalah JPG, JPEG, PNG, BMP, IMG',
            'foto_pegawai.max' => 'Ukuran foto maksimal 1 Mb'
        ]);

        $file = Request()->foto_pegawai;
        $filename = Request()->nip . '.' . $file->extension();
        $file->move(public_path('foto_pegawai'), $filename);

        $data = [
            'nip' => Request()->nip,
            'nama_pegawai' => Request()->nama_pegawai,
            'no_wa' => Request()->no_wa,
            'foto_pegawai' => $filename
        ];

        $this->PegawaiModel->insertdata($data);
        return redirect()->route('pegawai')->with('pesan', 'Data Berhasil di Tambahkan');
    }

    public function edit($nip)
    {
        if (!$this->PegawaiModel->detaildata($nip)) {
            abort(404);
        }

        $data = [
            'pegawai' => $this->PegawaiModel->detaildata($nip)
        ];

        return view('pegawai.v_edit_pegawai', $data);
    }

    public function update($nip)
    {
        Request()->validate([
            'nama_pegawai' => 'required',
            'no_wa' => 'required',
            'foto_pegawai' => 'mimes:jpg,jpeg,png,bmp,img|max:1024'
        ], [
            'nama_pegawai.required' => 'Mohon di isi',
            'no_wa.required' => 'Mohon di isi',
            'foto_pegawai.mimes' => 'Format yang di dukung adalah JPG, JPEG, PNG, BMP, IMG',
            'foto_pegawai.max' => 'Ukuran foto maksimal 1 Mb'
        ]);

        //Jika ingin ganti foto
        if (Request()->foto_pegawai <> "") {
            $data = $this->PegawaiModel->detaildata($nip);
            unlink(public_path('foto_pegawai') . '/' . $data->foto_pegawai);
            $file = Request()->foto_pegawai;
            $filename = Request()->nip . '.' . $file->extension();
            $file->move(public_path('foto_pegawai'), $filename);

            $data = [
                'nama_pegawai' => Request()->nama_pegawai,
                'no_wa' => Request()->no_wa,
                'foto_pegawai' => $filename
            ];
        } else {
            //Jika tidak ingin ganti foto
            $data = [
                'nama_pegawai' => Request()->nama_pegawai,
                'no_wa' => Request()->no_wa
            ];
        }

        $this->PegawaiModel->updatedata($nip, $data);
        return redirect()->route('pegawai')->with('pesan', 'Data Berhasil di Update');
    }

    public function delete($nip)
    {
        try {
            $this->PegawaiModel->deletedata($nip);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->route('pegawai')->with('pesan', 'Data Pegawai tidak dapat dihapus karena terintegrasi dengan data lain');
            }
        }
        // $data = $this->PegawaiModel->detaildata($nip);
        // if ($data->foto_pegawai <> "") {
        //     unlink(public_path('foto_pegawai') . '/' . $data->foto_pegawai);
        // }

        return redirect()->route('pegawai')->with('pesan', 'Data Berhasil di Hapus');
    }
}
