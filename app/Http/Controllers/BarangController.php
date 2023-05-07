<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->middleware('auth');
    }

    public function barang()
    {
        $data = [
            'barang' => $this->BarangModel->alldata()
        ];

        return view('barang.v_barang', $data);
    }

    public function detail($id_barang)
    {
        if (!$this->BarangModel->detaildata($id_barang)) {
            abort(404);
        }
        $data = [
            'barang' => $this->BarangModel->detaildata($id_barang)
        ];

        return view('barang.v_detailbarang', $data);
    }

    public function tambah()
    {
        return view('barang.v_tambahbarang');
    }

    public function insert()
    {
        Request()->validate([
            'id_barang' => 'required|numeric|unique:barang,id_barang|min:1|max:999999',
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'jumlah_barang' => 'required|numeric',
            'foto_barang' => 'required|mimes:jpg,jpeg,png,bmp,img|max:1024'
        ], [
            'id_barang.required' => 'Mohon di isi',
            'id_barang.numeric' => 'Mohon di isi hanya angka',
            'id_barang.unique' => 'ID Barang sudah ada',
            'id_barang.min' => 'Maksimal 1 Karakter',
            'id_barang.max' => 'Maksimal 6 Karakter',
            'nama_barang.required' => 'Mohon di isi',
            'harga_barang.required' => 'Mohon di isi',
            'harga_barang.numeric' => 'Mohon di isi hanya angka',
            'jumlah_barang.required' => 'Mohon di isi',
            'jumlah_barang.numeric' => 'Mohon di isi hanya angka',
            'foto_barang.required' => 'Mohon di isi',
            'foto_barang.mimes' => 'Format yang di dukung adalah JPG, JPEG, PNG, BMP, IMG',
            'foto_barang.max' => 'Ukuran foto maksimal 1 Mb'
        ]);

        $file = Request()->foto_barang;
        $filename = Request()->id_barang . '.' . $file->extension();
        $file->move(public_path('foto'), $filename);

        $data = [
            'id_barang' => Request()->id_barang,
            'nama_barang' => Request()->nama_barang,
            'harga_barang' => Request()->harga_barang,
            'jumlah_barang' => Request()->jumlah_barang,
            'foto_barang' => $filename
        ];

        $this->BarangModel->insertdata($data);
        return redirect()->route('barang')->with('pesan', 'Data Berhasil di Tambahkan');
    }

    public function edit($id_barang)
    {
        if (!$this->BarangModel->detaildata($id_barang)) {
            abort(404);
        }

        $data = [
            'barang' => $this->BarangModel->detaildata($id_barang)
        ];

        return view('barang.v_editbarang', $data);
    }

    public function update($id_barang)
    {
        Request()->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'jumlah_barang' => 'required|numeric',
            'foto_barang' => 'mimes:jpg,jpeg,png,bmp,img|max:1024'
        ], [
            'nama_barang.required' => 'Mohon di isi',
            'harga_barang.required' => 'Mohon di isi',
            'harga_barang.numeric' => 'Mohon di isi hanya angka',
            'jumlah_barang.required' => 'Mohon di isi',
            'jumlah_barang.numeric' => 'Mohon di isi hanya angka',
            'foto_barang.mimes' => 'Format yang di dukung adalah JPG, JPEG, PNG, BMP, IMG',
            'foto_barang.max' => 'Ukuran foto maksimal 1 Mb'
        ]);

        //Jika ingin ganti foto
        if (Request()->foto_barang <> "") {
            $data = $this->BarangModel->detaildata($id_barang);
            // unlink(public_path('foto') . '/' . $data->foto_barang);
            $file = Request()->foto_barang;
            $filename = Request()->id_barang . '.' . $file->extension();
            $file->move(public_path('foto'), $filename);

            $data = [
                'nama_barang' => Request()->nama_barang,
                'harga_barang' => Request()->harga_barang,
                'jumlah_barang' => Request()->jumlah_barang,
                'foto_barang' => $filename
            ];
        } else {
            //Jika tidak ingin ganti foto
            $data = [
                'nama_barang' => Request()->nama_barang,
                'harga_barang' => Request()->harga_barang,
                'jumlah_barang' => Request()->jumlah_barang
            ];
        }

        $this->BarangModel->updatedata($id_barang, $data);
        return redirect()->route('barang')->with('pesan', 'Data Berhasil di Update');
    }

    public function delete($id_barang)
    {
        try {
            $this->BarangModel->deletedata($id_barang);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->route('barang')->with('pesan', 'Barang tidak dapat dihapus karena terintegrasi dengan data lain');
            }
        }
        // $data = $this->BarangModel->detaildata($id_barang);
        // if ($data->foto_barang <> "") {
        //     unlink(public_path('foto') . '/' . $data->foto_barang);
        // }
        return redirect()->route('barang')->with('pesan', 'Barang berhasil dihapus');
    }
}
