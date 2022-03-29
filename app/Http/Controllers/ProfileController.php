<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\Company;
use App\Models\Rezume;
use App\Models\Skill;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\Workbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function user()
    {
        $user = User::find(Auth::user()->id);
        $rezumes = Rezume::where('user_id', $user->id)->orderByDesc('created_at')->get();
        $citizen = Citizen::where('user_id', $user->id)->first();

        return view('profile.user', compact('user', 'rezumes', 'citizen'));
    }

    public function addrezume()
    {
        $user = User::find(Auth::user()->id);
        if ($user->can_login != 1) {
            return redirect()->home();
        }

        $rezume = new Rezume();
        $workbook = new Workbook();

        $citizen = Citizen::where('user_id', $user->id)->first();
        $skills = Skill::select('id', 'name')->get();

        return view('profile.addrezume', [
            'rezume' => $rezume,
            'workbook' => $workbook,
            'citizen' => $citizen,
            'skills' => $skills
        ]);
    }

    public function postrezume(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'specialist_id' => 'required',
            'skill' => 'required',
            'about_me' => 'required'
        ]);

        $rezume = new Rezume();
        $rezume->name = $request->name;
        $rezume->passport = $request->passport;
        $rezume->specialist_id = $request->specialist_id;
        $rezume->skill = $request->skill;
        $rezume->salary_hidden = $request->is_salary ?? 0;
        $rezume->is_history = $request->is_history ?? 0;
        $rezume->salary = $request->salary;
        $rezume->about_me = $request->about_me;
        $rezume->is_published = 0;
        $rezume->is_active = 1;
        $rezume->user_id = Auth::user()->id;
        $rezume->status = 1; //holati yangi
        $rezume->save();

        if (!$request->is_history) {
            $workplaces = $request->input('workplaces');

            foreach ($workplaces as $workplace) {

                $workbook = new Workbook();

                $workbook->rezume_id = $rezume->id;
                $workbook->old_company_name = $workplace['old_company_name'];
                $workbook->position_name = $workplace['position_name'];
                $workbook->from_date = $workplace['from_date'];
                $workbook->to_date = $workplace['to_date'];

                $workbook->save();
            }
        }

        return redirect()->route('user_profile')->with('rezume_added_successfully', 'Sizning rezumingiz muvaffaqiyatli saqlandi');
    }

    public function editrezume(Rezume $rezume)
    {
        $user = User::find(Auth::user()->id);
        if ($user->can_login != 1) {
            return redirect()->home();
        }

        $citizen = Citizen::where('user_id', $user->id)->first();

        return view('profile.editrezume', [
            'rezume' => $rezume,
            'citizen' => $citizen
        ]);
    }

    public function updaterezume(Request $request, Rezume $rezume)
    {
        $this->validate($request, [
            'name' => 'required',
            'specialist_id' => 'required',
            'skill' => 'required',
            'about_me' => 'required'
        ]);
        $rezume->name = $request->name;
        $rezume->passport = $request->passport;
        $rezume->specialist_id = $request->specialist_id;
        $rezume->skill = $request->skill;
        $rezume->salary_hidden = $request->is_salary ?? 0;
        $rezume->is_history = $request->is_history ?? 0;
        $rezume->salary = $request->salary;
        $rezume->about_me = $request->about_me;
        $rezume->is_published = 0;
        $rezume->is_active = $rezume->is_active != 1? $rezume->is_active: 1;
        $rezume->user_id = Auth::user()->id;
        $rezume->status = $rezume->status != 1? $rezume->status: 1;
        $rezume->save();

        if (!$request->is_history) {
            $rezume->workbooks()->delete();
            $workplaces = $request->input('workplaces');

            foreach ($workplaces as $workplace) {

                $workbook = new Workbook();

                $workbook->rezume_id = $rezume->id;
                $workbook->old_company_name = $workplace['old_company_name'];
                $workbook->position_name = $workplace['position_name'];
                $workbook->from_date = $workplace['from_date'];
                $workbook->to_date = $workplace['to_date'];

                $workbook->save();
            }
        } else {
            $rezume->workbooks()->delete();
        }

        return redirect()->route('user_profile')->with('rezume_added_successfully', 'Sizning rezumingiz muvaffaqiyatli saqlandi');
    }

    public function deleterezume(Request $request)
    {
        $rezume = Rezume::findOrFail($request->rezume_id);

        if ($request->method() == 'DELETE') {
            if ($rezume && $rezume->user_id == Auth::user()->id) {
                $rezume->delete();
                return redirect()->route('user_profile')->with('rezume_deleted_successfully', "Rezume muvaffaqaiyatli o'chirildi");
            } else {
                return redirect()->route('user_profile')->with('not_personal_rezume', "Shaxsiy bo'lmagan rezumeni o'chirish mumkin emas");
            }
        } else {
            return redirect()->route('user_profile')->with('error_occurred', "Xatolik sodir bo'ldi");
        }
    }

    public function company()
    {
        $user = User::find(Auth::user()->id);
        $company = Company::where('user_id', $user->id)->first();
        $vacancies = Vacancy::where('company_id', $company->id)->orderByDesc('created_at')->get();

        return view('profile.company', compact('vacancies', 'company'));
    }

    public function addvacancy()
    {
        $user = User::find(Auth::user()->id);
        if ($user->can_login != 1) {
            return redirect()->home();
        }
        $company = Company::where('user_id', $user->id)->first();
        return view('profile.addvacancy', compact('company'));
    }

    public function postvacancy(Request $request)
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

        return redirect()->route('company_profile')->with('vacancy_added_successfully', 'Sizning vakantingiz muvaffaqiyatli saqlandi. Vakantingiz moderator tomonidan tasdiqlanganidan keyin saytda ko\'rinadi');
    }

    public function vacancy(Vacancy $vacancy)
    {
        return view('profile.vacancy', compact('vacancy'));
    }

    public function vacancy_edit(Vacancy $vacancy)
    {
        return view('profile.editvacancy', compact('vacancy'));
    }

    public function vacancy_update(Request $request, Vacancy $vacancy)
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

        return redirect()->route('vacancy', ['vacancy' => $vacancy])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }
}
