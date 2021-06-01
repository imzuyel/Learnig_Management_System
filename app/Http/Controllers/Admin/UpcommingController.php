<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Upcomming;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UpcommingController extends Controller
{

    public function index()
    {
       $upcommings = Upcomming::with('categoryname')->get();
        return view('backend.upcomming.index', compact('upcommings'));
    }

    public function create()
    {
        $title = "Add Post";
        $getCategories  = Category::with(['subCategories'])->where(['parent_id' => 0, 'status' =>  true])->get()->toArray();
        return view('backend.upcomming.add_edit', compact('getCategories', 'title'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'body' => 'required|string',

        ]);
        $upcomming = new Upcomming();
        $upcomming->user_id = Auth::user()->id;
        $upcomming->category_id = $request->category_id;
        $upcomming->title = $request->title;
        $upcomming->slug = Str::slug($request->title);
        $upcomming->image = $this->uploadeImage($request);
        $upcomming->body = $request->body;
        $upcomming->status = true;
        $upcomming->save();
        toastr()->success('Up-comming added succesfully !');
        return redirect()->route('admin.upcomming.index');
    }


    public function edit(Upcomming $upcomming)
    {
        $title = "Edit Post";
        $getCategories  = Category::with(['subCategories'])->where(['parent_id' => 0, 'status' =>  true])->get()->toArray();
        return view('backend.upcomming.add_edit', compact('getCategories', 'upcomming', 'title'));
    }


    public function update(Request $request, Upcomming $upcomming)

    {
        $request->validate([
            'category_id' => 'required',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'body' => 'required|string',

        ]);
        $upcomming->user_id = Auth::user()->id;
        $upcomming->category_id = $request->category_id;
        $upcomming->title = $request->title;
        $upcomming->slug = Str::slug($request->title);
        $file = $request->file('image');
        if ($file) {
            if (file_exists($upcomming->image)) {
                unlink($upcomming->image);
            }
            $upcomming->image = $this->uploadeImage($request);
        }
        $upcomming->body = $request->body;
        $upcomming->status = true;
        $upcomming->save();
        toastr()->success('Up-comming updated succesfully !');
        return redirect()->route('admin.upcomming.index');

    }


    public function destroy(Upcomming $upcomming)
    {
        if (file_exists($upcomming->image)) {
            unlink($upcomming->image);
        }
        $upcomming->delete();
        toastr()->success('Upcomming deleted succesfully !');
        return redirect()->route('admin.upcomming.index');
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
            Upcomming::where('id', $data['upcomming_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'upcomming_id' => $data['upcomming_id']]);
        }
    }

    protected function uploadeImage($request)
    {
        $file = $request->file("image");
        // Make new Name Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'images/upcomming/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(1000, 600)->save($imageUrl);
        return $imageUrl;
    }
}
