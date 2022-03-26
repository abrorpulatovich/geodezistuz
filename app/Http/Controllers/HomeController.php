<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\ResourceType;
use App\Models\Rezume;
use App\Models\Specialist;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rezumes = Rezume::active()->orderBy('created_at', 'desc')->limit(6)->get();
        $specialists = Specialist::with('vacancies')->active()->orderBy('s_order')->get();
        $vacancies_count = Vacancy::active()->count();

        return view('home', compact('specialists', 'rezumes', 'vacancies_count'));
    }

    public function resources($slug)
    {
        $resource_type = ResourceType::where('slug', $slug)->first();
        $resources = Resource::where('type_id', $resource_type->id)->orderBy('r_order')->paginate(10);
        return view('resources.index', compact('resources', 'resource_type'));
    }

    public function resource_details($slug)
    {
        $resource = Resource::where('slug', $slug)->first();
        $resource->clicked_count = $resource->clicked_count + 1;
        $resource->save();

        return view('resources.details', compact('resource'));
    }

    public function search(Request $request)
    {
        dd('Saytdan qidirish ishlari amalga oshirilmoqda...');
    }
}
