<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use DataTables;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    public function indexDataTable()
    {
        $companies = Company::all();

        return DataTables::of($companies)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '<div class="flex space-x-4">';
                $btn .= '<a href="'.route('companies.show', $row->id).'" class="bg-gray-450 hover:bg-gray-500 text-white font-medium py-1 px-3 rounded">View</a>';
                $btn .= '<a href="'.route('companies.edit', $row->id).'" class="bg-gray-400 hover:bg-gray-500 text-white font-medium py-1 px-3 rounded">Edit</a>';
                $btn .= '<form action="'.route('companies.destroy', $row->id).'" method="POST">';
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
        return view('companies.create'); 
    }

    public function store(StoreCompanyRequest $request)
    {
        $request->validated();

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $request->logo ? $this->companyService->storeLogo($request->logo) : null,
            'website' => $request->website ?? null
        ]);

        return redirect()->route('companies.index');
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(StoreCompanyRequest $request, Company $company)
    {
        $request->validated();

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $request->logo ? $this->companyService->storeLogo($request->logo) : $company->logo,
            'website' => $request->website ?? null
        ]);

        return redirect()->route('companies.index');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index');
    }
}
