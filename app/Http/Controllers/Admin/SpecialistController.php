<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialists = Specialist::paginate(10);
        return view('admin.specialists.index', compact('specialists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecialistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
            's_order' => 'required',
            'color' => 'required',
            'icon' => 'required'
        ]);

        $specialist = Specialist::create($data);
        $specialist->slug = Str::slug($specialist->name);
        $specialist->save();

        return redirect()->route('specialist.show', ['specialist' => $specialist])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        return view('admin.specialists.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        return view('admin.specialists.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialist $specialist)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
            's_order' => 'required',
            'color' => 'required',
            'icon' => 'required'
        ]);
        $specialist->update($data);
        $specialist->slug = Str::slug($specialist->name);
        $specialist->save();

        return redirect()->route('specialist.show', ['specialist' => $specialist])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        $specialist->delete();
        return redirect()->route('specialist.index')->with('deleted_successfully', "Muvaffaqiyatli o'chirildi");
    }
}
