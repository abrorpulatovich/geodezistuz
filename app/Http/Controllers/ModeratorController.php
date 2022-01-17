<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Vacancy;


class ModeratorController extends Controller
{
    
    public function companyCheck($id)
    {
        $company = Company::where('id', $id)->first();
        $company_status = $company->status;

        if($company_status == 1 || $company_status == 3)
        {
            $company->update(['status' => 2]);
        }

        if ($company_status == 2)
        {
            $company->update(['status' => 3]);
        }

        return redirect()->route('companies.index');

    }

    public function vacancyCheck($id)
    {
        $vacancy = Vacancy::where('id', $id)->first();
        $vacancy_status = $vacancy->is_published;

        if($vacancy_status == 0 || $vacancy_status == 2)
        {
            $vacancy->update(['is_published' => 1]);
        }

        if ($vacancy_status == 1)
        {
            $vacancy->update(['is_published' => 2]);
        }

        return redirect()->route('vacancies.index');

    }
}
