<?php

namespace App\Http\Controllers;

use App\Models\Rezume;
use App\Models\Citizen;
use App\Models\Workbook;
use App\Models\Specialist;
use App\Models\Skill;
use App\Http\Requests\StoreRezumeRequest;
use App\Http\Requests\UpdateRezumeRequest;
use Illuminate\Support\Facades\Auth;


class RezumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->status == 1)
        {
            $citizen = Citizen::where('user_id', $user->id)->first();
            $citizen_id = $citizen->id;
            $citizen_status = $citizen->status;
            $passport = $citizen->passport;

            $rezumes = Rezume::where('passport', $passport)->orderByDesc('created_at')->paginate(20);

            return view('rezumes.index', [
                'rezumes' => $rezumes,
                'citizen_id' => $citizen_id,
                'citizen_status' => $citizen_status
            ]);
        }

        if($user->status == 0 || $user->status == 3)
        {
            $rezumes = Rezume::orderByDesc('created_at')->paginate(20);

            return view('rezumes.index', [
                'rezumes' => $rezumes
            ]);
        }

        if($user->status == 2)
        {
            $rezumes = Rezume::where('is_published', 1)->orderByDesc('created_at')->paginate(20);

            return view('rezumes.index', [
                'rezumes' => $rezumes
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rezume = new Rezume();
        $workbook = new Workbook();

        $user_id = Auth::id();
        $citizen = Citizen::where('user_id', $user_id)->first();
        $skills = Skill::select('id','name')->get();

        return view('rezumes.create', [
            'rezume' => $rezume,
            'workbook' => $workbook,
            'citizen' => $citizen,
            'skills' => $skills
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRezumeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRezumeRequest $request)
    {
        $rezume = new Rezume;
        $rezume->passport = $request->passport;
        $rezume->specialist_id = $request->specialist_id;
        $rezume->skill = $request->skill;
        $rezume->salary_hidden = $request->is_salary ?? 0;
        $rezume->is_history = $request->is_history ?? 0;
        $rezume->salary = $request->salary;
        $rezume->is_published = 0;
        $rezume->is_active = 1;
        $rezume->status = 1; //holati yangi
        $rezume->save();

        if(!$request->is_history)
        {
            $workplaces = $request->input('workplaces');

            foreach ($workplaces as $workplace) {

                $workbook = new Workbook;

                $workbook->rezume_id = $rezume->id;
                $workbook->old_company_name = $workplace['old_company_name'];
                $workbook->position_name = $workplace['position_name'];
                $workbook->from_date = $workplace['from_date'];
                $workbook->to_date = $workplace['to_date'];

                $workbook->save();
            }
        }

        return redirect()->route('rezumes.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rezume  $rezume
     * @return \Illuminate\Http\Response
     */
    public function show($rezume)
    {
        $rezume = Rezume::findOrFail($rezume);
        $workbooks = Workbook::where('rezume_id', $rezume->id)->get();


        return view('rezumes.show', [
            'rezume' => $rezume,
            'workbooks' => $workbooks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rezume  $rezume
     * @return \Illuminate\Http\Response
     */
    public function edit(Rezume $rezume)
    {
        $user_id = Auth::id();
        $citizen = Citizen::where('user_id', $user_id)->get();
        $specialists = Specialist::select('id','name')->get();
        $skills = Skill::select('id','name')->get();

        return view('rezumes.create', [
            'rezume' => $rezume,
            'citizen' => $citizen,
            'specialists' => $specialists,
            'skills' => $skills
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRezumeRequest  $request
     * @param  \App\Models\Rezume  $rezume
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRezumeRequest $request, Rezume $rezume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rezume  $rezume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rezume $rezume)
    {
        $rezume->delete();

        return redirect()->route('rezumes.index');
    }

    public function rezumes()
    {
        $rezumes = Rezume::active()->orderBy('created_at', 'desc')->get();
        return view('rezumes', compact('rezumes'));
    }

    public function rezume_details(Rezume $rezume)
    {
        return view('rezume_details', compact('rezume'));
    }
}
