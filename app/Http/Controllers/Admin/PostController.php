<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Post";
        $categories  = Category::with(['subCategories', 'posts'])->where(['parent_id' => 0, 'status' =>  true])->get();
        $categorypost = array();
        return view('backend.post.create', compact('categories', 'title', 'categorypost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'parent_id' => 'required',
            'title' => 'required|string|unique:posts',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'body' => 'required|string',

        ]);
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->parent_id = $request->parent_id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->image = $this->uploadeImage($request);
        $post->body = $request->body;
        $post->status = true;
        $post->save();
        toastr()->success('Post added succesfully !');
        return redirect()->route('admin.post.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $title = "Edit Post";
        $categories  = Category::with(['subCategories', 'posts'])->where(['parent_id' => 0, 'status' =>  true])->get();
        $posts = Post::where('category_id', $post->category_id)->where(['parent_id' => 0, 'status' =>  true])->get();
        return view('backend.post.edit', compact('categories', 'title', 'post', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required',
            'parent_id' => 'required',
            'title' => 'required|string|unique:posts,title,$post->id',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'body' => 'required|string',

        ]);
        $post->user_id = Auth::user()->id;
        $post->parent_id = $request->parent_id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $file = $request->file('image');
        if ($file) {
            if (file_exists($post->image)) {
                unlink($post->image);
            }
            $post->image = $this->uploadeImage($request);
        }
        $post->body = $request->body;
        $post->save();
        toastr()->success('Post update succesfully !');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (file_exists($post->image)) {
            unlink($post->image);
        }
        $post->delete();
        toastr()->success('Post deleted succesfully !');
        return redirect()->route('admin.post.index');
    }
    //Update status
    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = false;
            } else {
                $status = true;
            }
            Post::where('id', $data['post_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'post_id' => $data['post_id']]);
        }
    }

    //Append Post
    public function appendPost(Request $request)
    {
        if ($request->ajax()) {
            $categorypost = Category::where('id', $request->category_id)->with(['posts'])->first();
            return view('backend.post.categoryPosts', compact('categorypost'));
        }
    }

    protected function uploadeImage($request)
    {
        $file = $request->file("image");
        // Make new Name Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'images/post/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(1500, 750)->save($imageUrl);
        return $imageUrl;
    }
}
