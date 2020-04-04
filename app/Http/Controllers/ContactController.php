<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index',['contacts'=>$contacts]);
    }
    public function create()
    {
        return view('contacts.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'email'=>'required|email',
            'phone_number'=>'required|digits_between:10,12',
            'address'=>'required|string'
        ]);

        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone_number=$request->phone_number;
        $contact->address=$request->address;
        $contact->save();

        return redirect()->route('contacts.show',[$contact->id]);

    }
    public function show($id)
    {
        $contact = Contact::find($id);

        return view('contacts.show',['contact'=>$contact]);
    }
    public function edit($id)
    {
        $contact=Contact::find($id);

        return view('contacts.edit',['contact'=>$contact]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|digits_between:10,12',
            'address' => 'required|string'
        ]);

        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->address = $request->address;
        $contact->save();

        return redirect()->route('contacts.show', [ $contact->id ]);
    }
    public function destroy($id)
    {
        Contact::find($id)->delete();

        return redirect()->route('contacts.index');
    }
}
