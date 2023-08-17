<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLaporanRequest;
use App\Models\Laporan;
use App\Models\Proyek;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LaporanController extends Controller
{
    public function index(): View
    {
        $laporanData = Laporan::all();

        return view('laporan.index', compact('laporanData'));
    }

    public function create(): View
    {
        $proyekData = Proyek::all();

        return view('laporan.create', compact('proyekData'));
    }

    public function store(StoreLaporanRequest $request): RedirectResponse
    {
        Laporan::create($request->validated());

        return redirect()->route('laporan.index')->with('success', 'Laporan Created Successfully!');
    }

    public function edit(Laporan $laporan): View
    {
        $proyekData = Proyek::all();

        return view('laporan.edit', compact('laporan', 'proyekData'));
    }

    public function update(StoreLaporanRequest $request, Laporan $laporan): RedirectResponse
    {
        $laporan->update($request->validated());

        return redirect()->route('laporan.index')->with('success', 'Laporan Updated Successfully!');
    }

    public function delete(Laporan $laporan): RedirectResponse
    {
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan Deleted Successfully!');
    }
}
