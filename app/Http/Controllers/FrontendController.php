<?php

namespace App\Http\Controllers;

use App\Models\Achiement;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 1)->get();
        $popularPosts = Post::with('username')->orderBy('view_count', 'desc')->take(10)->get();
        $mainCategories=Category::with('posts')->inRandomOrder()->limit(8)->get();
        $achiements= Achiement::latest()->take(4)->get();
        return view('frontend.home.index', compact('banners', 'popularPosts', 'mainCategories', 'achiements'));
    }
    public function details()
    {
        return view('frontend.home.details');
    }
    public function create()
    {
        return view('frontend.contact.mycontact');
    }
    //Contact Store
    public function contacStore(Request $request)
    {
        if ($request->ajax()) {
            $validator = $this->validate($request, [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email',
                'message' => 'required|string',

            ]);
            if ($validator) {
                $contact = new Contact();
                $contact->first_name = $request->first_name;
                $contact->last_name = $request->last_name;
                $contact->email = $request->email;
                $contact->phone = $request->phone;
                $contact->message = $request->message;
                $save =  $contact->save();
                return response()->json(['status' => true]);
            }

            return response()->json(['error' => $validator->errors()->all()]);
        }
    }
    //Subscriber store
    public function subscriberStore(Request $request)
    {
        $validator = $this->validate($request, [
            'email' => 'email|required|unique:subscribers'
        ]);
        if ($validator) {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
}
