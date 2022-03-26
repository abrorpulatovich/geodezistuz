<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rezume;
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

    public function rezumes()
    {
        $rezumes = Rezume::all();
        return view('admin.accept.rezumes', compact('rezumes'));
    }

    public function rezume(Rezume $rezume)
    {
        return view('admin.accept.rezume', compact('rezume'));
    }

    public function accept_rezume(Rezume $rezume)
    {
        $rezume->update(['is_active' => 2]);
        return redirect()->route('admin.acceptable_rezume', ['rezume' => $rezume])->with('rezume_accepted_successfully', 'Rezume muvaffaqiyatli faollashtirildi');
    }
}
