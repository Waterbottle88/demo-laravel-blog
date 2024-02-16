<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $tagIds = [];
        try {
            DB::beginTransaction();

            $data = $request->validated();

            if (array_key_exists('tag_ids', $data)) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);

            $previewImagePath = Storage::disk('public')->put('images', $data['preview_image']);
            $previewImage = \Intervention\Image\Facades\Image::make(storage_path('app/public/'.$previewImagePath));
            $previewImage->fit(720, 520);
            $previewImage->save();
            $data['preview_image'] = $previewImagePath;

            $post = Post::create($data);
            $post->tags()->attach($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
            abort(500);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.edit', compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();

            if (array_key_exists('tag_ids', $data)) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
                $post->tags()->sync($tagIds);
            } else {
                $post->tags()->detach();
            }

            if ($request->hasFile('main_image')) {
                Storage::disk('public')->delete($post->main_image);
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
            }
            if ($request->hasFile('preview_image')) {
                Storage::disk('public')->delete($post->preview_image);
                $previewImagePath = Storage::disk('public')->put('images', $data['preview_image']);
                $previewImage = \Intervention\Image\Facades\Image::make(storage_path('app/public/'.$previewImagePath));
                $previewImage->fit(720, 520);
                $previewImage->save();
                $data['preview_image'] = $previewImagePath;
            }

            $post->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
