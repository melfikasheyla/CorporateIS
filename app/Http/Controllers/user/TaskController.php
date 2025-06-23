<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Customer;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('status', 'completed')->latest()->get();
        return view('user.history.index', compact('tasks'));
    }
}
