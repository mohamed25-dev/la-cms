<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\ImageUploadTrait;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    use ImageUploadTrait;
    
    public $post;
    
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this
            ->post::with('user:id,name')
            ->approved()
            ->paginate(10);

        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if (request()->hasFile('image')) {
            $data['image_path'] = $this->uploadImage($request->image);
        } else {
            $data['image_path'] = 'default.jpg';
        }

        $data['user_id'] = auth()->id();

        $this->post->create($data);
        
        return back()->with('success', trans('alerts.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if (request()->hasFile('image')) {
            $data['image_path'] = $this->uploadImage($request->image);
        } 

        $post->update($data);
        
        return back()->with('success', trans('alerts.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getByCategory($id)
    {
        $posts = $this
            ->post::with('user:id,name')
            ->whereCategoryId($id)
            ->approved()
            ->paginate(10);

        return view('index', compact('posts'));
    }

    public function search(Request $request)
    {
        $posts =
            $this->post
            ->where('body', 'LIKE', '%' . $request->keyword . '%')
            ->with('user:id,name')
            ->paginate(10);

        return view('index', compact('posts'));
    }
}
