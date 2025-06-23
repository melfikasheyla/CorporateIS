<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; // ⬅️ WAJIB DITAMBAHKAN
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Division; 

class UserDashboardController extends Controller
{
    public function index()
    {
        $totalTask = Task::count();

        $activeTask = Task::where('status', 'active')->count();
        $completedTask = Task::where('status', 'completed')->count();
    
        $jumlahDivisi = Division::count(); // Jika divisi ada di tabel terpisah

        $user = Auth::user();
        $divisi = $user->division->name;

        // Ambil semua task (nanti bisa difilter berdasarkan divisi)
        $tasks = Task::with('divisionProgress.division')->get();

        return view('user.dashboard.index', compact('user', 'divisi', 'tasks','totalTask', 'activeTask', 'completedTask', 'jumlahDivisi'));
    }
}
