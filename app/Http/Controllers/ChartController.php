<?php

namespace App\Http\Controllers;
use App\Models\ChartModel;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->ChartModel = new ChartModel;
    }

    public function sumchart()
    {
        $data = $this->ChartModel->alldata();
        $jan = $this->ChartModel->jan();
        $feb = $this->ChartModel->feb();
        $mar = $this->ChartModel->mar();
        $apr = $this->ChartModel->apr();
        $mei = $this->ChartModel->mei();
        $jun = $this->ChartModel->jun();
        $jul = $this->ChartModel->jul();
        $ags = $this->ChartModel->ags();
        $sep = $this->ChartModel->sep();
        $okt = $this->ChartModel->okt();
        $nov = $this->ChartModel->nov();
        $des = $this->ChartModel->des();
        $sum = [
            'velg' => $data->where('id_barang', '=', '7')->sum('jumlah_penjualan'),
            'damper' => $data->where('id_barang', '=', '8')->sum('jumlah_penjualan'),
            'pintu_mobil' => $data->where('id_barang', '=', '77')->sum('jumlah_penjualan'),
            'rooftop' => $data->where('id_barang', '=', '90')->sum('jumlah_penjualan'),
            'shock_breaker' => $data->where('id_barang', '=', '98')->sum('jumlah_penjualan'),
            //penghasilan
            'jan' => $jan->sum('penghasilan'),
            'feb' => $feb->sum('penghasilan'),
            'mar' => $mar->sum('penghasilan'),
            'apr' => $apr->sum('penghasilan'),
            'mei' => $mei->sum('penghasilan'),
            'jun' => $jun->sum('penghasilan'),
            'jul' => $jul->sum('penghasilan'),
            'ags' => $ags->sum('penghasilan'),
            'sep' => $sep->sum('penghasilan'),
            'okt' => $okt->sum('penghasilan'),
            'nov' => $nov->sum('penghasilan'),
            'des' => $des->sum('penghasilan'),
        ];
        return view('chart.chart_penjualan', $sum);
        // compact('velg'));
    }
}
