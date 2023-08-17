<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKlienRequest;
use App\Models\Klien;
use App\Models\Proyek;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KlienController extends Controller
{
    public function index(): View
    {
        $kliensData = Klien::all();

        return view('klien.index', compact('kliensData'));
    }

    public function create(): View
    {
        $proyekData = Proyek::all();

        return view('klien.create', compact('proyekData'));
    }

    public function store(StoreKlienRequest $request): RedirectResponse
    {
        Klien::create($request->validated());

        return redirect()->route('klien.index')->with('success', 'Klien Successfully Created');
    }

    public function edit(Klien $klien): View
    {
        $proyekData = Proyek::all();

        return view('klien.edit', compact('klien', 'proyekData'));
    }

    public function update(StoreKlienRequest $request, Klien $klien): RedirectResponse
    {
        $klien->update($request->validated());

        return redirect()->route('klien.index')->with('success', 'Klien Successfully Updated');
    }

    public function delete(Klien $klien): RedirectResponse
    {
        $klien->delete();

        return redirect()->route('klien.index')->with('success', 'Klien Successfully Deleted');
    }
}
