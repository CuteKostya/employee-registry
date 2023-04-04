<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $validated = $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $limit = $validated['limit'] ?? 10;

        $employees = Employee::query()->paginate($limit);


        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'age' => ['required', 'integer'],
            'salary' => ['required', 'integer'],
            'file' => ['sometimes', 'file'],
        ]);
        $path = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('employee');
        }

        $employee = Employee::query()->create([
            'name' => $validated['name'],
            'age' => $validated['age'],
            'salary' => $validated['salary'],
            'path' => $path,

        ]);


        return redirect()->route('employees');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('employee.create');
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'age' => ['required', 'integer'],
            'salary' => ['required', 'integer'],
        ]);
        Employee::query()->where('id', '=', $employee->id)->update($validated);

        return redirect()->route('employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $path = Employee::query()->where('id', $id)->first();
        $deleted = Employee::query()->where('id', $id)->delete();
        if ($path->path != null) {
            Storage::delete($path->path);
        }


        return redirect()->route('employees');
    }
}
