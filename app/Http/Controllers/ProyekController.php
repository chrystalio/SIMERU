<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyekRequest;
use App\Models\Karyawan;
use App\Models\Proyek;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProyekController extends Controller
{
    public function index(): View
    {
        $proyekData = Proyek::all();

        return view('proyek.index', compact('proyekData'));
    }

    public function create(): View
    {
        $karyawanData = Karyawan::all();
        return view('proyek.create', compact('karyawanData'));
    }

    public function store(StoreProyekRequest $request): RedirectResponse
    {
        Proyek::create($request->validated());

        return redirect()->route('proyek.index')->with('success', 'Proyek Created Successfully');
    }

    public function edit(Proyek $proyek): View
    {
        $karyawanData = Karyawan::all();
        return view('proyek.edit', compact('proyek', 'karyawanData'));
    }

    public function update(StoreProyekRequest $request, Proyek $proyek): RedirectResponse
    {
        $proyek->update($request->validated());

        return redirect()->route('proyek.index')->with('success', 'Proyek Updated Successfully');
    }

    public function delete(Proyek $proyek): RedirectResponse
    {
        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Proyek Deleted Successfully');
    }
}
