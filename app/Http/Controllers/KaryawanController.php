<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKaryawanRequest;
use App\Models\Karyawan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class KaryawanController extends Controller
{
    public function index(): View
    {
        return view('karyawan.index');
    }

    public function create(): view
    {
        return view('karyawan.create');
    }

    public function store(StoreKaryawanRequest $request): RedirectResponse
    {
        Karyawan::create($request->validated());

        return redirect()->route('karyawan.index');
    }

    public function edit(Karyawan $karyawan): View
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(StoreKaryawanRequest $request, Karyawan $karyawan): RedirectResponse
    {
        $karyawan->update($request->validated());

        return redirect()->route('karyawan.index');
    }

    public function delete(Karyawan $karyawan): RedirectResponse
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index');
    }
}
