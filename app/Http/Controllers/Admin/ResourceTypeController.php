<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourceType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResourceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resource_types = ResourceType::orderBy('r_order')->paginate(10);

        return view('admin.resource_types.index', [
            'resource_types' => $resource_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resource_types.create');
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
        $validated_data['slug'] = Str::slug($request->name);
        $resource_type = ResourceType::create($validated_data);

        return redirect()->route('resource_type.show', ['resource_type' => $resource_type])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResourceType  $resourceType
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceType $resourceType)
    {
        return view('admin.resource_types.show', compact('resourceType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResourceType  $resourceType
     * @return \Illuminate\Http\Response
     */
    public function edit(ResourceType $resourceType)
    {
        return view('admin.resource_types.edit', compact('resourceType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResourceType  $resourceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResourceType $resourceType)
    {
        $validated_data = $this->validateData($request);
        $validated_data['slug'] = Str::slug($request->name);
        $resourceType->update($validated_data);

        return redirect()->route('resource_type.show', ['resource_type' => $resourceType])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourceType  $resourceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceType $resourceType)
    {
        $resourceType->delete();
        return redirect()->route('resource_type.index')->with('deleted_successfully', "Muvaffaqiyatli o'chirildi");
    }

    private function validateData($request)
    {
        return request()->validate([
            'name' => 'required',
            'r_order' => 'required',
            'status' => 'required'
        ]);
    }
}
