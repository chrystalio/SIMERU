<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function index(): View
    {
        $departmentsData = Department::all();

        return view('department.index', compact('departmentsData'));
    }

    public function create(): View
    {
        return view('department.create');
    }

    public function store(StoreDepartmentRequest $request): RedirectResponse
    {
        Department::create($request->validated());

        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department): View
    {
        return view('department.edit', compact('department'));
    }

    public function update(StoreDepartmentRequest $request, Department $department): RedirectResponse
    {
        $department->update($request->validated());

        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();

        return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    }
}

