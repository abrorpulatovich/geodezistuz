<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Specialist;
use App\Models\Skill;
use App\Models\Company;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use Illuminate\Support\Facades\Auth;


class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->status == 2)
        { 
            $company = Company::where('user_id', $user->id)->get();
            $company_inn = $company[0]->company_inn;
            
            $vacancies = Vacancy::where('company_inn', $company_inn)->orderByDesc('created_at')->paginate(20);
        }
        if($user->status == 0)
        {
            $vacancies = Vacancy::orderByDesc('created_at')->paginate(20);
        }


        return view('vacancies.index', [
            'vacancies' => $vacancies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacancy = new Vacancy();

        $user_id = Auth::id();
        $company = Company::where('user_id', $user_id)->get();
        $specialists = Specialist::select('id','name')->get();
        $skills = Skill::select('id','name')->get();

        return view('vacancies.create', [
            'vacancy' => $vacancy,
            'company' => $company,
            'specialists' => $specialists,
            'skills' => $skills
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVacancyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacancyRequest $request)
    {
        $vacancy = new Vacancy;
        $vacancy->company_inn = $request->company_inn;
        $vacancy->specialist_id = $request->specialist_id;
        $vacancy->skill = $request->skill;
        $vacancy->salary_hidden = $request->is_salary ?? 0;
        $vacancy->salary = $request->salary;
        $vacancy->is_published = 0;
        $vacancy->is_active = 1;
        $vacancy->status = 1; //holati yangi
        $vacancy->save();

        return redirect()->route('vacancies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVacancyRequest  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }
}
