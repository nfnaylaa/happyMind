<?php
namespace App\Http\Controllers;

use App\Models\Emotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmotionController extends Controller
{
    /**
     * Menampilkan halaman pemantauan emosi.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $user = Auth::user();
        $emotions = Emotion::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $emotionCounts = $emotions->countBy('emotion');

        $emotionLabels = [];
        $emotionData = [];
        foreach ($emotionCounts as $emotion => $count) {
            if (!in_array($emotion, $emotionLabels)) {
                $emotionLabels[] = $emotion;
                $emotionData[] = $count;
            }
        }

        $chartData = [
            'labels' => $emotionLabels,
            'data' => $emotionData,
            'backgroundColor' => 'rgba(152, 255, 223, 1)',
            'borderColor' => 'rgba(188, 184, 138, 1)',
            'borderWidth' => 1
        ];

        return view('emotions', compact('emotions', 'chartData'),[
            'tittle'=>'Pemantauan Emosi'
        ]);
    }

    /**
     * Menyimpan data emosi yang dimasukkan pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'emotion' => 'required',
        ]);

        $user = Auth::user();

        $emotion = new Emotion();
        $emotion->user_id = $user->id;
        $emotion->emotion = $request->input('emotion');
        $emotion->description = $request->input('description');
        $emotion->save();
        

        return redirect()->route('emotions.index');
    }

    /**
     * Menampilkan statistik emosi pengguna.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
}
