<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index', compact('contacts'));
    }
    public function destroy(Contact $contact)
    {
        $contact->delete();
        toastr()->success('Contact deleted Succesfully !');
        return redirect()->route('admin.contact.index');
    }

}
