<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'position' => ['required'],
            'email' => ['required'],
        ]);

        $employee = new Employee;

        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->email = $request->email;

        $employee->save();

        return response()->json($employee);
    }

    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->get();
        return response()->json($employees);
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'position' => ['required'],
            'email' => ['required'],
        ]);

        $employee = Employee::findOrFail($id);

        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->email = $request->email;

        $employee->save();

        return response()->json($employee);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return response()->json($employee);
    }
}
