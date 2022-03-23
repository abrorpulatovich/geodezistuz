<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;

class AcceptController extends Controller
{
    public function vacancies()
    {
        $vacancies = Vacancy::all();
        return view('admin.accept.vacancies', compact('vacancies'));
    }

    public function vacancy(Vacancy $vacancy)
    {
        return view('admin.accept.vacancy', compact('vacancy'));
    }

    public function accept_vacancy(Vacancy $vacancy)
    {
        $vacancy->update(['is_active' => 1]);
        return redirect()->route('admin.acceptable_vacancy', ['vacancy' => $vacancy])->with('vacancy_accepted_successfully', 'Vakant muvaffaqiyatli faollashtirildi');
    }
}
