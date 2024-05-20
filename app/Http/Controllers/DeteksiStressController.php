<?php

namespace App\Http\Controllers;


use App\Models\Respon;
use App\Models\Kuesioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DeteksiStressController extends Controller
{
    public function kuesioner()
    {
        $pertanyaan = Kuesioner::all();
        return view('kuesioner', compact('pertanyaan'),[
            'tittle'=>"Deteksi Stress"
        ]);
    }

    public function submit(Request $request)
{
    $user = Auth::user();
    $responses = $request->except('_token');

    $academicStress = new Respon();
    $academicStress->user_id = $user->id;
    $academicStress->fill($responses);

    // Hitung total respons
    $totalResponses = array_sum($responses);

    // Hitung stress level berdasarkan jumlah total respons
    if ($totalResponses >= 10 && $totalResponses <= 15) {
        $stressLevel = 'Rendah';
    } elseif ($totalResponses >= 16 && $totalResponses <= 35) {
        $stressLevel = 'Sedang';
    } elseif ($totalResponses >= 36 && $totalResponses <= 50) {
        $stressLevel = 'Tinggi';
    } elseif ($totalResponses >= 51 && $totalResponses <= 90) {
        $stressLevel = 'Sangat Tinggi';
    } else {
        $stressLevel = 'Normal';
    }

    $academicStress->stress_level = $stressLevel;
    $academicStress->save();

    $denominator = 90;

    $percentage = ($totalResponses / $denominator) * 100;
    $formattedPercentage = number_format($percentage, 2) . '%';

    $keterangan = 'Keterangan sesuai dengan nilai stress level';
    return view('hasil', compact('stressLevel', 'keterangan','academicStress','formattedPercentage'),['tittle'=>"Hasilk"],);
}
// public function downloadPDF()
// {
//     $user = Auth::user();
//     $academicStress = Respon::where('user_id', $user->id)->latest()->first();

//     $pdf = new Dompdf();
//     $pdf->loadHtml(View::make('hasil', compact('academicStress'))->render());
//     $pdf->render();

//     return $pdf->stream('hasil_deteksi_stress.pdf');
// }

}
