<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request): RedirectResponse
    {
        Mail::to(config('mail.contact_to'))->send(new ContactMail($request->validated()));

        return redirect()->route('home')->with('success', 'Thanks! Renny will be in touch soon.');
    }
}
