<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Respon;
use App\Models\Emotion;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index (){
        $patients = User::where('role', 'pasien');
        $user = Auth::user();
        $emotions = Emotion::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $stressLevel = Respon::where('user_id', $user->id)->latest('created_at')->value('stress_level');
        $stress = Respon::where('user_id', $user->id)->latest('created_at')->value('created_at');

        
        if (request('cari')) {
            $patients->where(function ($query) {
                $query->where('name', 'like', '%' . request('cari') . '%')
                    ->orWhere('username', 'like', '%' . request('cari') . '%');
            });
        }

        $patients = $patients->get();

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

        


        return view('dashboard',compact('emotions','chartData','stressLevel','stress','patients'),[
            'tittle'=>"Grafik"
        ]);
    }

    public function keseharian(){
        $user = Auth::user();
        $emotions = Emotion::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('keseharian',compact('emotions'),[
        'tittle'=>'Dashboard|Keseharian'
        ]);
    }

    public function jadwal()
    {
        $schedules = Schedule::where('user_id', auth()->id())->get();
        return view('jadwal', compact('schedules'),['tittle'=>"Jadwal"]);
    }

    public function dashboard( $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $emotions = Emotion::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $stressLevel = Respon::where('user_id', $user->id)->latest('created_at')->value('stress_level');
        $stress = Respon::where('user_id', $user->id)->latest('created_at')->value('created_at');
        $schedules = Schedule::where('user_id', $user->id)->get();

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

        return view('monitor', compact('user','chartData','stressLevel','stress','emotions','schedules'),[
            'tittle'=>"Monitor"
        ]);

        
    }
        public function storeComment(Request $request, $emotionId, $commentedUserId)
    {
        $emotion = Emotion::findOrFail($emotionId);
        // Cari emosi berdasarkan ID
        $emotion->update([
            'comment' => $request->input('comment'),
        ]);

        // Jika komentar berhasil disimpan, Anda dapat melakukan tindakan lanjutan atau memberikan respons sesuai kebutuhan aplikasi Anda.

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }


}

