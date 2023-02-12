<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
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
            'logo' => $request->logo ? $this->storeLogo($request->logo) : null,
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
            'logo' => $request->logo ? $this->storeLogo($request->logo) : $company->logo,
            'website' => $request->website ?? null
        ]);

        return redirect()->route('companies.index');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index');
    }

    private function storeLogo($logo)
    {
        $logoName = time() . '.' . $logo->extension();

        $logo->move(public_path('storage'), $logoName);

        return $logoName;
    }
}
