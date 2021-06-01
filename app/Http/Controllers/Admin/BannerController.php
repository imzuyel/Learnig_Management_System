<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        return view('backend.banner.index', compact('banners'));
    }

    public function create()
    {
        $title = "Add Banner";
        return view('backend.banner.add_edit', compact('title'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'banner_image'=> 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string',

        ]);
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->link = $request->link;
        $banner->banner_image = $this->uploadeImage($request);
        $banner->description = $request->description;
        $banner->status = true;
        $banner->save();
        toastr()->success('Banner added Succesfully !');
        return redirect()->route('admin.banner.index');
    }


    public function edit(Banner $banner)
    {
        $title = "Edit Banner";
        return view('backend.banner.add_edit', compact('banner', 'title'));
    }


    public function update(Request $request, Banner $banner)

    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string',

        ]);
        $banner->title = $request->title;
        $banner->link = $request->link;
        $file=$request->file('banner_image');
        if ($file) {
            if (file_exists($banner->banner_image)) {
                unlink($banner->banner_image);
            }
            $banner->banner_image = $this->uploadeImage($request);
        }
        $banner->description = $request->description;
        $banner->status = true;
        $banner->save();
        toastr()->success('Banner updated succesfully !');
        return redirect()->route('admin.banner.index');
       
    }


    public function destroy(Banner $banner)
    {
        if (file_exists($banner->banner_image)) {
            unlink($banner->banner_image);
        }
        $banner->delete();
        toastr()->success('Banner deleted succesfully !');
        return redirect()->route('admin.banner.index');
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
            Banner::where('id', $data['banner_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'banner_id' => $data['banner_id']]);
        }
    }

    protected function uploadeImage($request)
    {
        $file = $request->file("banner_image");
        // Make new Name Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'images/banners/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(1980, 1020)->save($imageUrl);
        return $imageUrl;
    }
}
