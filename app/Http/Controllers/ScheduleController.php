<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::where('user_id', auth()->id())->get();
        return view('schedules.index', compact('schedules'),['tittle'=>"Jadwal"]);
    }

    public function create()
    {
        return view('schedules.create',['tittle'=>"Jadwal|Tambah"]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_time' => 'required',
        ]);

        $schedule = new Schedule();
        $schedule->user_id = auth()->id();
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->date_time = $request->date_time;
        $schedule->save();

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dibuat');
    }

    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', compact('schedule'),['tittle'=>"Jadwal|Edit"]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_time' => 'required',
        ]);

        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->date_time = $request->date_time;
        $schedule->save();

        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully');
    }
}

