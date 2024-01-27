<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::cursorPaginate(6);
        return view('admin.contact.contacts',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',      
            ], $messages);  //send messages array with data array
            
           Contact::create($data);
           Mail::to('amira@example.com')->send(new ContactMail($data)); //to class ContactMail
           return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contacts = Contact::findOrFail($id);
        return view ('admin.contact.showContact',compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id',$id)->delete();
        return redirect('contacts');
    }

    
    public function messages(){
        return [
            'name.string'=>'Should be string',
            'message.required'=> 'should be text',
            
            
            ];
    }
}
