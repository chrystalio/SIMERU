<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $proyekData = Proyek::query()->with(['karyawan'])->orderBy('status')->latest()->get()
        ->groupBy('status')
        ->map(function ($group) {
            return $group->take(2);
        });

        return view('dashboard', compact('proyekData'));
    }
}
