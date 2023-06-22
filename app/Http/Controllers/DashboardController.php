<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $proyekData = Proyek::query()->with(['karyawan'])->latest('updated_at')->take(5)->get();
        return view('dashboard', compact('proyekData'));
    }
}
