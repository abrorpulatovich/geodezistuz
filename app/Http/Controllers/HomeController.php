<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $keyword = $request->keyword;
        $result = $this->main_search($keyword);
        return view('search_result', compact('result', 'keyword'));
    }

    public function search_by_keyword(Request $request)
    {
        $result = $this->main_search($request->keyword);
        return response()->json($result);
    }

    private function main_search($keyword)
    {
        $result = [
            'success' => false,
            'message' => "Ma'lumot topilmadi"
        ];
        $result_data = [];
        $vacancies = Vacancy::active()->where('name', 'like', "%{$keyword}%")->orWhere('desc', 'like', "%{$keyword}%")->get();

        if ($vacancies) {
            foreach ($vacancies as $vacancy) {
                $result_data[] = [
                    'result' => $vacancy['name'],
                    'id' => $vacancy['id'],
                    'key' => 'Vakant'
                ];
            }
        }

        $rezumes = Rezume::active()->where('about_me', 'like', "%{$keyword}%")->orWhere('name', 'like', "%{$keyword}%")->get();

        if ($rezumes) {
            foreach ($rezumes as $rezume) {
                $result_data[] = [
                    'result' => $rezume->name,
                    'id' => $rezume['id'],
                    'key' => 'Rezume'
                ];
            }
        }

        $posts = Post::active()
            ->where('title', 'like', "%{$keyword}%")
            ->orWhere('short_desc', 'like', "%{$keyword}%")
            ->orWhere('desc', 'like', "%{$keyword}%")
            ->get();

        if ($posts) {
            foreach ($posts as $post) {
                $result_data[] = [
                    'result' => $post->title,
                    'slug' => $post['slug'],
                    'key' => 'Yangilik'
                ];
            }
        }

        if (sizeof($result_data) > 0) {
            $result = [
                'success' => true,
                'message' => "Ma'lumotlar topildi",
                'result_data' => $result_data
            ];
        }
        return $result;
    }
}
