<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:50',
        'message' => 'required|string',
    ]);

    Contact::create($request->only([
        'name',
        'email',
        'phone',
        'message'
    ]));

    // return back()->with('success', 'Message submitted successfully.');
    return back()->with('success', 'Your message has been sent successfully!');

}

}




