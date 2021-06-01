<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        $title = "Add Testimonial";
        return view('backend.testimonial.add_edit', compact('title'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'details' => 'required|string',

        ]);
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->title = $request->title;
        $testimonial->image = $this->uploadeImage($request);
        $testimonial->details = $request->details;
        $testimonial->save();
        toastr()->success('Testimonial added Succesfully !');
        return redirect()->route('admin.testimonial.index');
    }


    public function edit(Testimonial $testimonial)
    {
        $title = "Edit testimonial";
        return view('backend.testimonial.add_edit', compact('testimonial', 'title'));
    }


    public function update(Request $request, Testimonial $testimonial)

    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'details' => 'required|string',

        ]);
        $testimonial->name = $request->name;
        $testimonial->title = $request->title;
        $file=$request->file('image');
        if ($file) {
            if (file_exists($testimonial->image)) {
                unlink($testimonial->image);
            }
            $testimonial->image = $this->uploadeImage($request);
        }
        $testimonial->details = $request->details;
        $testimonial->save();
        toastr()->success('Testimonial updated succesfully !');
        return redirect()->route('admin.testimonial.index');
    }


    public function destroy(Testimonial $testimonial)
    {
        if (file_exists($testimonial->image)) {
            unlink($testimonial->image);
        }
        $testimonial->delete();
        toastr()->success('Testimonial deleted succesfully !');
        return redirect()->route('admin.testimonial.index');
    }



    protected function uploadeImage($request)
    {
        $file = $request->file("image");
        // Make new Name Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'images/testimonials/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(600, 600)->save($imageUrl);
        return $imageUrl;
    }
}
