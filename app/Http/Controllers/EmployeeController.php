<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use DataTables;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function indexDataTable()
    {
        $data = Employee::with('company')->get();

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex space-x-4">';
                    $btn .= '<a href="' . route('employees.show', $row->id) . '" class="bg-gray-400 hover:bg-gray-500 text-white font-medium py-1 px-3 rounded">View</a>';
                    $btn .= '<a href="' . route('employees.edit', $row->id) . '" class="bg-gray-400 hover:bg-gray-500 text-white font-medium py-1 px-3 rounded">Edit</a>';
                    $btn .= '<form action="' . route('employees.destroy', $row->id) . '" method="POST">';
                    $btn .= csrf_field();
                    $btn .= method_field('DELETE');
                    $btn .= '<button onclick="return confirm(\'Are you sure?\')" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-1 px-3 rounded">Delete</button>';
                    $btn .= '</form>';
                    $btn .= '</div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function create()
    {
        $companies = Company::all();

        return view('employees.create', compact('companies'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $request->validated();

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone ?? null
        ]);

        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();

        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $request->validated();

        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone ?? null
        ]);

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
