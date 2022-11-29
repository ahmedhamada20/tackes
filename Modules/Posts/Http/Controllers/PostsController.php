<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Modules\Posts\Entities\Post;
use Modules\Posts\Http\Requests\PostRequest;
use Illuminate\Support\Facades\File as FacadesFile;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts::index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('posts::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PostRequest $request)
    {
        try {
            $data = $request->validationData();
            $data['date'] = date('Y-m-d');
            $data['author_id'] = auth()->id();
            $fileUpload = request()->file('image');
            if ($fileUpload) {
                $data['image'] = uploadPhoto($fileUpload, 'posts');
            }
            Post::create($data);
            return redirect()->back()->with(['message' => 'done Created Successfully']);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('posts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        return view('posts::edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PostRequest $request, $id)
    {

        try {
            $items = Post::findorfail($id);
            $data = $request->validationData();
            $fileUpload = request()->file('image');
            if ($fileUpload) {
                Storage::disk('public')->delete('posts/'.$items->image);
                $data['image'] = uploadPhoto($fileUpload, 'posts');
            }
            Post::findorfail($id)->update($data);
            return redirect()->back()->with(['message' => 'done Updated Successfully']);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            Post::destroy($id);
            return redirect()->back()->with(['message' => 'done deleted Successfully']);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
