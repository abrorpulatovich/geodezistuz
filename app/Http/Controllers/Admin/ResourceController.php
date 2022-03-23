<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::orderBy('r_order')->paginate(10);

        return view('admin.resources.index', [
            'resources' => $resources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $this->validateData($request);
        $validated_data['slug'] = Str::slug($request->title);
        $resource = Resource::create($validated_data);

        return redirect()->route('resource.show', ['resource' => $resource])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        return view('admin.resources.show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        $validated_data = $this->validateData($request);
        $validated_data['slug'] = Str::slug($request->title);
        $resource->update($validated_data);

        return redirect()->route('resource.show', ['resource' => $resource])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('resource.index')->with('deleted_successfully', "Muvaffaqiyatli o'chirildi");
    }

    private function validateData($request)
    {
        return request()->validate([
            'type_id' => 'required',
            'title' => 'required',
            'status' => 'required',
            'author' => 'required',
            'desc' => 'required',
            'r_order' => 'required',
            'link' => 'required'
        ]);
    }
}
