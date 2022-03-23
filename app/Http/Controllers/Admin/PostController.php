<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($this->validateData($request));
        $this->storeImage($post);
        $post->slug = Str::slug($post->title);
        $post->added_user = Auth::user()->id;
        $post->save();

        return redirect()->route('post.show', ['post' => $post])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($this->validateData($request));
        $this->storeImage($post);
        $post->slug = Str::slug($post->title);
        $post->save();

        return redirect()->route('post.show', ['post' => $post])->with('saved_successfully', 'Muvaffaqiyatli saqlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->deleteExistingImage($post);
        $post->delete();
        return redirect()->route('post.index')->with('deleted_successfully', "Muvaffaqiyatli o'chirildi");
    }

    public function deleteExistingImage(Post $post)
    {
        $deleted = false;
        if (!is_null($post->image)) {
            unlink(storage_path("app/public/uploads/post/large/" . $post->image));
            unlink(storage_path("app/public/uploads/post/medium/" . $post->image));
            unlink(storage_path("app/public/uploads/post/small/" . $post->image));
            $deleted = true;
        }
        return response()->json(['deleted' => $deleted]);
    }

    private function storeImage($post)
    {
        $today = now()->format('d.m.Y');

        if (request()->hasFile('image')) {

            $this->deleteExistingImage($post);
            $image = request()->file('image');
            $file_name = $image->getClientOriginalName() . '.' . time() . '.' . $image->extension();

            $img = Image::make($image->path());

            $path_large = storage_path() . '/app/public/uploads/post/large/' . $today;
            File::makeDirectory($path_large, $mode = 0777, true, true);

            $path_medium = storage_path() . '/app/public/uploads/post/medium/' . $today;
            File::makeDirectory($path_medium, $mode = 0777, true, true);

            $path_small = storage_path() . '/app/public/uploads/post/small/' . $today;
            File::makeDirectory($path_small, $mode = 0777, true, true);

            $img->resize(810, 540, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/post/large') . '/' . $today . '/' . $file_name);

            $img->resize(555, 235, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/post/medium') . '/' . $today . '/' . $file_name);

            $img->resize(270, 180, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/post/small') . '/' . $today . '/' . $file_name);

            $post->update([
                'image' => $today . '/' . $file_name
            ]);
        }
    }

    private function validateData()
    {
        return tap(request()->validate([
            'category_id' => 'nullable',
            'title' => 'required',
            'short_desc' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'slug' => 'nullable',
            'publish_date' => 'required',
            'p_order' => 'nullable'
        ]), function () {
            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:10000'
                ]);
            }
        });
    }
}
