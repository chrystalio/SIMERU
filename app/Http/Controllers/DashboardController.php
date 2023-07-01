<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $proyekCount = Proyek::count();
        $karyawanCount = Karyawan::count();
        $proyekData = Proyek::with('karyawan')->latest('updated_at')->take(5)->get();


        return view('dashboard', compact('proyekCount', 'karyawanCount', 'proyekData'));
    }
}

