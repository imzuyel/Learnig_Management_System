<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achiement;
use Illuminate\Http\Request;
// achiement
class AchiementController extends Controller
{

    public function index()
    {
        $achiements = Achiement::all();
        return view('backend.achiement.index', compact('achiements'));
    }

    public function create()
    {
        $title = "Add Achiement";
        $achiements = Achiement::all();
        return view('backend.achiement.add_edit', compact('achiements', 'title'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'icon' => 'required|string',

        ]);
        $achiement = new Achiement();
        $achiement->name = $request->name;
        $achiement->amount = $request->amount;
        $achiement->icon = $request->icon;
        $achiement->status = true;
        $achiement->save();
        toastr()->success('Achiement added Succesfully !');
        return redirect()->route('admin.achiement.index');
    }


    public function edit(Achiement $achiement)
    {
        $title = "Edit Achiement";
        return view('backend.achiement.add_edit', compact('title', 'achiement'));
    }


    public function update(Request $request, Achiement $achiement)

    {
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'icon' => 'required|string',

        ]);
        $achiement->name = $request->name;
        $achiement->amount = $request->amount;
        $achiement->icon = $request->icon;
        $achiement->status = true;
        $achiement->save();
        toastr()->success('Achiement updated Succesfully !');
        return redirect()->route('admin.achiement.index');
    }


    public function destroy(Achiement $achiement)
    {

        $achiement->delete();
        toastr()->success('Achiement deleted succesfully !');
        return redirect()->route('admin.achiement.index');
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
            Achiement::where('id', $data['achiement_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'achiement_id' => $data['achiement_id']]);
        }
    }
}
