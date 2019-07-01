<?php

namespace App\Http\Controllers;

use App\ContactUS;
use Illuminate\Http\Request;

class ContactUSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function contactUS()
    {
        return view('pages/contact');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUSPost(Request $request)
    {
        $this->validate($request, [
         'name' => 'required',
         'email' => 'required|email',
         'message' => 'required'
         ]);
        ContactUS::create($request->all());
        // Mail::send('email',
        // array(
        //     'name' => $request->get('name'),
        //     'email' => $request->get('email'),
        //     'user_message' => $request->get('message')
        // ), function($message)
        // {
        //     $message->from('saquib.gt@gmail.com');
        //     $message->to('saquib.rizwan@cloudways.com', 'Admin')->subject('Cloudways Feedback');
        // });

        return back()->with('success', 'Thanks for contacting us!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactUS  $contactUS
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUS $contactUS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUS  $contactUS
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUS $contactUS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUS  $contactUS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUS $contactUS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUS  $contactUS
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUS $contactUS)
    {
        //
    }
}
