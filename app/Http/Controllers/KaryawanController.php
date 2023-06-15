<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKaryawanRequest;
use App\Models\Department;
use App\Models\Karyawan;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KaryawanController extends Controller
{
    public function index(): View
    {
        $karyawanData = Karyawan::all();
        return view('karyawan.index', compact('karyawanData'));
    }

    public function create(): view
    {
        $departmentData = Department::all();
        return view('karyawan.create', compact('departmentData'));
    }

    public function store(StoreKaryawanRequest $request): RedirectResponse
    {
        Karyawan::create($request->validated());

        return redirect()->route('karyawan.index')->with('success', 'Karyawan Created Successfully!');
    }

    public function edit(Karyawan $karyawan): View
    {
        $departmentData = Department::all();
        return view('karyawan.edit', compact('karyawan', 'departmentData'));
    }


    public function update(StoreKaryawanRequest $request, Karyawan $karyawan): RedirectResponse
    {
        $karyawan->update($request->validated());

        return redirect()->route('karyawan.index')->with('success', 'Karyawan Updated Successfully!');
    }

    public function delete(Karyawan $karyawan): RedirectResponse
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan Deleted Successfully!');
    }
}
