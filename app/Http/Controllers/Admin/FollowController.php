<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index()
    {
        $follows = Follow::all();
        return view('backend.follow.index', compact('follows'));
    }
    public function create()
    {
        $title = "Add Follow";
        return view('backend.follow.add_edit', compact('title'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'icon' => 'required|string',
            'link' => 'required|string',
        ]);
        $follow = new Follow();
        $follow->icon = $request->icon;
        $follow->link = $request->link;
        $follow->status = true;
        $follow->save();
        toastr()->success('Follow icon added succesfully !');
        return redirect()->route('admin.follow.index');
    }
    public function edit(Follow $follow)
    {
        $title = "Edit Follow";
        return view('backend.follow.add_edit', compact('title', 'follow'));
    }
    public function update(Request $request, Follow $follow)
    {
        $request->validate([
            'icon' => 'required|string',
            'link' => 'required|string',
        ]);
        $follow->icon = $request->icon;
        $follow->link = $request->link;
        $follow->save();
        toastr()->success('Follow icon updated succesfully !');
        return redirect()->route('admin.follow.index');
    }
    public function destroy(Follow $follow)
    {
        $follow->delete();
        toastr()->info('Follow icon deleted succesfully !');
        return redirect()->route('admin.follow.index');
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
            Follow::where('id', $data['follow_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'follow_id' => $data['follow_id']]);
        }
    }
}
