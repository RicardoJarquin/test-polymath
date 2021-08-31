<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginationCompanies = Company::paginate(10);
        return view('company.index', ['companies' => $paginationCompanies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $path = null;
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $imageName = $image->getClientOriginalName();
            $request->file('logo')->storeAs('public/logos', $imageName);
        }
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => isset($imageName) ? $imageName : null,
            'website' => $request->website
        ]);
        return redirect( route('companies.index') )->with('success', 'Empresa creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->except('_method', '_token'));
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $imageName = $image->getClientOriginalName();
            $request->file('logo')->storeAs('public/logos', $imageName);
            $company->logo = $imageName;
            $company->save();
        }
        return redirect( route('companies.index') )->with('success', 'Empresa editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect( route('companies.index') );
    }
}
