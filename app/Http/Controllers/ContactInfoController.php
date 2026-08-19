<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    /**
     * Show contact information form.
     */
    public function edit()
    {
        return view('contact-info.edit');
    }

    /**
     * Update contact information.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'contact_email' => [
                'nullable',
                'email',
                'required_without_all:phone,whatsapp',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
                'required_without_all:contact_email,whatsapp',
            ],

            'whatsapp' => [
                'nullable',
                'string',
                'max:30',
                'required_without_all:contact_email,phone',
            ],
        ], [
            'contact_email.required_without_all' =>
                'Please provide at least one contact method.',

            'phone.required_without_all' =>
                'Please provide at least one contact method.',

            'whatsapp.required_without_all' =>
                'Please provide at least one contact method.',
        ]);

        $request->user()->update($validated);

        return redirect()
            ->route('contact-info.edit')
            ->with('success', 'Contact information updated successfully.');
    }
}