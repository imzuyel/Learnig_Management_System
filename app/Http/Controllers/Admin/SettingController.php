<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('backend.settings.index', compact('settings'));
    }
    public function create()
    {
        $title = "Add Setting";
        return view('backend.settings.add_edit', compact('title'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'email' => 'required|email|string',
            'phone' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'address' => 'required|string',
            'about' => 'required|string',
        ]);
        $setting=new Setting();
        $setting->title=$request->title;
        $setting->email=$request->email;
        $setting->phone=$request->phone;
        $setting->address=$request->address;
        $setting->about=$request->about;
        $setting->logo = $this->uploadeImage($request);
        $setting->save();
        toastr()->success('Setting created succsfully');
        return redirect()->route('admin.setting.index');
    }
    public function edit(Setting $setting)
    {
        $title = "Edit Setting";
        return view('backend.settings.add_edit', compact('title','setting'));
    }
    public function update(Request $request, Setting $setting)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'email' => 'required|email|string',
            'phone' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
            'address' => 'required|string',
            'about' => 'required|string',
        ]);
        $setting->title = $request->title;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->about = $request->about;
        $file=$request->file('logo');
        if ($file) {
           if (file_exists($setting->logo)) {
             unlink($setting->logo);
           }
            $setting->logo = $this->uploadeImage($request);
        }
        $setting->save();
        toastr()->success('Setting updated succsfully');
        return redirect()->route('admin.setting.index');
    }
    protected function uploadeImage($request)
    {
        $file = $request->file("logo");
        // Make new Name Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'images/setting/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(183, 50)->save($imageUrl);
        return $imageUrl;
    }
}
