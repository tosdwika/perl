<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use App\Models\BarangModel;
use Carbon\Carbon;
use PDF;

class PenjualanController extends Controller
{
    public function __construct()
    {
        $this->PenjualanModel = new PenjualanModel();
        $this->BarangModel = new BarangModel();
        $this->middleware('auth');
    }

    public function penjualan()
    {
        $data = [
            'penjualan' => $this->PenjualanModel->alldata()
        ];
        return view('penjualan.v_penjualan', $data);
    }

    public function detail($id_penjualan)
    {
        if (!$this->PenjualanModel->detaildata($id_penjualan)) {
            abort(404);
        }

        $data = [
            'penjualan' => $this->PenjualanModel->detaildata($id_penjualan)
        ];

        return view('penjualan.v_detailpenjualan', $data);
    }

    public function tambah()
    {
        $data = [
            'barang' => $this->BarangModel->alldata(),
            'pegawai' => $this->PenjualanModel->pegawaidata()
        ];
        return view('penjualan.v_tambahpenjualan', $data);
    }

    public function insert()
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

        $barang = BarangModel::where('id_barang',Request()->id_barang);
        $value = $barang->value('jumlah_barang');
        if ($value < Request()->jumlah_penjualan) {
            return redirect('/penjualan/tambah')->with('pesan','Jumlah Penjualan melebihi stok barang');
        }else{
            $barang->update(["jumlah_barang"=>(int) $value - (int) Request()->jumlah_penjualan]);
            $this->PenjualanModel->insertdata($data);
            return redirect()->route('penjualan')->with('pesan', 'Data Berhasil di Tambahkan');
        }
    }

    public function inject()
    {
        $up = $this->insert();
        $this->PenjualanModel->inde($data);
    }

    public function edit($id_penjualan)
    {
        $data = [
            'penjualan' => $this->PenjualanModel->detaildata($id_penjualan),
            'barang' => $this->BarangModel->alldata(),
            'pegawai' => $this->PenjualanModel->pegawaidata()
        ];

        return view('penjualan.v_editpenjualan', $data);
    }

    public function update($id_penjualan)
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
        return redirect()->route('penjualan')->with('pesan', 'Data Berhasil di Update');
    }

    public function delete($id_penjualan)
    {
        $penjualan = PenjualanModel::where('id_penjualan',Request()->id_penjualan);
        $jum_penjualan = $penjualan->value('jumlah_penjualan');
        $id_brg = $penjualan->value('id_barang');
        $barang = BarangModel::where('id_barang',$id_brg);
        $value = $barang->value('jumlah_barang');
        $barang->update(["jumlah_barang"=>(int) $value + (int) $jum_penjualan]);
        $this->PenjualanModel->deletedata($id_penjualan);
        return redirect()->route('penjualan')->with('pesan', 'Data Berhasil di Hapus');
    }

    public function cetak_pdf()
    {
    	$data = $this->PenjualanModel->alldata();

        $tgl = \Carbon\Carbon::now()->translatedFormat(' (l, d M Y)');
    	$pdf = PDF::loadview('penjualan.penjualan_pdf',['penjualan'=>$data]);
    	return $pdf->download('Laporan Penjualan'.$tgl);
        // return $pdf->stream("laporan-penjualan-pdf", array("Attachment" => false));
    }
}
