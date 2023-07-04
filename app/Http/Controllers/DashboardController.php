<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $proyekCount = Proyek::count();
        $karyawanCount = Karyawan::count();
        $proyekData = Proyek::with('karyawan')->latest('updated_at')->take(5)->get();

        $karyawanRolePercentage = Karyawan::select('role', DB::raw('count(*) as total'))
            ->groupBy('role')
            ->get();

        $projectStatusPercentage = Proyek::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        $projectCategoryPercentage = Proyek::select(DB::raw('MONTH(end_date) as month'), 'category', DB::raw('count(*) as total'))
            ->where('status', 'FINISHED')
            ->groupBy('month', 'category')
            ->get();



        return view('dashboard', compact('proyekCount', 'karyawanCount', 'proyekData', 'karyawanRolePercentage', 'projectStatusPercentage', 'projectCategoryPercentage'));
    }
}

