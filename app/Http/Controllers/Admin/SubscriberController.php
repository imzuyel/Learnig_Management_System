<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('backend.subscriber.index', compact('subscribers'));
    }
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        toastr()->success('Subscriber deleted Succesfully !');
        return redirect()->route('admin.subscriber.index');
    }
}
