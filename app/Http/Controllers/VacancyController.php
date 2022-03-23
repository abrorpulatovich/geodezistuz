<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Specialist;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
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
        $user = User::find(Auth::user()->id);
        $company = Company::where('user_id', $user->id)->first();
        $vacancies = Vacancy::where('company_id', $company->id)->orderByDesc('created_at')->get();

        return view('profile.company', compact('vacancies', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::user()->id);
        $company = Company::where('user_id', $user->id)->first();
        return view('profile.addvacancy', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $this->validate($request, [
            'name' => 'required',
            'specialist_id' => 'required',
            'skill' => 'required',
            'salary' => 'nullable',
            'is_salary' => 'nullable',
            'desc' => 'required'
        ]);
        $user = User::find(Auth::user()->id);
        $company = Company::where('user_id', $user->id)->first();
        $validated_data['is_published'] = 0;
        $validated_data['is_active'] = 1;
        $validated_data['status'] = 1;
        $validated_data['salary_hidden'] = $request->is_salary ?? 0;
        $validated_data['company_inn'] = $company->company_inn;
        $validated_data['company_id'] = $company->id;

        Vacancy::create($validated_data);

        return redirect()->route('vacancy.index')->with('vacancy_added_successfully', 'Sizning vakantingiz muvaffaqiyatli saqlandi. Vakantingiz moderator tomonidan tasdiqlanganidan keyin saytda ko\'rinadi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        return view('profile.vacancy', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        return view('profile.editvacancy', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $validated_data = $this->validate($request, [
            'name' => 'required',
            'specialist_id' => 'required',
            'skill' => 'required',
            'salary' => 'nullable',
            'is_salary' => 'nullable',
            'desc' => 'required'
        ]);
        $user = User::find(Auth::user()->id);
        $company = Company::where('user_id', $user->id)->first();
        $validated_data['is_published'] = 0;
        $validated_data['is_active'] = 1;
        $validated_data['status'] = 1;
        $validated_data['salary_hidden'] = $request->is_salary ?? 0;
        $validated_data['company_inn'] = $company->company_inn;
        $validated_data['company_id'] = $company->id;
        $vacancy->update($validated_data);

        return redirect()->route('vacancy.show', ['vacancy' => $vacancy])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancy.index')->with('deleted_successfully', "Muvaffaqiyatli o'chirildi");
    }

    public function vacancies($id = null)
    {
        $specialist = null;
        $condition = [];
        if ($id) {
            $condition = ['specialist_id' => $id];
            $specialist = Specialist::find($id);
        }
        $vacancies = Vacancy::active()->where($condition)->orderBy('id', 'desc')->paginate(10);
        return view('vacancies', compact('vacancies', 'specialist'));
    }

    public function vacancy_details(Vacancy $vacancy)
    {
        $vacancy->view_count = $vacancy->view_count + 1;
        $vacancy->save();
        return view('vacancy_details', compact('vacancy'));
    }

}
