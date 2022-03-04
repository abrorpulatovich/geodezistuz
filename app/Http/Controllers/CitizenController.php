<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\Region;
use App\Models\City;
use App\Http\Requests\StoreCitizenRequest;
use App\Http\Requests\UpdateCitizenRequest;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        $citizens = Citizen::orderByDesc('created_at')->paginate(5);

        if($status) {
            $citizens = Citizen::where('status', $status)->orderByDesc('created_at')->paginate(5);
        }

        $count = Citizen::where('status', 1)->get()->count();

         return view('citizens.index', [
            'citizens' => $citizens,
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
     * @param  \App\Http\Requests\StoreCitizenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCitizenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function show($citizen)
    {
        $citizen = Citizen::findOrFail($citizen);

        return view('citizens.show', [
            'citizen' => $citizen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function edit(Citizen $citizen)
    {
        $regions = Region::select('id','name_uz')->get();
        $cities = City::select('id','name_uz')->get();

        return view('citizens.edit', [
            'citizen' => $citizen,
            'regions' => $regions,
            'cities' => $cities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCitizenRequest  $request
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCitizenRequest $request, Citizen $citizen)
    {
        $citizen->full_name = $request->full_name;
        $citizen->status = 1;
        $citizen->passport = $request->passport;
        $citizen->region_id = $request->region_id;
        $citizen->city_id = $request->city_id;
        $citizen->gender = $request->gender;
        $citizen->specialist = $request->specialist;
        $citizen->phone_number = $request->phone_number;
        $citizen->birth_date = $request->birth_date;
        $citizen->update();

        return redirect()->route('rezumes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citizen $citizen)
    {
        $citizen->delete();

        return redirect()->route('citizens.index');
    }
}
