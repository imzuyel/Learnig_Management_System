<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with(['parentcategory', 'posts'])->get();
        return view('backend.category.index', compact('categories'));
    }


    public function create()
    {
        $title = 'Create Category';
        $getCategories  = Category::with(['subCategories'])->where(['parent_id' => 0, 'status' =>  true])->get()->toArray();
        return view('backend.category.add_edit', compact('getCategories', 'title'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'parent_id' => 'required|integer',
            'category_name' => 'required|string|unique:categories',
            'description' => 'required|string',
            'meta_title' => 'string',
            'meta_description' => 'string',
            'meta_keywords' => 'string',

        ]);
        $category = new Category();
        $category->parent_id = $request->parent_id;
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->category_image = $this->uploadeImage($request);
        $category->icon = $request->icon;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->status = true;
        $category->save();
        toastr()->success('Category Added Succesfully !');
        return redirect()->route('admin.category.index');
    }



    public function edit(Category $category)
    {
        $title = 'Edit Category';
        $getCategories  = Category::with(['subCategories'])->where(['parent_id' => 0, 'status' =>  true])->get()->toArray();
        return view('backend.category.add_edit', compact('getCategories', 'category', 'title'));
    }


    public function update(Request $request, Category $category)

    {
        $request->validate([
            'parent_id' => 'required|integer',
            'category_name' => 'required|string',
            'category_name' => "required|string|unique:categories,category_name,$category->id",
            'description' => 'required|string',
            'meta_title' => 'string',
            'meta_description' => 'string',
            'meta_keywords' => 'string',

        ]);
        $category->parent_id = $request->parent_id;
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $file = $request->file("category_image");
        if ($file) {
            if (file_exists($category->category_image)) {
                unlink($category->category_image);
            }
            $category->category_image = $this->uploadeImage($request);
        }
        $category->icon = $request->icon;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->status = true;
        $category->save();
        toastr()->success('Category Updated Succesfully !');
        return redirect()->route('admin.category.index');
    }


    public function destroy(Category $category)
    {
        if (file_exists($category->category_image)) {
            unlink($category->category_image);
        }
        $category->delete();
        toastr()->success('Category deleted Succesfully !');
        return redirect()->route('admin.category.index');
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
            Category::where('id', $data['category_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'category_id' => $data['category_id']]);
        }
    }

    protected function uploadeImage($request)
    {
        $file = $request->file("category_image");
        // Make new Name Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'images/categories/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(300, 300)->save($imageUrl);
        return $imageUrl;
    }
}
