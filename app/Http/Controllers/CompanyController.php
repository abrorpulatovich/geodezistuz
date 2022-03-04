<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Region;
use App\Models\City;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        $companies = Company::orderByDesc('created_at')->paginate(5);

        if($status) {
            $companies = Company::where('status', $status)->orderByDesc('created_at')->paginate(5);
        }

        $count = Company::where('status', 1)->get()->count();

         return view('companies.index', [
            'companies' => $companies,
            'count' => $count,
            'status' => $status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($company)
    {
        $company = Company::findOrFail($company);

        return view('companies.show', [
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {

        $regions = Region::select('id','name_uz')->get();
        $cities = City::select('id','name_uz')->get();

        return view('companies.edit', [
            'company' => $company,
            'regions' => $regions,
            'cities' => $cities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->company_name = $request->company_name;
        $company->status = 1;
        $company->company_inn = $request->company_inn;
        $company->region_id = $request->region_id;
        $company->city_id = $request->city_id;
        $company->full_name = $request->name;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->update();

        return redirect()->route('vacancies.index');
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

        return redirect()->route('companies.index');
    }
}
