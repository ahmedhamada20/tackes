<?php

namespace Modules\Comments\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Comments\Entities\comment;
use Modules\Comments\Http\Requests\CommentRequest;
use Modules\Posts\Entities\Post;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('comments::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('comments::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CommentRequest $request)
    {
        try {
            $data = $request->validationData();
            $data['date'] = date('Y-m-d');
            $data['user_id'] = auth()->id();
            $data['post_id'] = $request->post_id;
            Comment::create($data);
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
        $post = Post::findorfail($id);
        return view('comments::show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('comments::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CommentRequest $request, $id)
    {
        try {
            $data = $request->validationData();
            Comment::findorfail($id)->update($data);
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
            Comment::destroy($id);
            return redirect()->back()->with(['message' => 'done Deleted Successfully']);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
