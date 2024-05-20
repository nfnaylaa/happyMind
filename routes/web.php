<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\EmotionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DeteksiStressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [landingPageController::class, 'index']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/tips', [TipsController::class, 'index']);
Route::get('/tips-{slug}', [TipsController::class, 'show']);


Route::middleware(['auth'])->group(function () {
    Route::get('/emotions', [EmotionController::class, 'index'])->name('emotions.index');
    Route::post('/emotions', [EmotionController::class, 'store'])->name('emotions.store');
    Route::get('/deteksi-stress', [DeteksiStressController::class, 'kuesioner'])->name('kuesioner');
    Route::post('/deteksi-stress-submit', [DeteksiStressController::class, 'submit'])->name('kuesioner.submit');
    Route::get('/deteksi-stress-hasil', [DeteksiStressController::class, 'hasil'])->name('kuesioner.hasil');
    Route::get('/download-pdf', [DeteksiStressController::class, 'downloadPDF'])->name('download.pdf');
    // Route::get('/reminders', [ReminderController::class, 'index'])->name('reminder.index');
    // Route::post('/reminders', [ReminderController::class, 'store'])->name('reminder.store');
    // Route::put('/reminders-{reminder}-markMissed', [ReminderController::class, 'markMissed'])->name('reminder.markMissed');
    // Route::put('/reminders-{reminder}-markCompleted', [ReminderController::class, 'markCompleted'])->name('reminder.markCompleted');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/contacts', [ChatController::class, 'getContacts'])->name('contact.list');
    Route::get('/get-sender-name/{senderId}', [ChatController::class, 'getSenderName'])->name('user.getSenderName');
    Route::get('/chat/messages/{receiverId}', [MessageController::class, 'getMessages'])->name('message.list');
    Route::post('/chat/send-message', [MessageController::class, 'sendMessage'])->name('message.send');
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::get('/dashboard-keseharian', [DashboardController::class,'keseharian']);
    Route::get('/dashboard-jadwal', [DashboardController::class,'jadwal']);
    Route::get('/dashboard-{username}', [DashboardController::class,'dashboard'])->name('monitor');
    Route::put('/dashboard-{emotionId}-comment-{commentedUserId}', [DashboardController::class, 'storeComment'])->name('emotions.comment.store');
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/schedules-create', [ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::get('/schedules-{schedule}-edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::put('/schedules-{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::delete('/schedules-{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');
});